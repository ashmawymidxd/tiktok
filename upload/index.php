<?php 
 session_start();
if(!isset($_SESSION['user_id'])){
  header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login & Signup Form | CodingNepal</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
  </head>
  <body class="new">
    <div class="wrapper new">
     
      <div class="form-container">

        <div class="slide-controls new">      
          <label for="signup" class="slide signup">Upload Videos</label>
        </div>
        <div id="line"></div>
        <div class="form-inner">
  
          <form action="upload.php" class="signup" id="form" method="post" enctype="multipart/form-data">
            <center>
              <?php
             
                if(isset($_SESSION['message']))
                  echo 
                "<div id='message' style='display:block;color:#ac0b91' class='main-c'>
                    <div class='flex-space'>
                    <div>".$_SESSION['message']."</div>
                     <button id='btn' class='' style='width:20px;height:20px;border:none;background-color:#ac0b91;border-radius:50%;color:white'>X</button>
                    </div>
                  </div>"
                  ?>
            </center>

            <script>
              // window.onload = ()=>{
              //   setTimeout(() => {
              //     window.message.style.display="none";
              //   }, 5000);
              // }
              window.btn.onclick = ()=>{
                let form = document.querySelector("#form");
                form.onsubmit = (e)=>{
                    e.preventDefault();
                }
                window.btn.parentElement.parentElement.style.display='none';
              }
            </script>

            

            <div class="field">
              <input class="input new-in" type="text" placeholder="Name" name="title" >
            </div>

            <div class="field">
              <input class="input new-in" type="text" placeholder="Description" name="description" >
            </div>

            
            <div class="field flex new">
              <label for="fileInput" class="main-c"> Select Video</label>
              <input id="fileInput" class="input new-in" type="file" placeholder="select video" name="file" hidden>
            </div>

            <div class="file-details flex new main-c" id="fileDetails" style="box-shadow:none">
                <h3>File Details:</h3>
                <p>Name: <span id="fileName"></span></p>
                <p>Type: <span id="fileType"></span></p>
                <p>Size: <span id="fileSize"></span> bytes</p>
                <h3>Preview:</h3>
         
                <video style="height:230px" id="filePreview" src="" controls></video>
            
            </div>

            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Upload" id="submit" name="btn_up">
            </div>
          

              <div class="links">
              <a class ="link new" href="../home.php">Return</a> 
              <strong>or</strong>
              <a class ="link new" href="/tik/signup">
              <i class="fa-brands fa-facebook fa-1xl" style="color: #005eff;"></i>
              </a> 
              <a class ="link new" href="/tik/signup">
              <i class="fa-brands fa-google fa-1xl" style="color: #ff0000;"></i>
              </a> 
              <button class="link new" id="btn_mode">
              <i class="fa-solid fa-sun fa-beat fa-1xl" style="color: #ff0095;"></i>
              </button>
              </div>
            
          </form>
          
        </div>
      </div>
    </div>
  </body>
</html>

<script>
  const btn_mode = document.querySelector("#btn_mode");

  btn_mode.onclick=()=>{
    let form = document.querySelector("#form");
    form.onsubmit = (e)=>{
        e.preventDefault();
    }
    var mode1 = parseInt(localStorage.getItem('mode1')) || 0;
    if(mode1 == 1){
      mode1 = 0;
      window.location = "index.php";
    }
    else{
      mode1 = 1;
      window.location = "index.php";
    }
    localStorage.setItem('mode1', mode1);
  }

  let mode = document.getElementsByTagName("*");
  window.onload = ()=>{
    var mode1 = parseInt(localStorage.getItem('mode1')) || 0;
    localStorage.setItem('mode1', mode1);
    if(mode1 == 1){
      for (let i = 0; i < mode.length; i++) {
        if (mode[i].classList.contains("new")) {
          mode[i].classList.toggle("old");
        }  
        
        if(mode[i].classList.contains("input")){
          mode[i].classList.toggle("old-in");
        }  
      }
      
    }
  }

</script>

<script>
        const fileInput = document.getElementById('fileInput');
        const fileDetails = document.getElementById('fileDetails');
        const fileNameElement = document.getElementById('fileName');
        const fileTypeElement = document.getElementById('fileType');
        const fileSizeElement = document.getElementById('fileSize');
        const filePreview = document.getElementById('filePreview');

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                fileDetails.style.display = 'block';
                fileNameElement.textContent = file.name;
                fileTypeElement.textContent = file.type;
                fileSizeElement.textContent = file.size;
                const reader = new FileReader();
                reader.onload = function() {
                    filePreview.src = reader.result;
                }
                reader.readAsDataURL(file);
            } else {
                fileDetails.style.display = 'none';
            }
        });
    </script>
