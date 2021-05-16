<?php include('include/header.php'); 

// Ignore Warnings
error_reporting(E_ALL ^ E_NOTICE);

// Connect to Database
require_once "connection.php";

// Days,Hours,Minutes Time Format
require_once "time.php";

?>

<!DOCTYPE html>
<html>
   <head>
      <div class="menu">
      </div>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>EMTP - Admin Inbox</title>
      <!-- Bootstrap v4.4.1 -->
      <link rel="stylesheet" type="text/css" href="vendor/bootstrap/bootstrap.min.css">
      <!-- favicon -->
   <link rel="shortcut icon" type="image/x-icon" href="images/favicon.jpg">
 <link rel="stylesheet" type="text/css" href="../css/style2.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

</head>
   <body class="bg-light">
      <div class="container">
      
       <!-- <div class="col-md-4 offset-md-4">-->
     <div class="text-center mt-5"> 
        
      </div>
      <h1 class="text-center">Admin Inbox</h1>

   <div class="mb-3">


<script type="text/javascript">

$("body").prepend('<div id="loading"><img src="images/loading.gif" alt="Loading.." title="Loading.." /></div>');

$(window).load(function(){
	$("#inbox, #msg").fadeIn("slow");
	$("#loading").fadeOut("slow");
});

</script>

<?php
	if(isset($_GET['msg'])){

		$id = $_GET['msg'];
		mysqli_query($conn, "UPDATE contactus SET open = '1' WHERE id = '$id'");
		$msg = mysqli_query($conn, "SELECT * FROM contactus WHERE id = '$id'");
		$row = mysqli_fetch_assoc($msg);
			$from = $row['name'];
			$email = $row['email'];
			$phone = $row['phone'];
			$message = $row['comments'];
			$phonecall = $row['phonecall'];
			$website = $row['website'];
			$priority = $row['priority'];
			$type = $row['type'];
			$date = $row['created_date'];
		
?>

<div id="msg">








<a href="adminmail.php">← Back to Inbox</a>

<table>
	<tr>
		<td>From: <strong><?php echo $from; ?></strong></td>
		<td>Email: <strong><?php echo $email; ?></strong></td>
		<td>Date: <strong><?php echo $date; ?></strong></td>
		<td>Phone: <strong><?php echo $phone; ?></strong></td>
		<td>Callback: <strong><?php echo $phonecall; ?></strong></td>
		<td>Website: <strong><?php echo $website; ?></strong></td>
		<td>Priority: <strong><?php echo $priority; ?></strong></td>
		<td>Type: <strong><?php echo $type; ?></strong></td>
	</tr>
</table>

<pre><?php echo $message; ?></pre>

<a class="remove btn danger" href="?remove=<?php echo $id; ?>">Delete this message</a>

</div>

<script type="text/javascript">

$('.remove').click(function(){
	var agree=confirm("Are you sure you?");
	if (agree) {
		return true;
	}else {
		return false;
	}
});

</script>

<?php

exit();

} else if(isset($_GET['remove'])){

	$id = $_GET['remove'];
	$remove = mysqli_query($conn, "DELETE FROM contactus WHERE id = '$id'");
	if($remove){
		echo '<script>window.location = "adminmail.php"</script>';
	}else {
		die("Please Refresh the page.");
	}

	exit();

} else {

?>

<div id="inbox">

<table class="sortable">

		<tr>

			<th width="10%">#</th>
			<th>From</th>
			<th>Email</th>
			<th>Subject</th>
			<th>Sent</th>
			<th>Seen</th>

		</tr>

			<?php

				$limit = 5;
				$p = $_GET['p'];

				$get_total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contactus"));
				$total = ceil($get_total/$limit);

				if(!isset($p)){
					$offset = 0;
				}else if($p == '1'){
					$offset = 0;
				}else if($p <= '0'){
					$offset = 0;
					echo '<script>window.location = "adminmail.php";</script>';
				}else {
					$offset = ($p - 1) * $limit;
				}

				$inbox = mysqli_query($conn, "SELECT * FROM contactus LIMIT $offset,$limit");
				$rows = mysqli_num_rows($inbox);
				while($row = mysqli_fetch_assoc($inbox)){
					$id = $row['id'];
					$from = $row['name'];
					$email = $row['email'];

					if(strlen($row['type']) >= 50){
						$type = substr($row['type'],0,50)."..";
					}else {
						$type = $row['type'];
					}

					$message = $row['comments'];
					$date = $row['created_date'];
					
					if($row['open'] == '1'){
						$open = '<img src="images/open.png" alt="Opened" title="Opened" />';
					}else {
						$open = '<img src="images/not_open.png" alt="Opened" title="Opened" />';
					}

					echo '<tr class="border_bottom">';
						echo '<td><a href="?msg='.$id.'">'.$id.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$from.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$email.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$type.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$date.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$open.'</a></td>';
					echo '</tr>';

				}

				if($rows <= 0){
					echo '<tr><td width="100%">There\'s no messages at this moment, check back later!</td></tr>';
				}

			?>

	</table>

	<?php if($get_total > $limit){ ?>

		<div id="pages">

			<?php
				for($i=1; $i<$total; $i++){
					echo ($i == $p) ? '<a class="btn active">'.$i.'</a>' : '<a class="btn" href="?p='.$i.'">'.$i.'</a>';
				}
			?>

		</div>

	<?php } ?>

</div>

<?php } ?>

</body>
</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <?php include('include/footer.php'); ?>