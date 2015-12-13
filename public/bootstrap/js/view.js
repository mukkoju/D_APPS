$(document).ready(function(){
  $("#start").on("click", function () {
    FB.login(function (response) {
      if (response.authResponse) {
        FB.api('/me', function (resp) {
            console.log(resp)
            console.log(response)
          var dt = {
            "fnme": resp.first_name,
            "lnme": resp.last_name,
            "eml": resp.email,
            "id": resp.id,
            "actkn": response.authResponse.accessToken
          };
          FB.api('/me/picture', function (res) {
            dt.img = res.data.url;
          });
        });
      } else {
        //console.log('User cancelled login or did not fully authorize.');
      }
    }, {scope: 'public_profile, email'});
  });  
    
    
    
    
});