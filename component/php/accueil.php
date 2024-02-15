<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="author" content="Pharell">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <?php

    include "header.php";
    include "nav.php";
    include "footer.php";

    $dbFile = '../db/data.db';

    $db = new SQLite3($dbFile);
    
    $query = "SELECT pseudo, email, mdp, image FROM utilisateur";
    $result = $db->query($query);
    
    $data = array();
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $data[] = $row;
    }
    
    $db->close();
    
    class User {
        public $name;
        public $picture;
        public $description;

        public function __construct($name, $picture, $description){
            $this->name = $name;
            $this->picture = $picture;
            $this->description = $description;
        }

        public function createCard(){
            echo '<div class="profile">';
            echo "<img src='".$this->picture."' alt='". $this->name."' />";
            echo "<h2>".$this->name."</h2>";
            echo "<p>".$this->description."</p>";
            echo "</div>";
        }
    }

    $i = 0;
    while ($i < count($data)) {
        $Person1 = new User($data[$i]['pseudo'], $data[$i]['image'], $data[$i]['email']);
        $Person1->createCard();
        $i = $i + 1;
    }
    ?>
</body>
</html>