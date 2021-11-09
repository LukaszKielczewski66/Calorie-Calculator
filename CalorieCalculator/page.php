<?php

require_once('mealhandler.php');

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
    <!-- GOOGLE FONTS  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/dbbf754e69.js" crossorigin="anonymous"></script>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/page.css">
    <!-- GOOGLE CHARTS -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // **********************GOOGLE CHARTS ***********************************
        // Load Charts and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });

        // *****************SUMMARY CHART***************

        function drawSummaryChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                echo "['Fat', " . $_SESSION['totalFat'] . "],";
                echo "['Carbonhydrate', " . $_SESSION['totalCarbonhydrate'] . "],";
                echo "['Sugar', " . $_SESSION['totalSugar'] . "],";
                echo "['Protein', " . $_SESSION['totalProtein'] . "],";
                ?>
            ]);
            var options = {
                legend: 'none',
                pieHole: 0.8,
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#3366CC', '#DC3912', '#FF9900', '#109618']
            };
            var chart = new google.visualization.PieChart(document.getElementById('summary-chart'));
            chart.draw(data, options);
        }

        // ****************BREAKFAST CHART*******************

        function drawBreakfastChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                $breakfastChart = new Summary();
                $breakfastChart->ChartInfo($breakfastSqlChart);
                ?>
            ]);
            var options = {
                legend: 'none',
                is3D: true,
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#3366CC', '#DC3912', '#FF9900', '#109618']
            };
            var chart = new google.visualization.PieChart(document.getElementById('breakfast-chart'));
            chart.draw(data, options);
        }
        // BRUNCH CHART

        function drawBrunchChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                $brunchChart = new Summary();
                $brunchChart->ChartInfo($brunchSqlChart);
                ?>
            ]);
            var options = {
                legend: 'none',
                is3D: true,
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#3366CC', '#DC3912', '#FF9900', '#109618']
            };
            var chart = new google.visualization.PieChart(document.getElementById('brunch-chart'));
            chart.draw(data, options);
        }

        // LUNCH CHART

        function drawLunchChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                $lunchChart = new Summary();
                $lunchChart->ChartInfo($lunchSqlChart);
                ?>
            ]);
            var options = {
                legend: 'none',
                is3D: true,
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#3366CC', '#DC3912', '#FF9900', '#109618']
            };
            var chart = new google.visualization.PieChart(document.getElementById('lunch-chart'));
            chart.draw(data, options);
        }

        // DINNER CHART
        function drawDinnerChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                $dinnerChart = new Summary();
                $dinnerChart->ChartInfo($dinnerSqlChart);
                ?>
            ]);
            var options = {
                legend: 'none',
                is3D: true,
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#3366CC', '#DC3912', '#FF9900', '#109618']
            };
            var chart = new google.visualization.PieChart(document.getElementById('dinner-chart'));
            chart.draw(data, options);
        }

        // SNACK CHART
        function drawSnackChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                $snackChart = new Summary();
                $snackChart->ChartInfo($snackSqlChart);
                ?>
            ]);
            var options = {
                legend: 'none',
                is3D: true,
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#3366CC', '#DC3912', '#FF9900', '#109618']
            };
            var chart = new google.visualization.PieChart(document.getElementById('snack-chart'));
            chart.draw(data, options);
        }

        // SUPPER CHART
        function drawSupperChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                <?php
                $supperChart = new Summary();
                $supperChart->ChartInfo($supperSqlChart);
                ?>
            ]);
            var options = {
                legend: 'none',
                is3D: true,
                backgroundColor: {
                    fill: 'transparent'
                },
                colors: ['#3366CC', '#DC3912', '#FF9900', '#109618']
            };
            var chart = new google.visualization.PieChart(document.getElementById('supper-chart'));
            chart.draw(data, options);
        }
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
    <div class="background-container mb-5">
        <div class="hero-shadow"></div>
        <!-- ****************************************SUMMARY******************************************* -->
        <section class="daily-summary">
            <div class="container summary-container">
                <div class="summary text-center">
                    <p class="mt-5">Your daily summary:</p>
                    <p class="h1 my-4"><?php echo 'Today you ate ' . $_SESSION['totalNutritions'] . ' kcal' ?></p>
                </div>
                <div class="summary-chart-container mb-5">
                    <div id="summary-chart" class="my-5" style="width: 100%; height: 400px;"></div>
                    <div class="summary-info">
                        <div class="summary-item Fat-info"><i class="fas fa-circle"></i>
                            <p>Fat:</p>
                        </div>
                        <div class="summary-item Carbon-info"><i class="fas fa-circle"></i>
                            <p>Carbonhydrate</p>
                        </div>
                        <div class="summary-item Sugar-info"><i class="fas fa-circle"></i>
                            <p>Sugar</p>
                        </div>
                        <div class="summary-item Protein-info"><i class="fas fa-circle"></i>
                            <p>Protein</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <main>
        <div class="container d-flex flex-column align-items-center">
            <!-- *****************************BREAKFAST***************************** -->
            <div class="accordion accordion-flush w-100 my-4" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="fas fa-plus px-5"></i>Breakfast
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row w-100">
                                <?php
                                if ($breakfastFlagValue) {
                                    echo '
                                        <div class="col-md-6 d-flex align-items-center">
                                        <form action="mealhandler.php" method="POST" id="my-form" onsubmit="return validate_form(this)">
                                        <label>Name* <input type="text" name="breakfastName" id="mealName"></label>
                                        <label>Fat* <input type="number" name="fat"></label>
                                        <label>of which saturates <input type="number" name="saturates"></label>
                                        <label>Carbonhydrate* <input type="number" name="carbonhydrate"></label>
                                        <label>Sugar <input type="number" name="sugar"></label>
                                        <label>Protein* <input type="number" name="protein"></label>
                                        <label>Salt <input type="number" name="salt"></label>
                                        <div class="button-container">
                                            <button type="submit" class="btn-save w-25 my-4 mx-5">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column align-items-center">
                                    <p class="my-4 text-center fw-bold">Intresting facts about breakfast<i class="fas fa-arrow-down mx-2"></i></p>
                                    <div class="container m-5 text-center">
                                        <p class="breakfast-facts m-5"></p>
                                    </div>
                                </div>';
                                } else {
                                    echo '
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="container meal-summary">
                                            <h1 class="mt-3 mb-5">Nutritional value in breakfast: </h1>';
                                    $breakfastSummary = new Summary();
                                    $breakfastSummary->MealSummary($sqlForBreakfast);
                                    echo '<form action="mealhandler.php" method="POST">
                                            <button type="submit" class="btnReset my-4 mx-5" name="resetBreakfast">Reset</button>
                                            </form>
                                          </div>
                                        </div>
                                        <div class="col-md-6 chart-container">
                                        <div id="breakfast-chart" class="my-5" style="width: auto; height: 100%;"></div>
                                        <div class="summary-info w-100">
                                            <div class="summary-item Fat-info"><i class="fas fa-circle"></i>
                                                <p>Fat:</p>
                                            </div>
                                            <div class="summary-item Carbon-info"><i class="fas fa-circle"></i>
                                                <p>Carbons</p>
                                            </div>
                                            <div class="summary-item Sugar-info"><i class="fas fa-circle"></i>
                                                <p>Sugar</p>
                                            </div>
                                            <div class="summary-item Protein-info"><i class="fas fa-circle"></i>
                                                <p>Protein</p>
                                            </div>
                                        </div>
                                    </div> ';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *****************************BRUNCH***************************** -->
            <div class="accordion accordion-flush w-100 my-4" id="accordionFlushExampe">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <i class="fas fa-plus px-5"></i>Brunch
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row w-100">
                                <?php
                                if ($brunchFlagValue) {
                                    echo '
                                        <div class="col-md-6 d-flex align-items-center">
                                        <form action="mealhandler.php" method="POST" id="my-form" onsubmit="return validate_form(this)">
                                        <label>Name* <input type="text" name="brunchName" id="mealName"></label>
                                        <label>Fat* <input type="number" name="fat"></label>
                                        <label>of which saturates <input type="number" name="saturates"></label>
                                        <label>Carbonhydrate* <input type="number" name="carbonhydrate"></label>
                                        <label>Sugar <input type="number" name="sugar"></label>
                                        <label>Protein* <input type="number" name="protein"></label>
                                        <label>Salt <input type="number" name="salt"></label>
                                        <div class="button-container">
                                            <button type="submit" class="btn-save w-25 my-4 mx-5">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column align-items-center">
                                    <p class="my-4 text-center fw-bold">Intresting facts about brunch<i class="fas fa-arrow-down mx-2"></i></p>
                                    <div class="container m-5 text-center">
                                        <p class="brunch-facts m-5"></p>
                                    </div>
                                </div>';
                                } else {
                                    echo '
                                    <div class="col-md-6 d-flex align-items-center">
                                    <div class="container meal-summary">
                                        <h1 class="mt-3 mb-5">Nutritional value in brunch: </h1>';
                                    $brunchSummary = new Summary();
                                    $brunchSummary->MealSummary($sqlForBrunch);
                                    echo '<form action="mealhandler.php" method="POST">
                                        <button type="submit" class="btnReset my-4 mx-5" name="resetBrunch">Reset</button>
                                        </form>
                                    </div>
                                </div>
                                    <div class="col-md-6 chart-container">
                                    <h1 class="my-4">Summary: </h1>
                                    <div id="brunch-chart" class="my-5" style="width: auto; height: 100%;"></div>
                                    <div class="summary-info w-100">
                                        <div class="summary-item Fat-info"><i class="fas fa-circle"></i>
                                            <p>Fat:</p>
                                        </div>
                                        <div class="summary-item Carbon-info"><i class="fas fa-circle"></i>
                                            <p>Carbons</p>
                                        </div>
                                        <div class="summary-item Sugar-info"><i class="fas fa-circle"></i>
                                            <p>Sugar</p>
                                        </div>
                                        <div class="summary-item Protein-info"><i class="fas fa-circle"></i>
                                            <p>Protein</p>
                                        </div>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *****************************LUNCH***************************** -->

            <div class="accordion accordion-flush w-100 my-4" id="accordionFlushExampe">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <i class="fas fa-plus px-5"></i>Lunch
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row w-100">
                                <?php
                                if ($lunchFlagValue) {
                                    echo '
                                        <div class="col-md-6 d-flex align-items-center">
                                        <form action="mealhandler.php" method="POST" id="my-form">
                                        <label>Name* <input type="text" name="lunchName" id="mealName"></label>
                                        <label>Fat* <input type="number" name="fat"></label>
                                        <label>of which saturates <input type="number" name="saturates"></label>
                                        <label>Carbonhydrate* <input type="number" name="carbonhydrate"></label>
                                        <label>Sugar <input type="number" name="sugar"></label>
                                        <label>Protein* <input type="number" name="protein"></label>
                                        <label>Salt <input type="number" name="salt"></label>
                                        <div class="button-container">
                                            <button type="submit" class="btn-save w-25 my-4 mx-5">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column align-items-center">
                                    <p class="my-4 text-center fw-bold">Intresting facts about lunch<i class="fas fa-arrow-down mx-2"></i></p>
                                    <div class="container m-5 text-center">
                                        <p class="lunch-facts m-5"></p>
                                    </div>
                                </div>';
                                } else {
                                    echo '
                                    <div class="col-md-6 d-flex align-items-center">
                                    <div class="container meal-summary">
                                        <h1 class="mt-3 mb-5">Nutritional value in lunch: </h1>';
                                    $lunchSummary = new Summary();
                                    $lunchSummary->MealSummary($sqlForLunch);
                                    echo '<form action="mealhandler.php" method="POST">
                                        <button type="submit" class="btnReset my-4 mx-5" name="resetLunch">Reset</button>
                                        </form>
                                    </div>
                                    </div>
                                    <div class="col-md-6 chart-container">
                                    <h1 class="my-4">Summary: </h1>
                                    <div id="lunch-chart" class="my-5" style="width: auto; height: 100%;"></div>
                                    <div class="summary-info w-100">
                                        <div class="summary-item Fat-info"><i class="fas fa-circle"></i>
                                            <p>Fat:</p>
                                        </div>
                                        <div class="summary-item Carbon-info"><i class="fas fa-circle"></i>
                                            <p>Carbons</p>
                                        </div>
                                        <div class="summary-item Sugar-info"><i class="fas fa-circle"></i>
                                            <p>Sugar</p>
                                        </div>
                                        <div class="summary-item Protein-info"><i class="fas fa-circle"></i>
                                            <p>Protein</p>
                                        </div>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *****************************DINNER***************************** -->
            <div class="accordion accordion-flush w-100 my-4" id="accordionFlushExampe">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            <i class="fas fa-plus px-5"></i>Dinner
                        </button>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row w-100">
                                <?php
                                if ($dinnerFlagValue) {
                                    echo '
                                        <div class="col-md-6 d-flex align-items-center">
                                        <form action="mealhandler.php" method="POST" id="my-form">
                                        <label>Name* <input type="text" name="dinnerName"></label>
                                        <label>Fat* <input type="number" name="fat"></label>
                                        <label>of which saturates <input type="number" name="saturates"></label>
                                        <label>Carbonhydrate* <input type="number" name="carbonhydrate"></label>
                                        <label>Sugar <input type="number" name="sugar"></label>
                                        <label>Protein* <input type="number" name="protein"></label>
                                        <label>Salt <input type="number" name="salt"></label>
                                        <div class="button-container">
                                            <button type="submit" class="btn-save w-25 my-4 mx-5">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="col-md-6 d-flex flex-column align-items-center">
                                    <p class="my-4 text-center fw-bold">Intresting facts about dinner<i class="fas fa-arrow-down mx-2"></i></p>
                                    <div class="container m-5 text-center">
                                        <p class="dinner-facts m-5"></p>
                                    </div>
                                </div>';
                                } else {
                                    echo ' <div class="col-md-6 d-flex align-items-center">
                                    <div class="container meal-summary">
                                        <h1 class="mt-3 mb-5">Nutritional value in dinner: </h1>';
                                    $dinnerSummary = new Summary();
                                    $dinnerSummary->MealSummary($sqlForDinner);
                                    echo '<form action="mealhandler.php" method="POST">
                                        <button type="submit" class="btnReset my-4 mx-5" name="resetDinner">Reset</button>
                                        </form>
                                    </div>
                                    </div>
                                    <div class="col-md-6 chart-container">
                                    <h1 class="my-4">Summary: </h1>
                                    <div id="dinner-chart" class="my-5" style="width: auto; height: 100%;"></div>
                                    <div class="summary-info w-100">
                                        <div class="summary-item Fat-info"><i class="fas fa-circle"></i>
                                            <p>Fat:</p>
                                        </div>
                                        <div class="summary-item Carbon-info"><i class="fas fa-circle"></i>
                                            <p>Carbons</p>
                                        </div>
                                        <div class="summary-item Sugar-info"><i class="fas fa-circle"></i>
                                            <p>Sugar</p>
                                        </div>
                                        <div class="summary-item Protein-info"><i class="fas fa-circle"></i>
                                            <p>Protein</p>
                                        </div>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *****************************SNACK***************************** -->
            <div class="accordion accordion-flush w-100 my-4" id="accordionFlushExampe">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            <i class="fas fa-plus px-5"></i>Snack
                        </button>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row w-100">
                                <?php
                                if ($snackFlagValue) {
                                    echo '                                 
                                    <div class="col-md-6 d-flex align-items-center">
                                        <form action="mealhandler.php" method="POST" id="my-form">
                                        <label>Name* <input type="text" name="snackName"></label>
                                        <label>Fat* <input type="number" name="fat"></label>
                                        <label>of which saturates <input type="number" name="saturates"></label>
                                        <label>Carbonhydrate* <input type="number" name="carbonhydrate"></label>
                                        <label>Sugar <input type="number" name="sugar"></label>
                                        <label>Protein* <input type="number" name="protein"></label>
                                        <label>Salt <input type="number" name="salt"></label>
                                        <div class="button-container">
                                            <button type="submit" class="btn-save w-25 my-4 mx-5">Save</button>
                                        </div>
                                    </form></div>
                                    <div class="col-md-6 d-flex flex-column align-items-center">
                                    <p class="my-4 text-center fw-bold">Intresting facts about snack<i class="fas fa-arrow-down mx-2"></i></p>
                                    <div class="container m-5 text-center">
                                        <p class="snack-facts m-5"></p>
                                    </div>
                                </div>';
                                } else {
                                    echo '
                                    <div class="col-md-6 d-flex align-items-center">
                                    <div class="container meal-summary">
                                        <h1 class="mt-3 mb-5">Nutritional value in snack: </h1>';
                                    $snackSummary = new Summary();
                                    $snackSummary->MealSummary($sqlForSnack);
                                    echo '<form action="mealhandler.php" method="POST">
                                        <button type="submit" class="btnReset my-4 mx-5" name="resetSnack">Reset</button>
                                        </form>
                                    </div>
                                    </div>
                                    <div class="col-md-6 chart-container">
                                    <h1 class="my-4">Summary: </h1>
                                    <div id="snack-chart" class="my-5" style="width: auto; height: 100%;"></div>
                                    <div class="summary-info w-100">
                                        <div class="summary-item Fat-info"><i class="fas fa-circle"></i>
                                            <p>Fat:</p>
                                        </div>
                                        <div class="summary-item Carbon-info"><i class="fas fa-circle"></i>
                                            <p>Carbons</p>
                                        </div>
                                        <div class="summary-item Sugar-info"><i class="fas fa-circle"></i>
                                            <p>Sugar</p>
                                        </div>
                                        <div class="summary-item Protein-info"><i class="fas fa-circle"></i>
                                            <p>Protein</p>
                                        </div>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *****************************SUPPER***************************** -->
            <div class="accordion accordion-flush w-100 mt-4 mb-5" id="accordionFlushExampe">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                            <i class="fas fa-plus px-5"></i>Supper
                        </button>
                    </h2>
                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row w-100">
                                <?php
                                if ($supperFlagValue) {
                                    echo '
                                        <div class="col-md-6 d-flex align-items-center">
                                        <form action="mealhandler.php" method="POST" id="my-form">
                                        <label>Name* <input type="text" name="supperName"></label>
                                        <label>Fat* <input type="number" name="fat"></label>
                                        <label>of which saturates <input type="number" name="saturates"></label>
                                        <label>Carbonhydrate* <input type="number" name="carbonhydrate"></label>
                                        <label>Sugar <input type="number" name="sugar"></label>
                                        <label>Protein* <input type="number" name="protein"></label>
                                        <label>Salt <input type="number" name="salt"></label>
                                        <div class="button-container">
                                            <button type="submit" class="btn-save w-25 my-4 mx-5">Save</button>
                                        </div>
                                    </form></div>
                                    <div class="col-md-6 d-flex flex-column align-items-center">
                                    <p class="my-4 text-center fw-bold">Intresting facts about supper<i class="fas fa-arrow-down mx-2"></i></p>
                                    <div class="container m-5 text-center">
                                        <p class="supper-facts m-5"></p>
                                    </div>
                                </div>';
                                } else {
                                    echo '
                                    <div class="col-md-6 d-flex align-items-center">
                                    <div class="container meal-summary">
                                    <h1 class="mt-3 mb-5">Nutritional value in supper: </h1>';
                                    $supperSummary = new Summary();
                                    $supperSummary->MealSummary($sqlForSupper);
                                    echo '<form action="mealhandler.php" method="POST">
                                        <button type="submit" class="btnReset my-4 mx-5" name="resetSupper">Reset</button>
                                        </form>
                                    </div>
                                    </div>
                                    <div class="col-md-6 chart-container">
                                    <h1 class="my-4">Summary: </h1>
                                    <div id="supper-chart" class="my-5" style="width: auto; height: 100%;"></div>
                                    <div class="summary-info w-100">
                                        <div class="summary-item Fat-info"><i class="fas fa-circle"></i>
                                            <p>Fat:</p>
                                        </div>
                                        <div class="summary-item Carbon-info"><i class="fas fa-circle"></i>
                                            <p>Carbons</p>
                                        </div>
                                        <div class="summary-item Sugar-info"><i class="fas fa-circle"></i>
                                            <p>Sugar</p>
                                        </div>
                                        <div class="summary-item Protein-info"><i class="fas fa-circle"></i>
                                            <p>Protein</p>
                                        </div>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section class="tips text-light mt-5">
        <div class="container">
            <p class="heading fw-bold text-center py-5">How many calories should you eat to <span class="lose">lose</span>, <span class="maintain">maintain</span>, and<span class="gain"> gain </span>weight?</p>
            <div class="row text-center">
                <div class="col-lg-4 tip1 mb-md-4">
                    <p class="m-4">When trying to <span class="lose">lose weight</span>, a general rule of thumb is to reduce your calorie intake to 500 fewer calories than your body needs to maintain your current weight. This will help you lose about 1 pound (0.45 kg) of body weight per week.</p>
                </div>
                <div class="col-lg-4 tip2 mb-md-4">
                    <p class="m-4">The recommended calorie intake for <span class="maintain">maintain weight</span> for adult women ranges from 1,600 calories per day to 2,400 calories per day, according to the 2020-2025 Dietary Guidelines for Americans. For men, the amount is slightly higher, ranging from 2,200 to 3,200 calories per day.</p>
                </div>
                <div class="col-lg-4 tip3 mb-4">
                    <p class="m-4">You need to eat more calories than your body burns to <span class="gain">gain weight</span>. Aim for 300–500 calories per day above your maintenance level for slow weight gain or 700–1,000 calories if you want to gain weight fast.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="recipes">
        <div class="recipes-info my-5 fw-bold text-center text-dark">
            <p class="display-4 fw-bold">Quick recipes</p><i class="fas fa-chevron-down display-3"></i>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item item-1 active">
                    <div class="container arousel-text h-100 p-5 d-flex flex-column justify-content-center align-items-center">
                        <div class="hero-shadow"> </div>
                        <p class="display-5">Couscous salad</p>
                        <p>Ingredients: 100g couscous, 200ml hot low salt vegetable stock (from a cube is fine), 2 spring onions, 1 red pepper, cucumber, 50g feta cheese, cubed, 2tbsp pesto, 2tbsp pine nuts </p>
                        <p class="d-none d-sm-block">Tip the couscous into a large bowl and pour over the stock. Cover, then leave for 10 mins until fluffy and all the stock has been absorbed. Meanwhile, slice the onions and pepper, and dice the cucumber. Add these to the couscous, fork through the pesto, crumble in the feta, then sprinkle over pine nuts to serve.</p>
                    </div>
                </div>
                <div class="carousel-item item-2">
                    <div class="container carousel-text h-100 p-5 d-flex flex-column justify-content-center align-items-center">
                        <div class="hero-shadow"> </div>
                        <p class="display-3">Sausage stroganoff tagliatelle</p>
                        <p>Ingredients: 20g unsalted butter, olive oil, for drizzling, 6 pork sausages, 350g chestnut mushrooms, sliced, 1 tsp sweet smoked paprika, 300ml soured cream, tbsp wholegrain mustard, 150ml beef stock, 400g dried tagliatelle</p>
                        <p class="d-none d-sm-block recipe">Heat the butter and oil in a frying pan over a medium-high heat until foaming. Squeeze large chunks of the sausagemeat out of the skins and into the pan. Cook for 5-8 mins or until golden brown. Add the mushrooms and cook for a further 5 mins until starting to turn brown. Stir through the paprika and cook for 1 min before stirring in the soured cream, mustard and stock. Bring to a simmer and season to taste.Meanwhile, cook the pasta in a large pan of salted water according to pack instructions, then add to the sauce with half the parsley. Serve in deep bowls with the remaining parsley sprinkled on top.</p>
                    </div>
                </div>
                <div class="carousel-item item-3">
                    <div class="container carousel-text h-100 p-5 d-flex flex-column justify-content-center align-items-center">
                        <div class="hero-shadow"></div>
                        <p class="display-5">Quick prawn, coconut & tomato curry</p>
                        <p>Ingredients: 2 tbsp vegetable oil, 1 medium onion , thinly sliced, 2 garlic cloves , sliced, 1 green chilli , deseeded and sliced, 3 tbsp curry paste, 1 tbsp tomato purée, 200ml vegetable stock, 200ml coconut cream, 350g raw prawn, coriander sprigs and rice, to serve</p>
                        <p class="d-none d-sm-block">Heat the oil in a large frying pan. Fry the onion, garlic and half the chilli for 5 mins or until softened. Add the curry paste and cook for 1 min more. Add the tomato purée, stock and coconut cream.
                            Simmer on medium heat for 10 mins, then add the prawns. Cook for 3 mins or until they turn opaque. Scatter on the remaining green chillies and coriander sprigs, then serve with rice.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <footer>
        <p>Calorie Calculator</p>
        <p class="py-3">Copyright © 2021 Łukasz Kiełczewski</p>
    </footer>
    <script>
        const breakfastChart = document.getElementById('breakfast-chart');
        const brunchChart = document.getElementById('brunch-chart');
        const lunchChart = document.getElementById('lunch-chart');
        const dinnerChart = document.getElementById('dinner-chart');
        const snackChart = document.getElementById('snack-chart');
        const supperChart = document.getElementById('supper-chart');

        // Draw the pie charts
        google.charts.setOnLoadCallback(drawSummaryChart);

        if (document.body.contains(breakfastChart)) {
            google.charts.setOnLoadCallback(drawBreakfastChart);
        }

        if (document.body.contains(brunchChart)) {
            google.charts.setOnLoadCallback(drawBrunchChart);
        }

        if (document.body.contains(lunchChart)) {
            google.charts.setOnLoadCallback(drawLunchChart);
        }

        if (document.body.contains(dinnerChart)) {
            google.charts.setOnLoadCallback(drawDinnerChart);
        }
        if (document.body.contains(snackChart)) {
            google.charts.setOnLoadCallback(drawSnackChart);
        }

        if (document.body.contains(supperChart)) {
            google.charts.setOnLoadCallback(drawSupperChart);
        }

        function validate_form(formElement) {
            let fat = formElement['fat'].value;
            let carbs = formElement['carbonhydrate'].value;
            let sugar = formElement['sugar'].value;
            let protein = formElement['protein'].value;

            if (fat !== "") {
                passedValidation = true;
            } else {
                alert('Please enter a fat value!');
                return false;
            }
            if (carbs !== "") {
                passedValidation = true;
            } else {
                alert('Please enter a carbs value!');
                return false;
            }
            if (sugar !== "") {
                passedValidation = true;
            } else {
                alert('Please enter a sugar value!');
                return false;
            }
            if (protein !== "") {
                passedValidation = true;
            } else {
                alert('Please enter a protein value!');
                return false;
            }

            return passedValidation;
        }
    </script>
    <script src="facts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</body>

</html>