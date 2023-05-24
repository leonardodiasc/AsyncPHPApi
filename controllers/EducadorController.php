<?php

require_once __DIR__ . "/../models/Educador.php";


class EducadorController {
    private $educador;

    public function __construct() {
        $this->educador = new Educador();
    }

    public function getAll() {
        return json_encode($this->educador->getAll());
    }

    public function create($data) {
        $this->educador->create($data);
    }
}
