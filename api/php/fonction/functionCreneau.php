<?php
require_once "./php/sql/creneau.php";
require_once "./php/http/Http_sendRequest.php";
function TraiterGet()
{
    $id = filter_input(INPUT_GET, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($id)) {
        $data = GetAllCreneauByClasseName($id);
        if (!empty($data)) {
            return [
                "code" => HTTP_OK,
                "data" => $data
            ];
        } else {
            return [
                "code" => HTTP_BAS_REQUEST,
                "data" => ["name" => "Cette Classe n'existe pas"]
            ];
        }
    } else {
        $data = GetAllCreneau();
        if ($data !== []) {
            return [
                "code" => HTTP_OK,
                "data" => $data
            ];
        }
    }


}
function TraiterPost(array $body): array
{

}
function TraiterPut(array $body, string $token): array
{
}
function TraiterDelete($body)
{
}
