<?php
	$html ="<h1>risultati ricerca</h1>";
        $html ="<h2>Modelli 3D</h2>";
	$html.='<div><a href="3dv.php?model=models/trono_corsini.nxz&unitmeas=cm">trono</a></div>';
	$html.='<div><a href="3dv.php?model=models/busto_bernini.nxz&unitmeas=dm">busto</a></div>';
	$html.='<div><a href="3dv.php?unitmeas=m&model=models/Porta_Latina_e.nxz&submodel_1=models/Porta_Latina_i_sx.nxz&submodel_2=models/Porta_Latina_interno.nxz">mura</a></div>';

echo $html;

?>

