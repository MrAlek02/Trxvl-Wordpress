<?php

class WebSite extends Schema
{
	public function __construct($attributes)
	{
		parent::__construct($attributes, [
			'url' => Schema::currentUrl(),
		]);
	}
}
