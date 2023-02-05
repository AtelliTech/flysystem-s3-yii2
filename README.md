# flysystem-s3-yii2
It's an adapter of AWS S3 for Yii2 that integrating with atellitech/flysystem-yii2

## Supports
- AWS S3   
Please see [https://flysystem.thephpleague.com/docs/adapter/aws-s3-v3/](https://flysystem.thephpleague.com/docs/adapter/aws-s3-v3/)
- Async AWS S3   
Please see [https://flysystem.thephpleague.com/docs/adapter/async-aws-s3/](https://flysystem.thephpleague.com/docs/adapter/async-aws-s3/)

## Getting Start
### Requirements
- php8.0+

### Install
```
$ /lib/path/composer require atellitech/flysystem-s3-yii2
```

### Usage
#### AWS S3
##### Add component into config file of yii2 project

```php=
...
"components": [
    "fs" => [
        'class' => 'AtelliTech\\Yii2\\FlysystemAdapterAwsS3',
        'bucketName' => '{bucketName}',
        'pathPrefix' => '{pathPrefix}', default: '' means root path of bucket
        'version' => '{version}', // default: latest
        'key' => '{key}',
        'secret' => '{secret}',
        'region' => '{region}', // default: ap-northeast-1
    ]
]
```

#### Async AWS S3
##### Add component into config file of yii2 project

```php=
...
"components": [
    "fs" => [
        'class' => 'AtelliTech\\Yii2\\FlysystemAdapterAwsAsyncS3',
        'bucketName' => '{bucketName}',
        'pathPrefix' => '{pathPrefix}', default: '' means root path of bucket
        'version' => '{version}', // default: latest
        'key' => '{key}',
        'secret' => '{secret}',
        'region' => '{region}', // default: ap-northeast-1
    ]
]
