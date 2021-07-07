<?php

class Products
{
    private $id;
    private $title;
    private $img;
    private $description;
    private $categoria;
    private $exist;
    private $mount;
    

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
