<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/all-cad.css">
    <title>Cadastro / Eadev</title>
  </head>
  <body class="bd-cad">
    <div class="container">
        <div class="form">
            <form action="?page=insere_alu" method="POST" autocomplete="off">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="logo-cad">
                      <a href="?page=login" data-bs-toggle="tooltip" data-bs-placement="top" title="Pág. Login" data-bs-custom-class="custom-tooltip"><img src="arquivos/img/icone/icone2.png" alt="Logo Eadev"></a>
                    </div>
                </div>

                <div class="input-group">

                  <div class="input-box">
                    <input type="text"  id="nome" name="nome" autocomplete="off" required>
                    <label for="name" class="label-float">Nome completo</label>
                  </div>

                    <div class="input-box">
                      <input type="text"  id="usuario" name="usuario" autocomplete="off" required>
                      <label for="usuario">Usuário</label>
                    </div>

                    <div class="input-box">
                      <input type="text"  id="email" name="email" autocomplete="off" required>
                      <label for="email">E-mail</label>
                    </div>

                    <div class="input-box">
                      <input type="text"  id="telefone" name="telefone" autocomplete="off" required>
                      <label for="telefone">Telefone</label>
                    </div> 

                    <div class="input-box">
                      <input type="password"  id="senha" name="senha" autocomplete="off"  required>
                      <label for="senha">Senha</label>
                    </div>

                    <div class="input-box">
                      <input type="password" id="senha_confirm" autocomplete="off" required>
                      <label for="senha_confirm">Confirme sua senha</label>
                    </div>

                </div>

                <div class="gender-inputs ">
                    <div class="gender-tittle">
                        <h6 style="color: whitesmoke;"><b>Gênero</b></h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" name="sexo" id="male" value="1">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                          <input type="radio" name="sexo" id="female" value="2">
                          <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                          <input type="radio" name="sexo" id="others" value="3">
                          <label for="others">Outros</label>
                        </div>
                    </div>
                </div>

                <div class="check">
                    <input type="checkbox" id="scales" name="scales" required>
                    <label>Li e concordo com os <a href="" id="termos" class="text-decoration-none px-1">Termos de Uso</a> da plataforma.</label>
                </div>
                <div class="continue-button d-flex justify-content-center">
                    <button type="submit"> <a>Cadastre-se</a></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <script> 
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script> 

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script>
      $(document).ready(function(){
        //Telefone
        $("#telefone").mask("(99) 99999-9999");
      });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

