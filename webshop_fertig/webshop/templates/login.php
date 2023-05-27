<?php
include 'header.php';
include 'Navbar.php';


$auth=true;
if (!empty($_POST['email'])) {

    //$password1 = sha1($_POST['password']);

    $con = getDB();

    if ($con->connect_error) {
        echo "Fehler bei der Verbindung: " . $con->connect_error;
        exit();
    }

    $suche = mysqli_query($con, "SELECT * 
								FROM  client 
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
                window.location.href='../index.php';
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

                        <div id="registerHelp" class="form-text">Noch nicht dabei?</div>

                        <a href='register.php' class="btn btn-outline-info w-100" aria-describeddby="registerHelp">Registrieren</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
<?php include 'Footer.php' ?> 

</html>