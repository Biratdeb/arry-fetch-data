<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
// $json_string='[{ "statusCode" : "OK", "statusMessage" : "-", "ipAddress" : "37.210.255.228", "countryCode" : "QA", "countryName" : "Qatar", "regionName" : "Ar Rayyan", "cityName" : "Ar Rayyan", "zipCode" : "-", "latitude" : "25.2919", "longitude" : "51.4244", "timeZone" : "+03:00"}]';
$tracking_id = "10483710001724";
$json_string = file_get_contents('https://track.delhivery.com/api/v1/packages/json/?waybill='.$tracking_id.'&token=9621e04dd8399c08d7bb807b42a66603c2a51b97');
// echo $json_string;
 echo '<br><br>';
$json_array=json_decode($json_string,true); 
// print_r($json_array);

echo '<table class="table">
        <thead class="sticky-lg-top sticky-md-top sticky-sm-top sticky-top">
          <tr>
            <th scope="col" style="color:white; background-color:#0D6EFD;"">#</th>
            <th scope="col" style="color:white; background-color:#0D6EFD;">Details</th>
            
          </tr>
        </thead>
        <tbody>
    
        ';
        $dstatus = $json_array['ShipmentData'][0]['Shipment']['Status']['Status'];

display_array_recursive($json_array);
function display_array_recursive($json_rec){
	if($json_rec){
        
		foreach($json_rec as $key=> $value){
			if(is_array($value)){
            	display_array_recursive($value);
			}else{
                echo '<tr>
                <td scope="row">'.$key.'--</td>
                <td>'.$value.'</td>
              
                
              </tr>
              
              ';
				// echo $key.'--'.$value.'<br>';
			}	
		}	
	}	
}
echo '
</tbody>
</table>
';


?>
<style>
       
        tr{
            transition: .8s;
        }
        tr:hover{
            /* background-color: #0D6EFD; */
            background-color: green;
            /* background-color: black; */
            color: white;
        }
        .custom-logo-color{
            color: #EF4123;
        }

</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  






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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
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