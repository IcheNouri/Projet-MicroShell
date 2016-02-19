<?php
// fonctions.php for fonctions.php in /Users/iche_n/Desktop/microshell/include
// 
// Made by ICHE NOUR EL YAKINE
// Login   <iche_n@etna-alternance.net>
// 
// Started on  Fri Oct 23 19:43:26 2015 ICHE NOUR EL YAKINE
// Last update Sat Oct 24 15:48:45 2015 ICHE nour el yakine
//
function func_env($params)
{
  global $tab;
  global $vals;
  
  $i = 0;
  
  while (isset($tab[$i]))
    {
      if ((is_string($tab[$i])) && (is_string($vals[$i])))
	echo $tab[$i] . "=" . $vals[$i] . "\n";
      $i++;
    }
}

function func_setenv($params)
{
  global $tab;
  global $vals;

  if (isset($params[0][2]) == FALSE)
    {
      echo "setenv: Invalid arguments\n";
      return ;
    }
  if (isset($params[0][3]) == FALSE)
    {
      if (($params[0][1] != NULL) && ($params[0][2] != NULL))
	{
	  $i = 0;
	  while (isset($tab[$i]))
	    {
	      if ($params[0][1] == $tab[$i])
		{
		  $val[$i] = $params[0][2];
		  return ;
		}
	      $i++;
	    }
	  $tab[$i] = $params[0][1];
	  $vals[$i] = $params[0][2];
	}
    }
  else
    echo "setenv: Invalid arguments\n";
}

function func_unsetenv($params)
{
  global $tab;
  global $vals;
  
  $i = 0;
  while (isset($tab[$i]))
    {
      if ($params[0][1] == $tab[$i])
	unset($tab[$i]);
      $i++;
    } 
}

function func_ls($params)
{
  $i = 0;

  if (isset($params[0][1]) == NULL)
    $str = scandir(".");
  else if (isset($params[0][1]) != NULL)
    $str = scandir($params[0][1]);
  while (isset($str[$i]))
    {
      echo $str[$i];
      echo "\n";
      $i++;
    }
}

function func_pwd($params)
{
  echo getcwd();
  echo"\n";
}