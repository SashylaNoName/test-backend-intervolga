<?php
include 'connect.php';

$comment = htmlspecialchars(trim(strip_tags($_POST['comment'])));
$sql = "INSERT INTO `comments`( `text`) VALUES ('$comment')";
if ($connect->query($sql) === TRUE) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
