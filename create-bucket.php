<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;
 
$bucketName = 'YOUR_BUCKET_NAME';
$client = new S3Client([
    'version' => 'latest',
    'region' => 'YOUR_AWS_REGION',
    'credentials' => [
        'key'    => 'ACCESS_KEY_ID',
        'secret' => 'SECRET_ACCESS_KEY'
    ]
]);
try {
    $result = $client->createBucket([
        'Bucket' => $bucketName, // REQUIRED
        'ACL'    => 'public-read',
    ]);
} catch (Aws\S3\Exception\S3Exception $e) {
    // output error message if fails
    echo $e->getMessage();
}