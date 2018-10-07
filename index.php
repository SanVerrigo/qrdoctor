<!DOCTYPE html>
<html>
<head>
    <title>Hello there!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="content">
        <form action="create_user.php" method="post">
    <p>
        <label> Name:<br />
            <input type="text" name="name">
        </label>
    </p>
    <p>
    <label>Surname:<br />
        <input type="text" name="surname">
        </label>
    </p>
    <p>
    <label>Patronymic:<br />
        <input type="text" name="patronymic">
        </label>
    </p>
    <p>
    <label>Diseases:<br />
        <textarea name="diseases" rows="6"></textarea>
        </label>
    </p>
    <p>
    <label>How to help:<br />
        <textarea name="ways_for_help" rows="6"></textarea>
        </label>
    </p>

    <input type="hidden" name="act" value="run">
    <input type="submit" value="Записать">
</form>
        </div>
        <div class="footer"></div>
    </div>    



<?php
if (!empty($_REQUEST['act'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qrdoctor";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO user (name, surname, patronymic, diseases, ways_for_help)
      VALUES ('{$_REQUEST['name']}', '{$_REQUEST['surname']}', '{$_REQUEST['patronymic']}', '{$_REQUEST['diseases']}', '{$_REQUEST['ways_for_help']}')";
    if ($conn->query($sql) === TRUE) {
        echo "New record successfully added";
    } else {
        echo "Error: " . $sql . "<br />" . $conn->error;
    }
    $conn->close();
}
?>
</body>
</html>
