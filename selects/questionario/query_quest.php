<?php
 include "../../base/config.php";
 if (isset($_POST['curso'])) {

   /*Select da questao pelo curso, tipo do modulo (Basico, intermediario ou avançado) e pontuaçao da questao (3 opcoes por modulo)*/
    $sqlQuest = mysqli_query($con, "
      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 1
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.3) ORDER BY RAND() LIMIT 2) 
         UNION ALL
      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 1
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.6) ORDER BY RAND() LIMIT 2) 
         UNION ALL
      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 1
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.8) ORDER BY RAND() LIMIT 2) 
         UNION ALL

      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 2
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.3) ORDER BY RAND() LIMIT 2) 
         UNION ALL
      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 2
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.6) ORDER BY RAND() LIMIT 2) 
         UNION ALL
      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 2
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.8) ORDER BY RAND() LIMIT 2) 
         UNION ALL

      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 3
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.3) ORDER BY RAND() LIMIT 2) 
         UNION ALL
      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 3
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.6) ORDER BY RAND() LIMIT 2) 
         UNION ALL
      (SELECT q.* FROM questoes AS q INNER JOIN modulo AS m ON q.id_mod = m.id_mod AND tipo_mod = 3
      INNER JOIN curso AS c ON m.id_curso = c.id_curso AND c.id_curso = ".$_POST['curso']." 
      WHERE q.id_quest IN (SELECT id_quest FROM questoes WHERE pont_quest = 0.8) ORDER BY RAND() LIMIT 2) ORDER BY RAND();
    "); 
    
    $rowQuest = mysqli_fetch_all($sqlQuest, MYSQLI_ASSOC);
    echo json_encode($rowQuest);
 }
    
?>