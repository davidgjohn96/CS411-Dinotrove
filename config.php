<?php

/**
 * Configuration for database connection
 *
 */

$host       = "127.0.0.1";
$username   = "root";
$password   = "abcd1234";
$dbname     = "dinotrove";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );