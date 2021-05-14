<?php include('include/header.php'); ?>

<div class="bar">
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

</div>



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
<?php
include('include/footer.php');


?>






