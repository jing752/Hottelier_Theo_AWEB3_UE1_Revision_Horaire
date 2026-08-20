<?php 
define("HTTP_OK",200);                  //OK
define("HTTP_CREATED",201);             //Resource ajouter
define("HTTP_NO_CONTENT",204);          //Pas de contenu renvoyer
define("HTTP_BAS_REQUEST",400);         //Erreur dans la requette
define("HTTP_UNAUTHORIZED",401);        //Manque d'autentification
define("HTTP_FORBIDDEN",403);           //Pas les droit requis
define("HTTP_NOT_FOUND",404);           //Pas trouvé
define("HTTP_METHODE_NOT_ALLOWEB",405); //Methode pas permise
define("HTTP_TROLL",418);               //Elle sert a rien
define("HTTP_INTERNALERROR",500);       //Error du programme

/**
 * crée la reponse pour les api
 *
 * 
 * @param array $data le tableau doit contenir le code d'erreur et la data
 * 
 */
function SendRequest(array $data)
{
    header('Content-Type: application/json');
    http_response_code($data["code"]);
    echo json_encode($data["data"]);
    die();
}
/**
* Lire le jeton dans l'entête de la requête HTTP.
* Le jeton doit se trouver dans : 'Authorization' => 'Bearer <TOKEN>'
* @return string Le jeton trouvé. Une chaîne vide autrement.
*/
function lireJetton() : string
{
// Lire les données de l'entête de la requête (seulement avec Apache2)
$httpHeaders = getallheaders();
// Lecture du champ 'Authorization'
$bearerString = $httpHeaders['Authorization'] ?? '';
// Exploser les données -> ["Bearer", "token"]
$bearer = explode(' ', $bearerString, 3);
// Pas le bon type d'authentification
if ($bearer[0] !== 'Bearer' || count($bearer) != 2) {
return "";
}
// Retourner la case qui contient le jeton (ou autre chose)
return $bearer[1];
}
function DecodePost(): array
{
    $body = file_get_contents("php://input");
    if ($body !== false && $body !== "") {
        // Décoder les données du body
        return $json = json_decode($body, true);
    } else {
        // Pas de données
        return $json = [];
    }
}
