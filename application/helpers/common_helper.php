<?php
function public_url($url = ''){
	return base_url('public/' .$url);
}

function print_data($list, $exit = true)
{
	echo "<pre>";
	print_r($list);
	if($exit)
	{
		die();
	}
}