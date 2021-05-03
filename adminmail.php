<?php

// Ignore Warnings
error_reporting(E_ALL ^ E_NOTICE);

// Connect to Database
require_once "inc/config.php";

// Days,Hours,Minutes Time Format
require_once "inc/time.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inbox System</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>

<script type="text/javascript">

$("body").prepend('<div id="loading"><img src="img/loading.gif" alt="Loading.." title="Loading.." /></div>');

$(window).load(function(){
	$("#inbox, #msg").fadeIn("slow");
	$("#loading").fadeOut("slow");
});

</script>

<?php
	if(isset($_GET['msg'])){

		$id = $_GET['msg'];
		mysqli_query($conn, "UPDATE messages SET open = '1' WHERE id = '$id'");
		$msg = mysqli_query($conn, "SELECT * FROM messages WHERE id = '$id'");
		$row = mysqli_fetch_assoc($msg);
			$from = $row['from'];
			$email = $row['email'];
			$date = $row['date'];
			$time = time_passed($row['time']);
			$message = $row['message'];
?>

<div id="msg">

<a href="./">← Back to Inbox</a>

<table>
	<tr>
		<td>From : <strong><?php echo $from; ?></strong></td>
		<td>Email : <strong><?php echo $email; ?></strong></td>
		<td>Date : <strong><?php echo $date; ?></strong></td>
		<td>Time : <strong><?php echo $time; ?></strong></td>
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
	$remove = mysqli_query($conn, "DELETE FROM messages WHERE id = '$id'");
	if($remove){
		echo '<script>window.location = "./"</script>';
	}else {
		die("Please Refresh the page.");
	}

	exit();

} else {

?>

<div id="inbox">

	<table>

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

				$get_total = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM messages"));
				$total = ceil($get_total/$limit);

				if(!isset($p)){
					$offset = 0;
				}else if($p == '1'){
					$offset = 0;
				}else if($p <= '0'){
					$offset = 0;
					echo '<script>window.location = "./";</script>';
				}else {
					$offset = ($p - 1) * $limit;
				}

				$inbox = mysqli_query($conn, "SELECT * FROM messages LIMIT $offset,$limit");
				$rows = mysqli_num_rows($inbox);
				while($row = mysqli_fetch_assoc($inbox)){
					$id = $row['id'];
					$from = $row['from'];
					$email = $row['email'];

					if(strlen($row['subject']) >= 50){
						$subject = substr($row['subject'],0,50)."..";
					}else {
						$subject = $row['subject'];
					}

					$message = $row['message'];
					$date = $row['date'];
					$time = time_passed($row['time']);
					if($row['open'] == '1'){
						$open = '<img src="img/open.png" alt="Opened" title="Opened" />';
					}else {
						$open = '<img src="img/not_open.png" alt="Opened" title="Opened" />';
					}

					echo '<tr class="border_bottom">';
						echo '<td><a href="?msg='.$id.'">'.$id.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$from.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$email.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$subject.'</a></td>';
						echo '<td><a href="?msg='.$id.'">'.$date.' - '.$time.'</a></td>';
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