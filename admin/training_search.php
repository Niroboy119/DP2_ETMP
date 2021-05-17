<?php include('include/header.php'); ?>

<div class="bar">
    <div class="bg-light">
<h1 class="center">Training Search Bar</h1>

<form method="post">
<div class="wrap">
<div class="search">
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<input id="search" type="text" class="searchTerm" name="search" placeholder="What are you looking for?">
<button id="btn" type="submit" name="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
</div>
</div>
</form>
<br>

<br>
<br>
</div>
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
	<br>
	<br>
	<h2 style="text-align:center">Search Results</h2>
	<div class="details">
	<?php
	do { ?>
	
	<table class="table table-bordered table-sm">
  <tr>
  <br>
  <br>
  <h2 style="text-align:justify"><?php echo $sth_assoc['Trainings']; ?></h2>
  <br>
    <th>Price:</th>
    <td><?php echo $sth_assoc['Price']; ?></td>
  </tr>
  <tr>
    <th>Program Instructor:</th>
    <td><?php echo $sth_assoc['Program Instructor']; ?></td>
  </tr>
  <tr>
    <th>Duration:</th>
    <td><?php echo $sth_assoc['Duration']; ?></td>
   </tr>
  <tr>
    <th>Availability (Day(s) of the week):</th>
    <td><?php echo $sth_assoc['Availability']; ?></td>
  </tr>
  <tr>
    <th>Target Audience:</th>
    <td><?php echo $sth_assoc['Target Audience']; ?></td>
  </tr>
  <tr>
    <th>Venue Availability:</th>
    <td><?php echo $sth_assoc['Venues']; ?></td>
  </tr>
</table>
	
	
	 
	 <?php } while($sth_assoc=mysqli_fetch_assoc($sth_query));
    
    	?> 
	</div>  
    <?php
	} else {
	   ?> <script>
	       var element= document.getElementById("search");
	       var elm =  document.getElementById("btn");
	       element.placeholder = "NO RESULTS WERE FOUND!";
	       element.classList.add("invalid");
	       elm.style.backgroundColor = "red";
	   </script>
	   <?php 
	}


	
}


?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include('include/footer.php');


?>






