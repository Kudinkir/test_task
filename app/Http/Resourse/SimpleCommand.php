<?php

 namespace App\Http\Resourse;

 
 class SimpleCommand implements CommandPatternInterface
{
	private $payload;

	public function __construct($payload)
	{
		$this->payload = $payload;
	}

	public function execute()
	{
		print("SimpleCommand: See, I can do simple things like printing (".$this->payload.")\n");
	}
}
