<?php
$database_name = 'lvcc';
$collection_name = 'students';

$m = new Mongo();
$collection = $m->selectDB($database_name)->selectCollection($collection_name);
?>
