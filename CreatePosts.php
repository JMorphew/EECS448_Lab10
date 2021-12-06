<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "j537m641", "ahn7aewe", "j537m641");
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);exit();
    }
    // $query = "SELECT Name, CountryCode FROM City ORDER by ID DESC LIMIT 50,5";
    $content = $_POST["content"];
    $author_id = $_POST["authorID"];
    echo "<p>" . $content . " </p>";
    if ($content == "") {
      $query = "INSERT INTO Posts (content, author_id) VALUES(NULL, '$author_id')";
    } else {
      $query = "INSERT INTO Posts (content, author_id) VALUES('$content', '$author_id')";
    }


    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      // while ($row = $result->fetch_assoc()) {
      //   printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
      // }
      /* free result set */
      $result->free();
    } else {
       printf("Error message: %s\n", $mysqli->error);
    }

    /* close connection */

    $mysqli->close();
?>
