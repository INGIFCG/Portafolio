<?php include('head.php'); ?>
<?php include("conexion.php"); ?>

<?php
if ($_POST) {

    $name = $_POST["formname"];
    /* $file=$_POST["formfile"]; */
    $text = $_POST["formtext"];
    $image=$_FILES["formfile"]['name'];//recepciona el nombre que tiene el archivo ingresado

    /*     print_r($_POST); */
    $objConexion = new conect(); // inserta datatos en la base de datos
    $sql = "INSERT INTO `proyec` (`ID`, `name`, `image`, `description`) VALUES (NULL, '$name','$image', '$text')";
    $objConexion->ejecutar($sql);
}

if ($_GET) { //permite borrar los registros

    $id=$_GET['delete']; // se puede implementar validaciones de seguridad para evitar ataques inyeccion slq
    $objConexion = new conect(); // inserta datatos en la base de datos
    $sql = "DELETE FROM `proyec` WHERE `proyec`.`ID` =".$id;
    $objConexion->ejecutar($sql);
}

$objConexion = new conect(); // genera la vista de todos los proyectos en la base de datos
$resultS = $objConexion->view("SELECT * FROM `proyec`");

/* print_r($results); */

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        <input class='form-control' type='text' name='formname' id='' placeholder='Proyec Name'>
                        </br>
                        <input class='form-control' type='file' name='formfile' id=''>
                        </br>
                        <input class='form-control' type='text' name='formtext' id='' placeholder='Description'>
                        </br>
                        <input class="btn btn-success" type='submit' value='proyect'>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>File</th>
                        <th>Description</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultS as $result) { ?>
                        <tr>
                            <td><?php echo $result['ID']; ?></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['image']; ?></td>
                            <td><?php echo $result['description']; ?></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $result['ID']; ?>">DELETE</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>