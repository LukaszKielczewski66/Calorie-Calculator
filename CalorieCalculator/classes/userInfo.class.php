<?php
require_once 'dbh.class.php';

class UserInfo extends Dbh
{
    public function addUserInfo($age, $height, $weight, $activity, $gender, $CPM, $userID)
    {
        $sql = "UPDATE users SET age = ?, weight = ?, height = ?, activity = ?, gender = ?, cpm = ? WHERE ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$age, $height, $weight, $activity, $gender, $CPM, $userID]);
    }
    public function getUserInfo($userID)
    {
        $sql = "SELECT age, height, weight, cpm FROM users WHERE ID = $userID";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo
            '<div class="col-lg-6"><div class="user-container d-flex justify-content-center py-4">',
            '<i class="fas fa-user-clock"></i><p class="mx-4">' . $row['age'] . ' years old<p></div>',
            '<div class="user-container d-flex justify-content-center py-4">',
            '<i class="fas fa-user"></i><p class="mx-4">' . $row['height'] . ' cm<p></div></div>',
            '<div class="col-lg-6"><div class="user-container d-flex justify-content-center py-4">',
            '<i class="fas fa-weight"></i><p class="mx-4">' . $row['weight'] . ' kg<p></div>',
            '<div class="user-container d-flex justify-content-center py-4">',
            '<i class="fas fa-apple-alt"></i><p class="mx-4">' . $row['cpm'] . ' - Your Caloric Demand<p></div></div>';
        }
    }
}
