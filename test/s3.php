<?php

namespace App;

use Exception;
use Yii;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';

$config = [
    'class' => 'AtelliTech\Yii2\FlysystemAdapterAwsS3',
    'bucketName' => '{bucketName}',
    'key' => '{key}',
    'secret' => '{secret}',
    'pathPrefix' => '{pathPrefix}'
];

$fs = Yii::createObject($config);
try {
    $fs->write('/123.txt', '123');
} catch (Exception $exception) {
    // handle the error
    var_dump($exception);
}

$listing = $fs->listContents('');
foreach($listing as $item) {
    echo "\nPath: " . $item->path();
}
