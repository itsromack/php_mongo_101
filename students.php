<?php
$m = new Mongo();

$db = $m->lvcc;

$collection = $db->students;

$cursor = $collection->find();

echo "<table>\n";
echo "<tr>";
echo "<td>First Name</td>";
echo "<td>Middle Name</td>";
echo "<td>Last Name</td>";
echo "<td>Email</td>";
echo "</tr>";
foreach($cursor as $obj)
{
	echo "<tr>";
	echo "<td>" . $obj["first_name"] . "</td>";
	echo "<td>" . $obj["middle_name"] . "</td>";
	echo "<td>" . $obj["last_name"] . "</td>";
	echo "<td>" . $obj["email"] . "</td>";
	echo "</tr>";
}
echo "</tr>";
echo "</table>";

echo "<br />";

echo "<a href='student.php'>Add New Student</a>";
