<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script> $('#modalEditCur').modal('show') </script>


<script>
                
                let formEdit = document.querySelectorAll('.form-edit');
                let select = document.getElementById('selectFormacao');
				let option = select.options[select.selectedIndex].value;
				let btnAtt = document.getElementById('attEditCur');
                for(let i = 0; i < formEdit.length; i++){
                    formEdit[0].classList.add("is-valid");
                    formEdit[1].classList.add("is-valid");
                    formEdit[2].classList.add("is-invalid");
                    formEdit[3].classList.add("is-invalid");
                    btnAtt.setAttribute('disabled', true);

            //REGEX
                // g - global (todas as ocorrencias)
                // i - insensitive (Ignora o low e upper case)
                        // Substituir os espaços do input {1} no formulario
                        var $formEdit1 = formEdit[0];
                        $formEdit1.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');            
                                this.value = this.value.replace(/(^\w{1})|(\s+\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {2} no formulario
                        var $formEdit2 = formEdit[1];
                        $formEdit2.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, '');
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {4} no formulario
                        var $formEdit4 = formEdit[3];
                        $formEdit4.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
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

                            //verifica o segundo input
                            let countInput2 = document.getElementById("form-edit2");
                            countInput2.addEventListener('keyup', function verifyFm2(){
                                if ( countInput2.value.length < 2) {
                                        if (formEdit[1].classList.contains("is-valid")) {
                                                formEdit[1].classList.remove("is-valid");
                                            }
                                            formEdit[1].classList.add("is-invalid");
                                    }else{
                                        formEdit[1].classList.remove("is-invalid"); 
                                        formEdit[1].classList.add("is-valid");
                                    }
                            });

                             //verifica o terceiro input
                            let countInput3 = document.getElementById("form-edit3");
                            countInput3.addEventListener('keyup', function verifyFm3(){
                                if (countInput3.value.length > 50) {
                                        formEdit[3].classList.remove("is-invalid");
                                        formEdit[3].classList.add("is-valid");
                                    }else{
                                        formEdit[3].classList.remove("is-valid"); 
                                        formEdit[3].classList.add("is-invalid");
                                    }
                            });

                            //verifica o select
                            $("#selectFormacao").change(function verifySelect(){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formEdit[2].classList.remove("is-invalid");
                                    formEdit[2].classList.add("is-valid");
                                }else{
                                    formEdit[2].classList.remove("is-valid");
                                    formEdit[2].classList.add("is-invalid");
                                }
                            });

                            //Verifica se todos os campos estão corretos para habilitar a atualização
                            let modalEditCur = document.getElementById("modalEditCur");
                            modalEditCur.addEventListener('mousemove', function verifyTextArea() {
                                    find = formEdit[i].classList.contains("is-valid");
                                    findSel = formEdit[2].classList.contains("is-valid");
                                        if(findSel && find){
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
