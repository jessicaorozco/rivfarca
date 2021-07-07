<?php

/* Esta clase almacena la clave acceso y nombre de la base de datos en el
 * constructor.  Por algun motivo no acepta incluirlos en un archivo
 * independiente.
 */

class ProductModel
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

            $stm = $this->pdo->prepare("SELECT * FROM  products");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Products();

                $alm->__SET('id', $r->id);
                $alm->__SET('title', $r->title);
                $alm->__SET('description', $r->description);
                $alm->__SET('categoria', $r->categoria);
                $alm->__SET('tlf', $r->exist);
                $alm->__SET('city', $r->mount);
                

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
                      ->prepare("SELECT * FROM products WHERE id = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $alm = new Products();

            $alm->__SET('id', $r->id);
            $alm->__SET('title', $r->title);
            $alm->__SET('description', $r->description);
            $alm->__SET('categoria', $r->categoria);
            $alm->__SET('tlf', $r->exist);
            $alm->__SET('city', $r->mount);

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
                      ->prepare("DELETE FROM products WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Products $data)
    {
        try 
        {
            $sql = "UPDATE products SET 
                        title          = ?,
                        img        = ?,
                        description       = ?,
                        exist       = ?, 
                        mount       = ?, 
                        
                    WHERE id = ?";
         
            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('id'), 
                    $data->__GET('title'), 
                    $data->__GET('img'),
                    $data->__GET('description'),
                    $data->__GET('categoria'),
                    $data->__GET('exist'),
                    $data->__GET('mount')

                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Products $data)
    {
        try 
        {
        $sql = "INSERT INTO products (id, title, img, description, categoria, exist, mount) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
            array(
                    $data->__GET('id'), 
                    $data->__GET('title'), 
                    $data->__GET('img'),
                    $data->__GET('description'),
                    $data->__GET('categoria'),
                    $data->__GET('exist'),
                    $data->__GET('mount')
                
                )
            );
			
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Agro()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM  products WHERE ");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $alm = new Products();

                $alm->__SET('id', $r->id);
            $alm->__SET('title', $r->title);
            $alm->__SET('description', $r->description);
            $alm->__SET('categoria', $r->categoria);
            $alm->__SET('tlf', $r->exist);
            $alm->__SET('city', $r->mount);
                

                $result[] = $alm;

            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }


}

?>