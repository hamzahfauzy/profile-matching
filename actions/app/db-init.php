<?php

$conn  = conn();
$db    = new Database($conn);

$myfile = fopen("../migrations/init.sql", "r") or die("Unable to open file!");
$query  = fread($myfile,filesize("../migrations/init.sql"));
fclose($myfile);

$db->query = $query;
$db->exec('multi_query');

echo "DB Init Success";
die();