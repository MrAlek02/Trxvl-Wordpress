<?php

class CollectionPage extends Schema
{
	public function __construct($attributes)
	{
		parent::__construct($attributes, [
			'@id' => Schema::currentUrl().'#CollectionPage',
			'url' => Schema::currentUrl(),
			'mainEntity' => new ItemList,
		]);
	}

	public function addItem($item)
	{
		$this->data['mainEntity']->addItem($item);
	}
}
