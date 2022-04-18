<?PHP 
session_start();
if (isset($_SESSION['username'])!='carlosgonzalez'){

    header("Location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="menu">
    <a href="index.php">||Inicio||</a>
    <a href="portafolio.php">||Portafolio||</a>   
    <a href="cerrar.php">||Logout||</a>
    </br></br></br>
    
