<?php 
interface iFooter {
    public function generateFooter();
}

trait tFooter {
    public function footerContent() {
        return "© Pharell TITI, 2024 | Tous droits réservés";
    }
}

class Footer implements iFooter {
    use tFooter;

    public function generateFooter() {
        ?> 
        <footer class="footer"><p><?php echo $this->footerContent(); ?></p></footer>
        <?php
    }
}
?>