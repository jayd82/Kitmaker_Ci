<!-- Begin Container -->
  <div id="container" class="opacity">
    <div class="full-width">
      <div class="one-third">
		<h2>Volver al acceso</h2>
        <p>Clic <a href='<?php echo base_url()."main/acceso"; ?>'>aqui</a></p>
        <br />
        <br />
	  </div>
      <div class="two-third last">
        <h1>Registro de usuarios</h1>
		<?php
		echo form_open('main/signup_validation');
		echo validation_errors();
		
		echo "<p>Email: ";
		echo form_input('email', $this->input->post('email'));
		echo "</p>";
		
		echo "<p>Contrase&ntilde;a: ";
		echo form_password('password');
		echo "</p>";
		
		echo "<p>Repite la Contrase&ntilde;a: ";
		echo form_password('cpassword');
		echo "</p>";
		
		echo "<p>";
		echo form_submit('login_submit', 'Registrarse');
		echo "</p>";
		
		echo form_close();
		?>
      </div>
      <div class="clear"></div>
    </div>
    <!-- End Full Width -->
    
    <div class="clear"></div>
    <div id="footer">
      <div class="footer-top"></div>
      <!-- Divider -->
      
      <div class="clear"></div>
    </div>
  </div>
  <!-- End Container -->