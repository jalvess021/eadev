<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script> $('#modalAddAula').modal('show') </script>
<script>
    $(document).ready(function(){
        $('#selectFormacao').change(function(){
            $('#selectCurso').load('/eadev/selects/select_cur.php?filter_form='+$('#selectFormacao').val());
        });
    $('#selectCurso').change(function(){
        $('#selectModulo').load('/eadev/selects/select_mod.php?filter_form='+$('#selectFormacao').val()+'&filter_cur='+$('#selectCurso').val());
    });
});

                let formAdd = document.querySelectorAll('.form-add');
				let btnAdd = document.getElementById('addAula');
                for(let i = 0; i < formAdd.length; i++){
                    formAdd[2].classList.add("is-invalid");
                    formAdd[3].classList.add("is-invalid");
                    formAdd[4].classList.add("is-invalid");
                    btnAdd.setAttribute('disabled', true);

            //REGEX
                // g - global (todas as ocorrencias)
                // i - insensitive (Ignora o low e upper case)
                        // Substituir os espaços do input {1} no formulario
                        var $formAdd1 = formAdd[0];
                        $formAdd1.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');            
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {5} no formulario
                        var $formAdd6 = formAdd[5];
                        $formAdd6.addEventListener('keyup', function(){
                                this.value = this.value.replace(/^\s+|\s+$|\D/g, '');
                        });

                        // Substituir os espaços do input {5} no formulario
                        var $formAdd7 = formAdd[6];
                        $formAdd7.addEventListener('keyup', function(){
                                this.value = this.value.replace(/^\s+|\s+$|\D/g, '');
                        });

                        // Substituir os espaços do input {1} no formulario
                        var $formAdd8 = formAdd[7];
                        $formAdd8.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');            
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                            //Verifica input1
                            let countInput1 = document.getElementById("form-add1");
                            countInput1.addEventListener('keyup', function verifyFm1(){
                                    if (countInput1.value.length < 6) {
                                            if (formAdd[0].classList.contains("is-valid")) {
                                                formAdd[0].classList.remove("is-valid");
                                            }
                                            formAdd[0].classList.add("is-invalid");
                                    }else{
                                        formAdd[0].classList.remove("is-invalid"); 
                                        formAdd[0].classList.add("is-valid");
                                    }
                                   //Não permitir numeros   this.value = this.value.replace(/\d/g, '');
                            });

                             //Verifica o input2
                             let countInput2 = document.getElementById("form-add2");
                            countInput2.addEventListener('keyup', function(){
                                        if (countInput2.value.length == 28) {
                                            if (countInput2.value.substr(0,17) == "https://youtu.be/"){
                                                if (formAdd[1].classList.contains("is-invalid")) {
                                                formAdd[1].classList.remove("is-invalid");
                                            }
                                                formAdd[1].classList.add("is-valid");
                                            }
                                        }else{
                                            if (formAdd[1].classList.contains("is-valid")) {
                                                formAdd[1].classList.remove("is-valid");
                                            }
                                            formAdd[1].classList.add("is-invalid");
                                        }
                            });

                             //verifica input3
                             let countInput3 = document.getElementById("form-add3");
                            countInput3.addEventListener('keyup', function verifyFm3(){
                                if (countInput3.value.length > 0) {
                                        if (formAdd[5].classList.contains("is-invalid")) {
                                            formAdd[5].classList.remove("is-invalid"); 
                                        }
                                        formAdd[5].classList.add("is-valid");
                                    }else{
                                        formAdd[5].classList.remove("is-valid"); 
                                        formAdd[5].classList.add("is-invalid");
                                    }

                                if (countInput3.value < countInput4.value) {
                                        if (formAdd[6].classList.contains("is-invalid")) {
                                            formAdd[6].classList.remove("is-invalid"); 
                                        }
                                        formAdd[6].classList.add("is-valid");
                                    }else{
                                        formAdd[6].classList.remove("is-valid"); 
                                        formAdd[6].classList.add("is-invalid");
                                    }
                            });

                            //verifica input4
                            let countInput4 = document.getElementById("form-add4");
                            countInput4.addEventListener('keyup', function(){
                                if (countInput4.value.length > 0 && countInput4.value > countInput3.value) {
                                        if (formAdd[6].classList.contains("is-invalid")) {
                                            formAdd[6].classList.remove("is-invalid");
                                        }
                                        formAdd[6].classList.add("is-valid");
                                }else{
                                        formAdd[6].classList.remove("is-valid"); 
                                        formAdd[6].classList.add("is-invalid");
                                    }
                            });

                             //Verifica input5
                             let countInput5 = document.getElementById("form-add5");
                            countInput5.addEventListener('keyup', function(){
                                    if (countInput5.value.length < 50) {
                                            if (formAdd[7].classList.contains("is-valid")) {
                                                formAdd[7].classList.remove("is-valid");
                                            }
                                            formAdd[7].classList.add("is-invalid");
                                    }else{
                                        formAdd[7].classList.remove("is-invalid"); 
                                        formAdd[7].classList.add("is-valid");
                                    }
                            });

                            

                            //verifica o select1
                            $("#selectFormacao").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formAdd[2].classList.remove("is-invalid");
                                    formAdd[2].classList.add("is-valid");
                                }else{
                                    formAdd[2].classList.remove("is-valid");
                                    formAdd[2].classList.add("is-invalid");
                                }
                                if ($("#selectCurso").find(':selected').data("valor") != null) {
                                    formAdd[3].classList.remove("is-invalid");
                                    formAdd[3].classList.add("is-valid");
                                }else{
                                    formAdd[3].classList.remove("is-valid");
                                    formAdd[3].classList.add("is-invalid");
                                }

                                //reseta o select de Módulo
                                $('#selectModulo').load('/eadev/selects/reset_option.php');
                                if (formAdd[4].classList.contains("is-valid")) {
                                            formAdd[4].classList.remove("is-valid"); 
                                        }
                                formAdd[4].classList.add("is-invalid");
                            });

                            //verifica o select2
                            $("#selectCurso").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formAdd[3].classList.remove("is-invalid");
                                    formAdd[3].classList.add("is-valid");
                                }else{
                                    formAdd[3].classList.remove("is-valid");
                                    formAdd[3].classList.add("is-invalid");
                                }
                            });

                            //verifica o select3
                            $("#selectModulo").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formAdd[4].classList.remove("is-invalid");
                                    formAdd[4].classList.add("is-valid");
                                }else{
                                    formAdd[4].classList.remove("is-valid");
                                    formAdd[4].classList.add("is-invalid");
                                }
                            });

                            //Verifica se todos os campos estão corretos para habilitar a atualização
                            let modalAddAula = document.getElementById("modalAddAula");
                            modalAddAula.addEventListener('mousemove', function () {
                                    find = formAdd[0].classList.contains("is-valid");
                                    find1 = formAdd[1].classList.contains("is-valid");
                                    find2 = formAdd[2].classList.contains("is-valid");
                                    find3 = formAdd[3].classList.contains("is-valid");
                                    find4 = formAdd[4].classList.contains("is-valid");
                                    find5 = formAdd[5].classList.contains("is-valid");
                                    find6 = formAdd[6].classList.contains("is-valid");
                                    find7 = formAdd[7].classList.contains("is-valid");
                                        if(find && find1 && find2 && find3 && find4 && find5 && find6 && find7){
                                            btnAdd.removeAttribute('disabled');
                                        }else{
                                            btnAdd.setAttribute('disabled', true);
                                        }
                            });              
                }
                
</script>