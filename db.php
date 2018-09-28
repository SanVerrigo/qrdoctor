<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8"/>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: Verrigo
 * Date: 28.09.2018
 * Time: 19:24
 */
define("SERVER_NAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB_NAME", "qrdoctor");
define("UTF8", "uft8");

function getConn()
{
    $conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DB_NAME);
    $conn->set_charset(UTF8);
    return $conn;
}

function createUser()
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $diseases = $_POST['diseases'];
    $waysForHelp = $_POST['ways_for_help'];

    $conn = getConn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO user (name, surname, patronymic, diseases, ways_for_help) 
VALUES ('$name', '$surname', '$patronymic', '$diseases', '$waysForHelp')";
    if ($conn->query($sql) === TRUE) {
        $userId = $conn->insert_id;
        $_POST = array();
        $result = new CreateUserResult($userId, null);
    } else {
        $error_message = "Error: " . $sql . "<br />" . $conn->error;
        $result = new CreateUserResult(null, $error_message);
    }
    $conn->close();
    return $result;
}

class CreateUserResult
{
    public $created_user_id;
    public $error_message = "";

    function __construct($created_user_id, $error_message)
    {
        $this->created_user_id = $created_user_id;
        $this->error_message = $error_message;
    }

    public function success()
    {
        global $error_message;
        return $error_message == null;
    }
}

class GetUserResult
{
    public $user_data;
    public $error_message = "";

    function __construct($user_data, $error_message)
    {
        $this->user_data = $user_data;
        $this->error_message = $error_message;
    }

    public function success()
    {
        global $error_message;
        return $error_message == null;
    }
}

function getUser($id)
{
    $conn = getConn();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM user WHERE id = '$id'";
    if ($result = $conn->query($sql)) {
        $user = $result->fetch_assoc();
        $result = new GetUserResult($user, null);
    } else {
        $error_message = "Error: " . $sql . "<br />" . $conn->error;
        $result = new GetUserResult(null, $error_message);
    }
    $conn->close();
    return $result;
}

?>