<?php

namespace App;

class Sms
{
	private $receptor;

	function __construct($receptor)
	{
		$this->receptor = $receptor;
	}
	public function getReceptor()
	{
		return $this->receptor;
	}
	public function send()
	{
		return !empty($this->receptor);
	}
}
