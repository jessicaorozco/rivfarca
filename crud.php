<?php

require_once 'config.php';
/* Pagina Principal index.html
 * Explicar sentencia por Sentencia.
 */

// Registro de user

require_once 'user.entidad.php';
require_once 'user.model.php';

$alm = new User();
$model = new UserModel();

if(isset($_REQUEST['tipo']))
{

    switch($_REQUEST['tipo'])
    {
        case 'actualizar':
            $alm->__SET('id',        filter_input(INPUT_POST, "id"));
            $alm->__SET('name',  filter_input(INPUT_POST, "name"));
            $alm->__SET('email',   filter_input(INPUT_POST, "email"));
            $alm->__SET('tlf', filter_input(INPUT_POST, "tlf"));
            $alm->__SET('city',    filter_input(INPUT_POST, "city"));
            

            $model->Actualizar($alm);
            //header('Location: index.html');
            header('Location: index.html');
            
			break;

        case 'registrar':
            // se añadio
           		
            $alm->__SET('id',        filter_input(INPUT_POST, "id"));
            $alm->__SET('name',  filter_input(INPUT_POST, "name"));
            $alm->__SET('email',   filter_input(INPUT_POST, "email"));
            $alm->__SET('tlf', filter_input(INPUT_POST, "tlf"));
            $alm->__SET('city',    filter_input(INPUT_POST, "city"));

            $model->Registrar($alm);
            echo "Registro Guardado";

            header('Location: index.html');
            //header('Location: index.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['id']);
			echo "<strong>Registro Eliminado</strong>";

           // header('Location: index.php');
            break;

        case 'editar':
            $alm = $model->Obtener($_REQUEST['id']);
            break;
    }
}

?>
