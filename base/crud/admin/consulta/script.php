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
            $('#num-cons-adm').html(dados.total_usu); 
                        if (dados.total_usu < 2) {
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
    //Executa a função a cada 1 seg
    setInterval(() => { update_adm(); }, 1000);

   
</script>