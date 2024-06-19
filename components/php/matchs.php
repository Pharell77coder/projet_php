<?php 
interface iMatchs {
    public function generateTableMatchs();
}

trait tMatchs {
    public function renderMatchs($data) {
        ?> 
        <div class="detail card">
            <div class="detail-header">
                <h2>Rencontres</h2>
                <button onclick="window.location.href='matchs_pages.php';"> Voir Plus </button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Domicile</th>
                        <th>Score</th>
                        <th>Exterieur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $line) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($line['date']); ?></td>
                            <td><?php echo htmlspecialchars($line['domicile']); ?></td>
                            <td><?php echo htmlspecialchars($line['score_dom']); ?>-<?php echo htmlspecialchars($line['score_ext']); ?></td>
                            <td><?php echo htmlspecialchars($line['exterieur']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}
class Matchs implements iMatchs {
    use tMatchs;

    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function generateTableMatchs() {
        echo $this->renderMatchs($this->data);
    }
}
?>