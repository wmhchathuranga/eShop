        <!-- Header -->
        <?php
        session_start();
        include_once("./connection.php");
        ?>
        <div class="row mt-2">
            <div class="col-12 col-md-4 offset-md-1 align-self-center text-center mb-md-0 mb-3">
                <span><a href="home.php"> HOME</a></span> | 
                <span class=""><b>Welcome </b>
                    <?php
                    if (isset($_SESSION["user"])) {
                        echo $_SESSION["user"]["fname"];
                    } ?>
                    | </span>
                
                    <?php
                    if (isset($_SESSION["user"])) {
                        echo "<span onclick='signout()' class='btn-link text-primary'>Sign Out</span>";
                    } else {
                        echo "<span onclick='signin()'><span class='btn-link text-primary'>Sign In</span> or <span class='btn-link text-primary'>Create Account</span></span>";
                    }
                    ?>
                
                <span class="fw-bold d-none d-md-inline"> | Help and Contact</span>
            </div>
            <div class="col-12 col-md-4 offset-md-3">
                <div class="row">
                    <div class="col align-self-center">
                        <p class="text-end m-0 fw-bold">Sell</p>
                    </div>
                    <div class="col align-self-center d-flex justify-content-center">
                        <div class="dropdown">
                            <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                My eShop
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./userProfile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">My Sellings</a></li>
                                <li><a class="dropdown-item" href="./myProducts.php">My Products</a></li>
                                <li><a class="dropdown-item" href="#">Wishlist</a></li>
                                <li><a class="dropdown-item" href="#">Purchase History</a></li>
                                <li><a class="dropdown-item" href="#">Message</a></li>
                                <li><a class="dropdown-item" href="#">Saved</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col align-self-center">
                        <a href="cart.php">
                            <span class="vertical-align:text-top">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
            <hr class="mt-2">
        </div>
        <!-- End of Header -->