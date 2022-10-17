<?php
$jsondata = file_get_contents("newdata.json");
$json = json_decode($jsondata, true);

$key = array_search((int) $_GET['id'], array_column($json['UserData'], 'id'));

// if $key false, was not found, presume it was...

$user = $json['UserData'][$key];
?>
<!DOCTYPE html>
<html>
<head>
    <title>View User Data</title>
</head>
<body>

    <!-- Display User Data Here -->

    <p>First Name: <?= $user['fname'] ?></p>
    <p>Last Name: <?= $user['lname'] ?></p>
    <p>Age: <?= $user['age'] ?></p>
    <p>Gender: <?= $user['gender'] ?></p>

    <p>Skills</p>
    <ul>
        <?= "<li>" .$user['skills']. "</li>" ?>
    </ul>

    <p>Image</p>

        <?= "<imge src='image/" .$user['image']. "'/>" ?>


</body>
</html>