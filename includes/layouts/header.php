<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Master Gardeners of Mercer County</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link href="css/ion.calendar.css" rel="stylesheet" type="text/css">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/vendor/modernizr.js"></script>
    
</head>


<body onload="load()">
  <? session_start(); ?>
  
    <div class="off-canvas-wrap" data-offcanvas>
      <div class="inner-wrap">
        <nav class="tab-bar hide-for-large-up">
            <section class="left-small">
              <a class="left-off-canvas-toggle menu-icon"><span>MGofMC</span></a>
            </section>
        </nav>
            <aside class="left-off-canvas-menu">
              <ul class="off-canvas-list">
                <li><a href="index.php">Home</a></li>
                
                <li><a href="#">Membership</a> 
                <li class="has-dropdown"><a href="#">About</a>
                  <ul class="dropdown">
                   <li><a href="#">ONE</a></li>
                   <li><a href="#">TWO</a></li>
                   <li><a href="#">THREE</a></li>
                   <li><a href="#">FOUR</a></li>
                  </ul>
                </li>           
                <li><a href="#">Educational Gardens</a>
                <li><a href="monthlytips.php">Monthly Tips</a></li>
                <li><a href="#">What's New</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Links</a></li>
                <? 
                if ($_SESSION['member']=='member') {
                  ?><li><a href="memberin.php">Member Page</a></li>
                  <li><a href="logout.php">Logout</a></li> <?
                } elseif ($_SESSION['member']=='admin') {
                  ?><li><a href="adminpage.php">Admin Page</a></li>
                  <li><a href="logout.php">Logout</a></li> <?
                } else {
                  ?> <li><a href="login.php">Member Login</a></li> <?
                }
                ?>
              </ul>
            </aside>
            <a class="exit-off-canvas"></a>

    <!-- top bar code -->
    <div class="sticky">
    <nav class="top-bar show-for-large-up" data-topbar role="navigation" data-options="sticky_on: large">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Master Gardeners of Mercer County</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
	        <li><a href="#">Membership</a> 
                <li class="has-dropdown"><a href="#">About</a>
                  <ul class="dropdown">
                   <li><a href="#">ONE</a></li>
                   <li><a href="#">TWO</a></li>
                   <li><a href="#">THREE</a></li>
                   <li><a href="#">FOUR</a></li>
                  </ul>
                </li>           
                <li><a href="#">Educational Gardens</a>
                <li><a href="monthlytips.php">Monthly Tips</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Links</a></li>
                <? 
                if ($_SESSION['member']=='member') {
                  ?><li><a href="memberin.php">Member Page</a></li>
                  <li><a href="logout.php">Logout</a></li> <?
                } elseif ($_SESSION['member']=='admin') {
                  ?><li><a href="adminpage.php">Admin Page</a></li>
                  <li><a href="logout.php">Logout</a></li> <?
                } else {
                  ?> <li><a href="login.php">Member Login</a></li> <?
                }
                ?>
                
        </ul>
      </section>
    </nav>	
    </div>
