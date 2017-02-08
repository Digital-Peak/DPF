<?php
/**
 * @package    DPF
 * @author     Digital Peak http://www.digital-peak.com
 * @copyright  Copyright (C) 2007 - 2016 Digital Peak. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
namespace DPF\Content\Element\Extension;

use DPF\Content\Element\Basic\Link;

class TwitterShare extends Link
{

	const LANGUAGES = array(
		'ko',
		'fr',
		'ja',
		'it',
		'id',
		'en',
		'nl',
		'pt',
		'ru',
		'es',
		'de',
		'tr'
	);

	public function __construct($id, $url, array $classes = [], array $attributes = [])
	{
		$attributes['data-href'] = $url;

		$classes[] = 'twitter-share-button';
		$this->setProtectedClass('twitter-share-button');

		parent::__construct($id, '//twitter.com/share', '', $classes, $attributes);
	}

	public static function getCorrectLanguage($language)
	{
		$tmpLanguage = $language;
		$tmpLanguage = substr($language, 0, strpos($language, '-'));
		if (! in_array($tmpLanguage, self::LANGUAGES)) {
			$tmpLanguage = 'en';
		}
		return $tmpLanguage;
	}
}
