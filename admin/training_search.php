<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Search Page</title>

        <!-- Bootstrap v4.4.1 -->
		
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- favicon -->
<style>
		@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: "Courier New", Courier, monospace;
  font-size: 20px;
  padding: 8px;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid #00B4CC;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.center {
text-align: center;
padding-top:230px;
color:DarkTurquoise;
}

.details {
font-size:15px;
max-width: 48rem;
width: 30%;
margin-top:30px;
margin-bottom:0;
margin-left:auto;
margin-right:auto;
background-color:white;

}

.center2 {
text-align: center;
padding-top:120px;
padding-right:240px;
color:DarkTurquoise;
}


	</style>
	
	
</head>
<body>
<h1 class="center">Training Search Bar</h1>

<form method="post">
<div class="wrap">
<div class="search">
<input type="text" class="searchTerm" name="search" placeholder="What are you looking for?">
<button type="submit" name="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
</div>
</div>
</form>



</body>
</html>


<?php
include "../connection.php";

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$str= str_replace(' ', '', $str);
	$sth= "SELECT * FROM tbl_all_trainings WHERE Trainings LIKE '$str%'";
	$sth_query=mysqli_query($conn,$sth);
	if(mysqli_num_rows($sth_query)!=0 && $str!="") {
	$sth_assoc=mysqli_fetch_assoc($sth_query);
	?>
	<h3 class="center2">Search Results</h3>
	<div class="details">
	<?php
	do { ?>
	
	 <p>Type of Training: <?php echo $sth_assoc['Trainings']; ?></p>
	 <p> Price: <?php echo $sth_assoc['Price']; ?></p>
    <?php } while($sth_assoc=mysqli_fetch_assoc($sth_query));
    	?> 
	</div>  
    <?php
	} else {
	   ?><p class="details">No results found!</p>
	   <?php 
	}

	
}

?>


