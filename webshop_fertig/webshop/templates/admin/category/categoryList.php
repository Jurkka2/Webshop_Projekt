<?php
require_once('../../../classes/Database.php');;

$mysql = new mysqli('localhost', 'root', '', 'webshop');

if(isset($_POST['insert'])) {
    $stmt = $mysql->prepare(
        "INSERT INTO category(
            name
       ) VALUES(?)
    ");

    $categoryName = $_POST['category_name'];

    $stmt->bind_param(
        's',
        $categoryName
    );

    $stmt->execute();

}

$db = new Database;
if(isset($_POST['delete'])) {
    $db->deleteTableRow("category", "id", $_POST["delete"]);
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Category</title>
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
                        <td class="text-center" style="width: 300px;">Category Name</td>
                        <td class="text-center" style="width: 100px;">Options</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($db->getTableData("category") as $categoryData) { ?>
                    <tr>
                        <td class="text-center">
                            <div class="m-auto" style="width: 50px;">
                                <?= $categoryData[0] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 300px;">
                                <?= $categoryData[1] ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="m-auto" style="width: 100px;">
                                <div><a href="editCategory.php?id=<?=$categoryData[0]?>" class="btn btn-outline-info">Edit</a></div>
                                <form action="categoryList.php" method="post">
                                    <div class="mt-1">
                                        <button class="btn btn-outline-danger" type="submit" name="delete" id="delete" value="<?= $categoryData[0] ?>">
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
