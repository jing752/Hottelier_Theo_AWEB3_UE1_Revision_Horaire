<?php
require_once "./php/sql/classe.php";
require_once "./php/sql/creneau.php";
require_once "./php/http/Http_sendRequest.php";
function TraiterGet()
{
    $data = "";
    $data = GetAllClasse();
    if ($data !== []) {
        return [
            "code" => HTTP_OK,
            "data" => $data
        ];
    }

}

