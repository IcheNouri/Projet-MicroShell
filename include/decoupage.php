<?php

function my_words($line)
{
	preg_match_all("/\S+/", $line, $tab);
	return $tab;
}