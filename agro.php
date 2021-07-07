<?php
require_once 'product.entidad.php';
require_once 'product.model.php';

// Logica
$alm = new Products();
$model = new ProductModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',        filter_input(INPUT_POST, "id"));
            $alm->__SET('title',  filter_input(INPUT_POST, "title"));
            $alm->__SET('img',   filter_input(INPUT_POST, "img"));
            $alm->__SET('description', filter_input(INPUT_POST, "description"));
            $alm->__SET('exist', filter_input(INPUT_POST, "exist"));
            $alm->__SET('categoria',    filter_input(INPUT_POST, "categoria"));
            $alm->__SET('mount',    filter_input(INPUT_POST, "mount"));

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
            $alm->__SET('id',        filter_input(INPUT_POST, "id"));
            $alm->__SET('title',  filter_input(INPUT_POST, "title"));
            $alm->__SET('img',   filter_input(INPUT_POST, "img"));
            $alm->__SET('description', filter_input(INPUT_POST, "description"));
            $alm->__SET('exist', filter_input(INPUT_POST, "exist"));
            $alm->__SET('categoria',    filter_input(INPUT_POST, "categoria"));
            $alm->__SET('mount',    filter_input(INPUT_POST, "mount"));

            $model->Registrar($alm);
            header('Location: index.html');
            break;

        case 'eliminar':
            $model->Eliminar(filter_input(INPUT_POST, "id"));
            header('Location: index.html');
            break;

        case 'editar':
            $alm = $model->Obtener(filter_input(INPUT_POST, "id"));
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Equipos Agroindustriales</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">

    </head>

<body>
<main>
<div  class="card-body"> 
    <div style='border:none' class="row col-md-80">
    <?php foreach($model->Agro() as $r): ?>
        <div class="col-md-4">
            <div class="card gallery">
                <img class="card-img-top"
                    src="/images/products/<?php echo $r->__GET('img'); ?>"
                    alt="Card image cap" class="img-responsive">
                <div class="card-body">
                    <h6 class="card-title text-center"><?php echo $r->__GET('title'); ?></h>
                    <p class="card-text text-justify"><?php echo $r->__GET('description'); ?></p>
                    <p class="card-text text-justify"><?php echo $r->__GET('categoria'); ?></p>
                    <div class="clearfix form-inline">
                        <span class="badge"><?php echo $r->__GET('mount'); ?></span>
                        <a href="/add-to-cart/{{this._id}}" class="btn
                            btn-danger float-right">Agregar</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php endforeach; ?>
    </div>
  
</div>


</main>
</body>
</html>

