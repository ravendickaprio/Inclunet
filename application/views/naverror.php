<ul id='dropdown1' class='dropdown-content' style="overflow: auto;">
	 	 	<?php if ($this->session->userdata('s_level')==="1" || $this->session->userdata('s_level')==="2"): ?>
				<li>
					<!--<i class="material-icons" style="font-size:1rem">border_color</i>-->
					<a href ="<?= site_url("/CProfesor/MostrarPerfil/");?>">Perfil</a>
				</li>
				<!--<li>
					<i class="material-icons" style="font-size:1rem">assignment_ind</i>
					<a href ="#!">Contacto</a>
				</li>-->
	 	 		
	 	 	<?php else: ?>
				<li>
					<!--<i class="material-icons" style="font-size:1rem">border_color</i>-->
					<a href ="<?= site_url("/CAlumno/MostrarPerfil/");?>">Perfil</a>
				</li>
				<!--<li>
					<i class="material-icons" style="font-size:1rem">assignment_ind</i>
					<a href ="#!">Contacto</a>
				</li>-->
	 	 	<?php endif ?>
			<li class   ="divider"></li>
			<li><a href ="<?= site_url("/Welcome/Cerrar/");?>">Cerrar Sesion</a></li>
</ul>
<ul id='dropdown2' class='dropdown-content' style="overflow: auto;">
			<li><a href ="<?= site_url("/CProfesor/Mensajes/");?>">Crear</a></li>	
			<li><a href ="<?= site_url("/CProfesor/Mensajes2/");?>">Editar</a></li>
</ul>
<nav class="nav-extended">
	<div class="nav-wrapper light-blue darken-3">
		<a href="<?= base_url(); ?>" class="brand-logo" style="padding-left: 1em;">
			<img style="width:1em;height:1em;" src="<?= site_url("/img/fcc.png"); ?>" alt="fcc_logo"> F.C.C
		</a>
		<a href="#" data-activates="nav-menu" class="button-collapse"><i class="material-icons">menu</i></a>

		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<!-- Menu Escritorio -->
