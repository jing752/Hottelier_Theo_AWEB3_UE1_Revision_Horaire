<?php
require_once "./php/db/dbConfig.php";
function db():PDO{

        static $db = null;

        if($db === null)
        {
            $db = new PDO(
        "mysql:host=".HOST.";dbname=".DBNAME.";charset=".CHARSET."",
        NAME,
        MDP
        );

        // Configurer la connexion à la DB
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    return $db;
}
