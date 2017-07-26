<!DOCTYPE html>
<html>
<head>
    <title><?php echo $firstname.' '.$surname."'s Profile" ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="profile_wrapper">
        <div id="cover_photo" ><img src="cover.jpg" id="cover_photo" alt="cover_photo"></div>
        <div id="profile_photo_frame"><img  id= "profile_photo" src="<?php  if (isset($profphoto)) {
                echo $profphoto;
            } else {
                echo "unknown.png";
            } ?>" alt="profile_photo">
        </div>
        <div id="profile_name"><p><?php echo $firstname." ".$surname ?></p></div>

        <div id="info"></div>
            <a href="index.php?page=user&action=friends" style="text-decoration: none"><button id="friends_btn">My friends</button></a>
        <a href="index.php?page=user&action=photos" style="text-decoration:none"><button id="photos_btn">My photos</button></a>
        </div>
    </div>
</body>
</html>