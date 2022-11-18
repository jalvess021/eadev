<?php
 include "../../base/config.php";
    $sqlQuest = mysqli_query($con, "SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = 1  ORDER BY RAND() LIMIT 18;");
    
    $rowQuest = mysqli_fetch_all($sqlQuest, MYSQLI_ASSOC);
    echo json_encode($rowQuest);
/*
    while ($rowQuest = mysqli_fetch_array($sqlQuest)) {
        echo json_encode(array(
            'numb' =>  $rowQuest['id_quest'],
            'question' => $rowQuest['enunciado_quest'],
            'num_att' => $rowQuest['enunciado_quest'],
            'answer' => $rowQuest['opc_certa'],
            'options' => array(
                $rowQuest['opc_certa'],
                $rowQuest['opc_errada1'],
                $rowQuest['opc_errada1']
            ),
            'value' => $rowQuest['pont_quest']
        ));
    }*/

    
?>