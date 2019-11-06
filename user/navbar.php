<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
    <i class="material-icons px-1" style="color:white">train</i>    
    <a class="navbar-brand" href="profile.php"><strong>RTS</strong></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <i class="material-icons mt-2" style="color: white;">person</i>
            <li class="nav-item pr-5">
                <a class="nav-link" href="profile.php"><?php echo $login_session; ?></a>
            </li>
            <i class="material-icons mt-2">recent_actors</i>
            <li class="nav-item pr-5">
                <a class="nav-link" href="history.php">Your Bookings</a>
            </li>
            <i class="material-iconsmt-4 mt-2 material-icons">input</i>
            <li class="nav-item pr-5">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>