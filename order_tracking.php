<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Track Your Shipment</title>
</head>
<body>


<!-- tracking data -->



<section class="wrapper bg-soft-primary container">
<div class="container pt-6 pb-6 pt-md-4 pb-md-4 text-center">




<?php
echo "<br>";
// $tracking_id = "CM114256848IN"; // the old tracking id 
// $tracking_id = "10483710001724";  // the new tracking id
// $tracking_id = "10483710001746";  // the new tracking id
$tracking_id = "10483710001724";  // the new tracking id  //here the tracking id have to write perfectly.


$courier =  strlen($tracking_id);

if($courier == 13){
    
echo 'india post'; 
  
}else{
echo '
Delivery';
}



if($courier == 13){
  $co = "09021";
}else{
  $co = "100060";
}



if($co == 100060){

  // on the $tracking_id the id no have to write perfectly otherwise the code will not run perfectly

$json = file_get_contents('https://track.delhivery.com/api/v1/packages/json/?waybill='.$tracking_id.'&token=9621e04dd8399c08d7bb807b42a66603c2a51b97');

$arr = json_decode($json, true);

$dstatus = $arr['ShipmentData'][0]['Shipment']['Status']['Status'];
$dloc = $arr['ShipmentData'][0]['Shipment']['Status']['StatusLocation'];
$ddt = $arr['ShipmentData'][0]['Shipment']['Status']['StatusDateTime'];
$dsubs = $arr['ShipmentData'][0]['Shipment']['Status']['Instructions'];
$dre = $arr['ShipmentData'][0]['Shipment']['Status']['RecievedBy'];

$dupdate = date('d-M-Y h:i', strtotime($ddt));

// echo "this".$dloc;


$expectedd = $arr['ShipmentData'][0]['Shipment']['ExpectedDeliveryDate'];
$newdate = date('d-M-Y', strtotime($expectedd));
//echo "Est. Delivery Date : " . $newdate;


if($newdate == '01-Jan-1970'){
   
   $newdate = "<small>[Will be updated after pickup.]</small>"; 
   
}else{}

echo '

<span class="mark text-dark"><b> Arriving on '.$newdate.' </b></span>

';



if($dstatus == 'In Transit'){

echo '

<div class="container">
<div class="alert alert-info font-weight-bold" role="alert">

<img src="https://www.tradeniti.in/tracking/delivery-truck.png"> &nbsp; <b>'.$dstatus.' →  '.$dloc.' →  '.$dupdate.' →  '.$dsubs.'</b>


</div>
</div>

';
}else{
    
 echo '

<div class="container">
<div class="alert alert-info font-weight-bold" role="alert">

<img src="https://www.tradeniti.in/tracking/shipped.png"> &nbsp; <b>'.$dstatus.' →  '.$dloc.' →  '.$dupdate.' →  '.$dsubs.'  '.$dre.'</b>



</div>

';   
    
}

}
// else{
//   echo 'sorry there is a problem';
// }




$curl = curl_init();
$data = array(0 => array("number" => "$tracking_id", "carrier" => "$co"));
$data = json_encode($data);

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.17track.net/track/v1/gettrackinfo',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_POST => true,
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    '17token: A967106205AA3133FCF520B4DE352161',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;


$arr = json_decode($response, true);

$accepted = $arr['data']['accepted'];
$cstt = $arr['data']['accepted']['0']['track']['e'];
$last_date = $arr['data']['accepted']['0']['track']['z0']['a'];
$last_sta = $arr['data']['accepted']['0']['track']['z0']['d'];
$last_sta1 = $arr['data']['accepted']['0']['track']['z0']['c'];
$last_sub = $arr['data']['accepted']['0']['track']['z0']['z'];

$current_stage = " $last_date → $last_sta $last_sta1 → $last_sub"; // 

// echo $cstt;

// echo 'here is the '; /*'.$last_sub.' = is current city */  

// echo "this is .$last_sta.";
// '.$accepted.' = is arry
// .$last_date.''.$last_sta.''
// .$accepted.''.$cstt.'

//echo $cstt;

// GETTING CURRENT STATUS

