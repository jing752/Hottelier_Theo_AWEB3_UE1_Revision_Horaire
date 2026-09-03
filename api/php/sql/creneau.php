<?php
require_once "./php/db/database.php";
function GetAllCreneau(): array
{
    $statement = db()->prepare(
        "SELECT * FROM `creneaux`"
    );
    $statement->execute();
    return $statement->fetchAll();
}
