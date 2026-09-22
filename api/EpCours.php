<?php
require_once "./php/http/Http_sendRequest.php";
require_once "./php/fonction/functionCours.php";
$token = lireJetton();
$verb = $_SERVER["REQUEST_METHOD"];
$body = DecodePost();

switch ($verb) {
    case "GET":
        $reponse = TraiterGet();
        break;
    default:
        $reponse = [
            "data" => "Méthode non autorisée",
            "code" => HTTP_METHODE_NOT_ALLOWEB
        ];
        break;
}
SendRequest($reponse);
