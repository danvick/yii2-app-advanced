<?php


use tuyakhov\notifications\models\Notification;
use yii\helpers\Html;
use yii\timeago\TimeAgo;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notifications';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="notifications-index">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'emptyText' => "You don't have any notifications at this time.",
                            'options' => [
                                // 'class' => 'ibox-content forum-container',
                            ],
                            'layout' => '{items}{pager}{summary}',
                            'itemOptions' => [
                                'tag' => false,
                            ],
                            'itemView' => static function (Notification $model, $key, $index, $widget) {
                                $isUnread = empty($model->read_at);

                                return "
                                <div class='" . ($isUnread ? 'active' : '') . "' data-key='$model->id'>
                                <div class='row'>
                                    <div class='col-md-10'>
                                        <div class='forum-icon'>
                                            <i class='fa fa-bell'></i>
                                        </div>
                                        " . Html::a($model->data('actionUrl')['label'] ?? $model->subject, ['notifications/open', 'id' => $model->id], ['class' => 'forum-item-title']) . "
                                        <div class='forum-sub-title'>$model->body</div>
                                    </div>
                                    <div class='col-md-2 forum-info'>
                                       <div><small>" . TimeAgo::widget(['timestamp' => $model->created_at]) . "</small></div>
                                    </div>
                                </div>
                            </div>
                                ";
                            },

                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$this->registerCss('
.unread-notification {
    border: 1px solid #eaf0f9;
    background-color: #f1f5fa;
}
');