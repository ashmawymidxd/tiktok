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
                <label for="signup" class="slide signup">Signup</label>
            </div>
            <center>
                <div id="message"></div>
            </center>

            <div class="form-inner">

                <form action="#" class="signup" id="form">
                    <div class="field">
                        <input type="text" class="input new-in" placeholder="username" name="username">
                    </div>

                    <div class="field">
                        <input type="email" class="input new-in" placeholder="Email" name="email">
                    </div>

                    <div class="field">
                        <input type="password" class="input new-in" placeholder="password" name="password">
                    </div>

                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Signup" id="submit">
                    </div>
                    <div class="links">
                        <a class="link new" href="/tik/login">login</a>
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
    <script src="script_signup.js"></script>
</body>
</html>

<script>
  const btn_mode = document.querySelector("#btn_mode");

  btn_mode.onclick=()=>{
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
