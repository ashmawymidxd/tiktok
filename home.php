<?php
include("config.php");

$query = "SELECT * FROM video";
$result = mysqli_query($conn, $query);

$videos = "";
$empty = "";

if (mysqli_num_rows($result) >= 1) {
    $videos = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
else{
    echo "There Is No Video Here";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style.css">
        <!-- Font Awesome -->
        <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
</head>
<body class="new">
    <div class="app-vedio">
        <?php
        foreach($videos as $video){?>

        <div class="vedio">
            <video src="upload/<?php echo $video['video_path']?>" class="video-player"></video>
                <div class="footer">
                    <div class="footer-text">
                        <h3><?php echo $video['title']?></h3>
                        <p class="description"><?php echo $video['description']?></p>
                        <div class="img-marq">
                            <a href="upload/index.php">
                                <img src="img/up.png" alt="">
                            </a>
                            <marquee style="color:white" behavior="" direction=""><?php echo $video['created_at']?></marquee>
                        </div>
                    </div>     
                        <img class="image-play" src="img/play.png" alt="">
                </div>
        </div>
        <?php }?>
        
    </div>

    <script>
        const videos = document.querySelectorAll("video");

        // Function to handle video play/pause
        function handleVideoPlay(video) {
            if (video.paused) {
                video.play();
            } else {
                video.pause();
            }
        }

        videos.forEach((video) => {
            // Add a flag to keep track of video visibility
            let isVisible = false;

            // Create an observer to track video visibility
            const observer = new IntersectionObserver((entries) => {
                const entry = entries[0];
                if (entry.isIntersecting) {
                    // Video is in view
                    isVisible = true;
                } else {
                    // Video is out of view
                    isVisible = false;
                    video.pause();
                }
            });

        observer.observe(video);

        // Add click event listener to handle play/pause
        video.addEventListener('click', () => {
            if (isVisible) {
                handleVideoPlay(video);
            }
            
            // const parentTagName = video.parentNode.className;
            // alert(`Parent tag name: ${parentTagName}`);

            // Get next sibling node

            // const nextSibling = video.parentElement.nextElementSibling;
            // // Get last child's tag name and display in alert
            // if (nextSibling && nextSibling.lastElementChild) {
            //     const lastChildTagName = nextSibling.lastElementChild.lastElementChild.classList.toggle("stop");
            //     //alert(`Last child tag name of next sibling: ${lastChildTagName}`);
            // } else {
            //     alert('No next sibling or last child found');
            // }

          });
        });
    </script>

    <script>
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
            else{
          
            }
        }

    </script>


</body>
</html>