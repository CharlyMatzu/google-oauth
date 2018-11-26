checkAuthParams();



let authParams = {
    scope:                  "https://www.googleapis.com/auth/cloudprint",
    include_granted_scopes: "true",
    state:                  "state_parameter_passthrough_value",
    redirect_uri:           "http://11c92f3f.ngrok.io/example-js", // authorized redirect url in Google console
    response_type:          "token",
    client_id:              "588989867940-aqukg3gs6r8nft9etqc857e5jpad91ao.apps.googleusercontent.com"
};

// https://developers.google.com/identity/protocols/googlescopes
let url = 'https://accounts.google.com/o/oauth2/v2/auth?';
let params = 'scope='+authParams.scope+'&include_granted_scopes=true&state=state_parameter_passthrough_value&redirect_uri='+authParams.redirect_uri+'&response_type=token&client_id='+authParams.client_id;
let auth_url = url + params;


function signin(){
    
    
}


/**
 * Make XMLHttpRequest using native method for CORS Policy
 * @param endpoint GCP endpoint
 * @param method POST, GET...
 * @param data data to be send
  */
function makeRequest(endpoint, method, data, callback){
    let token = getTokenAuth();

    // endpoint = END_SEARCH;
    // $.ajax({
    //     url:        "https://www.google.com/cloudprint"+endpoint,
    //     method:     method,
    //     data:       JSON.stringify(data),
    //     headers:    {
    //         'Authorization': 'Bearer ' + getTokenAuth(),
    //         'X-Content-Type-Options': 'nosniff'
    //     },
    //     // crossDomain: true,
    //     // Response event
    //     success: function(response){
    //         console.log("success")
    //     },
    //     error: function(response){
    //         console.log("error")
    //     },
    //     complete: function(response){
    //         console.log(response);
    //     }
    // });
}


//----------------------
// GOOGLE AUTH
//----------------------
// Parse query string to see if page request is coming from OAuth 2.0 server.
function checkAuthParams(){
    // get first hash
    let fragmentString = location.hash.substring(1);
    let params = {};
    // Regular expression
    let regex = /([^&=]+)=([^&]*)/g, m;
    // get url params
    while (m = regex.exec(fragmentString)){
        params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }

    //Get params keys
    let keys = Object.keys(params);

    //----- check params array
    if ( keys.length > 0 ){
        // Error response
        if ( keys[0] === 'error' ){
            console.log("Error");
        }
        // Success response (Token)
        else{
            console.log("Autenticado con éxito");
            // save token
            localStorage.setItem('google-oauth', JSON.stringify(params) );
            // check
            checkAuthenticated();
            // TODO: redirect for remove url auth params
            // window.location.url = 'https://44012433.ngrok.io/project/';
        }
    }
    else{
        console.log("No params");
        checkAuthenticated();
    }
    

}

function checkAuthenticated(){
    // Checking storaged token
    if( localStorage.getItem('google-oauth') ){
        $('#status').text('Autenticado');
        $('#print-section').toggle();
    }
    else{
        $('#status').text('No ha iniciado sesion en Google');
        $('#auth-section').toggle();
    }
}







function requestToken(){
    location.href = auth_url;
    
    // newwindow = window.open(auth_url,'Google Auth','height=600,width=659');
    // if (window.focus) {newwindow.focus()}
    //     return false;
}

function signin(){
    location.href = 'https://www.google.com/accounts/Logout?continue=' + authParams.redirect_uri;
}

function checkRedirectAuth(){
    // verificar datos de URL para el caso de redirección
}



