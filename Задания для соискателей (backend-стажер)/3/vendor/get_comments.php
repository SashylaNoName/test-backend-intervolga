<?php
include 'connect.php';

$sql = "SELECT * FROM comments ORDER BY `id` DESC";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="comment">' . $row["text"] . '</div>';
    }
} else {
    echo "No comments yet.";
}

$connect->close();

