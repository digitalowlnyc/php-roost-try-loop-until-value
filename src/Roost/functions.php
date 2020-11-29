<?php
/**
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2020 Blue Nest Digital LLC
 */

/**
 * @param callable $callback
 * @param $maxTries
 * @param int $startFrom
 * @return mixed
 */
function tryLoopUntilValue(callable $callback, $maxTries, $startFrom = 0) {
	$i = 0;

	while($i < $maxTries) {
		$index = $startFrom + $i;

		$result = $callback($index);

		if($result !== false) {
			return $result;
		}

		$i += 1;
	}

	throw new RuntimeException(sprintf("Function did not succeed after %s tries", $i));
}