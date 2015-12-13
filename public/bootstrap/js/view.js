$(document).ready(function(){
    var auth = $('body').data('auth');
  $("#start").on("click", function () {
    FB.login(function (response) {
        //{fields: "id,about,age_range,picture,bio,birthday,context,email,first_name,gender,hometown,link,location,middle_name,name,timezone,website,work"}
      if (response.authResponse) {
        FB.api('/me',{fields: "id,about,picture,age_range,bio,email,gender,link,name"}, function (resp) {
          var dt = {
            "name": resp.name,
            "eml": resp.email,
            "id": resp.id,
            "sex": resp.gender,
            "age":resp.age_range.min,
            "actkn": response.authResponse.accessToken,
            "prfimg":resp.picture.data.url
          };
          if(resp.email)
            processDt(dt)
          else
           console.log('Invalid email recevied');   
        });
      } else {
        //console.log('User cancelled login or did not fully authorize.');
      }
    }, {scope: 'public_profile, email'});
  });  
    
  function processDt(dt){
     $.ajax({
          url: auth+'/prcs',
          type: 'post',
          data: dt,
          success: function (d) {
            d = JSON.parse(d);
            if (d.success)
            {
              window.location = auth + '/ssst/' + d.msg + '?return=' + urlencode(document.URL);
            }
            else
            {
              $('#sts-msg').showStatus(d['msg'], 'err');
              return false;
            }

          }
        }); 
  }
});