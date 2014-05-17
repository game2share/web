<?php

namespace G2s\AppBundle\Service;

use Symfony\Component\EventDispatcher\Event;

class MarkAddedEvent extends Event
{
	public $markId;

	public __construct($markId)
	{
		$this->$markid	= $markId;
	}
}

