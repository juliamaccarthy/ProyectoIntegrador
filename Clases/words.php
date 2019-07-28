<?php
class words{
    private $seasonID;
    private $words;

    public function __construct($InitalDate, $words){
        $this->seasonID = $seasonID;
        $this->words = $words;

    }
    public function getseasonID(){
        return $this->seasonID;
    }
    public function setseasonID($seasonID){
        $this->seasonID = $seasonID;
    }
    public function getWordsID(){
        return $this->WordsID;
    }
    public function setWordsID($WordsID){
      $this->WordsID = $WordsID;
    }

}
?>
