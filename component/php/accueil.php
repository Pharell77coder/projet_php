<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="author" content="Pharell">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
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


    include "header.php";
    include "nav.php";
    include "footer.php";
    


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
            echo "<div class='profile'>";
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

    $equipe1 = 'Paris saint germain';
    $equipe2 = 'Real socicedad';
    $score1 = 2;
    $score2 = 0;

    $match = [
        ['dom' => $equipe1,
        'ext' => $equipe2,
        'score' => [$score1, $score2]],
        ['dom' => $equipe1,
        'ext' => $equipe2,
        'score' => [$score1+2, $score2+3]],
    ];

    echo 'Score : '.$match[0]['dom'].' '.$match[0]['score'][0].' - '.$match[0]['score'][1].' '.$match[0]['ext'];
    echo 'Score : '.$match[1]['dom'].' '.$match[1]['score'][0].' - '.$match[1]['score'][1].' '.$match[1]['ext'];
    if ($match[1]['score'][0] > $match[1]['score'][1]){
        echo 'Vainqueur : '.$match[1]['dom'];
    } else if($match[1]['score'][0] < $match[1]['score'][1]){
        echo 'Vainqueur : '.$match[1]['ext'];
    }

    ?>
</body>
</html>