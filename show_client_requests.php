<?php

include "connection.php";
$sql = "SELECT * FROM tbl_client_requests WHERE fullname = 'Saad' ";

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
		</tr>
<?php	
	}
	}
	else {
	//	echo "0 results";
	}
	mysqli_close($conn);
?>