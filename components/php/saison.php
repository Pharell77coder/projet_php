<?php

interface iSaion {
    public function generateTableSaions();
}

trait tSaion {
    public function renderSaions($data) {
        $i = 1;
        foreach ($data as $line) { ?>
            <div class="card total<?php echo $i; ?>">
                <div class="info">
                    <div class="info-detail">
                        <h3><?php echo htmlspecialchars($line['title']); ?></h3>
                        <p><?php echo htmlspecialchars($line['competition_name']); ?>  <?php echo htmlspecialchars($line['annee']); ?></p>
                        <h2><span> <?php echo htmlspecialchars($line['paragraphe']); ?></span></h2>
                    </div>
                    <div class="info-image">
                        <img class="profile-image" src="<?php echo htmlspecialchars($line['image']); ?>" alt="no available image" />
                    </div>
                </div>
            </div>
        <?php
        $i++;
        }
    }
}

abstract class AbstractSaion implements iSaion {
    use tSaion;

    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }

    abstract public function generateTableSaions();
}

class Saion extends AbstractSaion {
    public function generateTableSaions() {
        $this->renderSaions($this->data);
    }
}

?>