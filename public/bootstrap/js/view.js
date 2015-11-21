$(document).ready(function(){
$('#enbl_sgnup, #enbl_lgn, #frgt_pwd').click(function(e){
  e.preventDefault();
  if(e.target.id == 'enbl_sgnup'){
     $('#login').fadeOut().addClass('hideElement');
     $('#signup').fadeIn().removeClass('hideElement');
  }
  else if(e.target.id == 'enbl_lgn')
  {
    $('#frgt-pwd').fadeOut().addClass('hideElement');
  	$('#signup').fadeOut().addClass('hideElement');
     $('#login').fadeIn().removeClass('hideElement');
  }
  else
  {
    $('#login').fadeOut().addClass('hideElement');
    $('#frgt-pwd').fadeIn().removeClass('hideElement');
  }	
});
$('#login').submit(function(e){
 e.preventDefault();
 var eml = $('#lgn-email').val();
 var pwd = $('#lgn-pwd').val();
 alert("You have successfully logged in Mrs. "+eml+"")
});
$('#signup').submit(function(e){
 e.preventDefault();
 var unme = $('#unme').val();
 var pswrd = $('#pswrd').val();
 var cnfrmpswrd = $('#cnfrm-pswrd').val();
 var eml = $('#sgn-emil').val();
 var nme = $('#fname').val();
 var gndr = $('.login-group-checkbox input[type=radio]:checked').val();
 alert("You have successfully Registerd with us Mrs. "+nme+"")
});

$('#frgt-pwd').submit(function(e){
 e.preventDefault();
 var eml = $('#frgt-emil').val();
 alert("Reset password link emaild to "+eml+"")
});
$('#reg_agree').click(function(){
var $this = $(this);
if($this.is(':checked') == true){
  $('#sgn-btn').removeAttr('disabled');
}else{
  $('#sgn-btn').attr('disabled', 'disabled');
}
});

$('#fb-logn').click(function(e){
  e.preventDefault();
  FB.login(function (response) {
      if (response.authResponse) {
        FB.api('/me', function (resp) {
          console.log(resp);
          
        });
      } else {
        //console.log('User cancelled login or did not fully authorize.');
      }
    }, {scope: 'public_profile, email'});

});
});