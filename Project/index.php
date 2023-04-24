<?php namespace Site?>
<!DOCTYPE html>
<html>
    <head>
        <title>Project</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <form method="post">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand">Product List</a>
                    <div class="navbar-nav  ms-auto ">
                        <a class="btn btn-primary" href="add_form.php">ADD</a>
                        <input class="btn btn-primary" type="submit" name="delete" value="MASS DELETE" >
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row" id="data">
                </div>
            </div>
        </form>
    </body>
    <?php 
        include 'classes/site.php';
        new InitializeSite(1);
    ?>
</html>
