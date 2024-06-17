<?php 

class Matchs{
    public $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function generateTableMatchs(){
        ?> 
        <div class="detail card">
        <div class="detail-header">
            <h2>Rencontres</h2>
            <button onclick="window.location.href='matchs_pages.php';"> Voir Plus </button>
          </div>
          <table>
          <tbody><tr><th>Date</th><th>Domicile</th><th>Score</th><th>Exterieur</th></tr></tbody>
        <?php foreach ($this->data as $line) { ?>
            <tbody>
                <tr><td><?php echo $line['date'] ?></td>
                <td><?php echo $line['domicile'] ?></td>
                <td><?php echo $line['score_dom'] ?>-<?php echo $line['score_ext'] ?></td>
                <td><?php echo $line['exterieur'] ?></td></tr>
            </tbody>
        <?php }; ?>
        </table>
        </div>
        <?php
    }
}
?>