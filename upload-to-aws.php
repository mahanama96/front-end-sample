<?php
require 'vendor/autoload.php';
 
use Aws\S3\S3Client;
 
// Instantiate an Amazon S3 client.
$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'YOUR_AWS_REGION',
    'credentials' => [
        'key'    => 'ACCESS_KEY_ID',
        'secret' => 'SECRET_ACCESS_KEY'
    ]
]);
 
 
$bucketName = 'YOUR_BUCKET_NAME';
$file_Path = '__DIR__ . '/my-image.png'';
$key = basename($file_Path);
 
// Upload a publicly accessible file. The file size and type are determined by the SDK.
try {
    $result = $s3->putObject([
        'Bucket' => $bucketName,
        'Key'    => $key,
        'Body'   => fopen($file_Path, 'r'),
        'ACL'    => 'public-read',
    ]);
    echo $result->get('ObjectURL');
} catch (Aws\S3\Exception\S3Exception $e) {
    echo "There was an error uploading the file.\n";
    echo $e->getMessage();
}