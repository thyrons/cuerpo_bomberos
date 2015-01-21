<?php    
    require_once("../dompdf/dompdf_config.inc.php");         
    $html = '<html>
    <div style="margin-top:500px;margin-left:100px;">     
        
    </div>        
    <div style="margin-top:550px;margin-left:100px;">     
        Recolección de datos, y capacitación del personal de pasantías para el uso adecuado del sistema
    </div>        
    <body>
    </body>
    </html>';	
	$dompdf = new DOMPDF();
	$html=utf8_decode($html);
	$dompdf->load_html($html);
	$dompdf->set_paper("A4","portrait");
	$dompdf->render();
	//$dompdf->stream("informeGeneral.pdf");
	$dompdf->stream('reporte_cxc.pdf',array('Attachment'=>0));
?>