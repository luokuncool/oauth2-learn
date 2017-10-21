<?php
require __DIR__ . '/vendor/autoload.php';

$provider = new \League\OAuth2\Client\Provider\GenericProvider([
    'clientId'                => 'testclient',    // The client ID assigned to you by the provider
    'clientSecret'            => 'testpass',    // The client password assigned to you by the provider
    'redirectUri'             => 'http://localhost:8080/your-redirect-url/',
    'urlAuthorize'            => 'http://localhost:8080/authorize',
    'urlAccessToken'          => 'http://localhost:8080/token.php',
    'urlResourceOwnerDetails' => 'http://localhost:8080/resource'
]);

try {
    // Try to get an access token using the client credentials grant.
    $accessToken = $provider->getAccessToken('client_credentials');
} catch (\League\OAuth2\Client\Provider\Exception\IdentityProviderException $e) {
    // Failed to get the access token
    exit($e->getMessage());
}