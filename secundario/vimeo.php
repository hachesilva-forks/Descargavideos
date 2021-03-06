<?php

class Vimeo extends cadena{

function calcula(){
dbug('Vimeo Iniciado');
$obtenido=array('enlaces' => array());

$id = false;
if (preg_match('@[0-9]+@', $this->web, $matches)) {
	dbug_r($matches);
	$id = $matches[0];
}


$ret = CargaWebCurl('http://player.vimeo.com/video/'.$id);

if (preg_match('@{"[^"]+?":[^;]+@', $ret, $matches)) {
	dbug_r($matches);
	
	$ret = $matches[0];
	$json_respuesta = json_decode($ret, true);
	dbug_r($json_respuesta);
}


$opciones = $json_respuesta['request']['files']['progressive'];
dbug_r($opciones);


if(count($opciones) == 3 && isset($opciones['mobile']) && isset($opciones['hd']) && isset($opciones['sd'])){
	$obtenido['enlaces'][] = array(
		'url'	 => $opciones['hd']['url'],
		'url_txt'=> "Calidad: Alta",
		'tipo'	 => 'http'
	);
	$obtenido['enlaces'][] = array(
		'url'	 => $opciones['sd']['url'],
		'url_txt'=> "Calidad: Media",
		'tipo'	 => 'http'
	);
	$obtenido['enlaces'][] = array(
		'url'	 => $opciones['mobile']['url'],
		'url_txt'=> "Calidad: Baja",
		'tipo'	 => 'http'
	);
}
else{
	foreach($opciones as $index=>$elem){
		$obtenido['enlaces'][] = array(
			'url'	 => $elem['url'],
			'url_txt'=> "Calidad: ".$elem['quality'],
			'tipo'	 => 'http'
		);
	}
}


$titulo=$json_respuesta['video']['title'];
$titulo=limpiaTitulo($titulo);

$obtenido['titulo']=$titulo;
$obtenido['imagen']=current($json_respuesta['video']['thumbs']);

finalCadena($obtenido);

return $obtenido;

}

}
