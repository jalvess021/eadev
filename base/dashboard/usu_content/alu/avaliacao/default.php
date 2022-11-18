<?php
     $nivel_necessario = 2;
    include "base/testa_nivel.php"; 

    $id_usu = $_SESSION['UsuarioID'];
    $sql_alu = mysqli_query($con, "SELECT id_aluno from aluno where id_usu = ".$id_usu.";");
    $res_alu = mysqli_fetch_array($sql_alu);
    $id_alu = $res_alu[0];
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
</script>