<?php
include("functions.php");

$serch_word = $_GET['searchword'];

$pdo = connect_to_db();

$sql = "SELECT * FROM todo_table WHERE todo LIKE '%{$search_word}%'";

$stmt = $pdo->prepare($sql);
$state = $stmt->execute();
