<?php

class DBPool {
    private $pool;

    public function __construct() {
        $this->pool = new Swoole\Database\PDOPool((new Swoole\Database\PDOConfig)
            ->withHost('localhost')
            ->withPort(3306)
            ->withDbName('Avaliacao_Desempenho_Progressao_Carreira')
            ->withUsername('root')
            ->withPassword('qwerty@123'));
    }

    public function getConnection() {
        return $this->pool->get();
    }
}
