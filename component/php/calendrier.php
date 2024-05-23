<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once "include/head.php"; ?>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/calendrier.js"></script>
</head>
<body>
    <?php
        require_once "include/header.php";
        require_once "include/nav.php";

        require "database.php";
        
        $query = "DELETE FROM matchs";
        delete_from_table($query);

        $table_name = "matchs";
        $attributes = ["id INTEGER PRIMARY KEY", "home_team_name TEXT",  
        "away_team_name TEXT",  "home_team_score INTEGER ", 
        "away_team_score INTEGER", "date DATE"];
        create_table($table_name, $attributes);

        $query = "SELECT name FROM teams";
        $teams = select_from_table($query);
        $array = [];
        for ($i = 0; $i < count($teams); $i++){
            $name_team[] = $teams[$i]['name'];
        }
        $json_name_team = json_encode($name_team);
        
    ?>
    <div class="main" id="main">
        <button onclick='main_league(<?php echo $json_name_team ?>)'>RUN</button>
    </div>

    
    <?php 
        require_once "include/footer.php";
    
    ?> 
</body>
</html>