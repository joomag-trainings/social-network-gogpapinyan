<!DOCTYPE html>
<html>
<head>
    <title>Twime-feed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h3 style="float:left">My Photos</h3>
<form action="index.php?page=user&action=newPhoto" method="post"  enctype="multipart/form-data" style="float:right">
    <input type="file" name="newPhoto" id="newPhoto">
    <button type="submit" name="add">Add new photo</button>
    <span class="errors"><?php if (isset($uploadError)) { echo $uploadError; }?></span>
</form>
<div id="myphotos">

</div>
</body>
</html>