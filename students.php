<?php
require_once("connection.php");
if (strcmp('delete', @$_GET['act']) === 0){
	# after deleting user redirect to page to disable refresh
	$collection->remove(array("_id" => new MongoId($_GET['id'])));
	header("Location: students.php");
}
if (isset($_POST['search'])) {
	$search = $_POST['search'];
	$regexSearch = array('$regex' => new MongoRegex("/^$search/i"));
	$findMe = array(
		'$or' => array(
			array('first_name' => $regexSearch),
			array('middle_name' => $regexSearch),
			array('last_name' => $regexSearch),
			array('email' => $regexSearch)
		)
	);
	$students = $collection->find($findMe);
} else {
	$students = $collection->find(); # similar to SELECT * FROM students
}
?>
<div>
	<form action="students.php" method="POST">
		<input type="text" name="search" size="30" />
		<input type="submit" value="Search" />
	</form>
</div>
<table border='1' cellpadding="5" cellspacing="1">
<tr>
<td>First Name</td>
<td>Middle Name</td>
<td>Last Name</td>
<td>Email</td>
<td colspan='2'>&nbsp;</td>
</tr>
<? foreach($students as $student): ?>
	<tr>
	<td><?=$student["first_name"]?></td>
	<td><?=$student["middle_name"]?></td>
	<td><?=$student["last_name"]?></td>
	<td><?=$student["email"]?></td>
	<td>
		<a href="student.php?id=<?=$student["_id"]?>">edit</a>
	</td>
	<td>
		<a href="students.php?act=delete&id=<?=$student["_id"]?>">delete</a>
	</td>
	</tr>
<? endforeach;?>
</table>
<br />
<a href='students.php'>List All Students</a>
<br />
<a href='student.php'>Add New Student</a>
