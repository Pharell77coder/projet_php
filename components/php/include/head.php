<?php
interface iHead {
    public function generateHTML();
    public function generateCSSLink();
}

trait tHead {
    public function metaTags() {
        ?>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta name='author' content='Pharell'>
        <?php
    }

    public function generateTitle($title) {
        ?>
        <title><?php echo htmlspecialchars($title); ?></title>
        <?php
    }

    public function generateLinks($links) {
        foreach ($links as $link) {
            ?>
            <link rel='stylesheet' href="<?php echo htmlspecialchars($link); ?>" >
            <?php
        }
    }
}

class Head implements iHead {
    use tHead;

    private $title;
    private $links;

    public function __construct($title, $links) {
        $this->title = $title;
        $this->links = $links;
    }

    public function generateHTML() {
        $this->metaTags();
        $this->generateTitle($this->title);
    }

    public function generateCSSLink() {
        $this->generateLinks($this->links);
    }
}

?>