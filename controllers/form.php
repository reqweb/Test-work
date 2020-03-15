<?php

require_once( "../classes/Reviews.php" ); 

$AddItems = new Reviews(); 
$items = $AddItems->NewReviews($_POST["name"], $_POST["email"], $_POST["review"], $_FILES['file']['name']);