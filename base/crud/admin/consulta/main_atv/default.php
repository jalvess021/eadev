<?php include "base/config.php";?>
<div class='cons-body '>
    <div class="div-num-adm">
        <span id="num-cons-adm"></span>
        <h5 id="label-cons-adm"></h5>
        
    </div>
    <div class="div-info-adm">
            <h4 class="info-cons-title"> Total de atividades: <span id="num-cons-title"></span></h4>
            <div class="grid-cons">
                <a class="h6" href='?content_adm=consulta_atv&info=atv&atv=add' id='consAdd'><span id='adm-cons-add'></span> Novos registros</a> 
                <a class="h6" href='?content_adm=consulta_atv&info=atv&atv=att' id='consAtt'><span id='adm-cons-att'></span> Atualização de dados</a>
                <a class="h6" href='?content_adm=consulta_atv&info=atv&atv=del' id='consDel'><span id='adm-cons-del'></span> Exclusão de dados</a>
            </div>
    </div>
</div>
<script>
    $("#pesq-adm").submit((e)=>{
    e.preventDefault();
    var valInput = $("#search-adm").val();
    //Regex (Expressão regular)
    reg1 = /^[A-Z]([^A-Z\d\s]+)((\s[A-Z]([^A-Z\d\s])+)|(\s[A-Z]([^A-Z\d\s])+)+)\s{1}\{\s([0-9]+)\s\}$/g;
    //Pega apenas o id do administrador que ele quer buscar
    idSearch = valInput.replace(reg1, "$7");
    $.ajax({
            url: 'base/crud/admin/consulta/search_adm2.php',
            method: 'POST',
            data: {searchAdmInput: idSearch},
            datatype: 'json'
        }).done(function(result){
            dados = result;
            var num = dados.replace(/[^0-9]/g,'');
            idAdm = parseInt(num);
            //idCripto = btoa(idAdm);
            window.location.href = "?content_adm=consulta_atv&info=adm&user="+idAdm;
        }) 
    })
</script>