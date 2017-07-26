<header id="header_timeline">
    <div class="logo" >
        <a href="index.php?page=user&action=timeline"> <img src="logo.png" style="width: 60px; height: 40px;"></a>

    </div>
    <p class="title" id="title">Twime</p>
    <form method="post" action="index.php?page=user&action=search">
        <input type="text" placeholder="Search for users" name="key">
        <input type="submit" value=">>" >
    </form>
    <div>
        <a><i class="fa fa-home" aria-hidden="true"></i></a>
        <a><i class="fa fa-bell-o" aria-hidden="true"></i></a>
        <a><i class="fa fa-envelope" aria-hidden="true"></i></a>
        <div class="dropdown">
        <a><i class="fa fa-user" aria-hidden="true"></i></a>
            <div class="dropdown-content">
                <a href="index.php?page=user&action=profile">My profile</a>
                <a href="index.php?page=authentication&action=logout">Logout</a>
            </div>
        </div>

    </div>
</header>