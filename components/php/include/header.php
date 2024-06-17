<?php 

Class Header{
    private $title;
    private $name;
    private $image;

    public function __construct($title, $name, $image){
        $this->title = $title;
        $this->name = $name;
        $this->image = $image;
    }

    public function generateHeader(){
       ?> 
        <header class="header">
            <h4><?php echo $this->title ?></h4>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche">
            <div class="profile">
            <p class="profile-name"><?php echo $this->name ?></p>
                <img class="profile-image" alt="no avaible image" src=<?php echo $this->image ?>>
            </div>
        </header> 
       <?php
    }
}


?>