<?php $this->load->view('head');//Chama a view head.html?>

<title>Cursos</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/estilo.css') ?>" >
  <style>  
  .pdf {height:800px; width:100%;}
  </style>
</head>
<body>
  <div class="container main">
  <?php /* Chama a View da Barra de navegação*/
  $dados['ativo'] = 9; $this->load->view('admin1/navbar',$dados);?>
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
     <div class="panel panel-default">
      <div class="panel-heading">
        <h3>Lista de Cursos</h3>
        <p>Aqui aparece todos os cursos cadastrados no sistema</p>
      </div>
    <div class="panel-body">
    <?php if( $curso){ 
    echo '<div class="table-responsive">
    <table class="table table-hover">
      <tr class="active">
        <th>NOME DO CURSO</th>
        <th>PERIODOS</th>
        <th></th>                    
      </tr>';       
      foreach($curso as $curso) {
        echo "<tr>";
        echo '<td>'.$curso['cursodesc'].'</td>';
        echo '<td>'.$curso['periododesc'].'</td>';
        $atts = array(
                  'title' => 'Grade',
                  'class' => 'pull-left btn btn-success'
                );
        echo '<td>'.anchor('admin1/Cursos/grade/'.$curso['cursoid'], '<i class="fa fa-graduation-cap fa-fw fa-lg"></i>&nbsp;Grade', $atts).'</td>';
        echo "</tr>";
        }
    echo "</table></div>";
    }else{
        echo "<center><h4><span class='label label-danger'>Nenhum Reserva foi feita ainda!</span></h4></center>"; 
        }?>
    </div>
      </div>
      </div>
    </div>
  </div>
<?php $this->load->view('footer');//Chama a view footer?>