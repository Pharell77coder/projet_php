<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    require_once 'config.php';

    $title = 'Football Website';
    $links = [
        './../css/global.css', './../css/header.css', './../css/navigation.css', './../css/footer.css',
        './../css/main.css', './../css/customer.css', './../css/responsive.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',
        'https://fonts.googleapis.com/css2?family=Poppins&display=swap',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'
    ];
    $head = new Head($title, $links);
    $head->generateHTML();
    $head->generateCSSLink();
    ?>
</head>

<body>
    <?php
    $query = "SELECT pseudo, image FROM utilisateurs WHERE id = 2";
    $utilisateur = select_from_table($query);
    $title = 'Football';
    $name = $utilisateur[0]['pseudo'];
    $image = $utilisateur[0]['image'];
    $header = new Header($title, $name, $image);
    $header->generateHeader();
    ?>

    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle"><span class="fas fa-bars"></span></label>

    <?php
    $navdata = [
        ["title" => 'général', "icon" => 'fa-clipboard-list', 'link' => 'index.php'],
        ["title" => 'equipes', "icon" => 'fa-users', 'link' => 'equipes_pages.php'],
        ["title" => 'rencontres', "icon" => 'fa-futbol', 'link' => 'matchs_pages.php'],
        ["title" => 'joueurs', "icon" => 'fa-chart-line', 'link' => 'joueurs_pages.php'],
        ["title" => 'saison', "icon" => 'fa-chart-line', 'link' => 'saison_pages.php'],
        ["title" => 'contact', "icon" => 'fa-id-card', 'link' => 'contact.php'],
        ["title" => 'paramètre', "icon" => 'fa-cog', 'link' => 'parametres.php']
    ];


    $nav = new Nav($navdata);
    $nav->generateNav();
    ?>

    <!-- main dahsboard -->

    <main>
        <?php
        $topdata = [
            ['title' => "Saison Ligue 1", 'competition_name' => 'Ligue 1', 'annee' => '2023 - 2024', 'paragraphe' => "Saison 2023 et 2024 le champion est le Paris-SG", 'image' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/c/ca/Logo_Ligue_1_Uber_Eats_2020.svg/1200px-Logo_Ligue_1_Uber_Eats_2020.svg.png'],
            ['title' => "Saison Ligue 1", 'competition_name' => 'Ligue 1', 'annee' => '2022 - 2023', 'paragraphe' => "Saison 2022 et 2023 le champion est le Paris-SG", 'image' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/c/ca/Logo_Ligue_1_Uber_Eats_2020.svg/1200px-Logo_Ligue_1_Uber_Eats_2020.svg.png'],
            ['title' => "Saison Ligue 1", 'competition_name' => 'Ligue 1', 'annee' => '2021 - 2022', 'paragraphe' => "Saison 2021 et 2022 le champion est le Paris-SG", 'image' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/c/ca/Logo_Ligue_1_Uber_Eats_2020.svg/1200px-Logo_Ligue_1_Uber_Eats_2020.svg.png'],
            ['title' => "Saison Ligue 1", 'competition_name' => 'Ligue 1', 'annee' => '2020 - 2021', 'paragraphe' => "Saison 2020 et 2021 le champion est le Lille", 'image' => 'https://upload.wikimedia.org/wikipedia/fr/thumb/c/ca/Logo_Ligue_1_Uber_Eats_2020.svg/1200px-Logo_Ligue_1_Uber_Eats_2020.svg.png']
        ];

        $topCard = new Saion($topdata);
        $topCard->renderSaions($topdata);
        ?>
    </main>
    <?php
    $footer = new Footer;
    $footer->generateFooter();
    ?>
</body>

</html>