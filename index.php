
<?php

require_once "./nav.html";
$servername = "localhost";
$username = "id21248053_agricfaculty";
$password = "Pass1word?";
$dbname = "id21248053_records";

$errors = [];
$success = [];
$conn = mysqli_connect($servername, $username, $password,$dbname);
if($_SERVER["REQUEST_METHOD"] == "POST"){

  if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {

    $allowedMimeTypes = ["application/pdf"];
    $allowedExtensions = ["pdf"];
    $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
    $fileMimeType = finfo_file($fileInfo, $_FILES["fileToUpload"]["tmp_name"]);
    $fileExtension = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);


    if (in_array($fileMimeType, $allowedMimeTypes) && in_array($fileExtension, $allowedExtensions)) {

        $fullName = $_POST["fullName"];
        $year = $_POST["year"];
        $programme = $_POST["programme"];
        $currentTimezone = new DateTimeZone('WAT');
        $now = new DateTime('now', $currentTimezone);

        $currentDateTime = $now->format('Y-m-d H:i:s');


        try{

          $fileContent = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

          $escapedFileContent = $conn->real_escape_string($fileContent);

          $sql = "INSERT INTO internship_reports (fullname, year, programme,date_created,image) VALUES ('$fullName','$year','$programme','$currentDateTime','$escapedFileContent')";


          if(mysqli_query($conn,$sql)){
            // header("Location: ./success.php");
            $success[] = "Report uploaded successfully!!! 👍👍";


        }


        }
        catch(ValueError $e){

          $errors[] = "Failed to upload file ... Try again🧐🥴";


        }

        } else {

            $errors[] = "Invalid file type. Please upload pdf file!!!😑😕...";
        }
        } else {

            $errors[] = "Failed to upload file ... Try again🧐🥴";

        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico">
    <title>Internship_report</title>
</head>
<body>
    <div class="col-md-6 offset-md-3 mt-3 mb-3">

        <?php if(!empty($errors)): ?>

          <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
              <div>
                <?php echo $error ?>
              </div>
            <?php endforeach; ?>
          </div>

        <?php endif; ?>

        <?php if(!empty($success)): ?>

          <div class="alert alert-success">
            <?php foreach($success as $error): ?>
              <div>
                <?php echo $error ?>
              </div>
            <?php endforeach; ?>
          </div>

        <?php endif; ?>

        <h1 class="mb-3">INTERNSHIP REPORT</h1>
        <form method="POST" enctype="multipart/form-data" action="index.php">
          <div class="form-group">
            <label for="exampleInputName">Full Name</label>
            <input type="text" name="fullName" class="form-control" id="exampleInputName" placeholder="Enter your fullName" required="required">
          </div>

          <div class="form-group">
            <label for="year">Year</label>
            <select class="form-control" id="year" name="year" required="required">
            <option value="" selected disabled>Select your year</option>
              <option>Year 1</option>
              <option>Year 2</option>
              <option>Year 3</option>

            </select>
          </div>
          <div class="form-group">
            <label for="programme">Programme of study</label>
            <select class="form-control" id="programme" name="programme" required="required">
              <option value="" selected disabled>Select your programme</option>
              <option>Agriculture</option>
              <option>Agribusiness Management</option>
              <option>Landscape Design and Management</option>
              <option>Agricultural Biotechnology</option>
            </select>
          </div>
          <hr>
          <div class="form-group mt-3">
            <label class="mr-2"><strong>**Upload your report(pdf format)</strong></label><br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <!-- <input type="file" name="file"> -->
          </div>
          <hr>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
