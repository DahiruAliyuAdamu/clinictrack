<?php
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=clinictrack', 'root', '');
    $query = $dbh->query('SHOW TABLES');
    $tables = $query->fetchAll(PDO::FETCH_COLUMN);
    echo "Total tables: " . count($tables) . "\n";
    foreach ($tables as $table) {
        echo "- " . $table . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
