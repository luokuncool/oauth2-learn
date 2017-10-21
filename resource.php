<?php
/** @var \OAuth2\Server $server */
$server = require __DIR__ . '/bootstrap.php';
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}
/** @var \OAuth2\Storage\Pdo $pdo */
$pdo    = $server->getStorage('client_credentials');
$token  = $pdo->getAccessToken($_GET['access_token']);
$client = $pdo->getClientDetails($token['client_id']);
echo json_encode(array('success' => true, 'message' => 'You accessed my APIs!'));