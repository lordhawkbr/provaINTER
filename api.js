fetch("https://interconstrutora136393.fluig.cloudtotvs.com.br/process-management/api/v2/tasks", {
  "method": "GET",
  "headers": {
    "Authorization": "OAuth oauth_consumer_key=\"teste\", oauth_nonce=\"4EQd1ZlTcaPmSTeFhMn6MM0S1adsEGJe\", oauth_signature=\"0MMYdgPTNGDHGd4GbxzmvobCsNA%3D\", oauth_signature_method=\"HMAC-SHA1\", oauth_timestamp=\"1656633665\", oauth_token=\"5eb19570-49fc-4cdc-a9e8-61d1b4d45e7c\", oauth_version=\"1.0\""
  }
})
.then(response => {
  console.log(response);
})
.catch(err => {
  console.error(err);
});
