<?php
interface iEquipe {
    public function generateTableEquipes();
}

trait tEquipe {
    public function renderEquipes($data) {
        ?> 
        <div class="card customer">
            <h2>Equipes</h2>
            <?php foreach ($data as $line) { ?>
                <div class="customer-wrapper">
                    <img class="customer-image" alt="no available image" src="<?php echo htmlspecialchars($line['image']); ?>"> 
                    <div class="customer-name">
                        <h4><?php echo htmlspecialchars($line['nom']); ?></h4>
                        <p><?php echo htmlspecialchars($line['federation']); ?></p>
                    </div>
                    <p class="customer-date"><?php echo htmlspecialchars($line['confederation']); ?></p>
                </div>
            <?php } ?>
        </div>
        <?php
    }
}
class Equipe implements iEquipe {
    use tEquipe;

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function generateTableEquipes() {
        echo $this->renderEquipes($this->data);
    }
}

?>