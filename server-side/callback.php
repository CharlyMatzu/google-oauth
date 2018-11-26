<?php

include_once "config.php";

// https://developers.google.com/identity/protocols/OAuth2WebServer
    // https://oauth2.example.com/auth?error=access_denied
    // https://oauth2.example.com/auth?code=4aP7q7Wa...m6bTrgtp7

// Error Handling
if (!empty($_GET['error'])) {
    // Got an error, probably user denied access
    exit('Got error: ' . htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8'));

}
// Authorization code Handling
else if (empty($_GET['code'])) {

    // If we don't have an authorization code then get one
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;

}
else if (empty($_GET['state']) || ($_GET['state'] !== STATE)) {

    // State is invalid, possible CSRF attack in progress
//    unset($_SESSION['oauth2state']);
    exit('Invalid state');

}

else {

    $code = $_GET['code'];
    // Get cURL resource

    // Get cURL resource
    $curl = curl_init();
// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_URL             => TOKEN_URL,
        CURLOPT_USERAGENT       => 'Test',

        CURLOPT_POST            => 1,
        CURLOPT_POSTFIELDS      => array(
            'code'          => $code,
            'client_id'     => CLIENT_ID,
            'client_secret' => CLIENT_SECRET,
            'redirect_uri'  => REDIRECT_URI,
            'grant_type'    => 'authorization_code',
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    if ( $resp )
        echo $resp;
    else
        echo "FAIL";
    echo "<br>";
    // Close request to clear up some resources
    curl_close($curl);
    exit;

    // Next step: Authorization token
    // 'approval_prompt' => 'force' EN CASO DE requerir otro refresh token

    //Important: Your application should store both tokens in a secure, long-lived location that is accessible between
    // different invocations of your application. The refresh token enables your application to obtain a new access
    // token if the one that you have expires. As such, if your application loses the refresh token, the user will
    // need to repeat the OAuth 2.0 consent flow so that your application can obtain a new refresh token.

}



