<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Meta tags Obrigatórias -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css') ?>">
  <!-- JavaScript (Opcional) -->
  <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="<?php echo base_url('js/jquery.js') ?>"></script>
  <script src="<?php echo base_url('js/popper.js') ?>"></script>
  <script src="<?php echo base_url('js/bootstrap.js') ?>"></script>
  <script src="https://kit.fontawesome.com/8d24bc018e.js"></script>

  <title>Arqlibras!</title>
  <style type="text/css">
   <style type="text/css">
* {
  margin: 0;
  padding: 0;
  }

body {
  background: #2E3740;
  background-color: #081921;
  color: #435160;
  font-family: "Open Sans", sans-serif;
}

h2 {
  color: #6D7781;
  font-family: "Open Sans", sans-serif;
  font-size: 15px;
  font-weight: bold;
  font-size: 3.6em;
  text-align: center;
  margin-bottom: 20px;
}

a {
  color: #435160;
  text-decoration: none;
}

#formulario {
  text-align: center;
      
       
}
.cadastrar_palavras{
  width: 350px;
      position: absolute;
      top: 10%;
      left: 50%;
      margin-left: -175px;
}

input[type="text"], input[type="password"] {
      width: 350px;
      padding: 20px 0px;
      background: transparent;
      border: 0;
      border-bottom: 1px solid #435160;
      outline: none;
      color: #6D7781;
      font-size: 18px;
    }
input[type=checkbox] {
  display: none;
}

label {
  display: block;
  position: absolute;
  margin-right: 10px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: transparent;
  content: "";
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  border: 3px solid #435160;
}

#agree:checked ~ label[for=agree] {
  background: #435160;
}

.btn_padrao{
     
      
      background: #578cff;
      border: 0;
      width: 50%;
      height: 40px;
      border-radius: 3px;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      transition: background 0.3s ease-in-out;
      margin-top:8px;
    }
.btn_padrao:hover {
  background: #5c6b8a;
  animation-name: shake;
}

.forgot {
  margin-top: 30px;
  display: block;
  font-size: 11px;
  text-align: center;
  font-weight: bold;
}
.forgot:hover {
  margin-top: 30px;
  display: block;
  font-size: 11px;
  text-align: center;
  font-weight: bold;
  color: #6D7781;
}

.agree {
  padding: 30px 0px;
  font-size: 12px;
  text-indent: 25px;
  line-height: 15px;
}

::-webkit-input-placeholder {
  color: #435160;
  font-size: 16px;
}

.animated {
  animation-fill-mode: both;
  animation-duration: 1s;
}

@keyframes shake {
  0%, 100% {
    transform: translateX(0);
  }
  10%, 30%, 50%, 70%, 90% {
    transform: translateX(-10px);
  }
  20%, 40%, 60%, 80% {
    transform: translateX(10px);
  }
}
  
.texta{
  width: 350px;
  padding: 20px 0px;
  background: transparent;
  border: 0;
  border-bottom: 1px solid #435160;
  outline: none;
  color: #6D7781;
  font-size: 16px;
  

}
.container {
      
      width: 100%;
      margin: 0 auto;
      position: relative;
    }
  

  
  </style>

</head>
<body style="background-color: black">
  <div id="header">
    <?php $this->load->view('navbar.php') ?>
  </div>
  <?php 
  echo validation_errors('<p>','</p>');
  if($this->session->flashdata('atualizacao_positivo'))
  {
    echo '<p><font color="#228B22">'.$this->session->flashdata('atualizacao_positivo').'</font></p>';
  }
  if($this->session->flashdata('atualizacao_negativo'))
  {
    echo '<p><font color="#FF0000">'.$this->session->flashdata('atualizacao_negativo').'</font></p>';
  }
  ?>
  <div class="container">  
    <form id="formulario" action="<?php echo site_url("arqlibras/editarPalavra/$id_item");?>" method="post">
      <h3 style="text-align: center">Editar Palavra</h3>
      <fieldset>
        <input placeholder="Informe a palavra..." value="<?php echo $palavra ?>" type="text" name="palavra" tabindex="1" required autofocus>
      </fieldset>  
      <fieldset>
        <textarea class="texta" placeholder="Informe a descrição da palavra...." name="descricao" tabindex="2" required><?php echo $descricao ?></textarea>
      </fieldset>
      <fieldset>
        <textarea class="texta" placeholder="Informe o exemplo em uma frase...." name="exemplo" tabindex="3" required><?php echo $exemplo ?></textarea>
      </fieldset>
      <fieldset>
        <input placeholder="Informe a chave do vídeo no youtube..." value="<?php echo $yt_id ?>" type="text" name="yt_id" tabindex="4" required autofocus>
      </fieldset>
      <fieldset>
        <input placeholder="Informe o nome do arquivo da imagem..." value="<?php echo $img ?>" type="text" name="img" tabindex="5" required autofocus>
      </fieldset>
      <fieldset>
        <button class="btn_padrao" name="submit" type="submit" id="contact-submit" data-submit="...enviando">Editar</button>
      </fieldset>

    </form>
  </div>



</body>
</html>