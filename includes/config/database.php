<?php

function connectDB(): mysqli
{
  $db = new mysqli("localhost", "root", "juandres99", "bienesraices_crud");

  if (!$db) {
    echo "Error: No se pudo conectar.";
    exit;
  }

  return $db;
}
