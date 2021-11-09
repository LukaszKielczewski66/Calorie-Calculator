<?php
$userID = $_SESSION['id'];

$fat = 'fat';
$carbonhydrate = 'carbonhydrate';
$sugar = 'sugar';
$protein = 'protein';
$nutritionalValue = 'nutritionalValue';



// ********************************************************************
// **********************TOTAL COUNTER*********************************
// ********************************************************************

// QUERY ABOUT TOTAL FAT
$fat_query = "SELECT SUM(breakfast.fat + brunch.fat + lunch.fat + dinner.fat + snack.fat + supper.fat) FROM breakfast, brunch, lunch, dinner, snack, supper WHERE breakfast.user_id = $userID AND brunch.user_id = $userID AND lunch.user_id = $userID AND dinner.user_id = $userID AND snack.user_id = $userID AND supper.user_id = $userID";

// QUERY ABOUT TOTAL CARBS
$carbonhydrates_query = "SELECT SUM(breakfast.carbonhydrate + brunch.carbonhydrate + lunch.carbonhydrate + dinner.carbonhydrate + snack.carbonhydrate + supper.carbonhydrate) FROM breakfast, brunch, lunch, dinner, snack, supper WHERE breakfast.user_id = $userID AND brunch.user_id = $userID AND lunch.user_id = $userID AND dinner.user_id = $userID AND snack.user_id = $userID AND supper.user_id = $userID";

// QUERY ABOUT TOTAL SUGAR
$sugar_query = "SELECT SUM(breakfast.sugar + brunch.sugar + lunch.sugar + dinner.sugar + snack.sugar + supper.sugar) FROM breakfast, brunch, lunch, dinner, snack, supper WHERE breakfast.user_id = $userID AND brunch.user_id = $userID AND lunch.user_id = $userID AND dinner.user_id = $userID AND snack.user_id = $userID AND supper.user_id = $userID";

// QUERY ABOUT TOTAL PROTEINS
$proteins_query = "SELECT SUM(breakfast.protein + brunch.protein + lunch.protein + dinner.protein + snack.protein + supper.protein) FROM breakfast, brunch, lunch, dinner, snack, supper WHERE breakfast.user_id = $userID AND brunch.user_id = $userID AND lunch.user_id = $userID AND dinner.user_id = $userID AND snack.user_id = $userID AND supper.user_id = $userID";

// QUERY ABOUT TOTAL NUTRITIONS
$nutritionsQuery = "SELECT SUM(breakfast.nutritionalValue + brunch.nutritionalValue + lunch.nutritionalValue + dinner.nutritionalValue + snack.nutritionalValue + supper.nutritionalValue) FROM breakfast, brunch, lunch, dinner, snack, supper WHERE breakfast.user_id = $userID AND brunch.user_id = $userID AND lunch.user_id = $userID AND dinner.user_id = $userID AND snack.user_id = $userID AND supper.user_id = $userID";


// *************************************************************************
// ****************************ADD TO MEAL DATABASE*************************
// *************************************************************************


// ADD BREAKFAST
$breakfastAdd = "UPDATE breakfast 
SET name = ?, fat = ?, carbonhydrate = ?, sugar = ?, protein = ?, nutritionalValue = ?, flag = ? WHERE user_id = $userID";

// ADD BRUNCH
$brunchAdd = "UPDATE brunch 
SET name = ?, fat = ?, carbonhydrate = ?, sugar = ?, protein = ?, nutritionalValue = ?, flag = ? WHERE user_id = $userID";

// ADD LUNCH
$lucnhAdd = "UPDATE lunch 
SET name = ?, fat = ?, carbonhydrate = ?, sugar = ?, protein = ?, nutritionalValue = ?, flag = ? WHERE user_id = $userID";

// ADD DINNER
$dinnerAdd = "UPDATE dinner 
SET name = ?, fat = ?, carbonhydrate = ?, sugar = ?, protein = ?, nutritionalValue = ?, flag = ? WHERE user_id = $userID";

// SNACK ADD 
$snackAdd = "UPDATE snack 
SET name = ?, fat = ?, carbonhydrate = ?, sugar = ?, protein = ?, nutritionalValue = ?, flag = ? WHERE user_id = $userID";

