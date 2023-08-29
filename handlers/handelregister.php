<?php
session_start();

include '../core/request.php';
include '../core/validation.php';
include '../core/session.php';


$errors=[];

if(postmethod()){

    foreach($_POST as $key => $value){
        $$key = reciveInput($value);
    }
    //validation
    if(requiredinput($name)){
        $errors[]="name required";
    }elseif(mininput($name,3)){
        $errors[]="name must be greater than 3";
    }elseif(maxinput($name,20)){
        $errors[]="name must be smaller than 20";
    }
    
    if(requiredinput($email)){
        $errors[]="email required";
    }elseif(emailinput($email)){
        $errors[] = "please type a valid email";
    }
    
    if(requiredinput($password)){
        $errors[] = "password required";
    }elseif(mininput($password,6)){
        $errors[] ="password must be greater than 6 chars";
    }elseif(maxinput($password,25)){
        $errors[] = "password must be smaller than 25 chars";
    }
    
    if(requiredinput($confirm_password)){
        $errors[] = "confirm password required";
    }elseif(sameinput($password,$confirm_password)){
        $errors[] = "confirm password must be equal to password";
    }

    if(empty($errors)){
        $user = [
            'name' => $name,
            'email'=> $email
        ];
        sessionStore("user",$user);
        header("location:../profile.php");
    }else{
        sessionStore("errors",$errors);
        header("location:../form.php");
    }

}else{
    echo "not supported method";
}