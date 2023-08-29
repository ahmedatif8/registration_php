<?php

function requiredinput($input){
    if(empty($input)){
        return true;
    }else{
        return false;
    }
}
function mininput($input, $length){
    if(strlen($input)<$length){
        return true;
    }
    return false;
}
function maxinput($input, $length){
    if(strlen($input)>$length){
        return true;
    }
    return false;
}
function emailinput($email){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}

function sameinput($val1,$val2){
    if($val1!=$val2){
        return true;
    }else{
        return false;
    }
}