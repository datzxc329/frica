<?php

require_once("connection1.php");
if (!empty($_POST['country'])) {
    $query = "SELECT * FROM countries WHERE country LIKE '" . $_POST['country'] . "%' ORDER BY country";
    $db = DB::getInstance();
    $result = $db->query($query);
    if (!empty($result)) {
        echo "<ul id='countries'>";
        foreach ($result as $country) {
            echo "<li>" . $country['country'] . "</li>";
        }
        echo "</ul>";
    }
}