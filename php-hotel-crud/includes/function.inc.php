<?php

//global $recordPage;

// Connect
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}




function lista($conn){
    global $recordPage;
    
    if (empty($_GET['next']))
        $_GET['next'] = 0;
        
        
        $page['current'] = $_GET['next'];
        $page['pagNum'] = $page['current'] +1 ;
        $page['record'] = $page['current'] * $recordPage + 5;
        
        $limit = "LIMIT ".($page['current'] * 5).",".$page['record'] ;
        
        $sql="SELECT `room_number` AS `stanza`, `floor` AS `piano`, `beds` AS `letti`,`configurazioni`.`description` AS `descrizione` FROM `prenotazioni` INNER JOIN `stanze` on `stanza_id`= `stanze`.`id` INNER JOIN `configurazioni` on `configurazione_id`= `configurazioni`.`id` ORDER BY `stanza` $limit;";


    $result = $conn->query($sql);
    
    $totalPage = $lastPage = ceil($conn->affected_rows/$page['record']);
    
   var_dump($result);      
    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $riga = <<<LNH
            <tr class="alert" role="alert">
            <td>{$row['stanza']}</td>
            <td>{$row['piano']}</td>
            <td>{$row['letti']}</td>
            <td><button onclick="openWin('{$row['descrizione']}')">Dettagli</button></td>
            </tr>
            LNH;


            echo $riga;
            
        }
    } elseif ($result) {
        echo "0 results";
    } else {
        echo "query error";
    }
    return $page;
    
}

function navigator($pagNum,$current,$totalPage) {
    
    if ($pagNum > 1){
        $prev = $current -1;
        echo("<a href= \"{$_SERVER['PHP_SELF']}?next=0\">prima pagina</a>");
        echo("<a href= \"{$_SERVER['PHP_SELF']}?next=$prev\">precedente</a>");
    }
    
    if ($pagNum < $totalPage){
        $next = $current + 1;
        $lastPage = $totalPage;
        echo("<a href= \"{$_SERVER['PHP_SELF']}?next=$next\"> successiva </a>");
        echo("<a href= \"{$_SERVER['PHP_SELF']}?next=$totalPage\"> ultima pagina </a>");
    }
        
        
}



