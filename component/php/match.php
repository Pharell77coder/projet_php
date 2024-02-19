<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include "include/head.php"; ?>
</head>
<body>
    <?php

    include "include/header.php";
    include "include/nav.php";
    include "include/footer.php";

    
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