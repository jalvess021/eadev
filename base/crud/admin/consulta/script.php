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

       
</script>