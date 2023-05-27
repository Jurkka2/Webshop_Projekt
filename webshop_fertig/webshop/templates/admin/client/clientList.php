<?php
require_once('../../../classes/Database.php');;

$mysql = new mysqli('localhost', 'root', '', 'webshop');

if(!empty($_POST['insert'])) {
    $stmt = $mysql->prepare(
        "INSERT INTO client(
            first_name,
            last_name,
            email, 
            gender, 
            password,
            date_birth,
            phone_number,
            city,
            street,
            building_number,
            zip
        ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $firstName = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dateOfBirth = $_POST['date_birth'];
    $phoneNumber = $_POST['phone_number'];
    $city = $_POST['city'];
    $street = $_POST['street'];
    $buildingNumber = intval($_POST['building_number']);
    $zip = intval($_POST['zip']);

    $stmt->bind_param(
        'sssssssssii',
        $firstName,
        $lastname,
        $email,
        $gender,
        $password,
        $dateOfBirth,
        $phoneNumber,
        $city,
        $street,
        $buildingNumber,
        $zip
    );

    $stmt->execute();
}

$db = new Database;
if(isset($_POST['delete'])) {
    $db->deleteTableRow("client", "id", $_POST["delete"]);
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Clients</title>
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
        <div class="overflow-auto">
            <table class="table table-striped table-hover overflow-auto">
                <thead>
                    <tr>
                        <td class="text-center" style="width: 50px;">ID</td>
                        <td class="text-center" style="width: 200px;">First Name</td>
                        <td class="text-center" style="width: 200px;">Last Name</td>
                        <td class="text-center" style="width: 200px;">Email</td>
                        <td class="text-center" style="width: 50px;">Gender</td>
                        <td class="text-center" style="width: 300px;">Password</td>
                        <td class="text-center" style="width: 100px;">Date of Birth</td>
                        <td class="text-center" style="width: 150px;">Phone Number</td>
                        <td class="text-center" style="width: 200px;">City</td>
                        <td class="text-center" style="width: 200px;">Street</td>
                        <td class="text-center" style="width: 50px;">Building NUmber</td>
                        <td class="text-center" style="width: 100px;">Zip</td>
                        <td class="text-center" style="width: 50px;">Active</td>
                        <td class="text-center" style="width: 100px;">Options</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($db->getTableData("client") as $clientData) { ?>
                    <tr>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $clientData[0] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 200px;">
                                <?= $clientData[1] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 200px;">
                                <?= $clientData[2] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 200px;">
                                <?= $clientData[3] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $clientData[4] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto overflow-auto" style="width: 300px;">
                                <?= $clientData[5] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <?= $clientData[6] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 150px;">
                                <?= $clientData[7] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 200px;">
                                <?= $clientData[8] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 200px">
                                <?= $clientData[9] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $clientData[10] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <?= $clientData[11] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $clientData[12] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <div><a href="editClient.php?id=<?=$clientData[0]?>" class="btn btn-outline-info">Edit</a></div>
                                <form action="clientList.php" method="post">
                                    <div class="mt-1">
                                        <button class="btn btn-outline-danger" type="submit" name="delete" id="delete" value="<?= $clientData[0] ?>">
                                            Delete
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
