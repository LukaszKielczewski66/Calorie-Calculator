<?php

require_once 'dbh.class.php';

class Flag extends Dbh
{
    public function getFlagValue($sql)
    {
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            return $row['flag'];
        }
    }
    public function changeFlagValue($sql, $userID)
    {
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userID]);
    }
}
