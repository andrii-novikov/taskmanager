<?php

return defined('YII_ENV') && YII_ENV == 'dev'?
    [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=taskmanager',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    ] :
    [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=mysql.hostinger.com.ua;dbname=u816997872_tm',
        'username' => 'u816997872_tm',
        'password' => 'GxgcflM9cR',
        'charset' => 'utf8',
    ];
