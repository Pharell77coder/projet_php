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
            <div class="profile">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for company..">
                <span class="fas fa-search"></span>
                <img class="profile-image" alt="no avaible image" src=<?php echo $this->image ?>>
                <p class="profile-name"><?php echo $this->name ?></p>
            </div>
        </header> 
       <?php
    }
}


?>