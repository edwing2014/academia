
<div class="layout">
	<!-- Navbar================================================== -->
	<div class="navbar navbar-inverse top-nav">
		<div class="navbar-inner">
			<div class="container">
				<span class="home-link"><a href="index.html" class="icon-home"></a></span><a class="brand" href="./index.html"></a>
				<div class="btn-toolbar pull-right notification-nav">
					<div class="btn-group">
						<div class="dropdown">
							<a class="btn btn-notification"><i class="icon-reply">
							
							</i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<form class="form-signin" id='frmlogin' name='frmlogin' action='<?=base_url();?>auth/login' method='post'>
			<h3 class="form-signin-heading"><img src="<?=base_url();?>plantilla/html/main-theme/images/logoficialupg2.png" width="103" height="50" alt="Falgun"></h3>

            <div id="infoMessage" class="alert alert-error"><?php echo @$message;?></div>



								
			<div class="controls input-icon">
				<i class=" icon-user-md"></i>
				<input type="text" class="input-block-level" placeholder="Usuario" name='identity' id='identity'>
			</div>
			<div class="controls input-icon">
				<i class=" icon-key"></i><input type="password" class="input-block-level" placeholder="Contraseña" name='password' id='password'>
			</div>
			<label class="checkbox">
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Recordarme </label>
			<button class="btn btn-inverse btn-block" type="submit">Ingresar</button>
			<h4>¿Recuerdas tu contraseña?</h4>
			<p>
				<a href="#">Click aquí</a> para resetear tu contraseña.
			</p>
			<h5>¿No tienes una cuenta?</h5>
			<button class="btn btn-success btn-block" type="submit">Crear Cuenta</button>
		</form>
	</div>
</div>
