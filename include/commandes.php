<?php
// commandes.php for commande.php in /Users/iche_n/Desktop/microshell/include
// 
// Made by ICHE NOUR EL YAKINE
// Login   <iche_n@etna-alternance.net>
// 
// Started on  Fri Oct 23 10:27:39 2015 ICHE NOUR EL YAKINE
// Last update Sat Oct 24 10:59:34 2015 ICHE nour el yakine
//
function func_echo($params)
{
  $i = 0;
  $j = 1;
  
  while (isset($params[$i][$j]))
    {
      $c = 0;
      while (isset($params[$i][$j][$c]))
	{
	  if (($params[$i][$j][$c] == '"') || ($params[$i][$j][$c] == "'"))
	    $params[$i][$j][$c] = NULL;
	  $c++;
	}
      echo $params[$i][$j];
      echo " ";
      $j++;
    }
  echo "\n";
}

function func_cat($params)
{
  if (($params[0][0] == "cat") && ($params[0][1] == NULL))
    echo "cat: Invalid arguments\n";
  $i = 1;
  while (isset($params[0][$i]))
    {
      if (is_dir($params[0][$i]))
        echo "cat: {$params[0][$i]}: Is a directory\n";
      if (!(file_exists($params[0][$i])))
        echo "cat: {$params[0][$i]}: No such file\n";
      else if (file_exists($params[0][$i]))
	{
	  if (is_readable($params[0][$i]))
	    {
	      $var = file_get_contents($params[0][$i]);
	      echo $var;
	    }
	  else
	    echo "Permission denied\n";
	}
      else
        echo "cat: {$params[0][$i]}: Cannot open file\n";
      $i++;
    }
}