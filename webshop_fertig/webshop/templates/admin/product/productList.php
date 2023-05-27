<?php
require_once('../../../classes/Database.php');;

$mysql = new mysqli('localhost', 'root', '', 'webshop');

if(!empty($_POST['insert'])) {
    $stmt = $mysql->prepare(
        "INSERT INTO product(
            `name`,
            `ean`,
            `price`, 
            `weight`,
            `brand`,
            `description`,
            `nische_product`,
            `image_url`
        ) VALUES(?, ?, ?, ?, ?, ?, ?, ?)
    ");

    $productName = $_POST['product_name'];
    $productEan = intval($_POST['ean']);
    $productPrice = intval($_POST['price']);
    $productWeight = intval($_POST['weight']);
    $productBrand = $_POST['brand'];
    $productDescription = $_POST['description'];
    $nischeProduct = $_POST['nische_product'];
    $productImgurl = $_POST['product_imgurl'];

    $stmt->bind_param(
        'siiissss',
        $productName,
        $productEan,
        $productPrice,
        $productWeight,
        $productBrand,
        $productDescription,
        $nischeProduct,
        $productImgurl
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
    <title>Products</title>
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
                        <td class="text-center" style="width: 150px;">Image</td>
                        <td class="text-center" style="width: 300px;">Product Name</td>
                        <td class="text-center" style="width: 150px;">Ean</td>
                        <td class="text-center" style="width: 100px;">Price</td>
                        <td class="text-center" style="width: 100px;">Weight</td>
                        <td class="text-center" style="width: 50px;">active</td>
                        <td class="text-center" style="width: 50px;">deleted</td>
                        <td class="text-center" style="width: 100px;">brand</td>
                        <td class="text-center" style="width: 250px;">description</td>
                        <td class="text-center" style="width: 50px;">nische_product</td>
                        <td class="text-center" style="width: 250px;">Img URL</td>
                        <td class="text-center" style="width: 100px;">Options</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($db->getTableData("product") as $productData) { ?>
                    <tr>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $productData[0] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 150px;">
                                <img src="http://localhost/webshop/assets/media/img/products/<?= $productData[9] ?>" style="width:inherit;" alt="product Image"/>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 300px;">
                                <?= $productData[1] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 150px;">
                                <?= $productData[2] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <?= $productData[3] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <?= $productData[4] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $productData[5] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $productData[6] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <?= $productData[7] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 250px;height: 200px; overflow: scroll">
                                <?= $productData[8] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $productData[10] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 250px;">
                                <?= $productData[9] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <div><a href="editProduct.php?id=<?=$productData[0]?>" class="btn btn-outline-info">Edit</a></div>
                                <form action="productList.php" method="post">
                                    <div class="mt-1">
                                        <button class="btn btn-outline-danger" type="submit" name="delete" id="delete" value="<?= $productData[0] ?>">
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
