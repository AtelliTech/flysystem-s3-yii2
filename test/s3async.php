<?php

namespace App;

use Exception;
use Yii;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/vendor/yiisoft/yii2/Yii.php';

$config = [
    'class' => 'AtelliTech\Yii2\FlysystemAdapterAwsAsyncS3',
    'bucketName' => '{bucketName}',
    'key' => '{key}',
    'secret' => '{secret}',
    'pathPrefix' => '{pathPrefix}'
];

$fs = Yii::createObject($config);
try {
    $fs->write('/12345.txt', '12345');
} catch (Exception $exception) {
    // handle the error
    var_dump($exception);
}

$listing = $fs->listContents('');
foreach($listing as $item) {
    echo "\nPath: " . $item->path();
}
