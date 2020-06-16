<?php

class Form{
    public $method;
    public $id;
    public $fields;

    public function __construct($method, $id, array $fields = null){
        $this->method = $method;
        $this->id = $id;
        if($fields){
            $this->fields = $fields;
        }
    }

    public function getStartTag(){
        return "<form method=\"$this->method\" id=\"$this->id\">";
    }

    public function getEndTag(){
        return "</form>";
    }

    public function getFields(){
        return $this->fields;
    }
}
