<?php

class Modal
{
    Public  $id;
    Public  $title;
    Public  $idCloseButton;
    Public  $idSubmitButton;
    Public  $NameSubmitButton;
    

    Public Function __construct($id ,$title , $idCloseButton ,$idSubmitButton,$NameSubmitButton){
        $this->id = $id;
        $this->title =$title;
        $this->idCloseButton =$idCloseButton;
        $this->idSubmitButton =$idSubmitButton;
        $this->NameSubmitButton =$NameSubmitButton;
       
    }

    Public Function getTagModal(){
        $html ="<div class=\"modal\" id=\"$this->id\">";
        $html .="<div class=\"modal-dialog modal-xl\"> <div class=\"modal-content\"> <div class=\"modal-header\">";
        $html .="<h4 class=\"modal-title\"> $this->title </h4> ";
        $html .="</div>";
        return $html;
    }

    Public function getTagBodyModal(){
        $html="<div class=\"modal-body\">";
        $html .= "<div id=\"message-$this->id\">  </div>";
        return $html;
    }

    Public function EndTagBodyModel(){
        $html="</div>";
        return $html;
    }

    Public function getFooterModal(){
        $html  = "<div class=\"modal-footer\">";
        $html .= "<button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\" id= \"$this->idCloseButton\" > Close </button>";
        $html .= "<button type=\"button\" class=\"btn btn-primary\" id=\"$this->idSubmitButton\" > $this->NameSubmitButton </button>";
        $html .="</div>";
        $html .="</div>";
        $html .="</div>";
        $html .="</div>";
        return $html;
    }

    

    

}