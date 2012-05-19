<?php
if(!empty($_POST))
{
	$m = new Mongo();
	$db = $m->lvcc;
	$collection = $db->students;
	
	$data = array(
		'first_name' => $_POST['first_name'],
		'middle_name' => $_POST['middle_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
	);
	
	$collection->insert($data);
	header("Location: students.php");
}
?>
<form action="student.php" method="POST">
First Name: <input type="text" name="first_name" /><br />
Middle Name: <input type="text" name="middle_name" /><br />
Last Name: <input type="text" name="last_name" /><br />
Email: <input type="text" name="email" /><br />
<input type="submit" value="Save" /><br />
</form>
