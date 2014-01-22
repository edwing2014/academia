<div class="layout">

<?php
include('main-menu.php');
?>
	<div class="leftbar leftbar-close clearfix">
		<div class="admin-info clearfix">
			<div class="admin-thumb">
				<i class="icon-user"></i>
			</div>
			<div class="admin-meta">
				<ul>
					<li class="admin-username">
						Academia
					</li>
					<li>
						<a href="#">Editar Perfil</a>
					</li>
					<li>
						<a href="#">Ver Perfil </a><a href="<?=base_url()?>welcome/cerrarSesion"><i class="icon-lock"></i> Logout</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="left-nav clearfix">
			<div class="left-primary-nav">
				<ul id="myTab">
					<li class="active">
						<a href="#main" class="icon-desktop" data-original-title="Dashboard"></a>
					</li>
					
				</ul>
			
			</div>
			<div class="responsive-leftbar">
				<i class="icon-list"></i>
			</div>
			<?php
			include('left-menu.php');
			?>
		</div>
	</div>
	<div class="main-wrapper">
		<?php
			echo $contenido;
		?>
		
	
</div>