<?php
    include "base/crud/atv_usu/atv.php";
    $usuario = $_SESSION['UsuarioNome'];
    $id_usuario = $_SESSION['UsuarioID'];

  $formacao            = $_POST['formacao'];
  $id_curso           = $_POST["id_curso"];
  $curso              = $_POST["nome_curso"];
  $descricao         = $_POST["desc_curso"];
  $link            = $_POST["link_quest_fim"];
  $sigla            = $_POST["sigla_curso"];
   

    $sql = "update curso set ";
    $sql .= "nome_curso='".$curso."', sigla_curso='".$sigla."', desc_curso='".$descricao."', dt_alteracao=NOW(), id_formacao='".$formacao."'";
    $sql .= "where id_curso= '".$id_curso."';";
    $res = mysqli_query($con, $sql)or die(mysqli_error());

    if($res){

        $usu_atv = mysqli_query($con, atvAdm($usuario, str_replace( array("'"), "\'", $sql), $id_usuario));
        if ($usu_atv) {
            header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=8');
            mysqli_close($con);
        }else{
            header('Location: \tcc/plataforma.php?content_adm=lista_cur&msg=6');
            mysqli_close($con);
        }
        
    }

?>
