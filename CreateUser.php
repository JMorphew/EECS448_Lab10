<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "j537m641", "ahn7aewe", "j537m641");
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);exit();
    }
    // $query = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 50,5";
    $userID = $_POST["userID"];
    $query = "INSERT INTO Users (user_id) VALUES('$userID')";

    if ($result = $mysqli->query($query)) {
      echo "<h1>User " . $user_id . " was successfully created!</h1>";
    } else {
       printf("Error message: %s\n", $mysqli->error);
    }

    /* close connection */

    $mysqli->close();
?>
