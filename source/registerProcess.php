<?php 


    //start session
   // session_start();
    
    include_once('user.php');
    
    $user = new User();
    
    if(isset($_POST['btnRegisteSubmit'])){
        $username = $user->escape_string($_POST['username']);
        $password = $user->escape_string($_POST['password']);
    
       // $auth = $user->check_login($username, $password);
       $registration = $user->register_user($_POST['name'], $_POST['username'], $_POST['email'],$_POST['password']);
    
        if(!$auth){ //if successful
         //   $_SESSION['loginErrorMessage'] = 'Invalid username or password';
           // header('location:index.php');
           //header("location:login.php");
          // echo 'asfsdf';
          echo "Registration Failed!";
          // header("location:register.php");

        }
        else{
          //  $_SESSION['user'] = $auth;
          //  unset($_SESSION['message']);
          
           // header('location:login.php');
          echo "Registration Successfull!";
        }
    }
    else{
        $_SESSION['registerErrorMessage'] = 'Registration Failed!';
        //header('location:register.php');
          echo "Registration Failed Fatal!";
    }


?>  