if ($cstt == 10 && $courier == 13) {


echo "
<div class='container'>
<div class='alert alert-info font-weight-bold' role='alert'>
<img src='https://www.tradeniti.in/tracking/delivery-truck.png'> &nbsp; <b> Current Status : In Transit ( $current_stage )</b>
</div>
</div>";


} elseif ($cstt == 20) {
  echo "Expired";
  
} elseif ($cstt == 30) {
  echo "<div class='container'>
<div class='alert alert-warning font-weight-bold' role='alert'>
<img src='https://c.tenor.com/bMcvdrXOhnQAAAAi/bus-on-my-way.gif' height='30' width='50'> <b> Current Status : Out for delivery. ( $current_stage)</b>
</div>
</div>";

} elseif ($cstt == 35) {

  echo "<div class='container'>
<div class='alert alert-danger font-weight-bold' role='alert'>
<img src='https://www.tradeniti.in/tracking/door.png'> &nbsp;  <b> Current Status : Undelivered. are you there ? ( $current_stage)</b>
</div>
</div>";


} elseif ($cstt == 40  && $courier == 13) {

  echo "<div class='container'>
<div class='alert alert-success font-weight-bold' role='alert'>
<img src='https://www.tradeniti.in/tracking/shipped.png'> <b> Current Status : Delivered. ( $current_stage)</b>
</div>
</div>";
} elseif ($cstt == 50) {

  echo "Alert";
  
} elseif ($cstt == 0 && $accepted != NULL) {
    
  echo "<div class='container'>
<div class='alert alert-info font-weight-bold' role='alert'>
<img class='img-flued' src='https://www.tradeniti.in/tracking/container.png'> &nbsp;  <b> Processing : Tracking details will be available shortly. </b>
</div>
</div>";
} else {};



// Now get the items array from $arr
$items = $arr['data']['accepted'];

if ($accepted != NULL){

echo '
<div class=" table mb-4">
<table id="customers" class="text-capitalize">
<thead>
  <tr>
    <th scope="col">Tracking ID</th>
    <th scope="col">Update Date</th>
    <th scope="col">Current City</th>
    <th scope="col">Current status</th>
  </tr>
 </thead> <tbody>';

}
// Loop through $items
foreach ($items as $item) {

    // Loop through $item['origin_info']['trackinfo']
    foreach ($item['track']['z1'] as $step) {
        echo '<tr>';
        

        // this if code will be run if the tracking id no is bigger than 13 characters
        if($courier >13){
          // 'id' is an element of $item
        echo '<td scope="row" data-label="Tracking ID">' . $item['number'] . '</td>';

        // 'tracking_number' is an element of $item
        // echo '<td>' . $item['tracking_number'] . '</td>';

        // 'Details' is an element of $step
        echo '<td scope="row" data-label="Updated on">' . date('d-M-Y | h:i', strtotime($step['a'])) . '</td>';

        // 'checkpoint_status' is an element of $step
        // echo '<td>' . $step['c'] . '</td>';

        // 'substatus' is an element of $step
        echo '<td scope="row" data-label="Sub-Status">' . $step['z'] . '</td>';
        
        // 'substatus' is an element of $step
        echo '<td scope="row" data-label="Current City">' . $dsubs.  '</td>';
        }
        // this else code will run when the tracking number is equal to 13 character or other size character
        else{
          // 'id' is an element of $item
        echo '<td scope="row" data-label="Tracking ID">' . $item['number'] . '</td>';

        // 'tracking_number' is an element of $item
        // echo '<td>' . $item['tracking_number'] . '</td>';

        // 'Details' is an element of $step
        echo '<td scope="row" data-label="Updated on">' . date('d-M-Y | h:i', strtotime($step['a'])) . '</td>';

        // 'checkpoint_status' is an element of $step
        // echo '<td>' . $step['c'] . '</td>';

        // 'substatus' is an element of $step
        echo '<td scope="row" data-label="Current City">' . $step['d'] . '' . $step['c'] .  '</td>';
        
        // 'substatus' is an element of $step
        echo '<td scope="row" data-label="Sub-Status">' . $step['z'] . '</td>';
        // echo '<td scope="row" data-label="Current City">' . $dsubs.  '</td>';
        }
        
         

    }


    echo '</tr>';
}
echo '</table></div>';

?>

</div>
</div>
</seciton>


    
</body>
</html>
