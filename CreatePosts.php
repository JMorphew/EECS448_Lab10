<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "j537m641", "ahn7aewe", "j537m641");
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);exit();
    }
    $content = $_POST["content"];
    $author_id = $_POST["authorID"];

    if ($content == "") {
      $query = "INSERT INTO Posts (content, author_id) VALUES(NULL, '$author_id')";
    } else {
      $query = "INSERT INTO Posts (content, author_id) VALUES('$content', '$author_id')";
    }

    if ($result = $mysqli->query($query)) {
      echo "<h1>Post made by " . $author_id . " was successfully created!</h1>";
      echo "<p>Post: " . $content . " </p>";
    } else {
       printf("Error message: %s\n", $mysqli->error);
    }

    /* close connection */

    $mysqli->close();
?>
