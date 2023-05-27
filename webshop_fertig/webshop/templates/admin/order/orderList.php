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

    $stmt->bind_param(
        'sssssssssii',
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['gender'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        $_POST['date-birth'],
        $_POST["phone_number"],
        $_POST["city"],
        $_POST["street"],
        intval($_POST["building_number"]),
        intval($_POST["zip"])
    );

    $stmt->execute();
}

$db = new Database;
if(isset($_POST['delete'])) {
    $db->deleteTableRow("product", "id", $_POST["delete"]);
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Orders</title>
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
                        <td class="text-center" style="width: 150px;">Client ID</td>
                        <td class="text-center" style="width: 300px;">Order Date</td>
                        <td class="text-center" style="width: 250px;">Product Name</td>
                        <td class="text-center" style="width: 100px;">Quantity</td>
                        <td class="text-center" style="width: 100px;">Options</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($db->getTableData("orders") as $orderData) { ?>
                    <tr>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $orderData[0] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 300px;">
                                <?= $orderData[1] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 150px;">
                                <?= date("m.d.y" , strtotime($orderData[2])) ?>
                            </div>
                        </td>
                        <td class="text-center">
                        <?php foreach($db->getTableRowData("ordered_items", "order_id", $orderData[0]) as $orderedItems) {
                            $productData = $db->getTableRowData("product", "id", $orderedItems[2]); ?>
                            <?php foreach($productData as $product) { ?>
                                <div class="m-auto pb-3" style="width: 250px;">
                                    <?= $product[1] ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php foreach($db->getTableRowData("ordered_items", "order_id", $orderData[0]) as $orderedItems) { ?>
                                <div class="m-auto pb-3" style="width: 100px;">
                                    <?= $orderedItems[3] ?>
                                </div>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <form action="orderList.php" method="post">
                                    <div class="mt-1">
                                        <button class="btn btn-outline-danger" type="submit" name="delete" id="delete" value="<?= $orderData[0] ?>">
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
