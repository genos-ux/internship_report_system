

<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";

$_SESSION['statement'] = 'SELECT fullName,programme,year,date_created FROM internship_reports WHERE programme ="Agribusiness Management" AND year="Year 2"';

try {
  $pdo = new PDO("mysql:host=$servername;dbname=lecturer_login", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $statement = $pdo->prepare($_SESSION['statement']);
  $statement->execute();
  $products = $statement->fetchAll(PDO::FETCH_ASSOC);



}

catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>





<!DOCTYPE html>
<html>
    <head>
        <title>Agribusiness_Two</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!-- <h2>User Data</h2> -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Full name</th>
                <th scope="col">Programme</th>
                <th scope="col">Year</th>
                <th scope="col">Date</th>

                </tr>
            </thead>
            <tbody>


                <?php foreach($products as $i => $product): ?>

                    <tr>
                        <th scope="row"><?php echo $i+1 ?></th>
                        <td><?php echo $product["fullName"] ?></td>
                        <td><?php echo $product["programme"] ?></td>
                        <td><?php echo $product["year"] ?></td>
                        <td><?php echo $product["date_created"]?></td>
                        <!-- <td><?php echo'<img src="data:image/jpeg;base64
                        ,' . base64_encode($product["image"]) . '" />'?></td> -->


                    </tr>

            <?php endforeach; ?>

            </tbody>
        </table>


    </body>
</html>
