<?php

session_start();

include 'classes/userInfo.class.php';

if (isset($_POST['submit'])) {
    $userID = $_SESSION['id'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $activity = $_POST['activity'];
    $gender = $_POST['gender'];

    switch ($gender) {
        case 'male':
            $PPM = (10 * $weight) + (6.25 * $height) - ((5 * $age) + 5);
            $CPM = $PPM * $activity;
            break;

        case 'female':
            $PPM = (10 * $weight) + (6.25 * $height) - ((5 * $age) - 161);
            $CPM = $PPM * $activity;
            break;
    }

    $userInfo = new UserInfo();
    $userInfo->addUserInfo($age, $height, $weight, $activity, $gender, $CPM, $userID);
}
