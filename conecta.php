<?php
    $hostname = 'localhost';
    $dbname = 'mercadov2';
    $username = 'root';
    $password = '';

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    echo "Conexão realizada com sucesso.";
    
} catch (PDOException $pe) {
    echo("Falha" . $pe -> getMessage());
};