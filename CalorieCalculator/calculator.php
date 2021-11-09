<?php

require_once('mealhandler.php');
include 'classes/userInfo.class.php';

if (!isset($_SESSION['logged'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie calculator</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JQUERY VALIDATE FORM  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- GOOGLE FONTS  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dbbf754e69.js" crossorigin="anonymous"></script>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/calculator.css">
    <script>
        $(document).ready(function() {
            $('form').submit(function() {
                var age = $('#age').val();
                var height = $('#height').val();
                var weight = $('#weight').val();
                var activity = $('#activity').val();
                var gender = $('#gender').val();
                var submit = $('#submit').val();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {
                        age: age,
                        height: height,
                        weight: weight,
                        activity: activity,
                        gender: gender,
                        submit: submit
                    }
                })
            })
        })
    </script>
</head>

<body>
    <!-- *********************************NAV*************************************** -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <i class="fas fa-utensils navbar-brand"></i>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-hamburger"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-4  my-3" href="page.php">Home</a>
                        <a class="nav-link mx-lg-4  my-3" href="calculator.php">Calculator</a>
                        <a class="nav-link mx-lg-4  my-3" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="user-info text-light text-center py-4">
        <p class="summary fw-bold pt-5 pb-2">Information about you:</p>
        <hr class="w-50 m-auto my-3">
        <div class="row m-0 p-0">
            <?php
            $userInfo = new UserInfo();
            $informations = $userInfo->getUserInfo($_SESSION['id']);
            ?>
        </div>
    </div>

    <main>
        <div class="hero-shadow"></div>
        <div class="container form-container">
            <div class="info">
                <p class="h1 mb-4">Calorie Calculator</p>
                <p class="h4">Check your caloric demand</p>
            </div>
            <hr class="w-50">
            <form action="" method="POST" id="form">
                <label><input type="number" id="age" name="age" placeholder="Age"></label>
                <label><input type="number" id="height" name="height" placeholder="Height"></label>
                <label><input type="number" id="weight" name="weight" placeholder="Weight"></label>
                <label>
                    <p class="activity text-center" data-bs-toggle="popover" title="Popover title" data-bs-content="
                    Inactive- Never or rarely include physical activity in your day.          
                    Active - Include at least 30 minutes of moderate activity most days of the week, or 20 minutes of vigorous activity at least three days a week.
                    Very Active - Include large amounts of moderate or vigorous activity in your day.
                    ">Activity</p>
                    <select name="activity" id="activity">
                        <option value="1.4">Inactive</option>
                        <option value="1.7">Active</option>
                        <option value="2">Very active</option>
                    </select>
                    <p class="text-center gender">Gender</p>
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </label>
                <button type="submit" name="submit" id="submit">Calculate</button>
                <p class="form-message"></p>
            </form>
        </div>
    </main>
    <section class="info-container">
        <div class="container information text-light text-center">
            <p class="summary fw-bold pt-5 pb-2">Your daily summary:</p>
            <div class="food-info-container d-flex justify-content-center my-5">
                <p class="food-info"></i>Today you ate</p>
            </div>
            <hr class="w-50 m-auto my-3">
            <div class="row">
                <div class="col-lg-6">
                    <div class="food-container food d-flex justify-content-center py-4">
                        <i class="fas fa-cheese"></i>
                        <p class="food-info mx-4"></i><?php echo $_SESSION['totalFat'] . "g of Fat" ?></p>
                    </div>
                    <div class="food-container food d-flex justify-content-center py-4">
                        <i class="fas fa-pizza-slice"></i>
                        <p class="food-info mx-4"><?php echo $_SESSION['totalCarbonhydrate'] . "g of Carbonhydrate" ?></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="food-container food d-flex justify-content-center py-4">
                        <i class="fas fa-candy-cane"></i>
                        <p class="food-info mx-4"></i><?php echo $_SESSION['totalSugar'] . "g of Sugar" ?></p>
                    </div>
                    <div class="food-container food d-flex justify-content-center py-4">
                        <i class="fas fa-drumstick-bite"></i>
                        <p class="food-info mx-4"></i><?php echo $_SESSION['totalProtein'] . "g of Protein" ?></p>
                    </div>
                </div>
                <hr class="w-50 m-auto my-3">
                <div class="food-info-container d-flex justify-content-center my-5 py-4">
                    <i class="fas fa-utensils"></i>
                    <p class="food-info mx-5"></i><?php echo "Total: " . $_SESSION['totalNutritions'] . "kcal" ?></p>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#form").validate({
                rules: {
                    age: {
                        required: true,
                        number: true,
                        min: 1,
                        max: 123
                    },
                    height: {
                        required: true,
                        number: true,
                        min: 20,
                        max: 250
                    },
                    weight: {
                        required: true,
                        number: true,
                        min: 3,
                        max: 400
                    }
                }
            });
        });
    </script>
</body>

</html>