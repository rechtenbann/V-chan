<?php
require_once "includes/config.php";
session_start();
$sql = "SELECT * FROM forum";
$query = mysqli_query($link, $sql);
$questions = mysqli_fetch_all($query, MYSQLI_ASSOC);
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $sql="INSERT INTO forum (title,description,uid,fecha_alta,fecha_baja) VALUES ('".$title."','".$description."','".$_SESSION['usuario']['id']."',NOW(), NULL)";
    $query=mysqli_query($link,$sql);

    if($_FILES['images']['name'][0]!=null){
    $sql="SELECT id FROM forum  WHERE uid = '".$_SESSION['usuario']['id']."' ORDER BY id DESC  LIMIT 1;";
    $query=mysqli_query($link,$sql);
    $id=mysqli_fetch_assoc($query);

    $stmt = $link->prepare("INSERT INTO forum_img (img, qid) VALUES (?, ?)");
    $stmt->bind_param("ss", $imagePath, $qid);
    $uploadedImages = $_FILES['images'];
    $qid = $id['id'];
    $dir=strval($qid);
    if (!file_exists('forum/'.$dir)) {
        mkdir('forum/'.$dir);
    }
    foreach ($uploadedImages['name'] as $key => $value) {
        $targetDir = "forum/".$dir."/";
        $fileName = basename($uploadedImages['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        
            if (move_uploaded_file($uploadedImages["tmp_name"][$key], $targetFilePath)) {
                $imagePath = $targetFilePath;
                $stmt->execute();
                $sql="UPDATE forum_img SET uid='".$_SESSION['usuario']['id']."'";
                $query=mysqli_query($link,$sql);
            } 
    }
    $stmt->close();
    $link->close();
    }
    header("Location:forum.php");
    
}
$section = "forum";
$title = "Forum";
require_once "views/layout.php";