<?php

require_once 'dbh.class.php';

class Summary extends Dbh
{
    public function getMacroStmt($sql, $nutrients)
    {
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            return $row['SUM(breakfast.' . $nutrients . ' + brunch.' . $nutrients . ' + lunch.' . $nutrients . ' + dinner.' . $nutrients . ' + snack.' . $nutrients . ' + supper.' . $nutrients . ')'];
        }
    }
    public function MealSummary($sql)
    {
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo
            'Name: ' . $row['name'] . '<br>' .
                'Fat: ' . $row['fat'] . 'g<br>' .
                'Carbonhydrate: ' . $row['carbonhydrate'] . 'g<br>' .
                'Sugar: ' . $row['sugar'] . 'g<br>' .
                'Protein: ' . $row['protein'] . 'g<br>' .
                'Nutritional Value: ' . $row['nutritionalValue'] . 'kcal';
        }
    }
    public function ChartInfo($sql)
    {
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo "['Fat', " . $row['fat'] . "],";
            echo "['Carbonhydrate', " . $row['carbonhydrate'] . "],";
            echo "['Sugar', " . $row['sugar'] . "],";
            echo "['Protein', " . $row['protein'] . "],";
        }
    }
}
