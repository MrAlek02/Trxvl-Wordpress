<?php

class LocalBusiness extends Schema
{
	public function __construct($attributes)
	{
		parent::__construct($attributes, [
			'@id' => Schema::currentUrl().'#local-business',
			'url' => Schema::currentUrl(),
		]);
	}
}
