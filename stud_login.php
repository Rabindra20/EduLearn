

<?php

include('database_connection.php');
session_start();
$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}

if(isset($_POST["s"]))
{
  $Firstname = trim($_POST["Firstname"]);
  $Lastname = trim($_POST["Lastname"]);
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $Branch = trim($_POST["Branch"]);
   $Contact = trim($_POST["Contact"]);
 $password = trim($_POST["password"]);


 $check_query = "
 SELECT * FROM login 
 WHERE username = :username
 ";
 $statement = $connect->prepare($check_query);
 $check_data = array(
  ':username'  => $username
 );
 if($statement->execute($check_data)) 
 {
  if($statement->rowCount() > 0)
  {
   $message .= '<p><label>Username already taken</label></p>';
  }
  else
  {
    if(empty($Firstname))
   {
    $message .= '<p><label>Firstname is required</label></p>';
   }
    if(empty($Lastname))
   {
    $message .= '<p><label>Lastname is required</label></p>';
   }
    if(empty($username))
   {
    $message .= '<p><label>Username is required</label></p>';
   }
    if(empty($email))
   {
    $message .= '<p><label>Email is required</label></p>';
   }
   if(empty($Branch))
   {
    $message .= '<p><label>Branch is required</label></p>';
   }
   if(empty($Contact))
   {
    $message .= '<p><label>Contact is required</label></p>';
   }
   if(empty($password))
   {
    $message .= '<p><label>Password is required</label></p>';
   }
   else
   {
    if($password != $_POST['password_2'])
    {
     $message .= '<p><label>Password not match</label></p>';
    }
   }
   if($message == '')
   {
    $data = array(
	 ':Firstname' => $Firstname,
	 ':Lastname' => $Lastname,
     ':username'  => $username,
	 ':email' => $email,
	 ':Branch' => $Branch,
	 ':Contact' => $Contact,
     ':password'  => password_hash($password, PASSWORD_DEFAULT)
    );

    $query = "
    INSERT INTO login 
    (Firstname,Lastname,username,email,Branch,Contact, password) 
    VALUES (:Firstname, :Lastname, :username, :email, :Branch, :Contact, :password)
    ";
    $statement = $connect->prepare($query);
    if($statement->execute($data))
    {
     $message = "<label>Registration Completed</label>";
    }
   }
  }
 }
}


