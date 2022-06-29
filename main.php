<?php
// include your composer dependencies
require_once 'vendor/autoload.php';

$client = new Google\Client();
$client->setApplicationName("deca");
$client->setAuthConfig(__DIR__.'/credentials.json');
$client->addScope(Google\Service\Drive::DRIVE);
$service = new Google\Service\Drive($client);
$optParams = array(
    'pageSize' => 10,
    'fields' => 'nextPageToken, files(id, name)'
);
$results = $service->files->listFiles($optParams);

if (count($results->getFiles()) == 0) {
    print "No files found.\n";
} else {
    print "Files:\n";
    foreach ($results->getFiles() as $file) {
        printf("%s (%s)\n", $file->getName(), $file->getId());
    }
}
// //basic Example
// // include your composer dependencies
// require_once 'vendor/autoload.php';

// $client = new Google\Client();
// $client->setApplicationName("Client_Library_Examples");
// // $client->addScope(Google\Service\Drive::DRIVE);
// $client->setDeveloperKey("");

// $service = new Google\Service\Drive($client);

// // Print the names and IDs for up to 10 files.
// $optParams = array(
//     'pageSize' => 10,
//     'fields' => 'nextPageToken, files(id, name)'
// );
// $results = $service->files->listFiles($optParams);

// if (count($results->getFiles()) == 0) {
//     print "No files found.\n";
// } else {
//     print "Files:\n";
//     foreach ($results->getFiles() as $file) {
//         printf("%s (%s)\n", $file->getName(), $file->getId());
//     }
// }