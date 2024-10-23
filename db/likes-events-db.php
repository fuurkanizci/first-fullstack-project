<?php
include 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
header ('Content-type: application/json');

if ($_POST && isset($_POST['events_id'], $_POST['user_id'], $_POST['type'])) {
    $event_id = $_POST['events_id'];
    $user_id = $_POST['user_id'];
    $type = $_POST['type'];


    $likes = mysqli_query($deneme, "SELECT * FROM likes WHERE events_id='$event_id' AND user_id='$user_id'");

    if (!$likes) {
        die("SQL Error: " . mysqli_error($deneme)); // Hata mesajı ver
    }

    if (mysqli_num_rows($likes) > 0) {
        $like = mysqli_fetch_array($likes);
        if ($like['type'] == $type) {
            $deleteQuery = "DELETE FROM likes WHERE events_id='$event_id' AND user_id='$user_id'";
            if (!mysqli_query($deneme, $deleteQuery)) {
                die("Delete Error: " . mysqli_error($deneme));
            }
            echo "deletelike";
        } else {
            $updateQuery = "UPDATE likes SET type='$type' WHERE events_id='$event_id' AND user_id='$user_id'";
            if (!mysqli_query($deneme, $updateQuery)) {
                die("Update Error: " . mysqli_error($deneme));
            }
            echo "changetolike";
        }
    } else {
        $insertQuery = "INSERT INTO likes (events_id, user_id, type) VALUES ('$event_id', '$user_id', '$type')";
        if (!mysqli_query($deneme, $insertQuery)) {
            die("Insert Error: " . mysqli_error($deneme));
        }
        echo "newLike";
    }
} else {
    echo "Invalid request";
}
?>
