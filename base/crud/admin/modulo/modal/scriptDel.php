<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script> $('#modalDeleteMod').modal('show') </script>

<script>

	//função para verificar a exclusão do curso, verificando o nome do usuario
	function validaDel(){

		let texto = document.getElementById("confirmModalUsu");
		let textoVal = document.getElementById("confirmModalUsu").value;
		let botao = document.getElementById("modalConfirm");
		let check = document.getElementById("checkDel");

		texto.classList.add("is-invalid");
			if(textoVal != null && textoVal === "<?php echo $tipoMod;?>"){
				texto.classList.remove("is-invalid");
				texto.classList.add("is-valid");
				texto.setAttribute('disabled', true);
					if(check.checked) {
						botao.removeAttribute("disabled");
					}else{
						botao.setAttribute("disabled", "disabled");
					}
    		}
	} 
	
</script>