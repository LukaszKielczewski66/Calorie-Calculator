<?php

require_once 'dbh.class.php';

class Meal extends Dbh
{
    public function nutritionCalc($fat, $carbs, $protein)
    {
        return ($fat * 9) + ($carbs * 4) + ($protein * 4);
    }
    public function setMacroStmt($name, $fat, $carbs, $sugar, $protein, $nutritionalValue, $flag, $sql)
    {
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $fat, $carbs, $sugar, $protein, $nutritionalValue, $flag]);
    }
}
