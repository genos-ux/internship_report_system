<?php

require_once "./nav.html";
session_start();

$_SESSION["user"] = "john";
$_SESSION["password"] = "john";

$none = [];

if($_SERVER['REQUEST_METHOD'] = 'POST'){



    if(!empty($_POST["username"]) && !empty($_POST["password"])){


        $username = $_POST["username"];
        $password = $_POST['password'];

        if($username == 'AgricVTP2023' && $password == 'VTP@2023'){
            header("Location: ./display_results.php");
        }

        else{
          $none[] = "Password / username is incorrect!!!";

        }

    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<section class=" offset-md-3 mt-5 mb-1">
  <div>

      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="" method="POST">
        <?php if(!empty($none)): ?>

            <div class="alert alert-danger">
              <?php foreach($none as $error): ?>
                <div>
                  <?php echo $error ?>
                </div>
              <?php endforeach; ?>
            </div>

        <?php endif; ?>
            <h1 class="mb-5 fs-1" style="font-size: 4.5rem;">LOGIN</h1>


          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg" required
              placeholder="Enter your username" />
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required/>
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3"  />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <!-- <button type="button" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button> -->
              <input type="submit" value="LOGIN" style="padding-left: 2.5rem; padding-right: 2.5rem" class="btn btn-primary btn-lg" name="login">
            <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger">Register</a></p> -->
          </div>

        </form>
      </div>
    </div>
  </div>

</section>
</body>
</html>
