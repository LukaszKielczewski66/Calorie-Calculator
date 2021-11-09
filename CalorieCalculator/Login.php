<?php

session_start();

if (!isset($_POST['nickname']) || (!isset($_POST['password']))) {
    header('Location: index.php');
    exit();
}

require_once 'connect.php';

$conn = new mysqli($host, $db_user, $db_password, $db_name);

if ($conn->connect_errno != 0) {
    echo "error" . $conn->connect_errno . "Desc" . $conn->connect_error;
} else {
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];

    $nickname = htmlentities($nickname, ENT_QUOTES, "UTF-8");

    if ($result = @$conn->query(sprintf(
        "SELECT * FROM users WHERE username='%s'",
        mysqli_real_escape_string($conn, $nickname)
    ))) {
        $users = $result->num_rows;
        if ($users > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['logged'] = true;
                $_SESSION['id'] = $row['ID'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['fat'] = $row['fat'];
                $_SESSION['sugar'] = $row['sugar'];
                $_SESSION['carbonhydrate'] = $row['carbonhydrate'];
                $_SESSION['protein'] = $row['protein'];

                unset($_SESSION['error']);
                $result->close();
                header('Location: page.php');
            } else {
                $_SESSION['error'] = '<div class="alert alert-danger" role="alert">Sorry, these login details are not correct.</div>';
                header('Location: index.php');
            }
        } else {
            $_SESSION['error'] = '<div class="alert alert-danger" role="alert">Sorry, these login details are not correct.</div>';
            header('Location: index.php');
        }
    }


    $conn->close();
}
