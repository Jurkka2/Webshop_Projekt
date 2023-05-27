<?php

include 'header.php';
?>
    <div class="container register-container">
        <div class="row align-items-center justify-content-center m-5">
            <div class="col-sm-8 co-md-4 col-lg-8 bg-white rounded p-4 shadow">
                <div class="row justify-content-center mb-4 ">

                    <img src="https://www.shareicon.net/data/2016/11/14/852267_user_512x512.png" class="w-25" />

                    <h4>Registrieren Sie sich jetzt</h4>

                    <form method='post' action="Registriert.php">

                        <div class="mb-4">

                            <div class="row">

                                <div class="col">

                                    <label for="name" class="form-label">Name</label>
                                    <input name='name' type="text" class="form-control" placeholder="Name" aria-label="name" required>
                                    <div id="name" class="form-text">Bitte geben sie Ihren Namen ein.</div>

                                </div>
                                <div class="col">

                                    <label for="vorname" class="form-label">Vorname</label>
                                    <input name='vorname' type="text" class="form-control" placeholder="Vorname" aria-label="vorname" required>
                                    <div id="vorname" class="form-text">Bitte geben sie Ihren Vornamen ein.</div>

                                </div>

                            </div>

                        </div>

                        <div class="mb-4">

                            <label for="email" class="form-label">Email Adresse</label>
                            <input name='email' type="email" class="form-control" id="email" aria-describeddby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Bitte geben Sie Ihre Email Adresse ein.</div>

                        </div>

                        <div class="mb-4">

                            <label for="date" class="form-label">Geburtsdatum</label>
                            <input name='geburtsdatum' type="date" class="form-control" id="date" aria-describeddby="dateHelp" required>
                            <div id="dateHelp" class="form-text">Bitte geben Sie Ihr Geburtsdatum ein.</div>

                        </div>

                        <div class="mb-4">

                            <label for="phoneNumber" class="form-label">Telefonnummer</label>
                            <input name='phoneNumber' type="phoneNumber" class="form-control" placeholder="Telefonnummer" id="phoneNumber" aria-describeddby="phoneNumberHelp" required>
                            <div id="phoneNumberHelp" class="form-text">Bitte geben Sie Ihre Telefonnummer ein.</div>

                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col">

                                    <label for="Straße" class="form-label">Straße</label>
                                    <input name='strasse' type="text" class="form-control" placeholder="Straße" aria-describeddby="Address" required>

                                </div>
                                <div class="col">

                                    <label for="Address" class="form-label">Hausnummer</label>
                                    <input name='hausnummer' type="text" class="form-control" placeholder="Hausnummer" aria-describeddby="Address" required>

                                </div>
                                <div class="col">

                                    <label for="Address" class="form-label">Ort</label>
                                    <input name='ort' type="text" class="form-control" placeholder="Ort" aria-describeddby="Address" required>

                                </div>
								
								<div class="col">

                                    <label for="Postleitzahl" class="form-label">Postleitzahl</label>
                                    <input name='Postleitzahl' class="form-control" placeholder="Postleitzahl" aria-describeddby="Address" required>

                                </div>

                            </div>
                            <div id="Address" class="form-text">Bitte geben Sie Ihre Adresse ein.</div>
                                <!--straße hausnummer postleitzahl ort-->
                        </div>

                        <div class="mb-4">

                            <label for="disabledSelect" class="form-label">Geschlecht</label>

                            <select name='geschlecht' class="form-select" aria-label="Default select example" required>

                                <option value="" selected>Auswahl</option>
                                <option value="male">Mann</option>
                                <option value="female">Frau</option>
                                <option value="other">Anderes</option>

                            </select>

                        </div>

                        <div class="mb-4">
                            <div class="row">
                                <div class="col">

                                    <label for="password" class="form-label">Passwort</label>
                                    <input name="password" type="password" class="form-control" placeholder="Passwort" aria-label="Password" required>
                                    <div id="password" class="form-text">Bitte gebnen Sie Ihr Passwort ein.</div>


                                </div>
                                <div class="col">

                                    <label for="password" class="form-label">Bestätigung des Passwort</label>
                                    <input name="password2" type="password" class="form-control" placeholder="Password" aria-label="Password" required>
                                    <div id="password" class="form-text">Bitte bestätigen Sie Ihr Passwort.</div>

                                </div>


                            </div>

                            <div class="mb-4">

                                <div id="registerHelp" class="form-text">Registrierung abschließen</div>

                                <button type="submit" class="btn btn-outline-info w-100" aria-describeddby="registerHelp">Registrieren</button>

                            </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

<?php include 'Footer.php' ?>

</html>

