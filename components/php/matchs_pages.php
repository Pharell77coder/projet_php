<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php  
      require_once "database.php";
      require_once 'include\head.php';
      require_once 'include\header.php';
      require_once 'include\nav.php';
      require_once 'matchs.php';

      $title = 'Football Website';
      $links = ['./../css/global.css', './../css/header.css', './../css/navigation.css', 
      './../css/main.css', './../css/detail.css', './../css/responsive.css',
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
      ["title" => 'contact', "icon" => 'fa-id-card', 'link' => 'contact.php'],
      ["title" => 'paramètre', "icon" => 'fa-cog', 'link' => 'parametres.php']
    ];

    $nav = new Nav($navdata);
    $nav -> generateNav();
  ?>

    <!-- main dahsboard -->
    
    <main>
    <?php

    $query = "SELECT domicile, score_dom, score_ext, exterieur, date FROM matchs";
    $data_matchs = select_from_table($query);

    $detail = new Matchs($data_matchs);
    $detail -> generateTableMatchs();
    ?>
    </main>

    <!--<script src="script.js"></script>-->
  </body>
</html>