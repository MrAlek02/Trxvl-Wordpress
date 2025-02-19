<?php

class ItemList extends Schema
{
	public function __construct($attributes = [])
	{
		parent::__construct($attributes, [
			'itemListElement' => [],
		]);
	}

	public function addItem($item)
	{
		$this->data['itemListElement'][] = $item;
	}
}
