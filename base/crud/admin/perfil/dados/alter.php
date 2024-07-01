<?php
    if (isset($_FILES['imagem']) && isset($_POST['id'])) {
        	$id_usu = $_POST['id'];
			$novoNome = md5($id_usu).".jpeg";
			$diretorio = '/eadev/assets/images/users/';
			$path   = $_SERVER['DOCUMENT_ROOT'].$diretorio.$novoNome;
			$upload = move_uploaded_file($_FILES['imagem']['tmp_name'], $path);
			if($upload){
				echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=perfil&msg=19';</script>";
			}else {
				echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=perfil&msg=20';</script>";
			}
	}

	if (isset($_POST['senha']) && isset($_POST['id_s'])) {
		$id_s = $_POST['id_s'];
		include "../../../../config.php";
		$query = mysqli_query($con, "update usuario set senha='".sha1($_POST['senha'])."' where id_usu = ".$id_s.";");
		if ($query) {
			echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=perfil&msg=21';</script>";
			mysqli_close($con);
		}else {
			echo "<script>window.location.href = '/eadev/plataforma.php?content_adm=perfil&msg=22';</script>";
			mysqli_close($con);
		}
	}
?>