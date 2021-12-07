<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    $user_id = $_POST["userID"];

    printf($user_id);

    echo "<table border=1 style=\"text-align: center\">";
    // Draw first headder column.
    echo "<tr>";
    echo "<th>Post ID</th><th>Content</th>";
    echo "</tr>";

    $mysqli = new mysqli("mysql.eecs.ku.edu", "j537m641", "ahn7aewe", "j537m641");
    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);exit();
    }

    $query = "SELECT * FROM Posts WHERE author_id = '$user_id'";

    if ($result = $mysqli->query($query)) {
      /* fetch associative array */
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["post_id"] . "</td>";
        echo "<td>" . $row["content"] . "</td>";
        echo "</tr>";
      }
      /* free result set */
      $result->free();
    } else {
       printf("Error message: %s\n", $mysqli->error);
    }

    /* close connection */

    $mysqli->close();
?>
