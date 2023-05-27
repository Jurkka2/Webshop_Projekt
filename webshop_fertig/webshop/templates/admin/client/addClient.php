<!DOCTYPE html>
<html lang="de">
<head>
    <title>Add Client</title>
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
        <div>
            <form class="form-horizontal" action="clientList.php" method="post">
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="first_name">First Name</label>
                    <div class="col-md-10">
                        <input required type="text" name="first_name" id="first_name" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="last_name">Last Name</label>
                    <div class="col-md-10">
                        <input required type="text" name="last_name" id="last_name" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="email">Email</label>
                    <div class="col-md-10">
                        <input required type="text" name="email" id="email" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="gender">Gender</label>
                    <div class="col-md-10">
                        <select name="gender" id="gender" class="form-control">
                            <option>Choose...</option>
                            <option>Männlich</option>
                            <option>Weiblich</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="password">Password</label>
                    <div class="col-md-10">
                        <input required type="password" name="password" id="password" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="date_birth">Date of Birth</label>
                    <div class="col-md-10">
                        <input required type="text" name="date_birth" id="date_birth" class="form-control" placeholder="DD/MM/YYYY">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="phone_number">Phone Number</label>
                    <div class="col-md-10">
                        <input required type="text" name="phone_number" id="phone_number" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="city">City</label>
                    <div class="col-md-10">
                        <input required type="text" name="city" id="city" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="street">Street</label>
                    <div class="col-md-10">
                        <input required type="text" name="street" id="street" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="building_number">Building Number</label>
                    <div class="col-md-10">
                        <input required type="number" name="building_number" id="building_number" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="zip">Zip</label>
                    <div class="col-md-10">
                        <input required type="number" name="zip" id="zip" class="form-control">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" name="insert" id="insert" value="true" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
