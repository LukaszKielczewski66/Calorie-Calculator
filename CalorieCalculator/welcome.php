<?php
session_start();

if (!isset($_SESSION['succesfull_register'])) {
    header('Location: index.php');
    exit();
} else {
    unset($_SESSION['succesfull_register']);
}

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <!-- GOOGLE FONTS  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dbbf754e69.js" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/welcomecss.css">
</head>

<body>

    <main>
        <div class="hero-shadow"></div>
        <div class="info text-dark text-center">
            <p class="my-5 mx-4">Thank you for registering,<br>
                you can now log into your account</p>
            <i class="fas fa-arrow-down"></i>
            <p class="my-5 mx-4"><a href="index.php" class="text-dark">Log in here!</a></p>
        </div>
    </main>
    <div class="description">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>