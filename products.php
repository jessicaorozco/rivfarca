<?php
require_once 'products.entidad.php';
require_once 'products.model.php';

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
            $alm->__SET('categoria', filter_input(INPUT_POST, "categoria"));
            $alm->__SET('exist',    filter_input(INPUT_POST, "exist"));
            $alm->__SET('mount',    filter_input(INPUT_POST, "mount"));

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
            $alm->__SET('id',        filter_input(INPUT_POST, "id"));
            $alm->__SET('title',  filter_input(INPUT_POST, "title"));
            $alm->__SET('img',   filter_input(INPUT_POST, "img"));
            $alm->__SET('description', filter_input(INPUT_POST, "description"));
            $alm->__SET('categoria', filter_input(INPUT_POST, "categoria"));
            $alm->__SET('exist',    filter_input(INPUT_POST, "exist"));
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
        <title>Lista productos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">

    </head>
    <body >
    <div class="progress">
        
    </div>
        <br>

        <div class="pure-g text">
            <div class="pure-u-1-12">
 
                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>img</th>
                            <th>description</th>
                            <th>categoria</th>
                            <th>exist</th>
                            <th>mount</th>
                            
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('title'); ?></td>
                            <td><?php echo $r->__GET('img'); ?></td>
                            <td><?php echo $r->__GET('description'); ?></td>
                            <td><?php echo $r->__GET('categoria'); ?></td>
                            <td><?php echo $r->__GET('exist'); ?></td>
                            <td><?php echo $r->__GET('mount'); ?></td>
                       
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <br> 
     
      <br>
     
    </body>
</html>
