<?php
require_once("connection.php");

$student = array();

if(!empty($_POST)) {	
	if(!empty($_POST['id'])) {
		$_POST['_id'] = new MongoId($_POST['id']);
		unset($_POST['id']); # convert MongoId to string to be stored in a hidden field
	}
	$collection->save($_POST);   # if 'id' is found it would update, otherwise inserts a new record
	header("Location: students.php");
} else {
	if(!empty($_GET['id'])){
		$mongo_id = new MongoId( $_GET['id'] );
		$student = $collection->findOne(array("_id" => $mongo_id));
		
		# convert MongoId to String
		$student['id'] = $student['_id']->__toString();
		unset($student['_id']);
	}
}
?>
<form action="student.php" method="POST">
<? if(!empty($student['id'])):?>
<input type="hidden" name="id" value="<?=$student['id']?>" />
<? endif;?>
First Name: <input type="text" name="first_name" value="<?=@$student['first_name']?>" /><br />
Middle Name: <input type="text" name="middle_name" value="<?=@$student['middle_name']?>" /><br />
Last Name: <input type="text" name="last_name" value="<?=@$student['last_name']?>" /><br />
Email: <input type="text" name="email" value="<?=@$student['email']?>" /><br />
<input type="submit" value="Save" /><br />
<a href="students.php">Cancel</a>
</form>
