<?php 
require_once '../library/config.php';

if(isset($_SESSION['system']['userid'])){
  header("Location: ../../index.php");
  exit;
}

if(isset($_POST['userlogin'])){
  $result = processLogin();
    //unset($_SESSION['system']["attempts"]);
}

?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo SYSTEM_NAME;?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="../../asset/images/btir_logo.ico">

  <link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../asset/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="../../asset/css/bootstrap-reboot.min.css">


  <script type="text/javascript" src="../../asset/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../../asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../asset/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../../asset/js/bootstrap-notify.min.js"></script>

  <style type="text/css">
    body{
      color: #4d545d;
      font-size: 14px;
      overflow-x: hidden;
    }

    .overlay {
        /* bg #36393E */
        background: url(../../asset/images/bg.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
        font-family: 'Roboto', sans-serif;
    }

    .navbar{
      background-color: #24292e !important;
    }

    .tabHeader{
      color: #4d545d !important;
    }

    .tab-content{
      padding: 10px;
    }

    .dropdown-item:active {
        background-color: #24292e !important;
    }

    .dropdown-item:hover {
      color: #fff;
        background-color: #6c757d !important;
    }

    .dropdown-menu{
      margin-right: 0px; 
    }
  </style>
</head>
<body class="overlay">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background: #27292d !important;">
    <a class="navbar-brand" href="#">Bacolod Traffic Incident Report</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form method="post" class="form-inline mb-1">
        <div class="form-group">
          <input type="text" class="form-control form-control-sm" id="userlogin" autofocus name="userlogin" required="true" placeholder="Username">
        </div>
        <div class="form-group mx-sm-3">
          <input type="password" class="form-control form-control-sm" id="userpassword" name="userpassword" required="true" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-secondary btn-sm">Sign in</button>
      </form>
    </div>
  </nav>

  <div class="container-fluid" style="margin-top: 50px;">
   <!--  <div class="row justify-content-center">
      
      <div class="col-sm-8">
        <div class="card" style="border: 0px;background: transparent !important;">
          <div class="card-body" style="padding-bottom: 5px;">
           <img src="../asset/images/prohub.png" style="width: 230px; height: 100px;"> 
           <h1 style="color: white;"></h1>
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
              <form method="post">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="userlogin" name="userlogin" required="true">
                </div>
                <div class="form-group">
                  <label for="pwd">Password</label>
                  <input type="password" class="form-control" id="userpassword" name="userpassword" required="true">
                </div>
                <div class="checkbox">
                  <label>
                    //<?php
                      //if(isset($_SESSION['system']['error'])){
                       // $message = $_SESSION['system']['error'] ;
                       // if(!empty(($message))){
                          //echo '<p class="card-text">Error: <span style="color: red;">'.$message.'</span></p>';
                       // }
                      //}
                    //?>
                  </label>
                </div>
                <button type="submit" class="btn btn-secondary btn-sm btn-block">Sign in</button>
              </form>

            </div>
          </div>
      </div> -->

      <article class="container text-white">
        <div class="row">
          <div class="col-sm-8">
            <div class="login-main" style="padding: 10px; text-align: center;">
              <img src="https://tir.jagwarthegreat.tech/android/mediaFiles/loginLogo/logo.png" style="object-fit: fill; width: 500px;height: 500px;">
              <!-- <h4 style="font-size: 16px;text-align: justify;"><i class="fa fa-dashboard"></i>As we all are well aware that road accidents, injury and death has been very common now-a-days. People not following the road traffic rules and road safety measures are the main cause of such accidents on the roads. We always hear in the news or by our friends about the road accidents because of the wrong side driving, lack of road safety rules, measures, high speed, drunk driving, etc. Government has made variety of road traffic and road safety rules for everyone using road for their safety and reducing the number of daily road accidents. We should follow the all the rules and regulations such as practicing defensive driving, using safety measures, maintaining speed limit, understanding road signs, etc.</h4> -->
            </div>
          </div>

         <div class="col-sm-4">
				<div class="">
				
				<h3><i class="fa fa-shield"></i> Register now</h3>
			  	<hr style="border-top: 1px solid white;">
			  	<form id="reg-form" action="" method="post">
			  	<div class="row">
				  	<div class="form-group col-sm-6">
					  <input type="text" name="fname" class="form-control form-control-sm" placeholder="First Name" required="true">
					</div>
					<div class="form-group col-sm-6">
					  <input type="text" name="lname" class="form-control form-control-sm" placeholder="Last Name" required="true">
					</div>
				</div>
          <div class="form-group">
          <input type="email" name="e_mail" class="form-control form-control-sm" placeholder="e-mail" required="true">
        </div>
				<div class="form-group">
				  <input type="text" name="uname" class="form-control form-control-sm" placeholder="Username" required="true">
				</div>

				<div class="form-group">
				  <input type="password" name="pass" class="form-control form-control-sm" minlength="6" placeholder="Password" required="true">
				</div>

				<div class="form-group">
				  <input type="password" name="pass1" class="form-control form-control-sm" minlength="6" placeholder="Repeat Password" required="true">
				</div>
				<div class="form-group col-sm-12 row">
          <span class="col-sm-8 ml-0">Birthdate</span>
					<input type="date" name="b-date" class="form-control form-control-sm col-sm-8" required="true">
				</div>
              
            <small>
              By clicking Sign Up, you agree to our Terms and Conditions.
            </small> 
            </form>
            <div style="height:10px;"></div>
            <div class="form-group">
              <label class="control-label" for=""></label>
              <button type="button" class="btn btn-secondary btn-sm" onclick="addUser()">Sign up</button>
            </div>   
              </div>
          </div>
          </div>
        </div>
    </article>

    </div>
  </div>
<script>

function printIframe(id){
  var iframe = document.frames ? document.frames[id] : document.getElementById(id);
  var ifWin = iframe.contentWindow || iframe;
  iframe.focus();
  ifWin.printPage();
  return false;
}

//dynamic alert
function alertMe(title, message, type){
  $.notify({
    title: '<strong>'+title+'</strong>',
    message: message
  },
  {
    type: type,
    placement:
     {
      from: "top",
      align: "left"
    },
    timer: 500,
  });
}

function checkNull() {
  if($("input:password[name=pass]").val() == '' || $("input:password[name=lname]").val() == '' || $("input:password[name=e_mail]").val() == '' || $("input:password[name=uname]").val() == '' || $("input:password[name=pass]").val() == '' || $("input:password[name=pass1]").val() == '' || $("input:password[name=b-date]").val() == ''){
    $chck = false;
  }else{
    $chck = true;
  }

  return $chck;
}

function addUser(){
  //add user
  if($("input:password[name=pass]").val() != $("input:password[name=pass1]").val()){
    alertMe('Aw snap!','Password does not match.','warning');
  }else{
    var checker = checkNull();
    if(checker == true){
        var data = $("#reg-form").serialize();
        var url = "../library/ajax/add_user.php";

       $.ajax({
        type: "POST",
        data: data,
        url: url,
        success: function(data){
          if(data == 1){
            alertMe('Success!','You can now login.','success');
            $("input").val("");
    	    }else if(data == 2){
    	    	alertMe('Sorry!','Account is already created.','warning');
    	    }else{
    	       alertMe('Error!','Something was wrong.('+data+')','danger');
    	    }
        }
       });
     }else{
        alertMe('Aw snap!','Please check all fields.','warning');
     }
  //end
  }
}

$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});

</script>

<?php

if(isset($_SESSION['system']['error'])){
   $message = $_SESSION['system']['error'] ;
   $title = $_SESSION['system']['title'] ;
   $type = $_SESSION['system']['type'] ;
   if(!empty(($message))){
      echo '<script> alertMe("'.$title.'","'.$message.'","'.$type.'"); </script>';
  }
}
?>

</body>
</html>