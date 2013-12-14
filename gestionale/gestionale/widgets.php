<?php

	// includo tutti i widgets nella cartella '/widgets'
	$widgets = dirname(__FILE__).'/widgets';

	foreach (scandir($widgets) as $filename):
	    $path = $widgets .'/'. $filename;
	    if ( substr($filename, 0, 1) != '_' && substr($filename, 0, 1) != '.' && is_file($path) ):
	        require($path);
	    endif;
	endforeach;