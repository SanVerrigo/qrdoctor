<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8"/>
</head>
<?php
include "db.php";
?>

Здравствуйте, <?php
echo htmlspecialchars(getFio());
$result = createUser();
if ($result->success()) {
    echo "New record successfully added";
    header('Location: user_info.php?id=' . $result->created_user_id);
} else {
    echo $result->error_message;
}
?>

<?php
function getFio()
{
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    return $surname . " " . $name . " " . $patronymic;
}

?>