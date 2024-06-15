<?php 

class Rencontres{
    public $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function generateTable(){
        ?> 
        <div class="detail card">
        <div class="detail-header">
            <h2>Rencontres</h2>
            <button> Voir Plus </button>
          </div>
          <table>
          <tbody><tr><th>Date</th><th>Domicile</th><th>Score</th><th>Exterieur</th></tr></tbody>
        <?php foreach ($this->data as $line) { ?>
            <tbody>
                <tr><th><?php echo $line['date'] ?></th>
                <th><?php echo $line['domicile'] ?></th>
                <th><?php echo $line['score'] ?></th>
                <th><?php echo $line['exterieur'] ?></th></tr>
            </tbody>
        <?php }; ?>
        </table>
        </div>
        <?php
    }
}
?>