<?php

class Field {
    Public $label;
    public $type;
    public $name;
    public $value;
    public $onkeyup;

    public function __construct($label ,$type, $name ,$value ,$onkeyup){
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->onkeyup = $onkeyup;
    }

    public function getName(){
        return $this->name;
    }

    public function getTag(){
            
                    $html ='<div class="list-group">';
                    $html .= '<div class="form-group">';                   
                    $html .= "<label> $this->label</label>";   
                    $html .= "<input  class=\"form-control\" ";
                    $html .= " type=\"$this->type\"";
                    $html .= " name=\"$this->name\"";
                    $html .= " id=\"$this->name\"";
                    $html .= " onkeyup=\"$this->onkeyup\"";
                    $html .= ">"; 
                    $html .= '</div>';  
                    $html .= '</div>';                                            
                
                    return $html;
    
    }
}


