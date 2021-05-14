<?php
session_start();
include "connection.php";
$sql = "SELECT * FROM tbl_client_requests WHERE userId = '{$_SESSION['user_id']}' ";

$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>
<tr>
			<td><?=$row['id'];?></td>
			<td><?=$row['fullname'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['date_for_training'];?></td>
			<td><?=$row['training_type'];?></td>
			<td><?=$row['num_of_attendees'];?></td>
			<td><?=$row['paymentType'];?></td>
			<td><button class="btn btn-primary btn-lg btn-block" id="<?=$row['id'];?>">Select</button></td>
		</tr>
<?php	
	}
	}
	else {
	//	echo "0 results";
	}
	mysqli_close($conn);
?>