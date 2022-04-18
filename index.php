<?php include('head.php'); ?>
<?php include('conexion.php') ?>

<?php
$objConexion = new conect(); // genera la vista de todos los proyectos en la base de datos
$resultS = $objConexion->view("SELECT * FROM `proyec`");
?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Portafolio Carlos</h1>
        <p class="lead">Primeras practicas en php</p>
        <hr class="my-2">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">Click aqui para saber mas
            </a>
        </p>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-6 g-4">
    <?php foreach ($resultS as $result) { ?>
        <div class="col">
            <div class="card h-100">
                <img width="10px" src="save/<?php echo $result['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $result['name']; ?></h5>
                    <p class="card-text"><?php echo $result['description']; ?></p>
                </div>
            </div>
        </div>
</div>
<?php } ?>





<?php include('footer.php'); ?>