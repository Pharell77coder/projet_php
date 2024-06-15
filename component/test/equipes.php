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
      ["title" => 'equipes', "icon" => 'fa-users', 'link' => 'index.php'],
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
    </main>

    <!--<script src="script.js"></script>-->
  </body>
</html>