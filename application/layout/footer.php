<script type="text/javascript" src="/public/bootstrap/js/view.js"></script>
<script type="text/javascript">
    //async init once loading is done
  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
      return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  window.fbAsyncInit = function () {
    FB.init({
      appId: '1101936196486361',
      xfbml: true,
      cookie: true,
      version: 'v2.5'
    });

    FB.getLoginStatus(function (response) {
      if (response.status === 'connected' || response.status === 'not_authorized') {
        $('#fb-lk-wrp').removeClass('hideElement');
      } else {
        $('#fb-lk-wrp').addClass('hideElement');
      }
    });
  };
</script>