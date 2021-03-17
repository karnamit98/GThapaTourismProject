<?php 


    //start session
    session_start();
    
    include_once('user.php');
    
    $user = new User();
    
    if(isset($_POST['btnLoginSubmit'])){
        $username = $user->escape_string($_POST['username']);
        $password = $user->escape_string($_POST['password']);
    
        $auth = $user->check_login($username, $password);
    
        if(!$auth){
            $_SESSION['loginErrorMessage'] = 'Invalid username or password';
           // header('location:index.php');
           //header("location:login.php");
          // echo 'asfsdf';
           header("location:login.php");
        }
        else{
            $_SESSION['user'] = $auth;
            unset($_SESSION['message']);
            ?> <script> alert("Login Successful!"); </script> <?php
            header('location:account.php');
        }
    }
    else{
        $_SESSION['loginErrorMessage'] = 'You need to login first';
        header('location:index.php');
    }


?>