<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Qr-Doctor!</title>
</head>
<body>
<h1>Qr-Doctor!</h1>
<?php
include 'db.php'
?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            id
        </div>
        <div class="col-sm">
            Фамилия
        </div>
        <div class="col-sm">
            Имя
        </div>
        <div class="col-sm">
            Отчество
        </div>
        <div class="w-100"></div>
        <div class="col-sm">
            <?php echo getId() ?>
        </div>
        <div class="col-sm">
            <?php echo getSurname() ?>
        </div>
        <div class="col-sm">
            <?php echo getName() ?>
        </div>
        <div class="col-sm">
            <?php echo getPatronymic() ?>
        </div>
        <div class="w-100"></div>
    </div>
</div>

<?php
function getName()
{
    $user = getUser($_GET['id'])->user_data;
    return $user['name'];
}

function getSurname()
{
    $user = getUser($_GET['id'])->user_data;
    return $user['surname'];
}

function getPatronymic()
{
    $user = getUser($_GET['id'])->user_data;
    return $user['patronymic'];
}

function getId()
{
    $user = getUser($_GET['id'])->user_data;
    return $user['id'];
}

?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>