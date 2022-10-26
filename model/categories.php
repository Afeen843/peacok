<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $imageName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];
    $destination = '../../images/' . $name . '.png';

    if (move_uploaded_file($tempName, $destination)) {
        echo 'image uploaded';
    } else {
        echo 'wrong';
    }

}
$redirect = $_SERVER['HTTP_REFERER'];
header("location: $redirect");
exit;