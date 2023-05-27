<!DOCTYPE html>
<html lang="de">
<head>
    <title>Add Product</title>
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
            <form class="form-horizontal" action="productList.php" method="post">
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="product_name">Name</label>
                    <div class="col-md-10">
                        <input required type="text" name="product_name" id="product_name" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="ean">Ean</label>
                    <div class="col-md-10">
                        <input required type="number" name="ean" id="ean" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="price">Price</label>
                    <div class="col-md-10">
                        <input required type="number" step="any" name="price" id="price" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="weight">Weight</label>
                    <div class="col-md-10">
                        <input required type="number" name="weight" id="weight" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="brand">Brand</label>
                    <div class="col-md-10">
                        <input required type="text" name="brand" id="brand" class="form-control">
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="description">Description</label>
                    <div class="col-md-10">
                        <textarea required name="description" id="description" class="form-control" style="height: 200px">
                        </textarea>
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="nische_product">Nische Product</label>
                    <div class="col-md-10">
                        <select required name="nische_product" id="nische_product" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <label class="col-md-2 m-0" for="imgurl">Img URL</label>
                    <div class="col-md-10">
                        <input required type="text" name="product_imgurl" id="product_imgurl" class="form-control">
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
