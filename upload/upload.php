<?php
// Connect to the MySQL database
session_start();
include("../config.php");
$title = $conn->real_escape_string($_POST['title']);
$description = $conn->real_escape_string($_POST['description']);
$user_id = 1;
$redirect = header("location:index.php");
if ($_POST['title'] && $_POST['description']) {

        if (strlen($title) < 4) {
            $_SESSION["message"] = "the title ".$title." mast be greter than 4 char";$redirect;
        } 
        else if(!preg_match("/^[a-z A-Z]*$/",$description)){
            $_SESSION["message"] = "description ".$description." must be char only";$redirect;
        }
        else {

            if(isset($_POST['btn_up'])){
               $maxsize = 5242880;
               $name = $_FILES['file']['name'];
               $target_dir = "videos/";
               $target_file = $target_dir . $_FILES['file']['name'];
               $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               $extension_arr = array("mp4","mpeg","avi");
               if(in_array($videoFileType,$extension_arr)){
                if (($_FILES['file']['size'] >= $maxsize) || ($_FILES['file']['name'] == 0)) {
                    $_SESSION["message"] = "video pigger";$redirect;
                }
                else{
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        sleep(2);
                        $query = "INSERT INTO video (title,description,video_path,user_id) VALUES ('{$title}','{$description}','{$target_file}',{$user_id})";
                        $insert = mysqli_query($conn,$query);
                        if($insert){
                            $_SESSION["message"] = "The Video Add Successfully";$redirect;
                            header("location:index.php");
                        }
                        else{
                            $_SESSION["message"] = "some thing error";$redirect;
                        }
                    }
                    else{
                        $_SESSION["message"] = "some thing error";$redirect;
                    }
                }
               }else{
                $_SESSION["message"] = "extention not vaild";$redirect;
               }
            }
            else{
                $_SESSION["message"] = "error into file";$redirect;
            }
        }
    


    
}

else {
   $_SESSION["message"] ="enter all inputs";
}