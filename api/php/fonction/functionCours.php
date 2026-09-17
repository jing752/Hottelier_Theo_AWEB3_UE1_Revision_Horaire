<?php
require_once "./php/sql/cours.php";
require_once "./php/http/Http_sendRequest.php";
function TraiterGet() 
{
    $data = GetAllCours();
    if ($data !== []) {
            return [
                "code" => HTTP_OK,
                "data" => $data
            ];
    }

}

