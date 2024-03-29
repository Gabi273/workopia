<?php

class Database{
    public $conn;

    // Facem conexiunea

    public function __construct($config)
    {
        // Aici luam datele pentru dsn
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        // Aici incercam sa facem conexiunea
        try{
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        }catch(PDOException $e){
            throw new Exception("Db conn failed {$e->getMessage()}");
        }
    }

    // Preparam datele din sql si executam datele

    public function query($query, $params = []){
        try{
            $sth = $this->conn->prepare($query);
            // Bind params
            foreach($params as $param=>$value){
                $sth->bindValue(':' . $param, $value);
            }
            $sth->execute();
            return $sth;
        }catch(PDOException $e) {
            throw new Exception("Query failed to execute {$e->getMessage()}");
        }
    }
}