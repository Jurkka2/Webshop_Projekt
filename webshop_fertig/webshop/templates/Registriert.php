<?php
include 'header.php';
include 'Navbar.php';       
              if (!empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] === $_POST['password2']) {

                                $name = $_POST['name'];
                                $vorname = $_POST['vorname'];
                                $email = $_POST['email'];
                                $geburt = $_POST['geburtsdatum'];
                                $telefon = $_POST['phoneNumber'];
                                $password = sha1($_POST['password']);
          
								$zip = $_POST['Postleitzahl'];
                                $geschlecht = $_POST['geschlecht'];

                                $city = $_POST['ort'];
                                $street = ($_POST['strasse']);
                                $building_number = $_POST['hausnummer'];

                                $mysqli = new mysqli("localhost", "root", "", "webshop");

                                if ($mysqli->connect_error) {

                                    echo "Fehler bei der Verbindung: " . $mysqli->connect_error;

                                    exit();
                                }

                                $userinsert = "INSERT INTO `client`(
                                                    `first_name`,
                                                    `last_name`, 
                                                    `email`, 
                                                    `gender`, 
                                                    `password`, 
                                                    `date_birth`, 
                                                    `phone_number`, 
                                                    `city`, 
                                                    `street`, 
                                                    `building_number`,
													`zip`
                                               
                                                )
                                                VALUES (
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?, 
													?
                                                )";

                            
                                $stmt = $mysqli-> prepare($userinsert);  

                                $stmt->bind_param('ssssssisssi', $vorname, $name, $email, $geschlecht, $password, $geburt, $telefon, $city,  $street, $building_number, $zip);
                                $stmt->execute();

                                $suche = mysqli_query($mysqli, "SELECT * 
								FROM  client 
								WHERE email = '" . $_POST['email'] . "' 
								limit 1;");

                                if ($row = $suche->fetch_array()) {
                                    $id = $row['id'];
                                    $first_name = $row['first_name'];

                                    $var = array($id, $first_name);
                                    $_SESSION['id'] = $var;
                                }


                                $mysqli->close();
								
								if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
									
									$_POST = array();
									
								}
    ?> 
<div class="container order-container">  
    <section class=" gradient-custom">
        <div class="container pb-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px; height: auto;">
                        <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Hallo <?php echo $first_name; ?>,</br>Sie haben sich erfolgreich registriert!</br>Viel Spaß beim Bestellen.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
}else {
?>
<div class="container order-container">  
    <section class=" gradient-custom">
        <div class="container pb-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px; height: auto; background-color: #680303;">
                        <div class="card-header px-4 py-5">
                            <h5 class="mb-0" style="color:white;"><?php echo "Registrierung fehlgeschlagen!";?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
} 
include 'Footer.php' ?>

</html>