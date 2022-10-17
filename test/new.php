<?php 
$dtls = file_get_contents("new.json");
$dtlsOk = json_decode($dtls);
echo 'hi sri ganesh';

// echo $dtlsOk["0"];

foreach($dtlsOk as $ok){
    echo '
    
    <p>hello the data on '.$ok->thenew.'</p>
    
    
    ';
}
