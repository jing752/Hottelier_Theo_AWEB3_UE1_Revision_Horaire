<?php
require_once "./php/sql/creneau.php";
require_once "./php/sql/classe.php";
require_once "./php/sql/cours.php";
require_once "./php/http/Http_sendRequest.php";
function TraiterGet()
{
    $id = filter_input(INPUT_GET, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    if (!isset($id)) {
        $data = GetAllCreneauByClasseName($id);
        if (!$data) {
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
    $classe_id = 0;
    $cours_id = 0;
    $jour = "";
    $heure_debut = "";
    $heure_fin = "";
    $salle = 0;
    $critereRespecter = true;
    $code = HTTP_CREATED;
    $data = [];
    //Verification du champ classe
    if (!isset($body["classe"])) {
        $critereRespecter = false;
        array_push($data, ["classe" => "Paramètre manquant"]);
    } else {
        if (!GetClasseByName($body["classe"])) {
            $critereRespecter = false;
            array_push($data, ["classe" => "Veillez rentré une classe qui existe"]);
        } else {
            $classe_id = GetClasseByName($body["classe"])["id"];
        }
    }

    //Verification du champ cours
    if (!isset($body["cours"])) {
        $critereRespecter = false;
        array_push($data, ["cours" => "Paramètre manquant"]);
    } else {
        if (!GetCoursByName($body["cours"])) {
            $critereRespecter = false;
            array_push($data, ["cours" => "Veillez rentré une classe qui existe"]);
        } else {
            $cours_id = GetCoursByName($body["cours"])["id"];
        }
    }

    if (!isset($body["jour"])) {
        $critereRespecter = false;
        array_push($data, ["jour" => "Paramètre manquant"]);
    } else {
        $checkJour = false;
        $joursArray = [
            "lundi",
            "mardi",
            "mercredi",
            "jeudi",
            "vendredi"
        ];

        foreach ($joursArray as $value) {
            if ($value == $body["jour"]) {
                $checkJour = true;
            }
        }
        if ($checkJour) {
            $jour = $body["jour"];
        } else {
            $critereRespecter = false;
            array_push($data, ["jour" => "Veuillez rentrés un jour de la semaine en minuscule"]);
        }
    }

    if (!isset($body["heure_debut"])) {
        $critereRespecter = false;
        array_push($data, ["heure_debut" => "Paramètre manquant"]);
    } else {
        $heure_debut = $body["heure_debut"];
    }

    if (!isset($body["heure_fin"])) {
        $critereRespecter = false;
        array_push($data, ["heure_fin" => "Paramètre manquant"]);
    } else {
        $heure_fin = $body["heure_fin"];
    }

    if (!isset($body["salle"]) ) {
        $critereRespecter = false;
        array_push($data, ["salle" => "Paramètre manquant"]);
    } else {
        $salle = "Salle : " . $body["salle"];
    }

    if ($critereRespecter) {
        AddCreneau($classe_id, $cours_id, $jour, $heure_debut, $heure_fin, $salle);
        return [
            "code" => $code,
            "data" => ["Succes" => "Ajout avec Succes"]
        ];
    } else {
        return [
            "code" => $code,
            "data" => $data
        ];
    }
}
function TraiterPut(array $body, string $token): array
{
    return [
        "code" => HTTP_OK,
        "data" => []
    ];
}
function TraiterDelete($body) {}
