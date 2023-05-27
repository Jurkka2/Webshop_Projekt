<?php

$mysql = new mysqli('localhost', 'root', '', 'webshop');

if(isset($_POST['update'])) {
    $stmt = $mysql->prepare("
        UPDATE admin_user
           SET first_name = ?,
               last_name = ?,
               email = ?
         WHERE id = ".$_GET['id']
    );

    $stmt->bind_param(
        'sss',
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email']
    );

    $stmt->execute();
} else {
    require_once('../../../classes/Database.php');;

    $db = new Database;

    $adminUserData = $db->getTableRowData('admin_user', "id", $_GET['id']);
}

$mysql->close();

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Edit Backend User</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="starter-template.css" rel="stylesheet"><!-- Custom styles for this template -->
</head>
<body>
<div class="row">
    <div class="col-3"><?php include '../navigation.php'; ?></div>
    <div class="col-9">
        <div>
            <form class="form-horizontal" action="editBackendUser.php?id=<?= $_GET['id'] ?>" method="post">
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="first_name">First Name</label>
                    <div class="col-md-10">
                        <input required type="text" name="first_name" id="first_name" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['first_name'] : $adminUserData[0][1]) ?>">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="last_name">Last Name</label>
                    <div class="col-md-10">
                        <input required type="text" name="last_name" id="last_name" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['last_name'] : $adminUserData[0][2]) ?>">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="email">Email</label>
                    <div class="col-md-10">
                        <input required type="text" name="email" id="email" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['email'] : $adminUserData[0][3]) ?>">
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" name="update" id="update" value="true" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