if(isset($_SESSION['user_id']))
{
 header('location:stud_index.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM login 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["password"], $row["password"]))
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        header("location:stud_index.php");
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }
}


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>EduLearn</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    
    * {
      box-sizing: border-box;
    }
    
    /* style the container */
    .container1 {
      position: relative;
      border-radius: 5px;
      background-color: #8eccf5;
      padding: 20px 0 30px 0;
    } 
    
    /* style inputs and link buttons */
    input,
    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 4px;
      margin: 5px 0;
      opacity: 0.85;
      display: inline-block;
      font-size: 17px;
      line-height: 20px;
      text-decoration: none; /* remove underline from anchors */
    }
    
    input:hover,
    .btn:hover {
      opacity: 1;
    }
    
    /* add appropriate colors to fb, twitter and google buttons */
    .fb {
      background-color: #3B5998;
      color: white;
    }
    
    .twitter {
      background-color: #55ACEE;
      color: white;
    }
    
    .google {
      background-color: #dd4b39;
      color: white;
    }
    
    /* style the submit button */
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }
    
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    /* Two-column layout */
    .col {
      float: left;
      width: 50%;
      margin: auto;
      padding: 0 50px;
      margin-top: 1px;
    }
    
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    
    /* vertical line */
    .vl {
      position: absolute;
      left: 50%;
      transform: translate(-50%);
      border: 2px solid #ddd;
      height: 175px;
    }
    
    /* text inside the vertical line */
    .vl-innertext {
      position: absolute;
      top: 50%;
      transform: translate(-50%, -50%);
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      border-radius: 50%;
      padding: 8px 10px;
    }
    
    /* hide some text on medium and large screens */
    .hide-md-lg {
      display: none;
    }
    
    /* bottom container */
    .bottom-container {
      text-align: center;
      background-color: #666;
      border-radius: 0px 0px 4px 4px;
    }
    
    /* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 650px) {
      .col {
        width: 100%;
        margin-top: 0px;
      }
      /* hide the vertical line */
      .vl {
        display: none;
      }
      /* show the hidden text on small screens */
      .hide-md-lg {
        display: block;
        text-align: center;
      }
    }
    </style>
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="stud_index.php">
                  <h1><span>Edu</span>Learn</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                 
                 
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <!-- Start Bottom Header -->
  <div class="header-bg page-area">
    <div class="home-overly"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="slider-content text-center">
            <div class="header-bottom">
              <div class="layer2 wow zoomIn" data-wow-duration="1s" data-wow-delay=".4s">
                <h1 class="title2">Welcome to EduLearn </h1>
				 <h2 style="text-align:rfloat"></h2>
  
  <div class="container1">
  <form method="post" action="stud_login.php" name="f1">
  	
      <div class="row">
        <span><h3 style="text-align:left">&nbsp;&nbsp;&nbsp;Login with Social Media or Manually &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register</h2>
        <div class="vl">
          <span class="vl-innertext">or</span>
          
        </div>
  
        <div class="col">
              <input type="text" name="username" placeholder="Username" required>
              <input type="password" name="password" placeholder="Password" required>
              <input type="submit" value="Login" name="login">

              
          <a href="#" class="fb btn">
            <i class="fa fa-facebook fa-fw"></i> Login with Facebook
           </a>
          <a href="#" class="twitter btn">
            <i class="fa fa-twitter fa-fw"></i> Login with Twitter
          </a>
          <a href="#" class="google btn"><i class="fa fa-google fa-fw">
            </i> Login with Google+
          </a>
          <p>
  		Not yet a member? <a href="login.php"></a>
  	</p>
          </form>
        </div>
  
    <form method="POST" action="stud_login.php">
  	
        <div class="col">
          <div class="hide-md-lg">
            <p>Or sign in manually:</p>
          </div>
          
          <label for="Firstname"><b>First Name</b></label>
          <input type="text" placeholder="Enter Your First Name" name="Firstname"   required>

          <label for="lastname"><b>Last Name</b></label>
          <input type="text" placeholder="Enter Your Last Name" name="Lastname"   required>

          <label for="username"><b>User Name</b></label>
          <input type="text" placeholder="Enter User Name" name="username" data-rule="minlen:4" data-msg="Please enter at least 4 chars " required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" data-rule="email" data-msg="Please enter a valid email" required>
          
			 <label for="email"><b>Branch</b></label>
          <input type="text" placeholder="Enter Branch" name="Branch" data-rule="Branch" data-msg="Please enter a valid Branch" required>
		  
		   <label for="email"><b>Contact</b></label>
          <input type="text" placeholder="Enter Contact" name="Contact" data-rule="email" data-msg="Please enter a valid Contact" required>
		  
		  
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
      
          <label for="conf-repeat"><b>Confirm Password</b></label>
          <input type="password" placeholder="Confirm Password" name="password_2" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required><br>
          <input type="submit" value="submit" name="s">
          
          <hr>
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
          <p>
  		Already a member? <a href="login.php"></a>
  	</p>
           
      </div>
        
      </div>
    
  </div>
  
  <div class="bottom-container">
    <div class="row">
      <div class="col">
        <a href="#" style="color:white" class="btn">Sign up</a>
      </div>
      <div class="col">
        <a href="#" style="color:white" class="btn" >Sign in</a>
      </div>
    </div>
  </div>
  </form>
              </div>
              <div class="layer3 wow zoomInUp" data-wow-duration="2s" data-wow-delay="1s">
                <h2 class="title3"></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Header -->
  
 
<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/venobox/venobox.min.js"></script>
<script src="lib/knob/jquery.knob.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/parallax/parallax.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="lib/appear/jquery.appear.js"></script>
<script src="lib/isotope/isotope.pkgd.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<script src="js/main.js"></script>
</body>


</html>
