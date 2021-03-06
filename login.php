<?php
	include_once 'PHP_Include_Scripts/connect.php';
	include_once 'PHP_Include_Scripts/functions.php';
	if(isset($_POST["submit"])){
		$email_id=$_POST["email_id"];
		$passwordhash=$_POST["passwordhash"];
		if(login($conn,$email_id,$passwordhash)){
			header("Location: index.php");
		}else{
			header("Location: login.php?error=invalidCredentials");
		}
	}else{
		if(isset($_GET["error"])){
			echo '<script type="text/javascript">window.onload=function(){alert("Invalid Credentials");}</script>';
		}
		if(isset($_GET["success"])){
			if($_GET["success"]=="logout"){
				echo '<script type="text/javascript">window.onload=function(){alert("Logged out successfully!");}</script>';
			}else{
				echo '<script type="text/javascript">window.onload=function(){alert("Account created successfully, now login.");}</script>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=0.8" />
    <meta charset="utf-8" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <link rel="icon" type="icon/png" href="Icons/ico.png"/>
    <!--Fontawesome CDN-->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/login.css" />
  </head>

  <body>
    <div class="container">
      <div class="d-flex justify-content-center h-100">
        <div class="card">
          <div class="card-header">
            <h3>Sign In</h3>
          </div>
          <div class="card-body">
            <br />
            <form action="login.php" method="post">
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"
                    ><i class="fas fa-user"></i
                  ></span>
                </div>
                <input
                  name="email_id"
                  type="text"
                  class="form-control"
                  placeholder="email id"
                  required
                />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">This field is required.</div>
              </div>
              <div class="input-group form-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"
                    ><i class="fas fa-key"></i
                  ></span>
                </div>
                <input
                  id="password"
                  type="password"
                  class="form-control"
                  placeholder="password"
                  required
                />
                <input 
                  id="passwordhash"
                  type="hidden"
                  name="passwordhash"
                  value="none"
                />
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Password is required.</div>
              </div>
              <div class="form-group">
                <input
                  name="submit"
                  type="submit"
                  value="Login"
                  class="btn float-right login_btn"
                />
              </div>
            </form>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-center links">
              Don't have an account?<a href="signup.php">Sign Up</a>
            </div>
            <div class="d-flex justify-content-center">
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="JS/sha256.min.js"></script>
    <script>
			const password=document.getElementById("password");
			const passwordhash=document.getElementById("passwordhash");
			password.onchange=function(){
				passwordhash.value=sha256(password.value);
			};
    </script>
  </body>
</html>
