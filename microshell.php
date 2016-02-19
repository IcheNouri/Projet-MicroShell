<?php

require_once('include/affichage.php');
require_once('include/decoupage.php');
require_once('include/commandes.php');
require_once('include/fonctions.php');

$tab = array_keys($_SERVER);
$vals = array_values($_SERVER);
$fd = fopen('php://stdin', 'r');
if ($fd != false)
  {
    aff_prompt();
    while (($line = fgets($fd)) != false)
      {
	$params = my_words($line);
	if (isset($params[0][0]))
	  {
	    $ptr = 'func_' . $params[0][0];
	    if(function_exists($ptr))
	      {
		$ptr($params);
	      }
	    if (isset($params[0][0])) 
	      if ($params[0][0] == "exit")
		return ;
	    else if (!(function_exists($ptr)))
	      {
		$line = substr($line, 0, -1);	
		echo "{$line}: Command not found\n";
	      }
	  }
	aff_prompt();	
      }
    fclose($fd);
  }