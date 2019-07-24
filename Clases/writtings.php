<?php
class Writtings{
    private $escritor;
    private $title;
    private $subtitle;
    private $body;
    private $seasonID;
    private $mentor;
    private $feedback;
    private $likes;

    public function __construct($titulo, $subtitulo=null, $body){
        $this->escritor= $escritor;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->body= $body;
        $this->seasonID = $seasonID;
        $this->mentor = $mentor;
        $this->feedback = $feedback;
        $this->likes = $likes;
    }
    public function getEscritor(){
        return $this->escritor;
    }
    public function setEscritor($escritor){
        $this->escritor = $escritor;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
      $this->title = $title;
    }
    public function getSubtitle(){
        return $this->subtitle;
    }
    public function setSubtitle($subtitle){
        $this->subtitle = $subtitle;
    }
    public function getBody(){
        return $this->body;
    }
    public function setBody($body){
        $this->body = $body;
    }
    public function getseasonID(){
        return $this->seasonID;
    }
    public function setseasonID($seasonID){
        $this->seasonID = $seasonID;
    }
    public function getMentor(){
       return $this->$mentor;
    }
    public function setMentor($mentor){
        $this->mentor = $mentor;
    }
    public function getFeedback(){
       return $this->$feedback;
    }
    public function setFeedback($feedback){
        $this->feedback = $feedback;
    }
    public function getLikes(){
       return $this->$likes;
    }
    public function setLikes ($likes){
        $this->likes = $likes;
    }
}
?>
