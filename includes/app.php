<?php
require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//* Conexión a la base de datos
$db = connectDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);
