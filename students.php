<?php
require_once("connection.php");

$cursor = $collection->find();	# 4. Extract all Documents in a Collection
?>
<table>
<tr>
<td>First Name</td>
<td>Middle Name</td>
<td>Last Name</td>
<td>Email</td>
</tr>
<? foreach($cursor as $obj): ?>
	<tr>
	<td><?=$obj["first_name"]?></td>
	<td><?=$obj["middle_name"]?></td>
	<td><?=$obj["last_name"]?></td>
	<td><?=$obj["email"]?></td>
	<td>
		<a href="student.php?id=<?=$obj["_id"]?>">edit</a>
	</td>
	</tr>
<? endforeach;?>
</table>
<br />
<a href='student.php'>Add New Student</a>
