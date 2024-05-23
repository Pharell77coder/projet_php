<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once "include/head.php"; ?>
</head>
<body>
    <?php

        require_once "include/header.php";
        require_once "include/nav.php";

        require "database.php"; 
    ?>
    <main class="main" id="main">
    <?php
        
        $query = "DELETE FROM teams";
        $result = delete_from_table($query);
        $table_name = "teams";
        $attributes = ["id INTEGER PRIMARY KEY", "name TEXT", "logo TEXT", "federation TEXT", "confederation TEXT", "elo INTEGER"];
        drop_table_if_exists($table_name);
        create_table($table_name, $attributes);

        $teams = [
            ["name" => "Paris-SG", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/mcpMspef1hwHwi9qrfp4YQ_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Monaco", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/RX0XTi5Dtg4joMtuHNmYKg_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Brest", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/HNqZwlu71GHXo60XjYrPxg_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Lille", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/D2AQe8qoyPIP4K8MzLvwuA_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Nice", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/Llrxrqsc3Tw4JzE6xM7GWw_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Lyon", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/SrKK55dUkCxe4mJsyshfCg_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Lens", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/TUvwItKazVFpgThEhhlN1Q_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Marseille", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/KfBX1kHNj26r9NxpqNaTkA_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Reims", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/NWzvJ-A3j8HQkeQZ0sJP1w_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Rennes", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/guI8eg4hoTyIp6rO1opjxA_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Toulouse", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/DrzFcMWJgtG1nDSdfN0dBA_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Montpelier", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/fL5Nk_2eUanYiOSB9AnBpQ_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Strasbourg", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/Eb9xtMpUy8FXQ0RCKvLxcg_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Nantes", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/r3qizrAtoAXPICgYjFYCyA_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Le Havre", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/BRitaBE1_mjMJguk6xzTRw_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Metz", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/b7iBf-aijuqQaScGSpDV7A_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Lorient", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/bbYkAWWtD6lpK5KyGfr1vA_48x48.png", "federation" => "france", "confederation" => "europe"],
            ["name" => "Clermont", "logo" => "https://ssl.gstatic.com/onebox/media/sports/logos/0aur9jOW37pq6dUzu61wWQ_48x48.png", "federation" => "france", "confederation" => "europe"]
        ];
        foreach ($teams as $team) {
            $data = [
                'name' => $team["name"],
                'logo' => $team["logo"],
                'federation' => $team["federation"],
                'confederation' => $team["confederation"],
                'elo' => 1
            ];
            $table_name = 'teams';
            add_element($table_name, $data);
        }

        $query = "SELECT * FROM teams";
        $results = select_from_table($query);

        echo "<div class='table_match'>";
        foreach ($results as $row) {
            echo "<div class='equipe'><img src='".$row['logo']."' /><p> Nom : " . $row['name'] . ", Elo : " . $row['elo'] . "</p></div><br>";
        }
        echo "</div>";

    ?>
    </main>
    <?php require_once "include/footer.php";?>
</body>
</html>