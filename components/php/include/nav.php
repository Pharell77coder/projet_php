<?php 

interface iNav {
    public function generateNav();
}

trait tNav {
    public function navContent($data) {
        ob_start();
        ?>
        <nav class="nav">
        <?php foreach ($data as $line) { ?>
            <a href="<?php echo htmlspecialchars($line['link']); ?>">
                <div class="nav-menu">
                    <span class="fas <?php echo htmlspecialchars($line['icon']); ?>"></span>
                    <p><?php echo htmlspecialchars($line['title']); ?></p>
                </div>
            </a>
        <?php } ?>
        </nav>
        <?php
        return ob_get_clean();
    }
}

class Nav implements iNav {
    use tNav;

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function generateNav() {
        echo $this->navContent($this->data);
    }
}
?>