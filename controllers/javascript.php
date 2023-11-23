<?php

class Javascript_Controller
{
	public $baseName = 'javascript';  
	public function main(array $vars) 
	{
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName."_main");
	}
}

?>