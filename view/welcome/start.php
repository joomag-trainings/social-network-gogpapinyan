<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Twime</title>
        <link href="style.css" rel="stylesheet">
    </head>
<body>
    <div style="width:100%">
    <img class="mySlides" src="slide_images/1.jpg" width="100%" height="600px">
    <img class="mySlides" src="slide_images/2.jpg" width="100%" height="600px">
    <img class="mySlides" src="slide_images/3.jpg" width="100%" height="600px">
    <img class="mySlides" src="slide_images/4.jpg" width="100%" height="600px">
    </div>
    <script>
        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) {slideIndex = 1}
            x[slideIndex-1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>
    <p class="welcome">Welcome to Twime </p>
    <a href="index.php?page=welcome&action=LoginSignup" id="get_started"><input type="button" class="welcome" value="Get started!"></a>
    <?php include "footer.php" ?>
</body>
</html>