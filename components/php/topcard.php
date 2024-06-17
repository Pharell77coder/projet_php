<?php
class TopCard {

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function generateTopCard() {
        $i = 1;
        foreach ($this->data as $line) { ?>
            <div class="card total<?php echo $i; ?>">
                <div class="info">
                    <div class="info-detail">
                        <h3><?php echo $line['title']; ?></h3>
                        <p><?php echo $line['paragraphe']; ?></p>
                        <h2><?php echo $line['first_numbers']; ?><span> <?php echo $line['second_numbers']; ?></span></h2>
                    </div>
                    <div class="info-image">
                        <i class="<?php echo $line['icon']; ?>"></i>
                    </div>
                </div>
            </div>
        <?php
        $i++;
        }
    }
}
?>
