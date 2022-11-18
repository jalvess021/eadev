<?php
 include "../../base/config.php";
 if (isset($_GET['curso'])) {
    $sqlQuest = mysqli_query($con, "SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_GET['curso']."  ORDER BY RAND() LIMIT 18;");
    
    $rowQuest = mysqli_fetch_all($sqlQuest, MYSQLI_ASSOC);
    echo json_encode($rowQuest);
 }
    
?>