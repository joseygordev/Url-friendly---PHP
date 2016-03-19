<?php  
	define("PASTAPROJETO", strtolower("pastaprojeto/"));
	$url = strtolower($_SERVER['REQUEST_URI']);
	$url = substr($url, 1);
	$url = str_replace(PASTAPROJETO, "", $url);
	$url = explode('/', $url);

	$pag = $url[0];

	$permissao = array(
		'home' => array(
			'linkPag' 	=> 'home',
			'breadcrumb' => 'Home',
			'indice'	=> 'Qualquer outro valor que minha aplicação precisar',
		),
		'exemplo' => array(
			'linkPag' 	=> 'exemplo',
			'breadcrumb' => 'Exemplo',
		),
	);

	if (isset($permissao[$pag])) {
		$dadosPagina = $permissao[$pag];
	}

	if ( array_key_exists($pag, $permissao) ) {	
		if ($pag == "" || $pag == "home") {
			include "home.php";
		}else{
			if (file_exists($pag.".php")) {
				include $pag.".php";
			}else{
				include "erro.php";
			}
		}
	}else{
		include "erro.php";
	}