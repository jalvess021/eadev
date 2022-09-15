<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>

   /* var xmlhttp = new XMLHttpRequest();
   
   xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
           myObj = JSON.parse(this.responseText);
           document.getElementById("name").innerHTML = myObj.name;
           document.getElementById("college").innerHTML = myObj.college;
           document.getElementById("gender").innerHTML = myObj.gender;
           document.getElementById("age").innerHTML = myObj.age;
       }
   };
   xmlhttp.open("GET", "geeks.php", true);
   xmlhttp.send();
    
    var dados = [];
    $.getJSON('/tcc/selects/select_adm.php', function (result) {
        $.each(result, function (index, val) {
            dados.push(val);
        })
    })
    console.log(dados); */
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

            $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_adm.php",
                    cache: false, 
                    success: function(resultAdm){ 
                        $('#num-cons-adm').html(resultAdm); 
                        if (resultAdm < 2) {
                            $('#label-cons-adm').html("Administrador no sistema");
                        }else{
                            $('#label-cons-adm').html("Administradores no sistema");
                        }
            }});  

            $.ajax({url: "selects/atv_adm/all_atv.php",
                cache: false,
                success: function(resultAll){
                    $('#num-cons-title').html(resultAll);
                }
            });

            $.ajax({url: "selects/atv_adm/add_atv.php",
                cache: false,
                success: function(resultAdd){
                    $('#adm-cons-add').html(resultAdd);
                }
            });

            $.ajax({url: "selects/atv_adm/att_atv.php",
                cache: false,
                success: function(resultAtt){
                    $('#adm-cons-att').html(resultAtt);
                }
            });


            $.ajax({url: "selects/atv_adm/del_atv.php",
                cache: false,
                success: function(resultDel){
                    $('#adm-cons-del').html(resultDel);
                }
            });
            

           /* 
          $.ajax({url: "base/dashboard/usu_content/adm/painel-control/control_alu.php",
                  cache: false,
                  success: function(resultAlu){
                    $('#numeroAluTb').html(resultAlu);
          }}); */        
    }

    //executa a função ao carregar
    $(document).ready(update_adm());
    //Executa a função a cada 1 seg
    setInterval(() => { update_adm(); }, 1000);

   
</script>