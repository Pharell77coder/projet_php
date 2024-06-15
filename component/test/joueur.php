<?php

class Joueur{
    public $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function generateTable(){
        ?> 
        <div class="card customer">
        <h2>Joueurs</h2>
        <?php foreach ($this->data as $line) { ?>
            <div class="customer-wrapper">
                <img class="customer-image" alt="no avaible image" src=<?php echo $line['image'] ?>> 
                <div class="customer-name">
                <h4><?php echo $line['name'] ?></h4>
                <p><?php echo $line['description'] ?></p>
                </div>
                <p class="customer-date"><?php echo $line['login'] ?></p>
            </div>
        <?php }; ?>
        </div>
        <?php
    }
}

?>