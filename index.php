<?php
    session_start();

    if (!isset($_SESSION["tasks"])) {
       $_SESSION["tasks"] = array();
    }

    if (isset($_GET["task-name"])) {
        array_push($_SESSION["tasks"], $_GET["task-name"]);
        unset($_GET["task-name"]);
    }

    if (isset($_GET["clear"])) {
      unset($_SESSION["tasks"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>test</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Task Manager</h1>
    </div>
    <div class="form">
      <form action="" method="get">
        <label for="task-name">Task:</label>
        <input type="text" name="task-name" placeholder="Task Name">
        <button type="submit">Add</button>
      </form>
    </div>
    <div class="separator">
    </div>
    <div class="list-tasks">
      <?php
          if (isset($_SESSION["tasks"])) {
            echo "<ul>";

            foreach ($_SESSION["tasks"] as $key => $task) {
                echo "<li>$task</li>";
            }

            echo "</ul>";
          }
      ?>

      <form action="" method="get">
        <input type="hidden" name="clear" value="clear">
        <button type="submit" class="btn-clear">Clear Tasks</button>
      </form>
    </div>
    <div class="footer">
      <p>Developed by Nathan</p>
    </div>
  </div>
</body>
</html>
