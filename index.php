<?php
include 'app/library/config.php';

checkLoginStatus();

define("USER_ID", $_SESSION['system']['userid']);
$LevelChecker = getAccessLevel(USER_ID);
$getAccess = getAccess(USER_ID);

if(MAINTENANCE == 'TRUE'){
  echo "<script>window.location = 'app/system/maintenance/'; </script>";  
}

if(ENVIRONMENT == 'development'){
  error_reporting(-1);
  ini_set('display_errors', 1);
}else{
  ini_set('display_errors', 0);
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
  //error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
}

$page = (isset($_GET['page']) && $_GET['page'] !='') ? $_GET['page'] : '';
$view = (isset($_GET['view']) && $_GET['view'] !='') ? $_GET['view'] : '';
$sub = (isset($_GET['sub']) && $_GET['sub'] !='') ? $_GET['sub'] : '';


$backColor = "#283d70;";
$skin = 'skin-purple-light';
$footer = "<strong>Copyright &copy; ".date('Y')."</strong> ".SYSTEM_NAME;


//checkRolePermision
$Uid = $_SESSION['system']['userid'];
$getuserRole = mysql_fetch_array(mysql_query("SELECT role FROM user WHERE user_id = '$Uid'"));
$roleList = mysql_fetch_array(mysql_query("SELECT * FROM roles WHERE role_id = '$getuserRole[0]'"));

if($roleList[show_master_data] != 1){ $show_master_data = "display: none;";}
if($roleList[show_dashboard] != 1){ $show_dashboard = "display: none;";}
if($roleList[can_approve_post] != 1){ $can_approve_post = "display: none;";}
if($roleList[can_add_role] != 1){ $can_add_role = "display: none;";}
if($roleList[can_view_users] != 1){ $can_view_users = "display: none;";}
if($roleList[can_add_category] != 1){ $can_add_category = "display: none;";}
if($roleList[can_view_map] != 1){ $can_view_map = "display: none;";}
if($roleList[can_post_direct] != 1){ $can_post_direct = "display: none;";}


?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo SYSTEM_NAME;?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="../asset/images/btir_logo.ico">
    
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/animate.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
">

  <script type="text/javascript" src="asset/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap-notify.min.js"></script>

  <style type="text/css">
    @media (min-width: 992px){
      .dropdown-menu {
        position: absolute;
        left: -84px;
        top: 27px;
      }
    }
    body{
      background: #fafafa;
      color: #4d545d;
      font-size: 13px;
      overflow-x: hidden;
    }
    .navbar{
      background-color: ##24292e !important;
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

    .bg-dark {
        background-color: #2E3136 !important;
    }

    .share{
      border: 1px solid #ccc;
    }

.message-item {
  margin-bottom: 25px;
  margin-left: 40px;
  position: relative;
}
.message-item .message-inner {
background: #fff;
border: 1px solid #ddd;
border-radius: 3px;
padding: 10px;
position: relative;
}
.message-item .message-inner:before {
border-right: 10px solid #ddd;
border-style: solid;
border-width: 10px;
color: rgba(0,0,0,0);
content: "";
display: inline-block;
height: 0;
position: absolute;
left: -20px;
top: 6px;
width: 0;
}
.message-item .message-inner:after {
border-right: 10px solid #fff;
border-style: solid;
border-width: 10px;
color: rgba(0,0,0,0);
content: "";
display: inline-block;
height: 0;
position: absolute;
left: -18px;
top: 6px;
width: 0;
}
.message-item:before {
background: #fff;
border-radius: 2px;
bottom: -30px;
box-shadow: 0 0 3px rgba(0,0,0,0.2);
content: "";
height: 100%;
left: -30px;
position: absolute;
width: 3px;
}
.message-item:after {
background: #fff;
border: 2px solid #ccc;
border-radius: 50%;
box-shadow: 0 0 5px rgba(0,0,0,0.1);
content: "";
height: 15px;
left: -36px;
position: absolute;
top: 10px;
width: 15px;
}
.clearfix:before, .clearfix:after {
content: " ";
/*display: table;*/
}
.message-item .message-head {
border-bottom: 1px solid #eee;
margin-bottom: 8px;
padding-bottom: 8px;
}
.avatar{
  float: left;
}
.message-item .message-head .avatar {
margin-right: 20px;
}
.message-item .message-head .user-detail {
overflow: hidden;
}
.message-item .message-head .user-detail h5 {
font-size: 16px;
font-weight: bold;
margin: 0;
}
.message-item .message-head .post-meta {
float: left;
padding: 0 15px 0 0;
}
.message-item .message-head .post-meta >div {
color: #333;
font-weight: bold;
text-align: right;
}
.post-meta > div {
color: #777;
font-size: 12px;
line-height: 22px;
}
.message-item .message-head .post-meta >div {
color: #333;
font-weight: bold;
text-align: right;
}
.post-meta > div {
color: #777;
font-size: 12px;
line-height: 22px;
}
.postimg {
 min-height: 40px;
 max-height: 40px;
}

.navbar-fixed-top {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    z-index: 1030;
    margin-top: 0px;
}

.navbar{
  display: flex;
}
</style>

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
    type: type
  });
}

$(document).ready(function() {
    $(".dropdown-toggle").dropdown();
});

</script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top" style="/*box-shadow: 0px 4px 5px grey;*/">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        BTIR
        <!-- <img src="../asset/images/prohub.png" style="width: 100px; height: 40px;"> -->
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
          <li class="nav-item" style="<?=$show_dashboard?>">
            <a class="nav-link" href="index.php?view=dashboard">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view=feed">News Feed</a>
          </li>
          <li class="nav-item" style="<?=$can_view_map?>">
            <a class="nav-link" href="index.php?view=map">Map</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?view=info-tips">Tips</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Settings
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?view=profile">Your profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" style="<?=$show_master_data?>" href="index.php?view=master-data">Master Data</a>
                <a class="dropdown-item" href="index.php?view=about">About</a>
                <a class="dropdown-item" href="app/system/logout.php">Sign out</a>
                </div>
              </li>
          </ul>
          </form>
        </div>
    </div>
  </nav>

  <div class="container" style="padding: 0px;margin-top: 60px;">

<!----------------------------------------    CONTENT   ------------------------------------------- -->


        <?php
            pages($view);
        ?>


<!----------------------------------------    CONTENT   ------------------------------------------- -->

  </div>
        
               
  <!-- /.content-wrapper -->
  <footer class="main-footer" style="position: fixed; bottom: 20px; right: 30px;">
    <div align="center">
      <?=$footer?>
    </div>
  </footer>
  
</div>
<!-- ./wrapper -->
<script type="text/javascript">
  //$('.select2').select2();
</script>
</body>
</html>
