<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $tlf;
    private $city;
    

    public function __GET($k){ return $this->$k; }
    public function __SET($k, $v){ return $this->$k = $v; }
}

?>
