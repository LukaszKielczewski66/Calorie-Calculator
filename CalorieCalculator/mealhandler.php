<?php
session_start();

if (!isset($_SESSION['logged'])) {
  header('Location: index.php');
  exit();
}

include 'classes/meal.class.php';
include 'classes/summary.class.php';
include 'classes/flag.class.php';
include 'sqlQueries.php';

// **********************BACK TO PAGE.PHP AFTER SUBMIT*******************
if (isset($_POST['fat'])) {
  header('Location: page.php');
}

// ******************CREATE MEAL BREAKFAST AND ADD MACROS TO DATABASE**********************

if (isset($_POST['breakfastName'])) {
  $breakfast = new Meal();
  $breakfastNutritions = $breakfast->nutritionCalc($_POST['fat'], $_POST['carbonhydrate'], $_POST['protein']);
  $breakfast->setMacroStmt($_POST['breakfastName'], $_POST['fat'], $_POST['carbonhydrate'], $_POST['sugar'], $_POST['protein'], $breakfastNutritions, 0, $breakfastAdd);
}

// ******************CREATE BRUNCH AND ADD MACROS TO DATABASE**********************

if (isset($_POST['brunchName'])) {
  $brunch = new Meal();
  $brunchNutritions = $brunch->nutritionCalc($_POST['fat'], $_POST['carbonhydrate'], $_POST['protein']);
  $brunch->setMacroStmt($_POST['brunchName'], $_POST['fat'], $_POST['carbonhydrate'], $_POST['sugar'], $_POST['protein'], $brunchNutritions, 0, $brunchAdd);
}

// ******************CREATE LUNCH AND ADD MACROS TO DATABASE**********************

if (isset($_POST['lunchName'])) {
  $lunch = new Meal();
  $lunchNutritions = $lunch->nutritionCalc($_POST['fat'], $_POST['carbonhydrate'], $_POST['protein']);
  $lunch->setMacroStmt($_POST['lunchName'], $_POST['fat'], $_POST['carbonhydrate'], $_POST['sugar'], $_POST['protein'], $lunchNutritions, 0, $lucnhAdd);
}

// ******************CREATE DINNER AND ADD MACROS TO DATABASE**********************

if (isset($_POST['dinnerName'])) {
  $dinner = new Meal();
  $dinnerNutritions = $dinner->nutritionCalc($_POST['fat'], $_POST['carbonhydrate'], $_POST['protein']);
  $dinner->setMacroStmt($_POST['dinnerName'], $_POST['fat'], $_POST['carbonhydrate'], $_POST['sugar'], $_POST['protein'], $dinnerNutritions, 0, $dinnerAdd);
}

// ******************CREATE SNACK AND ADD MACROS TO DATABASE**********************

if (isset($_POST['snackName'])) {
  $snack = new Meal();
  $snackNutritions = $snack->nutritionCalc($_POST['fat'], $_POST['carbonhydrate'], $_POST['protein']);
  $snack->setMacroStmt($_POST['snackName'], $_POST['fat'], $_POST['carbonhydrate'], $_POST['sugar'], $_POST['protein'], $snackNutritions, 0, $snackAdd);
}

// ******************CREATE SUPPER AND ADD MACROS TO DATABASE**********************

if (isset($_POST['supperName'])) {
  $supper = new Meal();
  $supperNutritions = $supper->nutritionCalc($_POST['fat'], $_POST['carbonhydrate'], $_POST['protein']);
  $supper->setMacroStmt($_POST['supperName'], $_POST['fat'], $_POST['carbonhydrate'], $_POST['sugar'], $_POST['protein'], $supperNutritions, 0, $supperAdd);
}

// ************************************TOTAL COUNTER******************************************

// FAT SUMMARY
$fatSummary = new Summary();
$_SESSION['totalFat'] = $fatSummary->getMacroStmt($fat_query, $fat);

// CARBS SUMMARY
$carbonhydrateSummary = new Summary();
$_SESSION['totalCarbonhydrate'] = $carbonhydrateSummary->getMacroStmt($carbonhydrates_query, $carbonhydrate);

// SUGAR SUMMARY
$sugarSummary = new Summary();
$_SESSION['totalSugar'] = $sugarSummary->getMacroStmt($sugar_query, $sugar);

// PROTEIN SUMMARY
$proteinSummary = new Summary();
$_SESSION['totalProtein'] = $proteinSummary->getMacroStmt($proteins_query, $protein);

//TOTAL KCAL SUMMARY
$nutritionsSummary = new Summary();
$_SESSION['totalNutritions'] = $nutritionsSummary->getMacroStmt($nutritionsQuery, $nutritionalValue);


// *********************************RESET BREAKFAST FLAG***********************
$breakfastFlag = new Flag();
$breakfastFlagValue = $breakfastFlag->getFlagValue($breakfastFlagQuery);

if (isset($_POST['resetBreakfast'])) {
  $breakfastFlag->changeFlagValue($resetBreakfast, $userID);
  header('Location: page.php');
}
// *********************************RESET BRUNCH FLAG***********************

$brunchFlag = new Flag();
$brunchFlagValue = $brunchFlag->getFlagValue($brunchFlagQuery);

if (isset($_POST['resetBrunch'])) {
  $brunchFlag->changeFlagValue($resetBrunch, $userID);
  header('Location: page.php');
}
// *********************************RESET LUNCH FLAG***********************
$lunchFlag = new Flag();
$lunchFlagValue = $lunchFlag->getFlagValue($lunchFlagQuery);

if (isset($_POST['resetLunch'])) {
  $lunchFlag->changeFlagValue($resetLunch, $userID);
  header('Location: page.php');
}
// *********************************RESET DINNER FLAG***********************
$dinnerFlag = new Flag();
$dinnerFlagValue = $dinnerFlag->getFlagValue($dinnerFlagQuery);

if (isset($_POST['resetDinner'])) {
  $dinnerFlag->changeFlagValue($resetDinner, $userID);
  header('Location: page.php');
}
// *********************************RESET SNACK FLAG***********************
$snackFlag = new Flag();
$snackFlagValue = $snackFlag->getFlagValue($snackFlagQuery);

if (isset($_POST['resetSnack'])) {
  $snackFlag->changeFlagValue($resetSnack, $userID);
  header('Location: page.php');
}
// *********************************RESET SUPPER FLAG***********************
$supperFlag = new Flag();
$supperFlagValue = $supperFlag->getFlagValue($supperFlagQuery);

if (isset($_POST['resetSupper'])) {
  $supperFlag->changeFlagValue($resetSupper, $userID);
  header('Location: page.php');
}
