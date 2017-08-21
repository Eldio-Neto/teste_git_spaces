

<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
	
		<div class="navbar nav_title" 
		style="
		    background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #2b313c), color-stop(100%, #1b1d23));
		    background-image: -moz-linear-gradient(#2b313c, #1b1d23);
		    background-image: -webkit-linear-gradient(#2b313c, #1b1d23);
		    background-image: linear-gradient(#2b313c, #1b1d23);
		">
			<a href="{{route('home')}}" class="site_title">
			<img src="{{ url('imagens/')}}/e-icon.ico" style="width: 25px; height: 25px;" alt="icone">
			 <span>Pedacinho</span></a>
		</div>
	
		<div class="clearfix"></div>
		
		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="{{ url('imagens/Profile')}}/{{Auth::user()->idFoto or '1'}}.jpg" alt="..."
					class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Bem Vindo(a), </span>
				<h2>{{Auth::user()->first_name}}</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->
	
		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
		
				<ul class="nav side-menu" id="side-menu">
		
					<li><a href="{{route('home')}}"><i class="fa fa-home fa-fw"></i>
							Home</a></li>
					
					<li><a href="{{route('user.index')}}"><i
							class="fa fa-users fa-fw"></i> Funcionários</a></li>
					
					<li><a href="{{route('solicitacao.index')}}"><i
							class="fa fa-hand-o-up fa-fw"></i> Solicitações</a></li>
		
					<li><a href="{{route('contrato.index')}}"><i
							class="fa fa-newspaper-o fa-fw"></i> Contrato</a></li>
		
					<li><a href="{{route('empresa.index')}}"><i
							class="fa fa-industry fa-fw"></i> Empresas</a></li>
					
					<li class="dropdown-submenu">
						<a tabindex="-1" href="#"><i
						class="fa fa-cogs fa-fw"></i> Gestão
						<span class="fa fa-chevron-down"></span></a>
						
						<ul class="nav child_menu" style="display: none;">
							<li><a href="{{route('cargo.index')}}"> Cargos</a></li>
								
							<li><a href="{{route('sindicato.index')}}"> Sindicatos</a></li>
								
							<li><a href="{{route('tipoFuncionario.index')}}"> Tipo Funcionários</a></li>
								
							<li><a href="{{route('tipoDependente.index')}}"> Tipo Dependentes</a></li>
								
							<li><a href="{{route('tipoSolicitacao.index')}}"> Tipo Solicitação</a></li>
						</ul>
						
					</li>

				</ul>
		
			</div>
		
		</div>
		<!-- /sidebar menu -->
	</div>
</div>