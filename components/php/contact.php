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
    <div class="contact-container card">
      <h2>Contactez-nous</h2>
      <form action="contact.php" method="post">
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="subject">Sujet:</label>
        <input type="text" id="subject" name="subject" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit" class='btn' >Envoyer</button>
      </form>

      <div class="contact-info card">
        <h3>Nos Information</h3>
        <p>Addresse: 1 rue de la paix, Paris</p>
        <p>Téléphone: (33) 01 23 45 67 89</p>
        <p>Email: pharell77coder.com</p>
      </div>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    echo "<div class='contact-container card'><h2>Message</h2>";
    echo "<p>Nom: $name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Sujet: $subject</p>";
    echo "<p>Message: $message</p></div>";
  }
  ?>
    </main>
    <?php 
      $footer = new Footer;
      $footer -> generateFooter();
    ?>
  </body>
</html>