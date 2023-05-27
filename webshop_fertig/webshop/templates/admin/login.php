<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../classes/Database.php');
$auth=true;
if (!empty($_POST['email'])) {

    //$password1 = sha1($_POST['password']);

    $con = new mysqli('localhost', 'root', '', 'webshop');

    if ($con->connect_error) {
        echo "Fehler bei der Verbindung: " . $con->connect_error;
        exit();
    }

    $suche = mysqli_query($con, "SELECT * 
								FROM  admin_user 
								WHERE email = '" . $_POST['email'] . "' 
								limit 1;");

    if ($row = $suche->fetch_array()) {
        $email =  $row['email'];
        $password = $row['password'];
        $id = $row['id'];
        $first_name = $row['first_name'];

        $var = array($id, $first_name);

        if ($_POST['email'] == $email && $_POST['password'] == $password) {

            $_SESSION['id'] = $var;
            echo "<script> 
                window.location.href='./dashboard.php';
                </script>";
            exit;
        } else {

            $auth=false;
        }
    } else {

        $auth=false;
    }
}
?>
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
<body>

    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-sm-8 co-md-6 col-lg-4 bg-white rounded p-4 shadow">
                <div class="row justify-content-center mb-4 ">

                    <img src="https://www.shareicon.net/data/2016/11/14/852267_user_512x512.png" class="w-25" />

                    <h4>Login</h4>

                    <form action='login.php' method='post'>

                        <div class="mb-4">
                            <?php
                            if (!$auth){
                            echo "<p id='errormsg'>Keine Übereinstimmung.</p>";
                            }
                            ?>
                            <label for="email" class="form-label">Email Adresse</label>
                            <input name='email' type="email" class="form-control" id="email" aria-describeddby="emailHelp">
                            <div id="emailHelp" class="form-text">Bitte geben Sie Ihre Email Adresse ein.</div>

                        </div>

                        <div class="mb-4">

                            <label for="password" class="form-label">Passwort</label>
                            <input name='password' type="password" class="form-control" id="password" aria-describeddby="passwordHelp">
                            <div id="passwordHelp" class="form-text">Bitte geben Sie Ihr Passwort ein.</div>

                        </div>

                        <div class="mb-4">

                            <input type='submit' class="btn btn-info w-100" value='login'>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>