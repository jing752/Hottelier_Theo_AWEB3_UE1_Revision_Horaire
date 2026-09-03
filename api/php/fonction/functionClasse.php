<?php
require_once "./php/sql/classe.php";
require_once "./php/http/Http_sendRequest.php";
function TraiterGet() 
{
    $data = GetAllClasse();
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
