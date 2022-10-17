<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php 

$tracking_id = "10483710001724";

$json = file_get_contents('https://track.delhivery.com/api/v1/packages/json/?waybill='.$tracking_id.'&token=9621e04dd8399c08d7bb807b42a66603c2a51b97');
// $json = file_get_contents("newdata.json");

$arr = json_decode($json, true);

echo "<pre>";
print_r($arr);
echo "</pre";

$newarry = array("new", "big");
print_r($newarry) ;
// the variables to call the data

// echo ($dstatus = $arr['ShipmentData'][0]['Shipment']['Status']['Status']);
// $dloc = $arr['ShipmentData'][0]['Shipment']['Status']['StatusLocation'];
// $ddt = $arr['ShipmentData'][0]['Shipment']['Status']['StatusDateTime'];
// $dsubs = $arr['ShipmentData'][0]['Shipment']['Status']['Instructions'];
// $dre = $arr['ShipmentData'][0]['Shipment']['Status']['RecievedBy'];

$dupdate = date('d-M-Y h:i', strtotime($ddt));


$expectedd = $arr['ShipmentData'][0]['Shipment']['ExpectedDeliveryDate'];
$newdate = date('d-M-Y', strtotime($expectedd));

$picdate = $arr["ShipmentData"][0]["Shipment"]["PickUpDate"];

echo $picdate;






foreach($data as $row){


}
























// foreach($arr as $v1){
//     echo "arry is run";
//     foreach($v1 as $v2){

//         echo $v2 . '' ;
    

//     }
//     echo '<br>';
    


// }



// foreach($arr as $key => $value){
//     // echo "{$key} <br>";
//     foreach($value as $relationship => $person ){
//         echo "{$key} has a relation named {$person} <br>";
//     }
// }






?>


<?php 
// $data = file_get_contents("https://track.delhivery.com/api/v1/packages/json/?waybill=10483710001724&token=9621e04dd8399c08d7bb807b42a66603c2a51b97");
// $data = json_decode($data, true);

// echo '<pre>';
// print_r($data);
// echo 'echo "</pre";';

// foreach($data as $row)
// {
//   echo '<tr><td>'.$row["ShipmentData"][0].'</td></tr>';

// }









?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

<?php 

?>
  <tbody>
    <tr>
        
      <th scope="row"><?php echo $picdate;?></th>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

<?php




?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
