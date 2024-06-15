<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php  
      require_once "database.php";
      require_once 'include\head.php';
      require_once 'include\header.php';
      require_once 'include\nav.php';
      require_once 'rencontres_table.php';
      require_once 'joueur.php';
      require_once 'topcard.php';

      $title = 'Responsitive Dashboard Admin';
      $links = ['css/global.css', 'css/header.css', 'css/navigation.css', 
      'css/main.css', 'css/detail.css', 'css/customer.css', 'css/responsive.css',
      'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css', 
      'https://fonts.googleapis.com/css2?family=Poppins&display=swap', 
      'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'];
      $head = new Head($title, $links);
      $head->generateHTML();
      $head->generateCSSLink();
    ?>
  </head>
  <body>
  <?php
    $title = 'Dashboard';
    $name = 'Pharell';
    $image = 'https://pbs.twimg.com/media/FREjAjXXwAASCp7.jpg:large';
    $header = new Header($title, $name, $image);
    $header->generateHeader();
  ?>

    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle"><span class="fas fa-bars"></span></label>
    
    <?php
    $data = [
      ["title" => 'général', "icon" => 'fa-clipboard-list', 'link' => 'index.php'],
      ["title" => 'equipes', "icon" => 'fa-users', 'link' => 'equipes.php'],
      ["title" => 'rencontres', "icon" => 'fa-futbol', 'link' => 'index.php'],
      ["title" => 'joueurs', "icon" => 'fa-chart-line', 'link' => 'index.php'],
      ["title" => 'contact', "icon" => 'fa-id-card', 'link' => 'index.php'],
      ["title" => 'paramètre', "icon" => 'fa-cog', 'link' => 'settings.php']
    ];
    $nav = new Nav($data);
    $nav -> generateNav();
  ?>

    <!-- main dahsboard -->
    
    <main>
      <div class="dashboard-container">
        <?php

        $data = [
          ['title' => 'Euro', 'first_numbers' => '', 'second_numbers' => '', 'paragraphe' => 'En cours', 'icon' => ''],
          ['title' => 'Ligue des Champions', 'first_numbers' => '', 'second_numbers' => '', 'paragraphe' => 'Real Madrid', 'icon' => ''],
          ['title' => "Coupe d'afrique des nations", 'first_numbers' => '', 'second_numbers' => '', 'paragraphe' => "Cote d'ivoire", 'icon' => ''],
          ['title' => 'Copa america', 'first_numbers' => '', 'second_numbers' => '', 'paragraphe' => 'Bientot', 'icon' => '']
        ];

        $topCard = new TopCard($data);
        $topCard->generateTopCard();

        $data = [
          ['domicile' => 'Paris-SG', 'score' => '4-1', 'exterieur' => 'Marseille', 'date' => 'Apr 11, 2021'],
          ['domicile' => 'Lyon', 'score' => '3-3', 'exterieur' => 'Lille', 'date' => 'Mar 29, 2021'],
          ['domicile' => 'Lille', 'score' => '2-4', 'exterieur' => 'Paris-SG', 'date' => 'Feb 10, 2020'],
          ['domicile' => 'Marseille', 'score' => '1-2', 'exterieur' => 'Lyon', 'date' => 'Dec 11, 2020'],
          ['domicile' => 'Paris-SG', 'score' => '3-2', 'exterieur' => 'Lyon', 'date' => 'Nov 20, 2020'],
          ['domicile' => 'Marseille', 'score' => '1-3', 'exterieur' => 'Lille', 'date' => 'Nov 01, 2020']
        ];
        $detail = new Rencontres($data);
        $detail -> generateTable();

        $data = [
          ['image' => 'https://img.olympics.com/images/image/private/t_1-1_300/f_auto/primary/ron2ny1sxmnrrqlxgnak', 
          'name' => 'Kilian Mbappe', 'description' => 'Français', 'login' => 'Today'],
          ['image' => 'https://img.a.transfermarkt.technology/portrait/big/418560-1709108116.png?lm=1', 'name' => 'Erling Haaland', 
          'description' => 'Norvégien', 'login' => 'Today'],
          ['image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Cristiano_Ronaldo_playing_for_Al_Nassr_FC_against_Persepolis%2C_September_2023_%28cropped%29.jpg/800px-Cristiano_Ronaldo_playing_for_Al_Nassr_FC_against_Persepolis%2C_September_2023_%28cropped%29.jpg', 
          'name' => 'Cristiano Ronaldo', 'description' => 'Portugais', 'login' => 'Yesterday'],
          ['image' => 'https://www.fifpro.org/media/fhmfhvkx/messi-world-cup.jpg?rxy=0.48356841796117644,0.31512414378031967&width=1600&height=1024&rnd=133210253587130000', 
          'name' => 'Lionnel Messi', 'description' => 'Argentin', 'login' => 'Yesterday'],
          ['image' => 'https://static.independent.co.uk/2024/06/12/12/newFile.jpg', 
          'name' => 'Harry Kane', 'description' => 'Anglais', 'login' => 'Yesterday']
      ];
        $customer = new Joueur($data);
        $customer -> generateTable();

        ?>
      </div>
    </main>

  </body>
</html>