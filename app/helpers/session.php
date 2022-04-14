<?php 
   session_start();
   function isLoggedIn(){
       if(isset($_SESSION['userLevel'])){
            return true;
       }else {
           return false;
       }
   }



   function prevention() {

    if(isLoggedIn()){
         if($_SESSION['userLevel'] == 1 ){
            header('location:' . URLROOT . '/students/profile');
        }
        
    }


    }
   
    


    
    function SemStart(){
        if(isLoggedIn()){
            if(isset($_SESSION['status'])){
                return true;
            }else{
                return false;
            }
        }
    }
    

    function generate(){
        if(isset($_SESSION['yearFrom'])){
            return true;
        }else{
            return false;
        }
    }


    function guard(){
        if(!isLoggedIn()){
            header('location:' . URLROOT . '/pages/home');

        }
    }
   