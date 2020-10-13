<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <?php
            if (Roles::checkRole(RolesModel::ROLE_MODERATOR_ID)){
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="/admin">Admin </a>
            </li>
            <?php
            }
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/users">Users</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profile
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/profile/<?=$_SESSION['user']['id']?>">Profile</a>
                    <a class="dropdown-item" href="/profile/logout">Logout</a>
                    <a class="dropdown-item" href="/profile/<?=$_SESSION['user']['id']?>/skills">Skills</a>
                </div>
            </li>
        </ul>
    </div>
</nav>