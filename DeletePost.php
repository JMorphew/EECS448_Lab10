<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  // Check if anything was selected.
  if (!isset($_POST["deleteCheckboxes"])) {
    echo "<h1>No Posts Deleted!</h1>";
    echo "<p>No Post was selected to be removed!</p>";
    exit();
  }

  $boxes = $_POST["deleteCheckboxes"];
  $size = sizeof($boxes);

  if (!empty($boxes)) {
    $current_index = 1;
    $ids_to_delete = '';

    foreach ($boxes as $key => $value) {
      if ($current_index < $size) {
        $ids_to_delete = $ids_to_delete . ' \''. $value . '\',';
      } else {
        $ids_to_delete = $ids_to_delete . ' \''. $value . '\'';
      }

      $current_index++;
    }
  }

  $mysqli = new mysqli("mysql.eecs.ku.edu", "j537m641", "ahn7aewe", "j537m641");
  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error); exit();
  }

  $query = "DELETE FROM Posts WHERE post_id IN($ids_to_delete)";
  printf($query);

  if ($result = $mysqli->query($query)) {
    echo "<h1>Post(s) Successfully Deleted </h1>";
    echo "<p>Post with IDs were removed: " . $ids_to_delete . " </p>";
  } else {
     printf("Error message: %s\n", $mysqli->error);
  }

  /* close connection */

  $mysqli->close();
?>
