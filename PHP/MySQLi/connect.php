<?php

$db = new mysqli('localhost', 'user', 'pass');
if ($db->connect_errno) {
  exit($db->connect_error);
}
if(!$db->select_db('database')){
  exit("Could not connect to database.");
}
