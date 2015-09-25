<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zend-eventmanager for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-eventmanager/blob/master/LICENSE.md
 */

namespace ZendTest\EventManager\TestAsset;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;

/**
 * @group      Zend_EventManager
 */
class MockAbstractListenerAggregate extends AbstractListenerAggregate
{
    public $priority;

    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach('foo.bar', [$this, 'doFoo']);
        $this->listeners[] = $events->attach('foo.baz', [$this, 'doFoo']);
    }

    public function getCallbacks()
    {
        return $this->listeners;
    }

    public function doFoo()
    {
    }
}
