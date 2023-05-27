<?php
require_once('../../classes/Database.php');;

$db = new Database;
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Webshop AdminSection</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="starter-template.css" rel="stylesheet"><!-- Custom styles for this template -->
</head>
<body>
    <div class="row">
        <div class="col-3"><?php include 'navigation.php'; ?></div>
        <div class="col-9">
            <div class="row">
                <div class="order-card col-6">
                    <span>Currently a Total of <?= count($db->getTableData("orders")); ?> Orders</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

