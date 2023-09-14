<nav class="navbar bg-light navbar-expand-lg bg-body-tertiary sticky-top">
    <div class="container ">
        <a class="navbar-brand" href="#">Code Smasher's</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./register.php">SignUp</a>
                </li>
                <?php if(isset($_SESSION['auth_user'])) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <?= $_SESSION['auth_user']['user_name']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./admin/index.php">Admin Dashboard</a></li>
                        <li>
                            <form action="all_logOut.php" method="post">
                                <button name="logout_btn" class="btn-danger dropdown-item" type="submit">logOut</button>
                            </form>
                        </li>

                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Code Smasher's</a>
                </li>
            </ul>
            <?php endif ; ?>

        </div>
    </div>
</nav>