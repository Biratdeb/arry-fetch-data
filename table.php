<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php

$json_string = file_get_contents('https://track.delhivery.com/api/v1/packages/json/?waybill='.$tracking_id.'&token=9621e04dd8399c08d7bb807b42a66603c2a51b97');
// echo $json_string;
 echo '<br><br>';
$json_array=json_decode($json_string,true); 
// print_r($json_array);

// table to display the data
echo '<table class="table">
        <thead class="sticky-lg-top sticky-md-top sticky-sm-top sticky-top">
          <tr>
            <th scope="col" style="color:white; background-color:#0D6EFD;"">#</th>
            <th scope="col" style="color:white; background-color:#0D6EFD;">Details</th>
            
          </tr>
        </thead>
        <tbody>
    
        ';
        
// function and foreach loop to display the data
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
            
            background-color: green;
            
            color: white;
        }
        

</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
