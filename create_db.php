<?php
try { 
    $dbh = new PDO('mysql:host=127.0.0.1', 'root', ''); 
    $dbh->exec('CREATE DATABASE IF NOT EXISTS clinictrack'); 
    echo "DB created"; 
} catch (PDOException $e) { 
    die($e->getMessage()); 
}
