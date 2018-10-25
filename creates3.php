<?php
    //Code is provided by AWS and available here; http://docs.aws.amazon.com/amazondynamodb/latest/developerguide/AppendixSampleDataCodePHP.html
    
    // Date now needs to be set, which I guess is a good thing!
    date_default_timezone_set('Europe/London');
    
    // Find out what the issues are:
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(-1);
    
    require 'vendor/autoload.php';
    use Aws\S3\S3Client; 
    use Aws\Route53\Route53Client;
    
    // Use the us-east-2 region and latest version of each client.
    $sharedConfig = [
        'profile' => 'default',
        'region' => 'us-east-1c',
        'version' => 'latest'
    ];

    // Create an SDK class used to share configuration across clients.
    $sdk = new Aws\Sdk($sharedConfig);

    // Use an Aws\Sdk class to create the S3Client object.
    //$s3Client = $sdk->createS3();
    
    $s3Client = Route53Client::factory(array(
        'profile' => 'default',
        'region' => 'us-east-1',
        'version' => '2013-04-01',
        'credentials' => [
                'key' => "AKIAIVRHFVH7TVMR33GQ",
                'secret' => "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",
        ]
    ));
    
    // Send a PutObject request and get the result object.
    $result = $s3Client->putObject([
        'Bucket' => 'sunilwebapp.tk',
        'Key' => 'my-key',
        'Body' => 'this is the body!'
    ]);
    