<?php
class TextCell extends Cell{
    
    public function display(){
        
        // str_pad(...) ---> http://www.php.net/manual/de/function.str-pad.php
        echo "|" . str_pad($this->content, 10);
    }
}