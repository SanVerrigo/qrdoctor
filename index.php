<!DOCTYPE html>
<html>
<head>
    <title>Hello there!</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="index.php" method="post">
    <p>
        Name:
        <input type="text" name="name">
    </p>
    <p>
        Surname:
        <input type="text" name="surname">
    </p>
    <p>
        Patronymic:
        <input type="text" name="patronymic">
    </p>
    <p>
        Diseases:
        <textarea name="diseases" rows="6"></textarea>
    </p>
    <p>
        How to help:
        <textarea name="ways_for_help" rows="6"></textarea>
    </p>

    <input type="hidden" name="act" value="run">
    <input type="submit" value="Записать">
</form>

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
    $sql = "INSERT INTO user (name, surname, patronymic, deseases, ways_for_help)
      VALUES ('{$_REQUEST['name']}', '{$_REQUEST['surname']}', '{$_REQUEST['patronymic']}', '{$_REQUEST['diseases']}', '{$_REQUEST['ways_for_help']}')";
    if ($conn->query($sql) === TRUE) {
        echo "New record successfully added";
    } else {
        echo "Error: " . $sql . "<br />" . $conn->error;
    }
    $conn->close();
}

/**
 * Created by PhpStorm.
 * User: Verrigo
 * Date: 28.09.2018
 * Time: 14:46
 */
?>
</body>
</html>
