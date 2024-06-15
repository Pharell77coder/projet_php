<?php
    Class Head implements iGenerateHTML{
        private $title;
        private $links;

        public function __construct($title, $links){
            $this->title = $title;
            $this->links = $links;
        }

        public function generateHTML(){
            ?>
            <meta charset='utf-8' />
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <meta name='author' content='Pharell'>
            <title><?php echo $this->title ?></title>
            <?php
            
        }

        public function generateCSSLink() {
            foreach ($this->links as $link) {
                ?>
                    <link rel='stylesheet' href=<?php echo $link ?> >
                <?php
            };
        }
    }

    interface iGenerateHTML {
        public function generateHTML();
    }
    
    /*
      $title = 'title';
      $links = ['style.css', 'item2', ...];
      $head = new Head($title, $links);
      $head->generateHTML();
      $head->generateCSSLink();
    */
?>