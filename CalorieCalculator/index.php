<?php
session_start();

if (isset($_SESSION['logged']) && ($_SESSION['logged'] == true)) {
    header('Location: page.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Calculator</title>
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- GOOGLE FONTS  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dbbf754e69.js" crossorigin="anonymous"></script>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/indexcss.css">
</head>

<body>
    <main>
        <div class="hero-shadow"></div>
        <div class="form-container">
            <div class="info-container">
                <p class="fw-bold log">Log in</p>
                <p>Use your account to log in.</p>
            </div>
            <hr class="w-75 m-auto text-dark mb-5">
            <form action="Login.php" method="POST" class="py-5">
                <label class="my-5">
                    <i class="far fa-user text-dark p-3 mr-3"></i>
                    <input class="mx-4" type="text" name="nickname" placeholder="User Name...">
                </label>
                <label class="mx-5 my-5">
                    <i class="fas fa-lock text-dark p-3 mr-3"></i>
                    <input class="mx-4" type="password" name="password" placeholder="Password...">
                </label>
                <button type="submit" name="submit">log in</button>
            </form>
            <?php
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
            }
            ?>
            <p class="text-center my-5"><a href="register.php" class="text-dark">Register as a new user</a></p>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>