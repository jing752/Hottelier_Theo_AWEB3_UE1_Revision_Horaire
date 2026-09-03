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
function TraiterPost(array $body): array 
{
    
}
function TraiterPut(array $body, string $token): array {}
function TraiterDelete($body) {}
