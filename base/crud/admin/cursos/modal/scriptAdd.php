<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script> $('#modalAddCur').modal('show') </script>

<script>
                
                let formAdd = document.querySelectorAll('.form-add');
				let btnAdd = document.getElementById('btnAdd');
                for(let i = 0; i < formAdd.length; i++){
                    formAdd[2].classList.add("is-invalid");
                    btnAdd.setAttribute('disabled', true);

            //REGEX
                // g - global (todas as ocorrencias)
                // i - insensitive (Ignora o low e upper case)
                        // Substituir os espaços do input {1} no formulario
                        var $formAdd1 = formAdd[0];
                        $formAdd1.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');            
                                this.value = this.value.replace(/(^\w{1})|(\s+\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {2} no formulario
                        var $formAdd2 = formAdd[1];
                        $formAdd2.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, '');
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {4} no formulario
                        var $formAdd4 = formAdd[3];
                        $formAdd4.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                            //Verifica o primeiro input
                            let countInput1 = document.getElementById("form-add1");
                            countInput1.addEventListener('keyup', function(){
                                    if (countInput1.value.length < 6) {
                                            if (formAdd[0].classList.contains("is-valid")) {
                                                formAdd[0].classList.remove("is-valid");
                                            }
                                            formAdd[0].classList.add("is-invalid");
                                    }else{
                                        formAdd[0].classList.remove("is-invalid"); 
                                        formAdd[0].classList.add("is-valid");
                                    }
                            });

                            //verifica o segundo input
                            let countInput2 = document.getElementById("form-add2");
                            countInput2.addEventListener('keyup', function(){
                                if ( countInput2.value.length < 2) {
                                        if (formAdd[1].classList.contains("is-valid")) {
                                                formAdd[1].classList.remove("is-valid");
                                            }
                                            formAdd[1].classList.add("is-invalid");
                                    }else{
                                        formAdd[1].classList.remove("is-invalid"); 
                                        formAdd[1].classList.add("is-valid");
                                    }
                            });

                             //verifica o terceiro input
                            let countInput3 = document.getElementById("form-add3");
                            countInput3.addEventListener('keyup', function(){
                                if (countInput3.value.length > 50) {
                                        formAdd[3].classList.remove("is-invalid");
                                        formAdd[3].classList.add("is-valid");
                                    }else{
                                        formAdd[3].classList.remove("is-valid"); 
                                        formAdd[3].classList.add("is-invalid");
                                    }
                            });

                            //verifica o select
                            $("#selectFormacao").change(function(){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formAdd[2].classList.remove("is-invalid");
                                    formAdd[2].classList.add("is-valid");
                                }else{
                                    formAdd[2].classList.remove("is-valid");
                                    formAdd[2].classList.add("is-invalid");
                                }
                            });

                            //Verifica se todos os campos estão corretos para habilitar a atualização
                            let modalAddCur = document.getElementById("modalAddCur");
                            modalAddCur.addEventListener('mousemove', function() {
                                    find = formAdd[i].classList.contains("is-valid");
                                    findSel = formAdd[2].classList.contains("is-valid");
                                        if(findSel && find){
                                            btnAdd.removeAttribute('disabled');
                                        }else{
                                            btnAdd.setAttribute('disabled', true);
                                        }
                            });              
                }
    
</script>