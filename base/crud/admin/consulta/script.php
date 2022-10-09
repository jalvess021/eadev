<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>

    $("#search-adm").keyup(function(){

                var completeAdm = $("#search-adm").val();
                $.ajax({
                    url: '/tcc/selects/select_adm.php',
                    method: 'POST',
                    data: {nome: completeAdm},
                    dataType: 'json'
                }).done(function(result){
                    console.log(result);
                }) 
            }) 

        //ATUALIZANDO EM TEMPO REAL 1s
    function update_adm(){ //função que será carregada
        $.getJSON('base/dashboard/usu_content/adm/painel-control/control_usu.php', function (dados) {
            $('#num-cons-adm').html(dados.total_adm); 
                        if (dados.total_adm < 2) {
                            $('#label-cons-adm').html("Administrador no sistema");
                        }else{
                            $('#label-cons-adm').html("Administradores no sistema");
                        }
        })

        $.getJSON('selects/atv_adm/atv.php', function (dados) {
            $('#num-cons-title').html(dados.num_total_atv);
            $('#adm-cons-add').html(dados.num_add);
            $('#adm-cons-att').html(dados.num_att);
            $('#adm-cons-del').html(dados.num_del);
        })
    }

    //executa a função ao carregar
    $(document).ready(update_adm());
    //Executa a função a cada 3 seg
    setInterval(() => { update_adm(); }, 3000);
/*
    $('#consAdd').click(() =>{listaAtv('add');});
    $('#consAtt').click(()=>{listaAtv('att');});
    $('#consDel').click(()=>{listaAtv('del');}); 
     function listaAtv(acao) {
        window.history.pushState("", "", "?content_adm=consulta_adm&atv="+acao);
        
             $.ajax({
                    url: '/tcc/selects/atv_adm/lista_atv.php',
                    method: 'POST',
                    data: { 
                        acao: acao
                    }, 
                    datatype: 'json',
                    success: function(data) {
                    $('#cons-main-adm').load('selects/atv_adm/lista_atv?atv='+acao+'.php');
                    },
                    error: function (data) {
                        alert('erro');
                    }
                }) 
    } */ 
</script>