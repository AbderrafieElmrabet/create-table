<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    input {
      margin: 10px;
    }
  </style>
</head>

<body>
  <form method="POST" action="">
    choose database:
    <input placeholder="database" type="text" name="database">
    table name:
    <input placeholder="table" type="text" name="table">
    <br>Rows<br>
    <input placeholder="row 1" type="text" name="row1"><br>
    <input placeholder="row 2" type="text" name="row2"><br>
    <input placeholder="row 3" type="text" name="row3"><br>
    <input placeholder="row 4" type="text" name="row4"><br>
    <input placeholder="row 5" type="text" name="row5">
    <br>
    <input type="submit" value="create table">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = $_POST["database"];
    $table = $_POST["table"];
    $row1 = $_POST["row1"];
    $row2 = $_POST["row2"];
    $row3 = $_POST["row3"];
    $row4 = $_POST["row4"];
    $row5 = $_POST["row5"];

    if (!empty($_POST["database"]) && !empty($_POST["table"])) {
      try {
        $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $connect->exec("CREATE TABLE $table(
        $row1 INT(6) NOT NULL,
        $row2 VARCHAR(30) NOT NULL,
        $row3 VARCHAR(30) NOT NULL,
        $row4 VARCHAR(30) NOT NULL,
        $row5 VARCHAR(30) NOT NULL
      )");
        echo "tables created successfully";
      } catch (PDOException $e) {
        echo "creation failed!: " .  $e->getMessage();
      }
    } else {
      echo "please dont leave any empty inputs!";
    }
  }
  ?>
</body>

</html>