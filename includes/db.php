<?php
    require __DIR__.'/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
    $dotenv->load();

    $keyContents = file_get_contents(__DIR__.'/../keyfile');
    $key = \Defuse\Crypto\Key::loadFromAsciiSafeString($keyContents);

    $db_username = \Defuse\Crypto\Crypto::decrypt($_ENV['DB_USERNAME'], $key);
    $db_password = \Defuse\Crypto\Crypto::decrypt($_ENV['DB_PASSWORD'], $key);
    $db_name = \Defuse\Crypto\Crypto::decrypt($_ENV['DB_NAME'], $key);

    $con = mysqli_connect("localhost", $db_username, $db_password, $db_name)
            or die("Couldn't connect to database");
?>