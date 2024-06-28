<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script> $('#modalAddMod').modal('show') </script>

<script>
    $(document).ready(function(){
        $('#selectFormacao').change(function(){
            $('#selectCurso').load('/eadev/selects/select_cur.php?filter_form='+$('#selectFormacao').val());
        });
    });

                let formAdd = document.querySelectorAll('.form-add');
				let btnAdd = document.getElementById('addMod');
                for(let i = 0; i < formAdd.length; i++){
                    formAdd[0].classList.add("is-invalid");
                    formAdd[1].classList.add("is-invalid");
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
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                        // Substituir os espaços do input {4} no formulario
                        var $formAdd4 = formAdd[3];
                        $formAdd4.addEventListener('focusout', function(){
                                this.value = this.value.replace(/^\s+|\s+$/g, '');
                                this.value = this.value.replace(/\s{2,}/g, ' ');
                                this.value = this.value.replace(/(^\w{1})/g, letra => letra.toUpperCase());
                        });

                            //verifica o selectTipo
                            $("#form-add1").change(function verifySelectTipo(){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formAdd[0].classList.remove("is-invalid");
                                    formAdd[0].classList.add("is-valid");
                                }else{
                                    formAdd[0].classList.remove("is-valid");
                                    formAdd[0].classList.add("is-invalid");
                                }
                            });
                            

                             //verifica o terceiro input
                            let countInput3 = document.getElementById("form-add3");
                            countInput3.addEventListener('keyup', function verifyFm3(){
                                if (countInput3.value.length > 30) {
                                        formAdd[3].classList.remove("is-invalid");
                                        formAdd[3].classList.add("is-valid");
                                    }else{
                                        formAdd[3].classList.remove("is-valid"); 
                                        formAdd[3].classList.add("is-invalid");
                                    }
                            });

                            //verifica o select1
                            $("#selectFormacao").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formAdd[1].classList.remove("is-invalid");
                                    formAdd[1].classList.add("is-valid");
                                }else{
                                    formAdd[1].classList.remove("is-valid");
                                    formAdd[1].classList.add("is-invalid");
                                }
                                if ($("#selectCurso").find(':selected').data("valor") != null) {
                                    formAdd[2].classList.remove("is-invalid");
                                    formAdd[2].classList.add("is-valid");
                                }else{
                                    formAdd[2].classList.remove("is-valid");
                                    formAdd[2].classList.add("is-invalid");
                                }
                            });

                            //verifica o select2
                            $("#selectCurso").change(function (){
                                if ($(this).find(':selected').data("valor") != 0) {
                                    formAdd[2].classList.remove("is-invalid");
                                    formAdd[2].classList.add("is-valid");
                                }else{
                                    formAdd[2].classList.remove("is-valid");
                                    formAdd[2].classList.add("is-invalid");
                                }
                            });

                            //Verifica se todos os campos estão corretos para habilitar a atualização
                            let modalEditCur = document.getElementById("modalAddMod");
                            modalEditCur.addEventListener('mousemove', function () {
                                    find = formAdd[i].classList.contains("is-valid");
                                    findSel1 = formAdd[1].classList.contains("is-valid");
                                    findSel2 = formAdd[2].classList.contains("is-valid");
                                        if(findSel1 && findSel2 && find){
                                            btnAdd.removeAttribute('disabled');
                                        }else{
                                            btnAdd.setAttribute('disabled', true);
                                        }
                            });              
                }
                
</script>