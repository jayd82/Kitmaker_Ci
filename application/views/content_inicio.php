 <!-- Begin Container -->
  <div id="container" class="opacity">
    <div class="full-width">
      <div class="one-third">
        <h4>Bienvenido/a</h4>
      	<?php 
      	$this->load->library('user_agent');
		
		if ($this->agent->is_browser())
		{
		    $agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
		    $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile())
		{
		    $agent = $this->agent->mobile();
		}
		else
		{
		    $agent = 'Unidentified User Agent';
		}
		?>
		<p>Estas usando <br /><br /><b><?php echo $agent; ?></b><br /><br />para navegar por esta Web, a traves del sistema operativo <br /><br /><b><?php echo $this->agent->platform(); ?>.</b><br /><br />Esperamos disfrutes del blog.</p>
		<br />
		<br />
			
	  </div>
      <div class="two-third last">