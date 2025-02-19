<?php

class Schema implements JsonSerializable
{
	protected $data = [];

	protected $pretty_print = true;

	protected $unescaped_unicode = true;

	protected $unescaped_slashes = true;

	protected $sequences = [
		'@context',
		'@type',
		'@id',
		'url',
		'name',
		'headline',
		'description',
	];

	public function __construct($attributes, $data = [])
	{
		$this->data['@type'] = static::class;

		$this->data = array_merge(
			$this->data, $data, $attributes
		);
	}

	public function getFlags()
	{
		$flags = 0;

		if ($this->unescaped_unicode) {
			$flags |= JSON_UNESCAPED_UNICODE;
		}

		if ($this->pretty_print) {
			$flags |= JSON_PRETTY_PRINT;
		}

		if ($this->unescaped_slashes) {
			$flags |= JSON_UNESCAPED_SLASHES;
		}

		return $flags;
	}

	public function __toString()
	{
		$data = $this->data;
		$data['@context'] = 'https://schema.org';

		uksort($data, function ($a, $b) {
			return $this->sequenceOf($a) - $this->sequenceOf($b);
		});

		return '<script type="application/ld+json">'
			. json_encode($data, $this->getFlags())
			. '</script>';
	}

	public static function currentUrl()
	{
		return 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

	public static function currentLanguage()
	{
		$codes = [
			'lat' => 'sr-RS',
			'sr' => 'sr-Cyrl',
			'en' => 'en-US',
		];

		if (defined('ICL_LANGUAGE_CODE') && isset($codes[ICL_LANGUAGE_CODE])) {
			return $codes[ICL_LANGUAGE_CODE];
		}

		return 'sr-RS';
	}

	public function jsonSerialize()
	{
		uksort($this->data, function ($a, $b) {
			return $this->sequenceOf($a) - $this->sequenceOf($b);
		});

		return $this->data;
	}

	protected function sequenceOf($attribute)
	{
		$sequence = array_search($attribute, $this->sequences, true);

		if ($sequence !== false) {
			return $sequence;
		}

		return count($this->sequences);
	}
}
