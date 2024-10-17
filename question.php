<?php
require_once "includes/config.php";
session_start();
$sql="SELECT * FROM forum WHERE id='".$_GET['id']."'";
$query=mysqli_query($link,$sql);
$question=mysqli_fetch_assoc($query);
$sql="SELECT img FROM forum_img WHERE qid='".$_GET['id']."'";
$query=mysqli_query($link,$sql);
$images=mysqli_fetch_all($query,MYSQLI_ASSOC);
if(isset($_POST['send'])){
$sql="INSERT INTO forum_ans (uid,qid,answer,accepted) VALUE ('".$_SESSION['usuario']['id']."','".$_GET['id']."','".$_POST['answer']."',0)";
$query=mysqli_query($link,$sql);
}
$sql="SELECT * FROM forum_ans WHERE qid='".$_GET['id']."'";
$query=mysqli_query($link,$sql);
$ans=mysqli_fetch_all($query,MYSQLI_ASSOC);

$sql="SELECT * FROM usuarios WHERE id='".$question['uid']."'";
$query=mysqli_query($link,$sql);
$quser=mysqli_fetch_assoc($query);



$section = "question";
$title = "Question";
require_once "views/layout.php";