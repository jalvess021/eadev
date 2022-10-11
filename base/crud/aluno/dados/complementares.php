<h4 class="content-subtitle">Informações Complementares</h4>
<hr class="">

<form>


    <div class="form-row group-cam">

        <img class="perfil-cam" src="arquivos/img/agnaldo.jfif" alt="Logo Eadev">

        <div class="form-group col-md-5 perfil-nome ">
            <label class="perfil-label" for="Nome">Nome completo</label>
            <input type="text" class="form-control perfil-input"  placeholder="<?php echo $row['nome'];?>" readonly>
        </div>

        <div class="form-group col-md-3 ml-3 perfil-date ">
            <label class="perfil-label" for="Nome">Data de nascimento</label>
            <input type="date" class="form-control perfil-input" required>
        </div>


    </div>

    <div class="form-row mt-3 ">

        <div class="form-group col-md-6 ml-3">
            <label class="perfil-label" for="CPF">CPF</label>
            <input type="text" class="form-control perfil-input"  placeholder="000.000.000-00" required>
        </div>

        <div class="form-group col-md-5 ml-3">
            <label class="perfil-label" for="RG">RG</label>
            <input type="text" class="form-control perfil-input"  placeholder="00.000.000-00" required>
        </div>

    </div>

    
    <div class="form-row mt-3 ">


        <div class="form-group col-md-6 ml-3">
            <label class="perfil-label" for="CEP">CEP</label>
            <input type="text" class="form-control perfil-input"  placeholder="Digite seu CEP" required>
        </div>

        <div class="form-group col-md-5 ml-3">
            <label class="perfil-label" for="Estado">Estado</label>
            <input type="text" class="form-control perfil-input"  placeholder="Digite seu Estado" required>
        </div>

    </div>

    <div class="form-row mt-3 ">


        <div class="form-group col-md-3 ml-3">
            <label class="perfil-label" for="Cidade">Cidade</label>
            <input type="text" class="form-control perfil-input"  placeholder="Digite sua Cidade" required>
        </div>

        <div class="form-group col-md-3 ">
            <label class="perfil-label" for="Estado">Rua</label>
            <input type="text" class="form-control perfil-input"  placeholder="Digite sua Rua" required>
        </div>

        <div class="form-group col-md-2 ml-3">
            <label class="perfil-label" for="Estado">Número</label>
            <input type="text" class="form-control perfil-input"  placeholder="Digite o Número" required>
        </div>

        <div class="form-group col-md-3">
            <label class="perfil-label" for="Estado">Complemento</label>
            <input type="text" class="form-control perfil-input"  placeholder="Digite seu Complemento" required>
        </div>



    </div>

    <div class="button-password2 d-flex justify-content-center">
			<button type="submit"><a href="#">Salvar dados</a></button>
    </div>
         
</form>

<br>
<br>
		

