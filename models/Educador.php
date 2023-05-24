<?php
require_once __DIR__ . "/../db/DBPool.php";

class Educador {
    public $id;
    public $nome;
    public $funcao;
    public $qualificacao;
    public $experiencia;
    public $progressao_carreira;
    private $dbPool;

    public function __construct($data = []) {
        $this->id = $data['id'] ?? '';
        $this->nome = $data['nome'] ?? '';
        $this->funcao = $data['funcao'] ?? '';
        $this->qualificacao = $data['qualificacao'] ?? '';
        $this->experiencia = $data['experiencia'] ?? '';
        $this->progressao_carreira = $data['progressao_carreira'] ?? '';
        $this->dbPool = new DBPool();
    }
    
    public function getAll()
    {
        $connection = $this->dbPool->getConnection();
        $educators = $connection->query("SELECT * FROM Educadores")->fetchAll();
        $connection = null; // Manually release the connection
    
        return $educators;
    }
    
    public function create($data)
    {
        $connection = $this->dbPool->getConnection();
        $connection->prepare("INSERT INTO Educadores (nome, funcao, qualificacao, experiencia, progressao_carreira) VALUES (?, ?, ?, ?, ?)")
            ->execute([
                $data['nome'],
                $data['funcao'],
                $data['qualificacao'],
                $data['experiencia'],
                $data['progressao_carreira'],
            ]);
        $connection = null; // Manually release the connection
    }
}
