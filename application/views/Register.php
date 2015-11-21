<!DOCTYPE html>
<html lang="en">
<head>
<title>Login/Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap/css/view.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<script src="./bootstrap/js/jquery.min.js"></script>
<script src="./bootstrap/js/bootstrap.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script src="./bootstrap/js/view.js"></script>
</head>
<body>
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-6" id="sign">
  	<div class="col-xs-8 _box">
  <form id="login" class="hideElement">
  <div class="form-group">
    <input type="email" class="form-control" id="lgn-email" placeholder="Username" required>
  </div>
  <div class="form-group">
    <!-- <label for="exampleInputPassword1">Password</label> -->
    <input type="password" class="form-control" id="lgn-pwd" placeholder="Password" required>
    <a href="#" id="frgt_pwd">Forgot password?</a>
  </div>
  <button type="submit" class="btn btn-default blue-btn butn">Login</button>
  <p class="_addPdng _cntr">Don't have an account? <a href="#" id="enbl_sgnup">Sign up</a></p>
  <!-- <p class="_cntr">or login using</p>
  <div class="btn-grp">
  <a href="#" class="btn btn-default fb">Facebook</a>
  <a href="#" class="btn btn-default gpls">Google+</a>
  </div> -->
</form>


<form id="signup">
  <div class="form-group">
    <label for="">Choose your username</label>
    <input type="text" class="form-control" id="unme" placeholder="User Name" required>
  </div>
  <div class="form-group">
    <label for="">Create a password</label>
    <input type="password" class="form-control" id="pswrd" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="">Confirm your password</label>
    <input type="password" class="form-control" id="cnfrm-pswrd" placeholder="Confirm password" required>
  </div>
  <div class="form-group">
    <label for="">Your current email address</label>
    <input type="email" class="form-control" id="sgn-emil" placeholder="Eamil" required>
  </div>
  <button type="submit" class="btn btn-default blue-btn butn" id="sgn-btn">Sign up</button><br/>
  <!-- <p class="_cntr">or Signup using</p>
  <div class="btn-grp">
  <a href="#" class="btn btn-default fb">Facebook</a>
  <a href="#" class="btn btn-default gpls">Google+</a>
  </div> -->
  <p class="_addPdng _cntr"><a href="#" id="enbl_lgn">< Back to Login</a></p>
</form>


<form id="frgt-pwd" class="hideElement">
  <div class="form-group">
    <label for="">Email for reset password</label>
    <input type="email" class="form-control" id="frgt-emil" placeholder="Email for reset password" required>
  </div>
  <button type="submit" class="btn btn-default butn blue-btn">Submit</button>
  <p class="_addPdng _cntr"><a href="#" id="enbl_lgn">< Back to Login</a></p>
</form>
  	</div>
  </div>
  </div>
</div>	
</body>
</html>