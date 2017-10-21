<?php
require __DIR__ . '/bootstrap.php';
$server->handleTokenRequest(OAuth2\Request::createFromGlobals())->send('json');