<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php  
      require_once 'database.php';
      require_once 'include\head.php';
      require_once 'include\header.php';
      require_once 'include\nav.php';
      require_once 'include\footer.php';

      $title = 'Football Website';
      $links = ['./../css/global.css', './../css/header.css', './../css/navigation.css', './../css/footer.css', 
      './../css/main.css', './../css/responsive.css',
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
    <div class="settings-container card">
      <h2>Paramètres</h2>
      <form action="parametre.php" method="post">
        <div class="form-group">
          <label for="username">Nom d'utilisateur :</label>
          <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="email">Adresse e-mail :</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="password">Nouveau mot de passe :</label>
          <input type="password" id="password" name="password">
        </div>

        <div class="form-group">
          <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
          <input type="password" id="confirm_password" name="confirm_password">
        </div>

        <button type="submit">Enregistrer</button>
      </form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        
        echo "<div class='card'><h2>Paramètres mis à jour avec succès!</h2>";
        echo "<p>Nom d'utilisateur: $username</p>";
        echo "<p>Email: $email</p>";
        if (!empty($password)) {
          if ($password === $confirm_password) {
            echo "<p>Mot de passe mis à jour avec succès.</p>";
          } else {
            echo "<p style='color:red;'>Les mots de passe ne correspondent pas.</p>";
          }
        }
        echo "</div>";
      }
      ?>
    </div>
  </main>
    <?php 
      $footer = new Footer;
      $footer -> generateFooter();
    ?>
  </body>
</html>