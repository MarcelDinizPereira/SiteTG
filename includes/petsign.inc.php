<?php
session_start();

include "../utility/errorHandler.php";
include_once "includes/functions.inc.php";
require_once "dbh.inc.php";

$nomePet = $_POST['nomePet'];
$generoPet = $_POST['generoPet'];
$idadePet = $_POST['idadePet'];
$racaPet = $_POST['racaPet'];
$usersId = $_SESSION['userid'];

$sql = "INSERT INTO pet (nomePet, generoPet, idadePet, racaPet, usersId) VALUES ('$nomePet', '$generoPet', '$idadePet', '$racaPet', '$usersId');";
mysqli_query($conn, $sql);

header("Location: ../pag_user.php?petsign=success");

/* Making the pet be submitted into the database */