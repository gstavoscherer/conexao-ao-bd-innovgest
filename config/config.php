<?php

    function conectarBD(){
        $host = "localhost";
        $dbname = "teste-innovgest";
        $user = "root";
        $password = "";

        $connStr = "mysql:host=$host;dbname=$dbname";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try{
            //Tentar conexão
            $conn = new PDO($connStr, $user, $password, $options);
            return $conn;
        }
        catch(PDOException $e){
            echo "Falha ao conectar ". $e->getMessage();
        }
    }