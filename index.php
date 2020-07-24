<?php 
  $raw = file_get_contents('https://blackbox-v1-submarino.b2w.io/defer/produto/1708602357?pfm_carac=livro');
  $dados = json_decode($raw, true);
  $item = $dados['products']; 
  $url = 'http://' .$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Livraria</title>
  <link rel="shortcut icon" href="img/icon.png" />

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />

</head>

<body>

  <div class="navbar-fixed">
    <nav class="white" role="navigation ">
      <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo black-text">
          <!--<img src="logo.jpg" id="logo">-->
          <i class="material-icons  Medium">import_contacts</i>
          <h5 style="display:flex">Livraria</h5>
        </a>

        <ul class="right hide-on-med-and-down">
          <li><a class="black-text" href="#">Início</a></li>
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>
    </nav>
  </div>

  <div class="slider">
    <ul class="slides">
      <li>
        <img src="img/books.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Bem vindo a Biblioteca Digital!</h3>
          <h5 class="light grey-text text-lighten-3">Os melhores livros para você!</h5>
        </div>
      </li>

      <?php  
  
  foreach ($dados['components'] as $lista => $valor){
      $i=1;
      foreach($item as $key3 => $value3) {
        foreach($dados['components'][$lista]['products'] as $listas)
          if ($key3 == $listas['id'] && $i<2){
            echo '
            <li>
           
              <img src="img/back-livro.jpg" style="filter: brightness(0.5);"> <!-- random image -->
              <div class="caption center-align">
              <h3  style="text-transform: uppercase; black-text">'.$dados['components'][$lista]['title'].'</h3>
              
                <form action="listas.php" method="POST">
                <button class="btn-large waves-effect waves-light" type="submit" id="tmp" name="tmpString" value="'.$dados['components'][$lista]['title'].'">CONFIRA!
     
                </button>
                 
                  </form>
              </div>
            </li>';
            $i++;
          }
        
      }
  }
  
  ?>
    </ul>
  </div>

  <div class="container">
    <div class="section">
    <br><br>
    <h4 class="center gray-text">Confira nossos produtos : </h4>

      <br><br><br><br><br>

      <div class="row " style="display: flex;flex-wrap: wrap;">

<?php

$i = 1;
  foreach($item as $key => $value) {
    if($i <= 9){
    echo '
          <div id ="obj" class="col s12 m6 l4 hoverable teste'.$i.'" style="margin-bottom:50px;">
            <div class="icon-block">
            <img src="'.$item[$key]['image']['large'].'" width="100%" height="250">
            <h6 class="center">'.$item[$key]['name'].'</h6>
            <p class="bold" style="font-size:25px;">R$ : '.$item[$key]['offerPrice'].'</p>
            <p class="light">ou até '.$item[$key]['installment'].'</p>
            <p class="light">Loja : '.$item[$key]['sellerName'].'</p>
            <a href="#modals'.$i.'" style="margin-bottom: 12px;float:right;" class="modal-trigger waves-effect waves-light btn-small"><i class="material-icons Small">code</i></a>
            <a  href="#modal'.$i.'" style="margin-bottom: 12px;float:left" class="modal-trigger waves-effect blue waves-light btn-small center">Comprar</a>
          </div>
        </div>';
        echo '<div id="modal'.$i.'" class="modal">
        <div class="modal-content center">
          <h4>'.$item[$key]['name'].'</h4>
          <img src="'.$item[$key]['image']['large'].'" width="50%" height="300">
          <p class="bold" style="font-size:25px;">'.$item[$key]['totalOffers'].' ofertas a partir de R$ : '.$item[$key]['offerPrice'].'</p>
          <p class="light">ou até '.$item[$key]['installment'].'</p>
          <p class="light">Vendido e entregue pela Loja : '.$item[$key]['sellerName'].'</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
      </div>';
      echo '<div id="modals'.$i.'" class="modal">
        <div class="modal-content center">
          <h4>Para implementar no seu site!</h4>
          <textarea style="height: auto;" rows="14">
          <a style="color: rgba(0, 0, 0, 0.87);" href="'.$url.'">
          <div  style="padding: 24px;text-align: center;box-sizing: inherit;width: 400px;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
          <h4 style="font-weight: 400;">Livro - O conto da aia</h4>
          <img src="'.$item[$key]['image']['large'].'" width="200px" height="150px">
          <p style="font-size:25px;">'.$item[$key]['totalOffers'].' ofertas a partir de R$ : '.$item[$key]['offerPrice'].'</p>
          <p>ou até '.$item[$key]['installment'].'</p>
          <p>Vendido e entregue pela Loja : '.$item[$key]['sellerName'].'</p>
          </div>
          </a>
          </textarea>
          
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
        </div>
      </div>';
        $i++;
    }
  }

?>

      </div>

    </div>
  </div>

 

  <div class="parallax-container valign-wrapper">
    <div class="parallax"><img src="img/dark.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <br>
          <form action="listas.php" method="POST">
              <button style="background-color: #26a69a00;" class="btn-large waves-effect black-text" type="submit" id="tmp" name="tmpString" value="<?php echo $dados['components']['item_page.rr2']['title']; ?>">
              <h5><?php echo $dados['components']['item_page.rr2']['title']; ?></h5>
              </button>
          </form>
          <div class="carousel">
            <?php 
            foreach($item as $key2 => $value2) {
              foreach ($dados['components']['item_page.rr2']['products'] as $romance){
                if ($key2 == $romance['id']){
                  echo '<a class="carousel-item tooltipped " data-position="bottom" data-tooltip="'.$item[$key2]['name'].'" ><img src="'.$item[$key2]['image']['large'].'"></a>';
                
              }
              }
             
            }

          ?>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="parallax"><img src="img/back-livro.jpg" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Central de Atendimento</h5>
          <p class="grey-text text-lighten-4">Em virtude da propagação do coronavírus e zelando pela segurança de todos,
            atenderemos você por e-mail e chat online no horário das 8h às 18h, de segunda a sexta-feira (exceto
            feriados).</p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Serviços</h5>
          <ul>
            <li><a class="white-text" href="#!">Garantia Estendida</a></li>
            <li><a class="white-text" href="#!">Proteção</a></li>
            <li><a class="white-text" href="#!">Venda</a></li>
            <li><a class="white-text" href="#!">Retire na Loja</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Institucional</h5>
          <ul>
            <li><a class="white-text" href="#!">Politica de Venda e troca</a></li>
            <li><a class="white-text" href="#!">Relação com investidores</a></li>
            <li><a class="white-text" href="#!">Eventos</a></li>
            <li><a class="white-text" href="#!">Termos e Condições</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2020 Vitrine, Inc.
      </div>
    </div>
  </footer>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/init.js"></script>
  <script src="js/materialize.js"></script>

  <script>
    $(document).ready(function () {
      $('.carousel').carousel();
    });

    $(document).ready(function () {
      $('.tooltipped').tooltip();
    });

    $(document).ready(function () {
      $('.modal').modal();
    });

    $(document).ready(function () {
      $('.slider').slider({
        full_width: true
      });
    });
  </script>

</body>

</html>