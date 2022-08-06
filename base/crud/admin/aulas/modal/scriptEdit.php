<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script> $('#modalEditAula').modal('show') </script>

<script>
    //  this.value = this.value.replace(/https?:\/\/[^\s]+[?&]v=([^&\s]+)[^\s]*/gm, '\1');

    $(document).ready(function(){
        $('#selectFormacao').change(function(){
            $('#selectCurso').load('/tcc/selects/select_cur.php?filter_form='+$('#selectFormacao').val());
        });
        $('#selectCurso').change(function(){
            $('#selectModulo').load('/tcc/selects/select_mod.php?filter_form='+$('#selectFormacao').val()+'&filter_cur='+$('#selectCurso').val());
        });
    });
// 5 form-edit id && 
                let formEdit = document.querySelectorAll('.form-edit');
				let btnAtt = document.getElementById('attEditMod');
                for(let i = 0; i < formEdit.length; i++){
                    formEdit[0].classList.add("is-valid");
                    formEdit[1].classList.add("is-valid");
                    formEdit[2].classList.add("is-invalid");
                    formEdit[3].classList.add("is-invalid");
                    formEdit[4].classList.add("is-invalid");
                    formEdit[5].classList.add("is-valid");
                    formEdit[6].classList.add("is-valid");
                    formEdit[7].classList.add("is-invalid");
                    btnAtt.setAttribute('disabled', true);

                     

            //REGEX
                // g - global (todas as ocorrencias)
                // i - insensitive (Ignora o low e upper case)
                        // Substituir os espaços do input {1} no formulario
                        var $formEdit1 = formEdit[0];
                        $formEdit1.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');            
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {4} no formulario
                        var $formEdit4 = formEdit[3];
                        $formEdit4.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {5} no formulario
                        var $formEdit6 = formEdit[5];
                            $formEdit6.addEventListener('keyup', function(){
                                    this.value = this.value.replace(/^\s+|\s+$|\D/g, '');
                            });

                        // Substituir os espaços do input {6} no formulario
                        var $formEdit7 = formEdit[6];
                        $formEdit7.addEventListener('keyup', function(){
                                this.value = this.value.replace(/^\s+|\s+$|\D/g, '');
                        });


                            //Verifica o primeiro input
                            let countInput1 = document.getElementById("form-edit1");
                            countInput1.addEventListener('keyup', function verifyFm1(){
                                    if (countInput1.value.length < 6) {
                                            if (formEdit[0].classList.contains("is-valid")) {
                                                formEdit[0].classList.remove("is-valid");
                                            }
                                            formEdit[0].classList.add("is-invalid");
                                    }else{
                                        formEdit[0].classList.remove("is-invalid"); 
                                        formEdit[0].classList.add("is-valid");
                                    }
                            });

                             //Verifica o input2
                             let countInput2 = document.getElementById("form-edit2");
                            countInput2.addEventListener('keyup', function(){
                                        if (countInput2.value.length == 28) {
                                            if (countInput2.value.substr(0,17) == "https://youtu.be/"){
                                                if (formEdit[1].classList.contains("is-invalid")) {
                                                formEdit[1].classList.remove("is-invalid");
                                            }
                                                formEdit[1].classList.add("is-valid");
                                            }
                                        }else{
                                            if (formEdit[1].classList.contains("is-valid")) {
                                                formEdit[1].classList.remove("is-valid");
                                            }
                                            formEdit[1].classList.add("is-invalid");
                                        }
                            });

                            //verifica input3
                            let countInput3 = document.getElementById("form-edit3");
                            countInput3.addEventListener('keyup', function verifyFm3(){
                                if (countInput3.value.length > 0) {
                                        if (formEdit[5].classList.contains("is-invalid")) {
                                            formEdit[5].classList.remove("is-invalid"); 
                                        }
                                        formEdit[5].classList.add("is-valid");
                                    }else{
                                        formEdit[5].classList.remove("is-valid"); 
                                        formEdit[5].classList.add("is-invalid");
                                    }

                              
                            });

                             //verifica input4
                             let countInput4 = document.getElementById("form-edit4");
                            countInput4.addEventListener('keyup', function(){
                                if (countInput4.value.length > 0 && countInput4.value > countInput3.value) {
                                        if (formEdit[6].classList.contains("is-invalid")) {
                                            formEdit[6].classList.remove("is-invalid");
                                        }
                                        formEdit[6].classList.add("is-valid");
                                }else{
                                        formEdit[6].classList.remove("is-valid"); 
                                        formEdit[6].classList.add("is-invalid");
                                    }
                            });

                             //Verifica input5
                             let countInput5 = document.getElementById("form-edit5");
                            countInput5.addEventListener('keyup', function(){
                                    if (countInput5.value.length < 50) {
                                            if (formEdit[7].classList.contains("is-valid")) {
                                                formEdit[7].classList.remove("is-valid");
                                            }
                                            formEdit[7].classList.add("is-invalid");
                                    }else{
                                        formEdit[7].classList.remove("is-invalid"); 
                                        formEdit[7].classList.add("is-valid");
                                    }
                            });

                            //verifica o select1
                            $("#selectFormacao").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formEdit[2].classList.remove("is-invalid");
                                    formEdit[2].classList.add("is-valid");
                                }else{
                                    formEdit[2].classList.remove("is-valid");
                                    formEdit[2].classList.add("is-invalid");
                                }
                                if ($("#selectCurso").find(':selected').data("valor") != null) {
                                    formEdit[3].classList.remove("is-invalid");
                                    formEdit[3].classList.add("is-valid");
                                }else{
                                    formEdit[3].classList.remove("is-valid");
                                    formEdit[3].classList.add("is-invalid");
                                }

                                //reseta o select de Módulo
                                $('#selectModulo').load('/tcc/selects/reset_option.php');
                                if (formEdit[4].classList.contains("is-valid")) {
                                            formEdit[4].classList.remove("is-valid"); 
                                        }
                                formEdit[4].classList.add("is-invalid");
                            });

                            //verifica o select2
                            $("#selectCurso").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formEdit[3].classList.remove("is-invalid");
                                    formEdit[3].classList.add("is-valid");
                                }else{
                                    formEdit[3].classList.remove("is-valid");
                                    formEdit[3].classList.add("is-invalid");
                                }
                            });

                            //verifica o select3
                            $("#selectModulo").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formEdit[4].classList.remove("is-invalid");
                                    formEdit[4].classList.add("is-valid");
                                }else{
                                    formEdit[4].classList.remove("is-valid");
                                    formEdit[4].classList.add("is-invalid");
                                }
                            });

                            
                            //Verifica se todos os campos estão corretos para habilitar a atualização
                            let modalEditAula = document.getElementById("modalEditAula");
                            modalEditAula.addEventListener('mousemove', function () {
                                    find = formEdit[0].classList.contains("is-valid");
                                    find1 = formEdit[1].classList.contains("is-valid");
                                    find2 = formEdit[2].classList.contains("is-valid");
                                    find3 = formEdit[3].classList.contains("is-valid");
                                    find4 = formEdit[4].classList.contains("is-valid");
                                    find5 = formEdit[5].classList.contains("is-valid");
                                    find6 = formEdit[6].classList.contains("is-valid");
                                    find7 = formEdit[7].classList.contains("is-valid");
                                        if(find && find1 && find2 && find3 && find4 && find5 && find6 && find7){
                                            btnAtt.removeAttribute('disabled');
                                        }else{
                                            btnAtt.setAttribute('disabled', true);
                                        }
                            });   
                }

                let descButton = document.getElementById("descButton");
                descButton.addEventListener('click', function copiarDesc() {
                    let copyDescIcon = document.getElementById("copyDescIcon");
                    let textoCopiado = document.getElementById("copyDesc");
                    textoCopiado.select();
                    textoCopiado.setSelectionRange(0, 99999)
                    document.execCommand("copy");
                        if (copyDescIcon.classList.contains("bi-paperclip")) {
                            copyDescIcon.classList.remove("bi-paperclip");
                        }copyDescIcon.classList.add("bi-check-all");
                        setTimeout(() => {
                                if (copyDescIcon.classList.contains("bi-check-all")) {
                                    copyDescIcon.classList.remove("bi-check-all");
                                } copyDescIcon.classList.add("bi-paperclip");
                        }, 2000);
                });
 
    
</script>
