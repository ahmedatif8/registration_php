<?php
function getrequesttype(){
    return $_SERVER['REQUEST_METHOD'];
}
function postmethod(){
    if(getrequesttype()== "POST"){
        return true;
    }else{
        return false;
    }
}
function reciveInput($value){
    return trim(htmlentities(htmlspecialchars($value))) ;
}