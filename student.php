<?php
$m = new Mongo();
$db = $m->lvcc;
$collection = $db->students;

$student = array();

if(!empty($_POST))
{	
	if(!empty($_POST['id'])) {
		$_POST['_id'] = new MongoId($_POST['id']);
		unset($_POST['id']);
	}
	$collection->save($_POST);
	header("Location: students.php");
} else {
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$student = $collection->findOne(array("_id" => new MongoId($id)));
		# convert MongoId to String
		$student['id'] = $student['_id']->__toString();
		unset($student['_id']);
		# TODO - remove double quotes
	}
}
?>
<form action="student.php" method="POST">
<? if(!empty($student['id'])):?>
<input type="hidden" name="id" value="<?=$student['id']?>" />
<? endif;?>
First Name: <input type="text" name="first_name" value=="<?=$student['first_name']?>" /><br />
Middle Name: <input type="text" name="middle_name" value=="<?=$student['middle_name']?>" /><br />
Last Name: <input type="text" name="last_name" value=="<?=$student['last_name']?>" /><br />
Email: <input type="text" name="email" value=="<?=$student['email']?>" /><br />
<input type="submit" value="Save" /><br />
<a href="students.php">Cancel</a>
</form>
