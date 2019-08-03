<?php
declare(strict_types=1);

namespace Interop\Collection;

use InvalidArgumentException;

/**
 * Contract for working with the 'stack' abstract data type (ADT).
 * 
 * A 'stack' is a last-in-first-out (LIFO) data structure. The last
 * element added is the first element removed.
 * 
 * @link https://en.wikipedia.org/wiki/Stack_(abstract_data_type)
 * @author Nathan Bishop <nbish11@hotmail.com>
 * @copyright 2019 Nathan Bishop
 * @license The MIT license.
 */
interface Stack
{
	/**
	 * Add an element to the collection.
	 * 
	 * @param object $element The item to add.
	 * @throws InvalidArgumentException If $element is a different type to what is already in the stack.
	 */
	public function push(object $element): void;
	
	/**
	 * Remove an element from the collection.
	 * 
	 * @return object The most recently added element.
	 */
	public function pop(): object;
}
