<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=innodb-large-index', 'root', '');
    foreach ($dbh->query('SELECT name from category_') as $row) {
        print_r($row);
        echo "<br>";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br>";
    die();
}
