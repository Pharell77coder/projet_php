<?php
interface iTopCard {
    public function generateTopCard();
}

trait tTopCard {
    public function renderCard($data) {
        $i = 1;
        foreach ($data as $line) { ?>
            <div class="card total<?php echo $i; ?>">
                <div class="info">
                    <div class="info-detail">
                        <h3><?php echo htmlspecialchars($line['title']); ?></h3>
                        <p><?php echo htmlspecialchars($line['paragraphe']); ?></p>
                        <h2><?php echo htmlspecialchars($line['first_numbers']); ?><span> <?php echo htmlspecialchars($line['second_numbers']); ?></span></h2>
                    </div>
                    <div class="info-image">
                        <i class="<?php echo htmlspecialchars($line['icon']); ?>"></i>
                    </div>
                </div>
            </div>
        <?php
        $i++;
        }
    }
}

class TopCard implements iTopCard {
    use tTopCard;

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function generateTopCard() {
        echo $this->renderCard($this->data);
    }
}
?>
