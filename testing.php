<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track your all the JSON DATA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php 
    
    $dtls = file_get_contents("data.json");

    $data = json_decode($dtls, true);
    
    echo '';
    print_r($data);
    
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                
                foreach($data as $row){
                    echo '';
                    // print_r($row);
                    // echo '
                    // <b>the main theme is '.$row[0][0][0][0].'</b>

                    // ';
                }
                
                
                ?>
            </div>
        </div>
    </div>












<script src="https:cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>












































