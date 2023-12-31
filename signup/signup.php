<?php

$data = file_get_contents('php://input');
$data = json_decode($data);

if ($data->password && $data->username  && $data->email && $data->data_type == 'signup') {
    
    $conn = new mysqli('localhost', 'root', '', 'tiktok');
    // Query to check if the email and password exist in the member table
    $sql = "SELECT * FROM member WHERE email='$data->email' limit 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "This email already exist!";
        
    } 
    else{
        if (strlen($data->username) < 4) {
            echo "the user name mast be greter than 4 char";
        } 
        else if(!preg_match("/^[a-z A-Z]*$/",$data->username)){
            echo "username must be char only";
        }
        else {
            
            if (strlen($data->password) < 8) {
                echo "password must be grater than 8 char";
            } else {
               
                $username='root';
                $password='';
                $database= new PDO("mysql:host=localhost;dbname=tiktok;charset=utf8;",$username,$password);
                        
                $add_data = $database->prepare("insert into member (password,username,email) values (:password,:username,:email)");
                $enc_pass = md5($data->password);
                $add_data->bindParam('password',$enc_pass);
                $add_data->bindParam('username',$data->username);
                $add_data->bindParam('email',$data->email);
            
                
                if ($add_data->execute()) {
                    echo "done";
                } 
                
                else {
                    var_dump($add_data->errorInfo());
                    echo"error";
                }
            }
            
        }
    }


    
}

else {
   echo"enter all inputs";
}