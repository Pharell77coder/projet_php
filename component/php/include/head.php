<?php
class Head {
    public function generate_HTML(){
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Document</title>';
        echo '<meta name="author" content="Pharell">';
        echo '<link rel="stylesheet" href="../css/main.css">';
    }
}

$TopHead = new Head();
$TopHead->generate_HTML();
?>