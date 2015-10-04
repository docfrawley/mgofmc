<?php require_once("../includes/initialize.php"); ?>
<? include("../includes/layouts/header.php"); ?>


<?

$dohours=isset($_GET['dohours']) ? $_GET['dohours'] : ""; 
	if (!$dohours) $dohours=isset($_POST['dohours']) ? $_POST['dohours'] : "" ;

if (isset($_POST['fname'])){
	$member = new memberobject();
	$member->login_check($_POST);
	$dohours = 'yes';
}	

if (isset($_SESSION['whatmember']) && ($dohours)) {
	$member = new memberobject($_SESSION['whatmember']) ;
	?>
	<div class="row">
  		<div class="small-12 columns">
			<? $member->add_hours(); ?>
		</div>
		</div> <?
} else {
	?>
<div class="row">
  <div class="medium-8 columns panel">
  	<? if (isset($_SESSION['tryagain'])) {
  		echo $_SESSION['tryagain'];
  	}
  	?>
    Hello There Member
  </div>
  <? 
	if (isset($_SESSION['whatmember'])){
		?> <div class="medium-4 columns"> <?
		echo '<a href="?dohours=yes" class="button">CHECK/ADD HOURS</a>'; 
		?> </div> <?
	} else {
		?>
		<div class="medium-4 columns panel">
			<strong> Add/Check Hours</strong><br/>
			 <form action="memberin.php" method="POST">
			 	<div class="row">
			 		<div class="small-12 columns">
			 			<label>First Name:</label>
			 			<input type="text" name="fname"/>
			 		</div>
			 	</div>
			 	<div class="row">
			 		<div class="small-12 columns">
			 			<label>Last Name:</label>
			 			<input type="text" name="lname"/>
			 		</div>
			 	</div>
			 	<div class="row">
			 		<div class="small-12 columns">
			 			<label>Class Year:</label>
			 			<input type="text" name="class"/>
			 		</div>
			 	</div>
				<div class="row">
			 		<div class="small-12 columns">
	        			<input type="submit" value="submit" class="button tiny radius"/>
	        		</div>
	        	</div>
	        </form>
	  	</div>
		<?
	}
}
	?>
  
</div>



<? include("../includes/layouts/footer.php"); ?>
