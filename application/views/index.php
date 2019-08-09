<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="manifest" href="./manifest.json">
  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <title>Arqlibras!</title>


  <script>
    function get_view_palavra(id_palavra){
      window.location.href = './arqlibras/view_palavra/'+id_palavra; 
    }
    $(document).ready(function(){
      loadData();
    });
    function loadDataInApp(value){

      var lines = '';
      lines+='<div onclick="get_view_palavra('+value.id+')" class="card card_img" >';
      
      lines+='<img class="card-img-top" style="width: 100%" src="./imagens/'+value.img+'" alt="Imagem de capa do card"></div>'; 
      
      return lines;
    }

    function loadData(){
      $.ajax({
        url: "<?php echo site_url();?>arqlibras/ajax_get_listar_palavras",
        dataType:"json",
        type:"get",
        cache:false,
        success:function(data){
          var lines = '';
          $.each(data,function(index,value){
            lines+= loadDataInApp(value);
          });

          if (lines) {
            $("#palavras").html('');
            $("#palavras").append(lines);
          }else{
            alert('não há vídeos cadastrados');
          }
        },error:function(e){
          alert('erro');
        }
      })
    }

    function get_favoritos(){
      $.ajax({
        url: "<?php echo site_url();?>arqlibras/ajax_get_favoritos",
        dataType:"json",
        type:"get",
        cache:false,
        success:function(data){
          var lines = '';
          $.each(data,function(index,value){
            lines+= loadDataInApp(value);
          });

          if (lines) {
            $("#palavras").html('');
            $("#palavras").append(lines);
          }else{
            alert('não há vídeos cadastrados');
          }
        },error:function(e){
          alert('erro');
        }
      })
    }
  </script>
  <style type="text/css">
   .title{
    color: white;
    text-align: center;
  }
  .container{
    text-align: center;
    align-items: center;
  }
  .card_img{
    margin-top: 3em;
    width: 100%;
    background-color: #808080;
  }
  .card-img-top{
    color: black;
    font-size: 10em;
  }
  .card_btn{
    width: 100%;
    background-color: #F7819F;
  }
  .btn_select{
   width: 150%;
   border-color: gray;
   border-radius: 15%;
 }
 .btn_select:hover{
  background-color: #424242; 
  border-bottom: #FF0040;
  color: white;
}
.btn_select:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>
</head>
<body style="background-color: black">
  <div id="header">
    <?php $this->load->view('navbar.php') ?>
  </div>

  <div id="container">
    <div id="row">
      <div class="btn-group" style="width: 100%" role="group" aria-label="Exemplo básico">
        <button type="button" class="btn btn-secondary btn_select">+ Acessados</button>
        <button type="button" onclick="get_favoritos()" class="btn btn-secondary btn_select">Favoritos</button>
        <button type="button" class="btn btn-secondary btn_select">Recentes</button>
      </div>
      <div id="palavras"></div>
    </div>
  </div>
</div><!--Fim container-->



</body>
</html>