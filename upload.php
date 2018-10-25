<?php

// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// Set Amazon s3 credentials
$client = S3Client::factory(
  array(
    'credentials' => array(
        'key'      => 'AKIAIVRHFVH7TVMR33GQ',
        'secret'   => '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'
    ),
     'version' => 'latest',
    'region'  => 'us-east-1'
  )
);

try {
   // $client->putObjectFile(__DIR__."/img/case-processor.png", "sunilwebapp.tk" , "RAW/test.png", 'REDUCED_REDUNDANCY');
  $client->putObject(array(
    'Bucket'=>'sunilwebapp.tk',
    'Key' =>  'RAW/abc.png',
    'SourceFile' => __DIR__."/img/case-processor.png",
    'StorageClass' => 'REDUCED_REDUNDANCY'
  ));
  ////echo "<pre>";
  //print_r($client); die;

} catch (S3Exception $e) {
  // Catch an S3 specific exception.
  echo $e->getMessage();
}
    