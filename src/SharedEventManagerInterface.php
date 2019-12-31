<?php

/**
 * @see       https://github.com/laminas/laminas-eventmanager for the canonical source repository
 * @copyright https://github.com/laminas/laminas-eventmanager/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-eventmanager/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\EventManager;

use Laminas\Stdlib\CallbackHandler;
use Laminas\Stdlib\PriorityQueue;

/**
 * Interface for shared event listener collections
 */
interface SharedEventManagerInterface
{
    /**
     * Retrieve all listeners for a given identifier and event
     *
     * @param  string|int $id
     * @param  string|int $event
     * @return false|PriorityQueue
     */
    public function getListeners($id, $event);

    /**
     * Attach a listener to an event
     *
     * @param  string|array $id Identifier(s) for event emitting component(s)
     * @param  string $event
     * @param  callable $callback PHP Callback
     * @param  int $priority Priority at which listener should execute
     * @return void
     */
    public function attach($id, $event, $callback, $priority = 1);

    /**
     * Detach a listener from an event offered by a given resource
     *
     * @param  string|int $id
     * @param  CallbackHandler $listener
     * @return bool Returns true if event and listener found, and unsubscribed; returns false if either event or listener not found
     */
    public function detach($id, CallbackHandler $listener);

    /**
     * Retrieve all registered events for a given resource
     *
     * @param  string|int $id
     * @return array
     */
    public function getEvents($id);

    /**
     * Clear all listeners for a given identifier, optionally for a specific event
     *
     * @param  string|int $id
     * @param  null|string $event
     * @return bool
     */
    public function clearListeners($id, $event = null);
}
