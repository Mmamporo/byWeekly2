<?php
	require "user.class.php";
	if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password1'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($password1)){
			$error = "";
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br/>";
			}
			if(!$var3 = preg_match("%^[a-z0-9A-Z_\.-]+@[a-z0-9A-Z_-]+\.[a-z0-9A-Z_\.-]%", $email)){
					$error .= "* Invalid email<br/>";
			}
			if(!$var4 = preg_match("%[a-zA-Z0-9\W]{8,}%", $password)){
					$error .= "* Password must be 8 charecters or more<br/>";
					
			}else{
				if($password != $password1){
					$error .= "* Password must match<br/>";
				}
			}
			if($var2&&$var3&&$var4&&$password == $password1){
				//registration goes here if all validations pass
			$user = new User($username,$email);
			#$user->set_password($password);
					
			}
		}else{
			$error = "* Enter all fields";
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Florence</title>
<style type="text/css">
.RegistrationForm {
	text-align: center;
	font-style: italic;
	font-weight: bold;
	font-size: 24px;
}
body,td,th {
	color: #0FF;
}
body {
	background-color: #000;
	background-image: url(background.png);
}
</style>
</head>

<body>
<div align="center">
  <p class="RegistrationForm">Registration Form</p>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    
		<!--end of header-->
			<div class="container" >
		<div class="row" >
		  <div class="col-lg-4"></div>
		  <div class="col-lg-4" id="orange">
		  
		  
			<form action="register.php" method="post">
			  <fieldset>
				<legend>Registration form</legend>
				<p id="error"><b><?php if(isset($error)){
							echo $error;	
							}
							?></b></p>
				<p id="success"><b><?php
					$user = new User($username,$email);
						if(isset($user)){
							$save = $user->save($user->username,$user->email,$user->password);
							$user->dispalayUserInfo();
							}
				?></b></p>
				<div class="form-group">
				  <label >Username</label>
				  <input type="text" class="form-control" value="<?php if(isset($username)){echo $username;}?>" name="username" placeholder="Mmamporo">
				</div>
				<div class="form-group">
				  <label >Email address</label>
				  <input type="email" class="form-control" value="<?php if(isset($email)){echo $email;}?>" name="email" placeholder="mphela.florence@gmail.com">
				</div>
				<div class="form-group">
				  <label >Password</label>
				  <input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<div class="form-group">
				  <label >Re-Type Password</label>
				  <input type="password" class="form-control" name="password1" placeholder="Re-Enter Password">
				</div>
				<button type="submit"  class="btn btn-default">Submit</button><br/><br/>
			  </fieldset>
			  
			</form>

		  
		  
		  </div>
		  <div class="col-lg-4"></div>
		</div>
	</div>
	<!--end of form-->
    <?php include 'footer.php'; ?>
</body>
</html>