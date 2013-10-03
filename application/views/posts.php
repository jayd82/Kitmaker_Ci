<?php 

foreach ($results as $row)
{
	echo '<h2>' . $row->titulo . ' - ' . $row->email . '</h2>';
	echo $row->cuerpo;
	echo "<br />";
	echo "<br />";
}

?>
