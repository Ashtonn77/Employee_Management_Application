<?php 
$dataSourceNetwork = 'mysql:host=localhost;dbname=record';
$connectingDB = new PDO($dataSourceNetwork,'root','');
$connectingDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
?>