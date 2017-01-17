<?php

session_start();
$diaryContent="";

if (array_key_exists("id", $_COOKIE)) {

	$_SESSION['id'] = $_COOKIE['id'];

}

if (array_key_exists("id", $_SESSION)) {

	echo "<p>Logged In! <a href='index.php?logout=1'>Log out</a></p>";

	include("connection.php");
	
	$query = "SELECT diary FROM `users` WHERE id = '".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1";

           $row = mysqli_fetch_array(mysqli_query($link, $query));
           
           $diaryContent=$row['diary'];

} else {

	header("Location: index.php");

}

include("header.php");

?>
<nav class="navbar navbar-light bg-faded navbar-fixed-top">
  
    
      <a class="navbar-brand" href="#">
        Secret Diary
      </a>
    <div class="pull-xs-right">
    	
<a href='index.php?logout=1' button class="btn btn-success-outline" type="submit"> Log out!</a>

    </div>
  
</nav>
<div class="container-fluid" id="containerLoggedInPage">
<form>
     <textarea id ="diary" class="form-control"><?php echo $diaryContent ?>
	
      </textarea>
</form>


</div>

<?php
include("footer.php");

?>