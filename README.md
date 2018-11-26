# Google OAuth2 Test
In this project I'm using oauth google authentication from server and client side with different grant flows

See standard guide: https://tools.ietf.org/html/rfc6749

* **Server Side**: Authorization Code Grant Flow: https://developers.google.com/identity/protocols/OAuth2WebServer
* **Client Side**: Implicit Grant Flow: https://developers.google.com/identity/protocols/OAuth2UserAgent

### Google APIs usage

1. Create OAuth Application in google console: https://console.developers.google.com/apis/credentials/consent
2. Add Libraries for API access permission:  https://console.developers.google.com/apis/library
3. Add a valid domain: https://console.developers.google.com/apis/credentials/consent
4. Add a valid redirection in oauth application
5. See scopes for oauth request: https://developers.google.com/identity/protocols/googlescopes