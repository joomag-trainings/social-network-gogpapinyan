<!DOCTYPE html>
<html>
<head>
    <title>Get started</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

<?php include "../view/welcome/signupheader.php"; ?>
<div id="wrapper_signin">
<div id="signup_form">
<h5>New to Twime? Sign up and share your best moments </h5>
<form method="post" action="index.php?page=user&action=signup">
    <input type="text" placeholder="Name" name="reg_name" value="<?php if (isset($name)) {echo $name;} ?>"> <br>
    <span class="errors"><?php if (isset($validation)) {echo  $validation->getNameError(); }?></span> <br>
    <input type="text" placeholder="Surname" name="reg_surname" value="<?php if (isset($surname)) {echo $surname;} ?>"> <br>
    <span class="errors"><?php if (isset($validation)) {echo  $validation->getSurnameError(); }?></span> <br>
    <input type="text" placeholder="Email" name="reg_email" value="<?php if (isset($email)) {echo $email;} ?>"><br>
    <span class="errors"><?php if (isset($validation)) {echo  $validation->getEmailError(); }?></span> <br>
    <input type="text" placeholder="Username" name="reg_username" value="<?php if (isset($username)) {echo $username;} ?>"><br>
    <span class="errors"><?php if (isset($validation)) {echo  $validation->getUsernameError(); }?></span> <br>
    <input type="password" placeholder="Password" name="reg_password"><br>
    <span class="errors"><?php if (isset($validation)) {echo  $validation->getPasswordError(); }?></span> <br>
    <input type="radio" value="male" name="reg_gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
    <input type="radio" value="female" name="reg_gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>>Female
    <br>
    <span class="errors"><?php if (isset($validation)) {echo  $validation->getGenderError(); }?></span> <br>
    <input type="submit" value="Sign Up" name="signup">
</form>
    <span><?php if (isset($signupOK)) { echo $signupOK; } ?></span>
</div>
</div>

<?php include "footer.php" ?>
</body>
</html>