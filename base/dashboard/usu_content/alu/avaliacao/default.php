<?php
     $nivel_necessario = 2;
    include "base/testa_nivel.php"; 

    $id_usu = $_SESSION['UsuarioID'];
    $sql_alu = mysqli_query($con, "SELECT id_aluno from aluno where id_usu = ".$id_usu.";");
    $res_alu = mysqli_fetch_array($sql_alu);
    $id_alu = $res_alu[0];
    $sqlUpdateTent = mysqli_query($con, "CALL update_num_tent();");

    $sqlCurAula = mysqli_query($con, "SELECT * FROM curso;");
    while ($infoCurAula = mysqli_fetch_array($sqlCurAula)) {

        //Conta todas as aulas que o aluno está inserido
        $percentAll = mysqli_query($con, "SELECT aa.* from aula_alu aa INNER JOIN aula a ON aa.id_aula = a.id_aula INNER JOIN modulo m on a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = '".$infoCurAula['id_curso']."' WHERE aa.id_aluno = ".$id_alu.";");
        $numPercentAll = mysqli_num_rows($percentAll);
    
        //Conta todas as aulas que o aluno concluiu
        $percentCon = mysqli_query($con, "SELECT aa.* from aula_alu aa INNER JOIN aula a ON aa.id_aula = a.id_aula INNER JOIN modulo m on a.id_mod = m.id_mod INNER JOIN curso c ON m.id_curso = c.id_curso AND c.id_curso = '".$infoCurAula['id_curso']."' WHERE aa.id_aluno = ".$id_alu." AND aa.status_aula = 2;");
        $numPercentCon = mysqli_num_rows($percentCon);

        $queryAvVerify = mysqli_query($con, "SELECT * FROM avaliacoes where id_aluno = ".$id_alu." and id_curso = ".$infoCurAula['id_curso'].";");
        $AvVerify = mysqli_fetch_array($queryAvVerify);

        if ($numPercentAll === 0 || $numPercentAll != $numPercentCon && $AvVerify['status_av'] == 1) {
            $statusIndisponivel = mysqli_query($con, "UPDATE avaliacoes set status_tent = 1, num_tent_restantes = 0 where id_aluno = ".$id_alu." and id_curso = ".$infoCurAula['id_curso'].";");
        }elseif ($numPercentAll != 0 && $numPercentAll == $numPercentCon && $AvVerify['status_av'] == 1) {
            $statusConcluido = mysqli_query($con, "UPDATE avaliacoes set status_av = 1, num_tent_restantes = 2, status_tent = 2 where id_aluno = ".$id_alu." and id_curso = ".$infoCurAula['id_curso'].";");
        }
    }
    
?>

<h3 class='content-title ct-av'>Avaliações</h3>
<div class='all-av-form'>
    <!-- conteúdo padrão-->
    <?php include "content/area_avaliativa.php"?>
</div>

<!-- Fragmento da área de modais -->
<?php include "content/modal.php"?>

<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $("#tp-form-av").change(() => {
        $(".all-quest-2").load('/tcc/selects/questionario/quest.php?filter_quest='+$("#tp-form-av").val()+'&alu=<?php echo $id_alu;?>');
    })
    $("#btnPagAvaliacao").click((e) =>{
        $('.all-av-form').load('/tcc/base/dashboard/usu_content/alu/avaliacao/content/avaliacao.php?curso='+$("#btnPagAvaliacao").attr('data-avCur'));
    })
    
</script>