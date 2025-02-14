<?php require('partials/header.php'); ?>

<section class="vh-100" style="background-color: #666;">
    <div class="card bg-dark position-absolute top-50 start-50 translate-middle w-50 p-3 rounded login-area-card">
        <div class="m-auto">
            <img src="img/dummy.jpg" alt="" width="50">
        </div>
        <p class="text-center fs-5">Welcome to Storage App</p>
        <p class="text-center">Please register your account.</p>
        <form action="" method="post">
            <div class="card-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control bg-dark text-light" id="floatingInput" placeholder="name@example.com" name="username" required autocomplete="off" autofocus />
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control bg-dark text-light" id="floatingPassword" placeholder="Password" name="password1" required />
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control bg-dark text-light" id="floatingPassword" placeholder="Password" name="password2" required />
                    <label for="floatingPassword">Confrim Password</label>
                </div>
                <div class="mt-3 text-center">
                    <button type="submit" name="signup" class="btn btn-outline-light ">Register</button>
                    <a href="login.php" class="btn btn-outline-light">Login</a>
                </div>
            </div>
        </form>
    </div>
</section>