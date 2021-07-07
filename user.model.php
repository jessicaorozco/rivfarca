<?php

/* Esta clase almacena la clave acceso y nombre de la base de datos en el
 * constructor.  Por algun motivo no acepta incluirlos en un archivo
 * independiente.
 */

class UserModel
{
    private $pdo;

    public function __CONSTRUCT()
    {
        $host= "https://www.rivfarca.com";
        $usuario="jess";
        $password="rivfarca123";    /* No dejar vacio si el sitio estara en linea */
        $db="dbrivfarca";

        try
        {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", "$usuario", "$password");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM  user");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Users();

                $alm->__SET('id', $r->id);
                $alm->__SET('name', $r->name);
                $alm->__SET('email', $r->email);
                $alm->__SET('tlf', $r->tlf);
                $alm->__SET('city', $r->city);
                

                $result[] = $alm;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM user WHERE id = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Users();

            $alm->__SET('id', $r->id);
            $alm->__SET('name', $r->name);
            $alm->__SET('email', $r->email);
            $alm->__SET('tlf', $r->tlf);
            $alm->__SET('city', $r->city);

            return $alm;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM user WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Users $data)
    {
        try 
        {
            $sql = "UPDATE users SET 
                        name          = ?,
                        email        = ?,
                        tlf        = ?,
                        city       = ?, 
                        
                    WHERE id = ?";
         
            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('name'), 
                    $data->__GET('email'), 
                    $data->__GET('tlf'),
                    $data->__GET('city'),
                    $data->__GET('id')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Proveedor $data)
    {
        try 
        {
        $sql = "INSERT INTO user (id, name,email,tlf,city) 
                VALUES (?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                $data->__GET('id'), 
		$data->__GET('name'), 
                $data->__GET('email'), 
                $data->__GET('tlf'), 
                $data->__GET('city'),
                
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}

?>