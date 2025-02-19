<?php

class Organization extends Schema
{
	public function __construct($attributes)
	{
		parent::__construct($attributes, [
			'@id' => Schema::currentUrl().'#organization',
			'url' => Schema::currentUrl(),
		]);
	}
}