<!--=====================================================
			=            php-if de validacion de session            =
			======================================================-->
			
			
			<?php if ($this->session->userdata('s_level')!==NULL): ?>
				<?php if($this->session->userdata('s_level')==="1" || $this->session->userdata('s_level')==="2"): ?>
					<!--====================================
					=            Si es Profesor            =
					=====================================-->
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Inicio"><a href="<?= site_url("/"); ?>"><i class="material-icons">home</i></a></li>
			
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Abrir Curso"><a href="<?= site_url("/CProfesor/abrircurso/");?>"><i class="material-icons">add_box</i></a></li>
					
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Cursos"><a href="<?= site_url("/CProfesor/MostrarCursosP/"); ?>"><i class="material-icons">school</i></a></li>

					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ingresar Alumnos"><a href="<?= site_url("/CProfesor/IngresarAlumnos/"); ?>"><i class="material-icons">person_add</i></a></li>
					
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Subir Calificaciones"><a href="<?= site_url("/CProfesor/SeleccionarMateria/");?>"><i class="material-icons">playlist_add_check gavel</i></a></li>

					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Estadisticas"><a href="<?= site_url("/CProfesor/Estadisticas/"); ?>"><i class="material-icons">poll trending_up</i></a></li>

					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Historial"><a href="<?= site_url("/CProfesor/SeleccionarAlumno/");?>"><i class="material-icons">history poll</i></a></li>

					<li class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Mensajes"><a class="dropdown-button" href="#!" data-activates="dropdown2"><i class="material-icons right">question_answer mail</i><br></a></li>

					<li class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Configuracion"><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">settings_applications</i><br></a></li>

					<!--<?php #endif ?>-->


				<?php else: #nivel 3 ?> 
					<!--==================================
					=            Si es Alumno            =
					===================================-->
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Inicio"><a href="<?= site_url("/"); ?>"><i class="material-icons">home</i></a></li>
			
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Materias"><a href="<?= site_url("/CAlumno/MostrarMaterias/");?>"><i class="material-icons">school</i></a></li>

					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Calificaciones"><a href="<?= site_url("/CAlumno/VMostrarCalificaciones/"); ?>"><i class="material-icons">gavel</i></a></li>
					
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Profesores"><a href="<?= site_url("/CAlumno/MostrarPprofesores/"); ?>"><i class="material-icons">mood_bad</i></a></li>
					
					<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Historial Académco"><a href="<?= site_url("/CAlumno/VMostrarCalificaciones/"); ?>"><i class="material-icons">history poll</i></a></li> 

					<li class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Configuracion"><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons right">settings_applications</i><br></a></li>
				<?php endif; ?>
			<?php else: ?>

			<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Inicio"><a href="<?= site_url("/"); ?>"><i class="material-icons">home</i></a></li>
			
			<li class="waves-effect tooltipped" data-position="bottom" data-delay="50" data-tooltip="Logeo"><a class="	modal-trigger" href="#modal1"><i class="material-icons">fingerprint</i></a></li>
			
			<div id="modal1" class="modal modal-fixed-footer">
		   		 <div class="modal-content blue-grey darken-3">
		      		
						<form action="<?= site_url("/Welcome/Validation/"); ?>" method="POST">
							<div class="row">
								<h2 class="col offset-s1 offset-m1">Iniciar Session</h2>
								<div class="input-field col offset-m2 m6 offset-s1 s10">
									<i class="material-icons prefix">account_circle</i>
									<input id="user" type="text" class="validate" name="user" onkeypress="return valida(event)" required data-length="9">
									<label for="user">ID (Matricula)</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col offset-m2 m6 offset-s1 s10">
									<i class="material-icons prefix">https</i>
									<input id="mat" type="password" class="validate" name="mat" required >
									<label for="mat">Contraseña</label>
								</div>
							</div>
						<div class="row">
							<p class="center-align"><button class="btn waves-effect pulse blue-grey">Iniciar Sesi&oacute;n</button></p>
						</div>

						</form>	
					</div>	
					<div class="modal-footer">
				      <a href="<?= site_url("/Welcome/RegisterP/"); ?>" class="modal-action modal-close waves-effect waves-green btn-flat blue-grey">Registrar Profesor</a>
				      <a href="<?= site_url("/Welcome/RegisterA/"); ?>" class="modal-action modal-close waves-effect waves-green btn-flat blue-grey">Registrar Alumno</a>
				    </div>	    	
		  	</div>
		  	<?php endif; ?>

			
			<!--====  End of php-if de validacion de session  ====-->
		</ul>
		<ul id="nav-menu" class="side-nav">
			<!-- Menu Responsivo -->
			<li>
				<img src="<?= site_url("/css/BUAP.png");  ?>" alt="" style="left-margin: 0em;width: 100%;">
			</li>

			<!--=====================================================
			=            php-if de validacion de session            =
			======================================================-->
			
			
			<?php if ($this->session->userdata('s_level')!==NULL): ?>
				<?php if($this->session->userdata('s_level')==="1" || $this->session->userdata('s_level')==="2"): ?>
					<!--====================================
					=            Si es Profesor            =
					=====================================-->
					
					<li><a href="<?= site_url("/CProfesor/");?>" class="black-text"><i class="material-icons">home<i>Inicio</a></li>

					<li><a href="<?= site_url("/CProfesor/abrircurso/");?>" class="black-text"><i class="material-icons">add_box</i>Abrir Curso</a></li>

					<li><a href="<?= site_url("/CProfesor/MostrarCursosP/"); ?>"><i class="material-icons">school</i>Cursos</a></li> 

					<li><a href="<?= site_url("/CProfesor/IngresarAlumnos/"); ?>"><i class="material-icons">person_add</i> Ingresar Alumnos </a></li> 

					<li><a href="<?= site_url("/CProfesor/SeleccionarMateria/"); ?>"><i class="material-icons">playlist_add_check gavel</i>Subir Calificaciones</a></li> 

					<li><a href="<?= site_url("/CProfesor/Estadisticas/"); ?>"><i class="material-icons">poll trending_up</i>Estadisticas</a></li> 

					<li><a href="<?= site_url("/CProfesor/SeleccionarAlumno/"); ?>"><i class="material-icons">history poll</i>Historial</a></li> 
					<!--<?php# if ($this->session->userdata('s_level')==="1"): ?>-->
						
					<li>	
						<ul class="collapsible" data-collapsible="accordion">
	    						<li>
	    						  <a class="collapsible-header" style="margin-left: 1.2em;"><i class="material-icons">question_answer mail</i>Mensajes</a>

	    					 	 <div class="collapsible-body"><a href="<?= site_url("/CProfesor/Mensajes/"); ?>" style=	"color:black; margin-left: 5em;">Crear</a></div>
	    					 	 <div class="collapsible-body"><a href="<?= site_url("/CProfesor/Mensajes2/"); ?>" style="color:black; margin-left: 5em;">Editar</a></div>
	    						</li>
						</ul>
					</li>

					<!--<?php #endif ?>-->


				<?php else: #nivel 3 ?> 
					<!--==================================
					=            Si es Alumno            =
					===================================-->
					<li><a href="<?= site_url("/CAlumno/");?>" class="black-text"><i class="material-icons">home</i>Inicio</a></li>

					<li><a href="<?= site_url("/CAlumno/MostrarMaterias/");?>" class="black-text"><i class="material-icons">school</i>Materias</a></li>

					<li><a href="<?= site_url("/CAlumno/VMostrarCalificaciones/"); ?>"><i class="material-icons">gavel</i>Calificaciones</a></li>

					<li><a href="<?= site_url("/CAlumno/MostrarPprofesores/"); ?>"><i class="material-icons">mood_bad</i>Profesores</a></li>
					
					<li><a href="<?= site_url("/CAlumno/VMostrarCalificaciones/"); ?>"><i class="material-icons">history poll</i>Historial Académco</a></li>  
				
				<?php endif; ?>
			<?php else: ?>
				<!--=================================
				=            Sin Session            =
				==================================-->
				<li><a href="<?= site_url("/Welcome/");?>" class="black-text"><i class="material-icons ">home</i>Inicio</a></li>
				
				<li><a href="<?= site_url("/Welcome/Session/");?>" class="black-text"><i class="material-icons ">fingerprint</i>Identificarse</a></li>
				
				<li>	
					<ul class="collapsible" data-collapsible="accordion">
    						<li>
    						  <a class="collapsible-header" style="margin-left: 1.2em;"><i class="material-icons">account_box</i>Registrar</a>

    					 	 <div class="collapsible-body"><a href="<?= site_url("/Welcome/RegisterP/"); ?>" style=	"color:black; margin-left: 5em;">Profesor</a></div>
    					 	 <div class="collapsible-body"><a href="<?= site_url("/Welcome/RegisterA/"); ?>" style="color:black; margin-left: 5em;">Alumno</a></div>
    						</li>
					</ul>
				</li>
				
				

			<?php endif; ?>

			
			<!--====  End of php-if de validacion de session  ====-->
			

		</ul>
	</div>
</nav>