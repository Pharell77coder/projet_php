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
    include "header.php";
    include "nav.php";
    include "footer.php";

    //$pdo = new PDO('db:/component/db/data.db');
    


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
            echo "<h2>".$this->name."</h2>";
            echo "<div>";
            echo "<img src='".$this->picture."' alt='". $this->name."' />";
            echo "<p>".$this->description."</p>";
            echo "</div>";
        }
    }

    $Person1 = new User("Link", "https://wallpapers-clan.com/wp-content/uploads/2023/11/zelda-link-sword-aesthetic-desktop-wallpaper-preview.jpg", "C'est link quoi");
    $Person1->createCard();

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
    <main id="main"></main>
    <script src="../js/accueil.js"></script>
</body>
</html>