<?php require_once './nav.html' ?>

<!DOCTYPE html>
<html>
<head>
    <title>STATUS</title>
</head>
<body>

    <div class="col-md-6 offset-md-3 mt-5 mb-1">
    <h1 class="mx-3 fw-bolder fs-1" style="font-size: 5rem">I AM A  </h1>
    <form method="POST" action="" class="mt-2" style="position:relative">
        <label>
            <input type="radio" name="status" value="lecturer"> <h4 style="display:inline">lecturer</h4>
        </label>

        <label style="margin-left:15px" class="ms-3 ps-3">
        <input type="radio" name="status" value="student"> <h4 style="display:inline">student</h4>
        </label>
        <br>

        <br>
        <input type="submit" value="NEXT" style="position:absolute;right:20px" class="btn btn-primary" name="next">
    </form>

    </div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
    <title>Form Processing</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['username'] = 'AgricVTP2023';
        $_SESSION['password'] = 'VTP@2023';
        if (isset($_POST["status"])) {
            $selectedStatus = $_POST["status"];
            if($selectedStatus == 'student'){
                header('Location: ./index.php');
            }

            else{
                header('Location: ./lecturer_login.php');
            }
        } else {
            echo "Please select an option!!";
        }
    }
    ?>
    <br>

</body>
</html>
