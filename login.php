<?php
session_start();
if ($_POST){
    if( ($_POST['username']=="carlosgonzalez") && ($_POST['password']=="1234") ){
            $_SESSION['username']='carlosgonzalez';
        header("Location:index.php" );

    }else

    echo "<script> alert('usuario y/o contraseña incorrectos');</script>";
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="menu">
    <a href="index.php">||Inicio||</a>
    </div>

</head>

<body>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="container">
                <div class="card">
                <br/>
                    <div class="card-header"> 
                        Login
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <input class="form-control" type="text" name="username" id="username" placeholder="Username"></br>
                            <input class="form-control" type="password" name="password" id="password" placeholder="password"></br>
                            <button class="btn btn-success" type="submit" name="submit">Login</button></br>

                        </form>
                    </div>
                    <div class="card-footer text-muted">

                    </div>
                </div>

            </div>

</body>
</div>
<div class="col-md-4">

</div>
</div>


</html>