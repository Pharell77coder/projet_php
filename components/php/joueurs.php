<?php
interface iJoueur {
    public function generateTableJoueurs();
}

trait tJoueur {
    public function renderJoueurs($data) {
        ?> 
        <div class="card customer">
        <h2>Joueurs</h2>
        <?php foreach ($data as $line) { ?>
            <div class="customer-wrapper">
                <img class="customer-image" alt="no available image" src="<?php echo htmlspecialchars($line['image']); ?>"> 
                <div class="customer-name">
                    <h4><?php echo htmlspecialchars($line['prenom']); ?> <?php echo htmlspecialchars($line['nom']); ?></h4>
                    <p><?php echo htmlspecialchars($line['nationalité']); ?></p>
                </div>
                <p class="customer-date"><?php echo htmlspecialchars($line['club']); ?></p>
            </div>
        <?php } ?>
        </div>
        <?php
    }
}
class Joueur implements iJoueur {
    use tJoueur;

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function generateTableJoueurs() {
        echo $this->renderJoueurs($this->data);
    }
}

?>