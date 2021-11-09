<?php
session_start();

if (isset($_POST['email'])) {
    $success = true;

    //VALID NICKNAME

    $nickname = $_POST['nickname'];
    if (strlen($nickname) < 3) {
        $_SESSION['e_nickname'] = 'Nickname should be at least 3 letters long';
        $success = false;
    }
    if (strlen($nickname) > 20) {
        $_SESSION['e_nickname'] = 'Nickname can be up to 20 letters long';
        $success = false;
    }

    if (ctype_alnum($nickname) == false) {
        $success = false;
        $_SESSION['e_nickname'] = 'nickname can only consist of liter and numbers';
    }

    //VALID EMAIL

    $email = $_POST['email'];
    $sEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    if ((filter_var($sEmail, FILTER_VALIDATE_EMAIL) == false) || $sEmail != $email) {
        $success = false;
        $_SESSION['e_email'] = 'Please enter a valid email address!';
    }

    //PASSWORD VALID

    $password = $_POST['password'];

    if (strlen($password) < 6) {
        $success = false;
        $_SESSION['e_password'] = 'Password should be at least 6 letters long';
    }
    if (strlen($password) > 20) {
        $_SESSION['e_password'] = 'Password can be up to 20 letters long';
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    require_once 'connect.php';
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $conn = new mysqli($host, $db_user, $db_password, $db_name);
        if ($conn->connect_errno != 0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            //EMAIL ALREADY EXIST
            $result = $conn->query('SELECT id FROM users WHERE email = "$email"');

            $mails = $result->num_rows;
            if ($mails > 0) {
                $success = false;
                $_SESSION['e_email'] = 'The email address provided already exists!';
            }
            //NICKNAME ALREADT EXIST
            $result = $conn->query('SELECT id FROM users WHERE username = "$nickname"');

            $nicknames = $result->num_rows;
            if ($nicknames > 0) {
                $success = false;
                $_SESSION['e_nickname'] = 'There is already a player with this nickname!';
            }

            if ($success == true) {
                //SUCCESFULL VALIDATION
                if ($conn->query("INSERT INTO users VALUES (NULL, '$nickname', '$password_hash', '$email','__','__','__','','','__')")) {
                    // GET USER ID
                    $getID = mysqli_query($conn, "SELECT ID from users WHERE username = '$nickname'");
                    $row = mysqli_fetch_assoc($getID);

                    $userID = $row['ID'];

                    $sql =
                        "INSERT INTO breakfast (user_id, id, name ,fat, carbonhydrate, protein, sugar, nutritionalValue, flag) VALUES ($userID, NULL, '', 0, 0, 0, 0, 0, 1);
                        INSERT INTO brunch (user_id, id, name ,fat, carbonhydrate, protein, sugar, nutritionalValue, flag) VALUES ($userID, NULL, '', 0, 0, 0, 0, 0, 1);
                        INSERT INTO lunch (user_id, id, name ,fat, carbonhydrate, protein, sugar, nutritionalValue, flag) VALUES ($userID, NULL, '', 0, 0, 0, 0, 0, 1);
                        INSERT INTO dinner (user_id, id, name ,fat, carbonhydrate, protein, sugar, nutritionalValue, flag) VALUES ($userID, NULL, '', 0, 0, 0, 0, 0, 1);
                        INSERT INTO snack (user_id, id, name ,fat, carbonhydrate, protein, sugar, nutritionalValue, flag) VALUES ($userID, NULL, '', 0, 0, 0, 0, 0, 1);
                        INSERT INTO supper (user_id, id, name ,fat, carbonhydrate, protein, sugar, nutritionalValue, flag) VALUES ($userID, NULL, '', 0, 0, 0, 0, 0, 1);";

                    // INSERT MEALS TO DATABASE

                    if (mysqli_multi_query($conn, $sql)) {
                        header('Location: welcome.php');
                        $_SESSION['succesfull_register'] = true;
                    }
                } else {
                    throw new Exception($conn->error);
                }
            }

            $conn->close();
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">SERVER ERROR</div>';
        echo $e;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CalorieCalculator</title>
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- GOOGLE FONTS  -->
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dbbf754e69.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/registercss.css">
</head>

<body>
    <main>
        <div class="hero-shadow"></div>
        <div class="form-container">
            <div class="info-container">
                <p class="fw-bold log">Register</p>
                <p>Create a free account</p>
            </div>
            <hr class="w-75 m-auto text-dark mb-5">
            <form method="POST" class="py-5">
                <label class="my-5">
                    <i class="far fa-user text-dark p-3 mr-3"></i>
                    <input class="mx-4" type="text" name="nickname" placeholder="User Name...">
                </label>
                <?php
                if (isset($_SESSION['e_nickname'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['e_nickname'] . '</div>';
                    unset($_SESSION['e_nickname']);
                }
                ?>
                <label class="my-5">
                    <i class="far fa-envelope  text-dark p-3 mr-3"></i>
                    <input class="mx-4" type="text" name="email" placeholder="E-mail...">
                </label>
                <?php
                if (isset($_SESSION['e_email'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['e_email'] . '</div>';
                    unset($_SESSION['e_email']);
                }
                ?>
                <label class="mx-5 my-5">
                    <i class="fas fa-lock text-dark p-3 mr-3"></i>
                    <input class="mx-4" type="password" name="password" placeholder="Password...">
                </label>
                <?php
                if (isset($_SESSION['e_password'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['e_password'] . '</div>';
                    unset($_SESSION['e_password']);
                }
                ?>
                <button type="submit">Register</button>
            </form>
            <p class="text-center my-5"><a href="index.php" class="text-dark">Already have an account? Log in !</a></p>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>