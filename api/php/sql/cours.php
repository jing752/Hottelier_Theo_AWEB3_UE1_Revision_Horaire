<?php
require_once "./php/db/database.php";
function GetAllCours(): array
{
    $statement = db()->prepare(
        "SELECT * FROM `cours`"
    );
    $statement->execute();
    return $statement->fetchAll();
}

