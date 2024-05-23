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
    </main>
    <?php include_once "include/footer.php";?>
    <script src="../js/accueil.js"></script>
</body>
</html>