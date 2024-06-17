<?php

class Equipe{
    public $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function generateTableEquipes(){
        ?> 
        <div class="card customer">
        <h2>Equipes</h2>
        <?php foreach ($this->data as $line) { ?>
            <div class="customer-wrapper">
                <img class="customer-image" alt="no avaible image" src=<?php echo $line['image'] ?>> 
                <div class="customer-name">
                <h4><?php echo $line['nom'] ?></h4>
                <p><?php echo $line['federation'] ?></p>
                </div>
                <p class="customer-date"><?php echo $line['confederation'] ?></p>
            </div>
        <?php }; ?>
        </div>
        <?php
    }
}

?>