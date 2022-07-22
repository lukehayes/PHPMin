<?php

namespace PHPMin\Mock;

/**
 * Mock request class to use with PHP Tests as $_SERVER is not available in that context.
 */
class MockRequest
{
	/**
	 * Simply returns a string "/".
	 *
	 * @return string
	 */
	public function getHomeRoute() : string
	{
		return "/";
	}
}
