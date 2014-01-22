	<!-- Navbar
	================================================== -->
	<div class="navbar navbar-inverse top-nav ">
		<div class="navbar-inner">
			<div class="container">
				<span class="home-link"><a href="<?=base_url();?>" class="icon-home"></a></span>
				<div class="nav-collapse">
					<ul class="nav">
						<li class="dropdown hidden-phone">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th-large "></i> Personal <b class="icon-angle-down"></b></a>
							<div class="dropdown-menu">
								<ul>
									<li>
										<a href="<?=base_url()?>welcome/estudiantes"><i class="icon-list-alt hidden-phone"></i> Estudiantes </a>
									</li>
									<li>
										<a href="<?=base_url()?>welcome/profesores"><i class="icon-list-alt hidden-phone"></i> Profesores </a>
									</li>
									<li>
										<a href="<?=base_url()?>welcome/directivos"><i class="icon-list-alt hidden-phone"></i> Directivos</a>
									</li>
								
								</ul>
							</div>
						</li>
					<li class="dropdown hidden-phone">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file-alt"></i> Gestion Educativa <b class="icon-angle-down"></b></a>
							<div class="dropdown-menu">
								<ul>
									<li>
									<a href="<?=base_url()?>g_estudiantes/calificaciones/"><i class="icon-file"></i>Calificaciones</a></li>
								  <li> 
										<a href="<?=base_url()?>welcome/mision"><i class="icon-file"></i>Periodos</a>
									</li>
									<li>
										<a href="<?=base_url()?>welcome/vision"><i class="icon-file"></i>Control Medico</a>
									</li>
									<li>
									<a href="<?=base_url()?>welcome/simbolos"><i class="icon-file"></i>Niveles</a></li>
								</ul>
							</div>
					  </li>
                      <li class="dropdown hidden-phone">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file-alt"></i> Gestion Administrativa <b class="icon-angle-down"></b></a>
							<div class="dropdown-menu">
								<ul>
                                    <li>
                                        <a href="<?=base_url()?>g_administrativa/inscripcion/"><i class="icon-file"></i>Inscripciones</a></li>
									<li>
									<a href="<?=base_url()?>welcome/matricula/"><i class="icon-file"></i>Matriculas</a></li>
								
								</ul>
							</div>
					  </li>	
						
						<li class="dropdown hidden-phone">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file-alt"></i> Institucion <b class="icon-angle-down"></b></a>
							<div class="dropdown-menu">
								<ul>
									
								   <li>
										<a href="<?=base_url()?>g_institucion/sedes"><i class="icon-file"></i>Sedes</a>
									</li>
                                 
                                  <li>
										<a href="<?=base_url()?>g_institucion/facultades"><i class="icon-file"></i>Facultades</a>
									</li>
									<li>
										<a href="<?=base_url()?>g_institucion/carreras"><i class="icon-file"></i>Carreras</a>
									</li>
									<li>
										<a href="<?=base_url()?>g_institucion/cursos"><i class="icon-file"></i>Cursos</a>
									</li>
									<li>
									<a href="<?=base_url()?>g_institucion/asignaturas"><i class="icon-file"></i>Asignaturas</a></li>
									<li><a href="<?=base_url()?>g_institucion/secciones" ><i class="icon-file"></i>Secciones</a></li>
                                    <li class="dropdown hidden-phone">
						<a href="<?=base_url()?>welcome/grupos" ><i class="icon-beaker"></i> Grupos Escolares</a>						</li>
                        <li class="dropdown hidden-phone">
							<a href="<?=base_url()?>welcome/aulas" ><i class="icon-beaker"></i> Aulas</a>
						
						</li>
								</ul>
							</div>
						</li>
						<!--<li class="dropdown hidden-phone">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-bar-chart"></i> Temas <b class="icon-angle-down"></b></a>
							<div class="dropdown-menu">
								<ul>
									<li>
										<a href="<?=base_url();?>welcome/tema/1"><i class="icon-bar-chart"></i> Tema 1</a>
									</li>
									<li>
										<a href="<?=base_url();?>welcome/tema/2"><i class="icon-google-plus-sign"></i> Tema 2</a>
									</li>
									<li>
										<a href="<?=base_url();?>welcome/tema/3"><i class="icon-google-plus-sign"></i> Tema 3</a>
									</li>
									<li>
										<a href="<?=base_url();?>welcome/tema/4"><i class="icon-google-plus-sign"></i> Tema 4</a>
									</li>
									<li>
										<a href="<?=base_url();?>welcome/tema/4"><i class="icon-google-plus-sign"></i> Tema 5</a>
									</li>
								</ul>
							</div>
						</li>-->
						<li class="dropdown hidden-phone">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-bar-chart"></i> Configuración <b class="icon-angle-down"></b></a>
							<div class="dropdown-menu">
								<ul>
									<li>
									<a href="flot-chart.html"><i class="icon-bar-chart"></i>Usuarios</a></li>
                                    
                                    <li>
									<a href="flot-chart.html"><i class="icon-bar-chart"></i>Seguridad</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
				<div class="btn-toolbar pull-right notification-nav hidden-phone">
					<div class="btn-group">
						<div class="dropdown">
							<a class="btn btn-notification dropdown-toggle" data-toggle="dropdown"><i class="icon-globe"><span class="notify-tip">30</span></i></a>
							<div class="dropdown-menu pull-right ">
								<span class="notify-h"> You have 20 notifications</span><a class="msg-container clearfix"><span class="notification-thumb"><img src="<?php echo base_url()?>plantilla/html/main-theme/images/notify-thumb.png" width="50" height="50" alt="user-thumb"></span><span class="notification-intro"> In hac habitasse platea dictumst. Aliquam posuere quam in nul<span class="notify-time"> 3 Hours Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><i class="icon-file"></i></span><span class="notification-intro"><strong>Files </strong>In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 8 Hours Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><img src="<?php echo base_url()?>plantilla/html/main-theme/images/user-thumb.png" width="50" height="50" alt="user-thumb"></span><span class="notification-intro"> In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 3 Days Ago </span></span></a><a class="msg-container clearfix"><span class="notification-thumb"><i class=" icon-envelope-alt"></i></span><span class="notification-intro"><strong>Message</strong> In hac habitasse platea dictumst. Aliquam posuere<span class="notify-time"> 2 Weeks Ago </span></span></a>
								<button class="btn btn-primary btn-large btn-block">
									View All
								</button>
							</div>
						</div>
					</div>
					<div class="btn-group">
						<div class="dropdown">
							<a class="btn btn-notification"><i class="icon-lock"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>