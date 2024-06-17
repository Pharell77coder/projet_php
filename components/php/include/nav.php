<?php 

Class Nav{
    private $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function generateNav(){
        ?> <nav class="nav">
        <?php foreach ($this->data as $line) { ?>
            <a  href=<?php echo $line['link'] ?>><div class="nav-menu"><span class="fas <?php echo $line['icon'] ?>"></span><p><?php echo $line['title'] ?></p></div></a>
        <?php  }; ?> </nav> <?php
    }
}
?>