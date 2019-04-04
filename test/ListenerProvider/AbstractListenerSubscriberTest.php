<?php

/**
 * @see       https://github.com/laminas/laminas-eventmanager for the canonical source repository
 * @copyright https://github.com/laminas/laminas-eventmanager/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-eventmanager/blob/master/LICENSE.md New BSD License
 */

namespace LaminasTest\EventManager\ListenerProvider;

use Closure;
use Laminas\EventManager\ListenerProvider\AbstractListenerSubscriber;
use Laminas\EventManager\ListenerProvider\PrioritizedListenerAttachmentInterface;

class AbstractListenerSubscriberTest extends ListenerSubscriberTraitTest
{
    /**
     * {@inheritDoc}
     */
    public function createProvider(callable $attachmentCallback)
    {
        return new class($attachmentCallback) extends AbstractListenerSubscriber {
            /** @var Closure */
            private $attachmentCallback;

            public function __construct(callable $attachmentCallback)
            {
                $this->attachmentCallback = $attachmentCallback;
            }

            public function attach(PrioritizedListenerAttachmentInterface $provider, int $priority = 1): void
            {
                $attachmentCallback = $this->attachmentCallback->bindTo($this, $this);
                $attachmentCallback($provider, $priority);
            }
        };
    }
}
