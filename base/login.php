<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- All-login CSS -->
    <link rel="stylesheet" href="assets/css/all-login.css">
    <title>Login | Eadev</title>
  </head>
  <body>
   
        <div class="d-flex flex-column justify-content-center align-items-center" id="bd-login">
             <form action="?page=validacao" autocomplete="off" method="POST" class="d-flex flex-column justify-content-center align-items-center p-3" id="form-login">
             <img src="arquivos/img/logo/logo2.png" alt="Logo Eadev" title="Logo Eadev" class="my-5" srcset=""> 
              <input type="text" placeholder="Usuário" name="usuario" class="mb-3" required>
              <input type="password" placeholder="Senha" name="senha" class="mb-5" required>
              <input type="submit">
              <a href="#" class="mt-4">Esqueceu a senha ?</a>
              <a href="?page=cadastro" class="mt-2">Cadastre-se</a>
             </form>
           </div>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>