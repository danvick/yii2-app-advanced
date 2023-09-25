<?php
return [
    'adminEmail' => getenv('ADMIN_EMAIL'),
    'supportEmail' => getenv('SUPPORT_EMAIL'),
    'senderEmail' => getenv('SENDER_EMAIL'),
    'senderName' => getenv('SENDER_NAME'),
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,
];
