<?php

class BD extends PDO
{
    private $host;
    private $user;
    private $pass;
    private $bd_name;

    public function __construct($host, $username, $password, $bd_name)
    {
        $this->host = $host;
        $this->user = $username;
        $this->pass = $password;
        $this->bd_name = $bd_name;
    }

    private function retornaConexao ()
    {
        try
        {
            $PDO = new \PDO( 'mysql:host=' . $this->host . ';dbname=' . $this->bd_name, $this->user, $this->pass);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch ( PDOException $e )
        {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }

        return $PDO;
    }

    public function getPerguntas ()
    {
        $con = $this->retornaConexao();
        $sql = "SELECT * FROM `perguntas`";
        $result = $con->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    private function retornaAcertos ($resp1, $resp2, $resp3, $resp4, $resp5){
        //include __DIR__ . '/../config/config.php';

        $acertos = 0;

        $acertos += 1 ? $resp1 == GABARITO[1] : $acertos = $acertos;
        $acertos += 1 ? $resp2 == GABARITO[2] : $acertos = $acertos;
        $acertos += 1 ? $resp3 == GABARITO[3] : $acertos = $acertos;
        $acertos += 1 ? $resp4 == GABARITO[4] : $acertos = $acertos;
        $acertos += 1 ? $resp5 == GABARITO[5] : $acertos = $acertos;

        return $acertos;
    }

    public function getDadosEquipe ()
    {
        $con = $this->retornaConexao();
        $sql = "SELECT * FROM `dados-equipe`";
        $result = $con->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
    }

    public function setDadosEquipe ($nome, $participantes, $resp1, $resp2, $resp3, $resp4, $resp5)
    {
        $con = $this->retornaConexao();
        $acertos = $this->retornaAcertos($resp1, $resp2, $resp3, $resp4, $resp5);
        
        $sql = "INSERT INTO `dados-equipe` 
        (`nome`, `participantes`, `resposta-1`, `resposta-2`, `resposta-3`, `resposta-4`, `resposta-5`, `acertos`)
        VALUES
        (?, ?, ?, ?, ?, ?, ?, ?)";

        $result = $con->prepare($sql);
        $result->execute(["{$nome}", "{$participantes}", "{$resp1}", "{$resp2}", "{$resp3}", "{$resp4}", "{$resp5}", "{$acertos}"]);
    }

    public function getDadosAdmin ()
    {
        $con = $this->retornaConexao();
        $sql = "SELECT * FROM `admin`";
        $result = $con->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

}
