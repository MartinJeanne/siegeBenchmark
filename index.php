<?php
$db = 'innodb-large';
$dbi = 'innodb-large-index';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=' . $db, 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    foreach ($dbh->query('SELECT firstname from user_ where firstname = "Ramona"') as $row) {
        print_r($row);
        echo "<br>";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br>";
    die();
}
