<?php
require_once 'user.entidad.php';
require_once 'user.model.php';

// Logica
$alm = new User();
$model = new UserModel();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
        case 'actualizar':
            $alm->__SET('id',        filter_input(INPUT_POST, "id"));
            $alm->__SET('name',  filter_input(INPUT_POST, "name"));
            $alm->__SET('email',   filter_input(INPUT_POST, "email"));
            $alm->__SET('tlf', filter_input(INPUT_POST, "tlf"));
            $alm->__SET('city',    filter_input(INPUT_POST, "city"));

            $model->Actualizar($alm);
            header('Location: index.html');
            break;

        case 'registrar':
            $alm->__SET('id',        filter_input(INPUT_POST, "id"));
            $alm->__SET('name',  filter_input(INPUT_POST, "name"));
            $alm->__SET('email',   filter_input(INPUT_POST, "email"));
            $alm->__SET('tlf', filter_input(INPUT_POST, "tlf"));
            $alm->__SET('city',    filter_input(INPUT_POST, "city"));

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
        <title>Lista usuarios</title>
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
                            <th>name</th>
                            <th>email</th>
                            <th>tlf</th>
                            <th>city</th>
                            
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('name'); ?></td>
                            <td><?php echo $r->__GET('email'); ?></td>
                            <td><?php echo $r->__GET('tlf'); ?></td>
                            <td><?php echo $r->__GET('city'); ?></td>
                       
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <br> 
     
      <br>
     
    </body>
</html>
