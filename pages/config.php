<?php
try {
    $host = 'localhost';
    $dbnm = 'deallo_udb';
    $user = 'root';
    $pass = '';
    $dbh = new PDO('mysql:host='.$host.';dbname='.$dbnm, $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>