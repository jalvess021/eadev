<h4 class="content-subtitle ">Informações Complementares</h4>
<hr class="">
<div class="row justify-content-between group-cam">
    <div class="col-md-2 mt-md-4">
    <label for="uploadUserCam" class='labelUserCamp' title='Formato recomendado 1:1'>
        <img class="perfil-cam" <?php echo "src='\\eadev/assets/images/users/default.png'";?>>
        </label> 
        <form id="alterImgUser" method='POST'>
            <input id="uploadUserCam" type="file" accept="image/jpeg" name="foto">
        </form>
        <span id='infoFileCam'></span>
    </div>
    <div class="form-group col-md-5 perfil-nome">
        <label class="perfil-label" for="Nome">Nome completo</label>
        <input type="text" class="form-control perfil-input"  value="<?php echo $row['nome'];?>" disabled required>
    </div>

    <div class="form-group col-md-3 col-lg-4 perfil-date ">
        <label class="perfil-label" for="Nome">Data de nascimento</label>
        <input type="date" class="form-control perfil-input" name='dt_nasc' required>
    </div>
</div>

<div class="row mt-3 justify-content-between">

    <div class="form-group div-inp-com col-md-3">
        <label class="perfil-label" for="CPF">CPF</label>
        <input type="text" class="form-control perfil-input" placeholder="xxx.xxx.xxx-xx" required>
    </div>

    <div class="form-group div-inp-com col-md-3">
        <label class="perfil-label" for="RG">RG</label>
        <input type="text" class="form-control perfil-input" placeholder="xx.xxx.xxx-xx" required>
    </div>

    <div class="form-group div-inp-com col-md-2">
        <label class="perfil-label" for="CEP">CEP</label>
        <input type="text" class="form-control perfil-input"  placeholder="xxxxx-xxx" required>
    </div>

    <div class="form-group div-inp-com col-md-2">
        <label class="perfil-label" for="Estado">UF</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>
</div>

<div class="row mt-3 justify-content-between">
    <div class="form-group div-inp-com col-md-3">
        <label class="perfil-label" for="Cidade">Cidade</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>

    <div class="form-group div-inp-com col-md-4">
        <label class="perfil-label" for="Estado">Bairro</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>

    <div class="form-group div-inp-com col-md-5">
        <label class="perfil-label" for="Estado">Logradouro</label>
        <input type="text" class="form-control perfil-input" readonly>
    </div>
</div>
<div class="button-password2 d-flex justify-content-center">
        <input type="submit" form='alterImgUser' id='btnSubmitImgUser' value='Salvar dados' disabled>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $('#uploadUserCam').change(() => {
		inp = $('#uploadUserCam').val();
		if (inp != '') {
			$("#btnSubmitImgUser").removeAttr('disabled');
            $('#infoFileCam').html("<div id='divInfofile'><span><i class='bi bi-card-image'></i> "+ inp.substr(12, 19)+"</span></div>");
		}else{
			$("#btnSubmitImgUser").attr('disabled', true);
            $('#infoFileCam').html('');
		}
	})
</script>