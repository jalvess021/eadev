<?php
 $url = "/tcc/relatorios/ficha_alu.php?user=".$_GET['user'];
?>
<html>
  <head>
    <title>Gerando PDF | Eadev</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="http://localhost/tcc/assets/css/all-rel/load.css">
  </head>
  <body class="body-load">
    <div class="center-ring">
        <div class="ring"> </div>
          <span class="load-text">Processando...</span>
    </div>

    <script>
        window.location = "<?php echo $url;?>";
    </script>
  </body>
</html>