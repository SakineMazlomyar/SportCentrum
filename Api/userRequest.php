<?php
session_start();
include_once("../Classes/adminClass.php");
include_once("../Classes/userClass.php");
$admin = new Admin();
$user = new User();
$method = isset($_SERVER['REQUEST_METHOD']);
if($method){
    if($method == 'POST') {
        if(isset($_POST['username']) && isset($_POST["password"])){
            $password = $_POST['password'];
            $username = $_POST['username'];
            $userInfo = $user->logInUser();
            $adminInfo = $admin->logInAdmin();
            foreach($userInfo as $user) {
                //Here we save the user inside the session
                $arrayUserInfo = array();
                if (password_verify($password, $user->password) && $user->mail == $username){
                    $theuserCheck = 1;
                    array_push($arrayUserInfo, $user->firstName, $user->userID);
                    foreach($arrayUserInfo as $k=>$v) {
                        $_SESSION['userInfo'][$k]=$v;
                    }
                    
                    echo json_encode($theuserCheck);
                    return;  
                }
            }
            foreach($adminInfo as $admin) {
                if(password_verify($password, $admin->password) && $admin->mail == $username) {
                    //echo json_encode("Du har loggats in");
                    $theAdminCheck = 0;
                    echo json_encode($theAdminCheck );
                    return;
                }    
            }
            echo json_encode("Please check your login credentials!");
            return;               
        }
        //Here we register new user
        
        if(!empty($_POST['passwordRegister']) && !empty($_POST['mail']) && !empty($_POST['rol'] )) {
            $password = $_POST['passwordRegister'];
            $rol = $_POST['rol'];
            $firstName = $_POST['firstname'];
            $lastName = $_POST['lastname'];
            $adress = $_POST['adress'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $phone = $_POST['phoneNo'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            $verifiedPass = password_verify($password, $hash);
            $mail = $_POST['mail'];
            //Here we check the value of nyhetsbrev
            if(isset($_POST['nyhetsbrev'])) {
                $nyhetsbrev = 1;
            }else {
                $nyhetsbrev = 0;
            }

            //Here we check  the rol and based on that register we
           if($rol == "user") {
               
                //Here we check the insert of new user and stop the inster if there is one
               $allUsers = $user->logInUser();
               foreach($allUsers as $person) {
                   if (password_verify($password, $person->password) && $person->mail == $mail) {
                           echo json_encode("You are already in the system.");
                           die();
                   }
          
               }
               if (password_verify($password, $hash)){
                   $addedNewUser = $user->insertNewUser($hash, $mail, $nyhetsbrev, $firstName, $lastName, $adress, $country, $city, $phone);
                   echo json_encode($addedNewUser);
               }
           }else {

                //Here we check if we have admin in the database and if no we insert it for the first time
                $getAllAdmin = $admin->logInAdmin();
                
                if($getAllAdmin == "Could not do it") {
                    if (password_verify($password, $hash)){
                        $addedNewAdmin = $admin->insertNewAdmin($hash, $mail);
                        echo json_encode($addedNewAdmin);
                    }
                    
                } else {
                    echo json_encode("We already have an Admin!");

                }
    

           }



        } else {
            echo json_encode("Det gick inte att registera dig");
        }
  
    }else {
        echo json_encode("Now you are using another method");
    }

}else{
    echo json_encode("We do not find any method");
}
?>