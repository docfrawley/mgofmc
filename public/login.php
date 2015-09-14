<?php require_once("../includes/initialize.php"); ?>
<? include("../includes/layouts/header.php"); 

session_start();

if (!isset($_SESSION["tryagain"])) {$_SESSION['tryagain'] = ""; } ?>
    <div class="row">
        <div class="small-12 columns center"><br/>
            <? echo $_SESSION['tryagain']; ?><br/><br/>
        </div>
    </div>

    <div class="row">
        <div class="medium-6 columns medium-centered">
            <div class="row">
                <div class="small-12 columns">
                    <p>Please sign in to enter the members only section of this site.</p>
                </div>
                <form  action="logincheck.php" method="POST">
                <div class="small-12 columns">
                    <label>USERNAME</label>
                    <input type="text" name="username" placeholder="Username"/>
                </div>
                <div class="small-12 columns">
                    <label>PASSWORD</label>
                    <input type="password" name="password" placeholder="Password"/>
                </div>
                <div class="small-12 columns">
                    <input type="submit" value="Submit" class="button small"/>  
                </div>  
               </form> 
            </div>
        </div>
    </div> 
<? include("../includes/layouts/footer.php"); ?>