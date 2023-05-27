<?php

$mysql = new mysqli('localhost', 'root', '', 'webshop');

if(isset($_POST['update'])) {
    $stmt = $mysql->prepare(
        "UPDATE client
        SET first_name = ?,
            last_name = ?,
            email = ?, 
            gender = ?, 
            date_birth = ?,
            phone_number = ?,
            city = ?,
            street = ?,
            building_number = ?,
            zip = ?
        WHERE id = ". $_GET['id']
    );

    $firstName = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['date_birth'];
    $phoneNumber = $_POST['phone_number'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $buildingNumber = intval($_POST['building_number']);
    $zip = intval($_POST['zip']);

    $stmt->bind_param(
        'ssssssssii',
        $firstName,
        $lastname,
        $email,
        $gender,
        $dateOfBirth,
        $phoneNumber,
        $city,
        $street,
        $buildingNumber,
        $zip
    );

    $stmt->execute();
} else {
    require_once('../../../classes/Database.php');;

    $db = new Database;

    $clientData = $db->getTableRowData('client', "id", $_GET['id']);
}

$mysql->close();

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Edit Client</title>
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
        <form class="form-horizontal" action="editClient.php?id=<?= $_GET['id'] ?>" method="post">
            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="first_name">First Name</label>
                <div class="col-md-10">
                    <input required type="text" name="first_name" id="first_name" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['first_name'] : $clientData[0][1]) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="last_name">Last Name</label>
                <div class="col-md-10">
                    <input required type="text" name="last_name" id="last_name" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['last_name'] : $clientData[0][2]) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="email">Email</label>
                <div class="col-md-10">
                    <input required type="text" name="email" id="email" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['email'] : $clientData[0][3]) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="gender">Gender</label>
                <div class="col-md-10">
                    <select name="gender" id="gender" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['gender'] : $clientData[0][4]) ?>">
                        <option value="">Choose...</option>
                        <option value="male">Männlich</option>
                        <option value="female">Weiblich</option>
                        <option value="other">Anderes</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="date_birth">Date of Birth</label>
                <div class="col-md-10">
                    <input required type="text" name="date_birth" id="date_birth" class="form-control" placeholder="DD/MM/YYYY"  value="<?= (isset($_POST['update']) ? $_POST['date_birth'] : date("d.m.Y", strtotime($clientData[0][6]))) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="phone_number">Phone Number</label>
                <div class="col-md-10">
                    <input required type="text" name="phone_number" id="phone_number" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['phone_number'] : $clientData[0][7]) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="city">City</label>
                <div class="col-md-10">
                    <input required type="text" name="city" id="city" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['city'] : $clientData[0][8]) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="street">Street</label>
                <div class="col-md-10">
                    <input required type="text" name="street" id="street" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['street'] : $clientData[0][9]) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="building_number">Building Number</label>
                <div class="col-md-10">
                    <input required type="number" name="building_number" id="building_number" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['building_number'] : $clientData[0][10]) ?>">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <label class="col-md-2 m-0" for="zip">Zip</label>
                <div class="col-md-10">
                    <input required type="number" name="zip" id="zip" class="form-control" value="<?= (isset($_POST['update']) ? $_POST['zip'] : $clientData[0][11]) ?>">
                </div>
            </div>

            <div class="text-end">
                <button type="submit" name="update" id="update" value="true" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
