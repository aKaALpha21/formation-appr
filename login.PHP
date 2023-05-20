<?php
require 'config.php';
// session_start();
  if(isset($_POST["logsubmit"])){
	$email = $_POST["logemail"];
	$password = $_POST["logpass"];
	//$confirmation = $_POST["confirmation"];
	$result = mysqli_query($conn, "SELECT * FROM apprenants WHERE email_apprenant = '$email'");
	$row = mysqli_fetch_assoc($result);
  
  ///////////////////////condition de confirmation et verifier le mot pass
  
	if(mysqli_num_rows($result) > 0){
	  if($password == $row['mot_de_pass']) {
		$_SESSION["id_apprenant"] = $row["id_apprenant"];
		header("Location: index.php");
        echo "<div class='alert alert-success'>Login successful!</div>";
	  }
	  else{
        echo "<div class='alert alert-danger'> Wrong Password</div>";
	  }
	}
	else{
      echo "<div class='alert alert-danger'>User Not Registered</div>";
    }
	}

?>
<?php

if(!empty($_SESSION["id_apprenant "])){
  header("Location: index.php");
}
/// check email and phone if something wrong ////
if(isset($_POST["sigsubmit"])){
  $firstname = $_POST["logname"];
  $lastname = $_POST["loglastname"];
  $email = $_POST["sigemail"];
  $password = $_POST["sigpass"];
  $confirmation = $_POST["sigconfrimation"];

  
  $duplicate = mysqli_query($conn, "SELECT * FROM `apprenants` WHERE `email_apprenant` = '$email'");
  $row= mysqli_fetch_array($duplicate);


  if($email == $row['email_apprenant`'] OR ($firstname == "") OR ($lastname == "") OR ($password == "")){
    echo "<div class='alert alert-danger'>email already exist OR number,password is empty</div>";
  }
 
  else{
    if($password == $confirmation){
        $query = "INSERT INTO apprenants (nom_apprenant , prenom_apprenant, email_apprenant , mot_de_pass ) VALUES('$firstname','$lastname' ,'$email' , '$password')";
        mysqli_query($conn, $query);
		$_SESSION["nom_apprenant "]=$firstname;
      header("Location: index.php");
	  echo "<div class='alert alert-success'>Registration Successful</div>";
    }
    else{
      echo "<div class='alert alert-danger'>Password Does Not Match</div>";
    }
  }

  }
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="login.css">
    <title>Login Form</title>
</head>

<body>
    <Form action=""method="POST">
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="email" name="logemail" class="form-style"
                                                        placeholder="Your Email" id="logemail" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="logpass" class="form-style"
                                                        placeholder="Your Password" id="logpass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
												<input type="submit" class="btn mt-4" name="logsubmit">
                                                <p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your
                                                        password?</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-back">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Sign Up</h4>
                                                <div class="form-group">
                                                    <input type="text" name="logname" class="form-style"
                                                        placeholder="Your First Name" id="logname" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
												<div class="form-group">
                                                    <input type="text" name="loglastname" class="form-style"
                                                        placeholder="Your Last Name" id="logname" autocomplete="off">
                                                    <i class="input-icon uil uil-user"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="email" name="sigemail" class="form-style"
                                                        placeholder="Your Email" id="logemail" autocomplete="off">
                                                    <i class="input-icon uil uil-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="sigpass" class="form-style"
                                                        placeholder="Your Password" id="logpass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
												<div class="form-group mt-2">
                                                    <input type="password" name="sigconfrimation" class="form-style"
                                                        placeholder="Confirm Your Password" id="logpass" autocomplete="off">
                                                    <i class="input-icon uil uil-lock-alt"></i>
                                                </div>
												<input type="submit" class="btn mt-4" name="sigsubmit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Form>
</body>

</html>