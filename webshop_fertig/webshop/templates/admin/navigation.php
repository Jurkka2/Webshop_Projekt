<?php
if (!isset($_SESSION)) {
    session_start();
} 

$mysql = new mysqli('localhost', 'root', '', 'webshop');
if (!isset($_SESSION['id'])) {
    echo "<script> 
                window.location.href='http://localhost/webshop/templates/admin/login.php';
                </script>";
}else{
    $db = new Database;
foreach($db->getTableData("admin_user") as $adminData) {
    if ($_SESSION['id'][1] == $adminData[1]) {

?>
<nav class="navbar navbar-light bg-light">
    <div class="collapse container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/webshop/templates/admin/dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <span class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Orders
                </span>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/webshop/templates/admin/order/orderList.php">Order List</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <span class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Products
                </span>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/webshop/templates/admin/product/productList.php">Product List</a></li>
                    <li><a class="dropdown-item" href="/webshop/templates/admin/product/addProduct.php">Add Product</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Clients
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/webshop/templates/admin/client/clientList.php">Client List</a></li>
                    <li><a class="dropdown-item" href="/webshop/templates/admin/client/addClient.php">Add Client</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/webshop/templates/admin/category/categoryList.php">Category List</a></li>
                    <li><a class="dropdown-item" href="/webshop/templates/admin/category/addCategory.php">Add Category</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown pb-5">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Backend User
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/webshop/templates/admin/backendUser/backendUserList.php">Backend User</a></li>
                    <li><a class="dropdown-item" href="/webshop/templates/admin/backendUser/addBackendUser.php">Add Backend User</a></li>
                </ul>
            </li>
            <li><p>Sie sind momentan eingeloggt als: <?php echo $_SESSION["id"][1]; ?></p></li>
            <li><p>Sie sind nicht <?php echo $_SESSION["id"][1]; ?>?</p></li>
            <li><a class="dropdown-item" href="/webshop/templates/admin/logout.php">Logout</a></li>
        </ul>
    </div>
</nav>
<?php
    }
}
}
?>

