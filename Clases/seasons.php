<?php
class Season{
    private $InitialDate;
    private $FinalDate;
    private $WordsID;
    private $genre;

    public function __construct($InitalDate, $FinalDate, $WordsID, $genre){
        $this->InitialDate = $InitialDate;
        $this->FinalDate = $FinalDate;
        $this->WordsID = $WordsID;
        $this->genre = $genre;

    }
    public function getInitialDate(){
        return $this->InitialDate;
    }
    public function setInitialDate($InitialDate){
        $this->InitialDate = $InitialDate;
    }
    public function getWordsID(){
        return $this->WordsID;
    }
    public function setWordsID($WordsID){
      $this->WordsID = $WordsID;
    }
    public function getFinalDate(){
        return $this->FinalDate;
    }
    public function setFinalDate($FinalDate){
        $this->FinalDate = $FinalDate;
    }
    public function getgenre(){
        return $this->genre;
    }
    public function setgenre($genre){
        $this->genre = $genre;
    }

}
?>
