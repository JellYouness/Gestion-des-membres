<?php
    $title="Analytics.";
    include "init.php";
    include $template . "header.php"; 
    include $template . "db_connect.php";
?>    

        <div class="cards-space row">
                <?php  
                    $sql="select count(*) as countMembers from membres";
                    $result = $db->query($sql);
                    if (!$result) echo $db->error;
                    $row=$result->fetch(PDO::FETCH_ASSOC);
                            echo "  <div class='card'>
                            <div><span>Members: </span><span>".$row['countMembers'] ."</span></div>                                        
                            <img class='card-icon' src='images/member.png' >
                                    </div>" ;?>

                 <?php  
                    $sql="select count(*) as countSubs from abonnement";
                    $result = $db->query($sql);
                    if (!$result) echo $db->error;
                    $row=$result->fetch(PDO::FETCH_ASSOC);
                    echo "  <div class='card'>
                    <div><span>Abonnements: </span><span>".$row['countSubs'] ."</span></div>                                        
                    <img class='card-icon' src='images/bookmarks.png' >
                    </div>" ;?>
                 <?php  
                        $sql="select count(*) as countUsers from users";
                        $result = $db->query($sql);
                        if (!$result) echo $db->error;
                        $row=$result->fetch(PDO::FETCH_ASSOC);
                        echo "  <div class='card'>
                        <div><span>Nouveau membres: </span><span>".$row['countUsers'] ."</span></div>                                        
                        <img class='card-icon' src='images/calendar.png' >
                        </div>" ;?>
                <?php  
                        $sql="select count(*) as countLastMembers from pcc.membres where date_creation > (DATE_SUB(NOW(),INTERVAL 30 DAY));";
                        $result = $db->query($sql);
                        if (!$result) echo $db->error;
                        $row=$result->fetch(PDO::FETCH_ASSOC);
                        echo "  <div class='card'>
                        <div><span>Nouveau membres:<article class='brack'>(dans dernier 30 jours)</article> </span><span>".$row['countLastMembers'] ."</span></div>                                        
                        <img class='card-icon' src='images/calendar.png' >
                       </div>" ;?>
        </div>
        
