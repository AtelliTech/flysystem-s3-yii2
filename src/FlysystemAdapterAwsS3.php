<?php

namespace AtelliTech\Yii2;

use Aws\Credentials\Credentials;
use Aws\S3\S3Client;
use League\Flysystem\Filesystem;
use League\Flysystem\Visibility;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\AwsS3V3\PortableVisibilityConverter;
use Yii;

/**
 * This is an adapter of AWS S3.
 * All options are refering to this document https://flysystem.thephpleague.com/docs/adapter/aws-s3-v3/
 *
 * @author Eric Huang <eric.huang@atelli.ai>
 */
class FlysystemAdapterAwsS3 extends AbstractFlysystemAdapter
{
    /**
     * @var string $bucketName
     */
    public $bucketName;

    /**
     * @var string $pathPrefix default: ''
     */
    public $pathPrefix = '';

    /**
     * @var string $version default: latest
     */
    public $version = 'latest';

    /**
     * @var string $key
     */
    public $key;

    /**
     * @var string $secret
     */
    public $secret;

    /**
     * @var string $region default: ap-northeast-1
     */
    public $region = 'ap-northeast-1';

    /**
     * @var string $visibility default: Visibility::PRIVATE
     * @see https://github.com/thephpleague/flysystem/blob/3.x/src/Visibility.php
     * @see https://github.com/thephpleague/flysystem-aws-s3-v3/blob/3.x/PortableVisibilityConverter.php
     */
    public $visibility = Visibility::PRIVATE;

    /**
     * create file system
     *
     * @return Filesystem
     */
    protected function create(): Filesystem
    {
        $client = new S3Client([
            'version' => $this->version,
            'region' => $this->region,
            'credentials' => new Credentials($this->key, $this->secret)
        ]);
        return new Filesystem(new AwsS3V3Adapter(
            // S3Client
            $client,
            // Bucket name
            $this->bucketName,
            // Optional path prefix
            $this->pathPrefix,
            // Visibility converter (League\Flysystem\AwsS3V3\VisibilityConverter)
            new PortableVisibilityConverter(
                // Optional default for directories
                $this->visibility
            )
        ));
    }
}