
<?php
$json_string='[{ "statusCode" : "OK", "statusMessage" : "-", "ipAddress" : "37.210.255.228", "countryCode" : "QA", "countryName" : "Qatar", "regionName" : "Ar Rayyan", "cityName" : "Ar Rayyan", "zipCode" : "-", "latitude" : "25.2919", "longitude" : "51.4244", "timeZone" : "+03:00"}]';
echo $json_string;
 echo '<br><br>';
$json_array=json_decode($json_string,true); 
print_r($json_array);
 echo '<br><br>';
echo $json_array['0']['statusCode']; echo '<br><br>';
echo $json_array['0']['ipAddress']; echo '<br><br>';
echo $json_array['0']['countryName']; echo '<br><br>';
echo $json_array['0']['cityName']; echo '<br><br>';
display_array_recursive($json_array);
function display_array_recursive($json_rec){
	if($json_rec){
		foreach($json_rec as $key=> $value){
			if(is_array($value)){
				display_array_recursive($value);
			}else{
				echo $key.'--'.$value.'<br>';
			}	
		}	
	}	
}	
?>
<!-- 
<?php
$json_string='[{ "statusCode" : "OK", "statusMessage" : "-", "ipAddress" : "37.210.255.228", "countryCode" : "QA", "countryName" : "Qatar", "regionName" : "Ar Rayyan", "cityName" : "Ar Rayyan", "zipCode" : "-", "latitude" : "25.2919", "longitude" : "51.4244", "timeZone" : "+03:00"}]';
echo $json_string;
 echo '<br><br>';
$json_array=json_decode($json_string,true); 
print_r($json_array);
 echo '<br><br>';
echo $json_array['0']['statusCode']; echo '<br><br>';
echo $json_array['0']['ipAddress']; echo '<br><br>';
echo $json_array['0']['countryName']; echo '<br><br>';
echo $json_array['0']['cityName']; echo '<br><br>';
display_array_recursive($json_array);
function display_array_recursive($json_rec){
	if($json_rec){
		foreach($json_rec as $key=> $value){
			if(is_array($value)){
				display_array_recursive($value);
			}else{
				echo $key.'--'.$value.'<br>';
			}	
		}	
	}	
}	
?> -->