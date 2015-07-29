<!--Barra de Navegação -->
<h4 class="text-right text-capitalize">Olá Administrador, <?php echo strtolower($this->session->nome);?></h4>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<a class="navbar-brand" style="font-size: 14px;" href="<?php echo base_url('admin1/paineladm');?>">
			<img style="height: 100%;margin-right: 5px;" alt="Brand" class="pull-left" src="<?php echo base_url('assets/imgs/favicons/favicon-32x32.png') ?>">
			ILAB
			</a>
			</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li <?php if($ativo == 1){echo 'class="active"';}?>><a href="<?php echo base_url('admin1/paineladm');?>"><i class="fa fa-home fa-fw fa-lg hidden-sm"></i>&nbsp;Início</a></li>
				<li <?php if($ativo == 2 or $ativo == 8){echo 'class="dropdown active"';} else{echo 'class="dropdown"';}?>>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-flask fa-fw fa-lg hidden-sm"></i>&nbsp;Laboratorios</a>
					<ul class="dropdown-menu" role="menu">
						<li <?php if($ativo == 2){echo 'class="active"';}?>><a href="<?php echo base_url('admin1/Labs');?>"><i class="fa fa-list fa-fw fa-lg"></i>&nbsp;Listar</a></li>
						<li <?php if($ativo == 8){echo 'class="active"';}?>><a href="<?php echo base_url('admin1/Labs/cadastrar');?>"><i class="fa fa-user-plus fa-fw fa-lg"></i>&nbsp;Cadastrar</a></li>
					</ul>
				</li>
				<li <?php if($ativo == 3){echo 'class="active"';}?>><a href="<?php echo base_url('admin1/Reserva_lab');?>"><i class="fa fa-check-square fa-fw fa-lg hidden-sm"></i>&nbsp;Reservas</a></li>
				<li <?php if($ativo == 4){echo 'class="active"';}?>><a href="<?php echo base_url('admin1/aula');?>"><i class="fa fa-calendar fa-fw fa-lg hidden-sm"></i>&nbsp;Calendario</a></li>
				<li <?php if($ativo == 5 or $ativo == 6){echo 'class="dropdown active"';} else{echo 'class="dropdown"';}?>>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user fa-fw fa-lg hidden-sm"></i>&nbsp;Usuarios</a>
					<ul class="dropdown-menu" role="menu">
						<li <?php if($ativo == 5){echo 'class="active"';}?>><a href="<?php echo base_url('admin1/Usuario');?>"><i class="fa fa-list fa-fw fa-lg"></i>&nbsp;Listar</a></li>
						<li <?php if($ativo == 6){echo 'class="active"';}?>><a href="<?php echo base_url('admin1/Usuario/cadastrar');?>"><i class="fa fa-user-plus fa-fw fa-lg"></i>&nbsp;Cadastrar</a></li>
					</ul>
				</li>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mais&nbsp;<i class="fa fa-plus-circle fa-fw fa-lg hidden-sm"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li <?php if($ativo == 7){echo 'class="active"';}?>><a href="<?php echo base_url('ajuda');?>"><i class="fa fa-question fa-fw fa-lg"></i>&nbsp;Ajuda</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Desenvolvido por</i></li>						
						<li><a href="http://semanatrans.esy.es" target="_blank"><i class="fa fa-briefcase fa-fw"></i>&nbsp;Escritorio Escola</a></li>
					</ul>
				</li>				
			</ul>
			<ul class="nav navbar-nav navbar-right">              
				<li><a href="<?php echo base_url('Login/sair');?>">Sair&nbsp;<i class="fa fa-sign-out fa-fw fa-lg"></i></a></li>
			</ul>
		</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav><!-- final da Barra de Navegação -->