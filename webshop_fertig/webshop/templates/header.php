<?php
if (!isset($_SESSION)) {
    session_start();
}

define('CONFIG_DIR',__DIR__.'\..\config');
require_once __DIR__.'\..\functions\database.php';
?>

<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://localhost/webshop/styles/style.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

    <header>

        <nav class="header navbar-expand-lg navbar-light">
            <div class="container">
                <div class="row container-fluid align-items-center">

                    <div class="col-4">
                        <a class="navbar-brand" href="http://localhost/webshop/index.php">
                            <img class="d-inline-block align-top aling-top" src="http://localhost/webshop/assets/media/img/Logo.png" height="100" width="150">
                        </a>

                    </div>

                    <div class="col-6">
                        <section>
                            <form class="m-0 d-flex" method="get" action="http://localhost/webshop/templates/Suchergebnisse.php">

                                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search"> <!--suche-->
                                <button class="btn btn-outline-light" type="submit">
                                    <img class="d-inline-block align-top aling-top" src="http://localhost/webshop/assets/media/img/lupe.png" height="25">
                                </button>

                            </form>
                        </section>
                        

                    </div>

                    <div class="col-2 pull-right">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">

                            <li class="nav-item mr-4">

                                <?php
                                //bin ich angemeldet oder nicht funktion
                                if (isset($_SESSION['id'])) { // wo ist meines SESSION first_name???????

                                ?>
                                    <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            
                                            <?php
                                            $name = $_SESSION["id"][1];
                                            echo $name;
                                            ?>

                                </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" name='bestellungen' href="/webshop/templates/Bestellungen.php">Bestellungen</a>
                                        <a class="dropdown-item" href="/webshop/templates/logout.php" name='logout'>Logout</a>
                                        </divl>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="aside-menu__item-wrapper">
                                        <a class="aside-menu__item aside-menu__item--signin" href="/webshop/templates/login.php">
                                            <img class="d-inline-block align-top aling-top" src="http://localhost/webshop/assets/media/img/nutzer.png" height="25">
                                        </a>
                                    </div>
                                    
                                <?php
                                }
                                ?>
                                

                            </li>

                            <li class="nav-item">

                                <?php
                                $count = 0;
                                if (isset($_SESSION['cart'])) {

                                    $count = count($_SESSION['cart']);
                                }
                                ?>

                                    <div class="aside-menu__item-wrapper">
                                        <a class="aside-menu__item aside-menu__item--signin" href="/webshop/templates/warenkorb.php">
                                            <img class="d-inline-block align-top aling-top" src="http://localhost/webshop/assets/media/img/einkaufstasche.png" height="25"><?php echo $count; ?>
                                        </a>
                                    </div>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </nav>

    </header>
</html>