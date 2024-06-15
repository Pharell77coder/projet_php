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
      <div class="dashboard-container">
        <?php 
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
          ['image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcScHTPNRs0U9vH08Jy5nKREMp8BqDwsMTUXjQ&s', 
          'name' => 'Baggy', 'description' => 'Aux milles pieces', 'login' => 'Today'],
          ['image' => 'https://img.wattpad.com/story_parts/1254730024/images/170858dbfeceef4b569029974783.gif', 'name' => 'Doflamingo', 
          'description' => 'Joker', 'login' => 'Today'],
          ['image' => 'https://pbs.twimg.com/media/ErXj7hSW8AckL_l.jpg', 
          'name' => 'Teach', 'description' => 'Barbe noire', 'login' => 'Yesterday'],
          ['image' => 'https://64.media.tumblr.com/001bdb860de2ea9bc9cc21fc6988f13b/d66cbcd97ae5ebef-43/s540x810/2187a41e09b8d1096783e166d83fbabe1019d592.jpg', 
          'name' => 'Zoro', 'description' => 'Le chasseur de pirates', 'login' => 'Yesterday'],
          ['image' => 'https://yzgeneration.com/wp-content/uploads/2022/04/One_Piece_1015_3.webp', 
          'name' => 'Yamato', 'description' => 'La fille du demon', 'login' => 'Yesterday']
      ];
        $customer = new Joueur($data);
        $customer -> generateTable();

        ?>
      </div>
    </main>

    <script src="script.js"></script>
  </body>
</html>