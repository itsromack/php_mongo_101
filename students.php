<?php
$m = new Mongo();		# 1. Create a Mongo Object
$db = $m->lvcc;			# 2. Select Database
$collection = $db->students;	# 3. Select a Colletion
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
	</tr>
<? endforeach;?>
</table>
<br />
<a href='student.php'>Add New Student</a>
