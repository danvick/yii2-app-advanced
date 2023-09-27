<?php

namespace frontend\controllers;


use common\models\User;
use tuyakhov\notifications\models\Notification;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class NotificationsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['open', 'mark-all-as-read', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index', [
            'dataProvider' => new ActiveDataProvider([
                'query' => Notification::find()
                    ->where(['notifiable_id' => Yii::$app->user->id])
                    ->andWhere(['notifiable_type' => User::class])
                    ->orderBy('ISNULL(read_at) DESC, created_at DESC'),
            ]),
        ]);
    }

    /**
     * @param $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionOpen($id): Response
    {
        $notification = $this->findModel($id);
        $notification->markAsRead();

        return $this->redirect(ArrayHelper::merge([$notification->data('actionUrl')['href']], ($notification->data('actionUrl')['params'] ?? [])));
    }

    /**
     * @return Response
     */
    public function actionMarkAllAsRead(): Response
    {
        foreach (Yii::$app->user->identity->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    /**
     * Finds the Loan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Notification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Notification
    {
        if (($model = Notification::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}