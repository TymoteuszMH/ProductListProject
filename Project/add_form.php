<?php namespace Site?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <form method="post" id="product_form" name="post">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">Product Add</a>
                    <div class="navbar-nav  ms-auto ">
                        <input class="btn btn-primary" type="submit" value="Save" name="val">
                        <a class="nav-link" href="index.php">Cancel</a>
                    </div>
            </div>
        </nav>
        <div id="error" class="alert" style="color: red"></div>
        <div class="container"> 
            <label for="sku" class="form-label">SKU: </label>
            <input type="text" class="form-control" id="sku" name="sku" required><br>
            <label for="name" class="form-label">Name: </label>
            <input type="text" class="form-control" id="name" name="name" required><br>
            <label for="price" class="form-label">Price($): </label>
            <input type="number" step="any" class="form-control" id="price" name="price" required><br>
            <label for="price" class="form-label">Type: </label>
            <select id='productType' class='form-select' aria-label='Type' name="type" required><br>
            </select>
            <div id='Desc'></div>
            <script src='classes/js/form_change.js'></script> <!-- changing inputs on type change -->
        </div>
        </form>
    </body>
</html>
<?php
    include 'classes/site.php';
    new InitializeSite(2);
?>