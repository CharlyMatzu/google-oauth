<?php

include_once "vendor/autoload.php";

// https://github.com/thephpleague/oauth2-google
// https://developers.google.com/identity/protocols/OAuth2ServiceAccount

// Se debe crear una aplicación oauth2 en https://console.developers.google.com
// Debe agregarse un dominion permitido a la pantalla de consentimiento https://console.developers.google.com/apis/credentials/consent
// y posteriormente a la aplicación la redireccion valido.

define('CLIENT_ID',     'client_id');
define('CLIENT_SECRET', 'client_secret');
define('REDIRECT_URI',  'https://www.mydomain.com/callback');
define('STATE',         'TEST');

define('AUTH_URL',  'https://accounts.google.com/o/oauth2/v2/auth');
define('TOKEN_URL', 'https://www.googleapis.com/oauth2/v4/token');

// https://developers.google.com/identity/protocols/googlescopes
$scopes = [
    'https://www.googleapis.com/auth/cloudprint',
];

$provider = new League\OAuth2\Client\Provider\Google([
    'clientId'      => CLIENT_ID,
    'clientSecret'  => CLIENT_SECRET,
    'redirectUri'   => REDIRECT_URI
]);


$authURL =  $provider->getAuthorizationUrl([
//    'accessType' => 'offline',  // need it to refresh token
    'state' => STATE, // Random state is generated when missing option
    'scope' => $scopes
]);