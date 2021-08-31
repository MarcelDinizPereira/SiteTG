<?php
session_start();

include "../utility/errorHandler.php";
include_once "functions.inc.php";
require_once "dbh.inc.php";

$idPet = $_POST['idPetNome'];

echo $idPet;

header("Location: ../pag_pet.php?petsign=success");

/* Making the pet be submitted into the database */