// SUPPER ADD
$supperAdd = "UPDATE supper 
SET name = ?, fat = ?, carbonhydrate = ?, sugar = ?, protein = ?, nutritionalValue = ?, flag = ? WHERE user_id = $userID";

// ************************************************************************************
// ***********************************RESET MEAL***************************************
// ************************************************************************************


// REESET BREAKFAST 
$resetBreakfast = "UPDATE breakfast SET name='', fat = 0, carbonhydrate = 0, sugar = 0, protein = 0, nutritionalValue = 0, flag = 1 WHERE user_id = ?";

// RESET BRUNCH 
$resetBrunch = "UPDATE brunch SET name='', fat = 0, carbonhydrate = 0, sugar = 0, protein = 0, nutritionalValue = 0, flag = 1 WHERE user_id = ?;";

// RESET LUNCH 
$resetLunch = "UPDATE lunch SET name='', fat = 0, carbonhydrate = 0, sugar = 0, protein = 0, nutritionalValue = 0, flag = 1 WHERE user_id = ?;";

// RESET DINNER 
$resetDinner = "UPDATE dinner SET name='', fat = 0, carbonhydrate = 0, sugar = 0, protein = 0, nutritionalValue = 0, flag = 1 WHERE user_id = ?;";

// RESET SNACK 
$resetSnack = "UPDATE snack SET name='', fat = 0, carbonhydrate = 0, sugar = 0, protein = 0, nutritionalValue = 0, flag = 1 WHERE user_id = ?;";

// RESET SUPPER 
$resetSupper = "UPDATE supper SET name='', fat = 0, carbonhydrate = 0, sugar = 0, protein = 0, nutritionalValue = 0, flag = 1 WHERE user_id = ?;";


// ************************************************************************************
// ***********************************FLAG QUERIES*************************************
// ************************************************************************************


// BREAKFAST FLAG
$breakfastFlagQuery = "SELECT flag FROM breakfast WHERE user_id = $userID";

// BRUNCH FLAG
$brunchFlagQuery = "SELECT flag FROM brunch WHERE user_id = $userID";

// LUNCH FLAG
$lunchFlagQuery = "SELECT flag FROM lunch WHERE user_id = $userID";

// DINNER FLAG
$dinnerFlagQuery = "SELECT flag FROM dinner WHERE user_id = $userID";

//SNACK FLAG
$snackFlagQuery = "SELECT flag FROM snack WHERE user_id = $userID";

//SUPPER FLAG
$supperFlagQuery = "SELECT flag FROM supper WHERE user_id = $userID";


// SUMMARY QUERIES

$sqlForBreakfast = "SELECT name, fat, carbonhydrate, sugar, protein, nutritionalValue from breakfast WHERE user_id = '$userID'";

$sqlForBrunch = "SELECT name, fat, carbonhydrate, sugar, protein, nutritionalValue from brunch WHERE user_id = '$userID'";

$sqlForLunch = "SELECT name, fat, carbonhydrate, sugar, protein, nutritionalValue from lunch WHERE user_id = '$userID'";

$sqlForDinner = "SELECT name, fat, carbonhydrate, sugar, protein, nutritionalValue from dinner WHERE user_id = '$userID'";

$sqlForSnack = "SELECT name, fat, carbonhydrate, sugar, protein, nutritionalValue from snack WHERE user_id = '$userID'";

$sqlForSupper = "SELECT name, fat, carbonhydrate, sugar, protein, nutritionalValue from supper WHERE user_id = '$userID'";


// CHART QUERIES 

$breakfastSqlChart = "SELECT fat, carbonhydrate, sugar, protein FROM breakfast WHERE user_id = $userID";
$brunchSqlChart = "SELECT fat, carbonhydrate, sugar, protein FROM brunch WHERE user_id = $userID";
$lunchSqlChart = "SELECT fat, carbonhydrate, sugar, protein FROM lunch WHERE user_id = $userID";
$dinnerSqlChart = "SELECT fat, carbonhydrate, sugar, protein FROM dinner WHERE user_id = $userID";
$snackSqlChart = "SELECT fat, carbonhydrate, sugar, protein FROM snack WHERE user_id = $userID";
$supperSqlChart = "SELECT fat, carbonhydrate, sugar, protein FROM supper WHERE user_id = $userID";
