<?php
require_once "includes/config.php";

$sql="SELECT * FROM forum WHERE id='".$_GET['id']."'";
$query=mysqli_query($link,$sql);
$question=mysqli_fetch_assoc($query);
$sql="SELECT * FROM forum_img WHERE qid='".$_GET['id']."'";
$query=mysqli_query($link,$sql);
$images=mysqli_fetch_array($query,MYSQLI_ASSOC);
$section = "question";
$title = "Question";
require_once "views/layout.php";