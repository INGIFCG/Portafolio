<?php include('head.php'); ?>
<?php include("conexion.php"); ?>

<?php
if ($_POST) {

    $name = $_POST["formname"];
    /* $file=$_POST["formfile"]; */
    $text = $_POST["formtext"];
    $time = new DateTime();
    $image = $time->gettimestamp() . "_" . $_FILES["formfile"]['name']; //recepciona el nombre que tiene el archivo ingresado
    // se coloca el gettimeestap debido a que si hay una imagen duplicada esta se sobrescribiria 
    //perdiendo la integridad de los datos para ello es nesesario colocar otro dato par que la misma no se sobrescriba
    // se puede implementar otro metodo pero por ahora se colocara este
    $temporal_img = $_FILES['formfile']['tmp_name']; // para utilizar esta parte es necesario crear un archivo temporal el cual contendra una copia del archivo previamente cargado
    move_uploaded_file($temporal_img, "save/" . $image); //mueve el archivo temporal guardado en imagen  lo coloca en la carpeta save la cual contendra dichas imagenes cargadas

    /////////////////////// insersion de datos 

    $objConexion = new conect(); // inserta datatos en la base de datos
    $sql = "INSERT INTO `proyec` (`ID`, `name`, `image`, `description`) VALUES (NULL, '$name','$image','$text')";
    $objConexion->ejecutar($sql);
    header("location:portafolio.php");
}

if ($_GET) { //permite borrar los registros

    $id = $_GET['delete']; // se puede implementar validaciones de seguridad para evitar ataques inyeccion slq
    $objConexion = new conect(); // inserta datatos en la base de datos
    $del_img = $objConexion->view("SELECT image FROM `proyec` WHERE `ID` =" . $id);
    unlink("save/".$del_img[0]['image']);//elimina la imagen temporal creada en la carpeta save mediante el id y el nombre de la misma
    $sql = "DELETE FROM `proyec` WHERE `proyec`.`ID` =" . $id; // metodo para hacer el borrado del dato en el portafolio
    $objConexion->ejecutar($sql);
    header("location:portafolio.php");

    // borrado de imagen de la carpeta temporal

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
                        <input required class='form-control' type='text' name='formname' id='' placeholder='Proyec Name'>
                        </br>
                        <input required class='form-control' type='file' name='formfile' id=''>
                        </br>
                        <textarea required class='form-control' name='formtext' row='3' placeholder='Description'></textarea>
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
                            <td><img width="10px"src="save/<?php echo $result['image']; ?>" alt="Imagen insertada"></td>
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