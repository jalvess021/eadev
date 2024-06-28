<?php
  $url = $_POST['url'];
  $gf = $_POST['hidden_html'];
?>
<html>
  <head>
    <title>Gerando PDF | Eadev</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//<?= $_SERVER['HTTP_HOST']; ?>/eadev/assets/css/all-rel/load.css">
  </head>
  <body class="body-load">
    <div class="center-ring">
        <div class="ring"> </div>
          <span class="load-text">Processando...</span>
          <form method='post' action="<?php echo $url;?>" id='formUrl'>
            <input type="hidden" name="hidden_html" id="hidden_html" value='<?php echo $gf;?>'> 
          </form>
    </div>
  </body>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $('#formUrl').ready(function(){
        $('#formUrl').submit();
    });
       
</script>
</html>