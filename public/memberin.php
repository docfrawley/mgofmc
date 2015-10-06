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
	if (isset($_POST['workhours'])){
		switch ($_POST['workhours']) {
			case 'add':
				$member->add_hrs($_POST);
				break;
			case 'update':
				$member->update_hrs($_POST);
				break;
			default:
				break;
		}
	}
	?>
	<div class="row" style="margin-top: 15px;">
		<div class="small-12 columns">
			<? $member->list_totals() ?>
		</div>
  		<div class="small-12 columns">
			<? $member->add_hours_form(); ?>
		</div>
	</div> 
	<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
  		<div class="small-12 columns">
			<? $member->list_hrs(); ?>
		</div>
	</div>
	<?
} else {
	?>
<div class="row" style="margin-top: 15px;">
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
