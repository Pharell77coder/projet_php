<?php 

interface iHeader {
    public function generateHeader();
}

trait tHeader {
    public function headerContent($title, $name, $image) {
        ?>
        <header class="header">
            <h4><?php echo htmlspecialchars($title); ?></h4>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche">
            <div class="profile">
                <p class="profile-name"><?php echo htmlspecialchars($name); ?></p>
                <img class="profile-image" alt="no available image" src="<?php echo htmlspecialchars($image); ?>">
            </div>
        </header>
        <?php
    }
}

class Header implements iHeader {
    use tHeader;

    private $title;
    private $name;
    private $image;

    public function __construct($title, $name, $image) {
        $this->title = $title;
        $this->name = $name;
        $this->image = $image;
    }

    public function generateHeader() {
        echo $this->headerContent($this->title, $this->name, $this->image);
    }
}

?>