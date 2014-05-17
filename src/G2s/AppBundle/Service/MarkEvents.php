<?php

namespace G2s\AppBundle\Service;

final class MarkEvent
{
	/**
	 * Fired whenever a mark is added to a specific appInfo
	 * Receieve a G2s\AppBundle\Service\MarkAddedEvent to pass the added mark id.
	 */
	const MARK_ADDED = 'mark.added';
}

