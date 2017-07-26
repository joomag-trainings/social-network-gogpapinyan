<header id="signin_header">
    <div class="logo" >
        <a href="index.php?page=welcome&action=LoginSignup"> <img src="logo.png"></a>
    </div>
    <div class="title">
        <p>Twime</p>
    </div>
    <div class="signin">
        <span><?php  ?></span>
        <form method="post" action="index.php?page=authentication&action=login">
            <input type="text" placeholder="Username or email" name="login_username" id="username" class="signin_el">
            <input type="password" placeholder="Password" name="login_password" id="password" class="signin_el">
            <input type="submit" value="Login" name="login" class="signin_el">
            <span class="errors"><?php if (isset($loginError)) { echo $loginError; }?></span>
        </form>
    </div>
</header>