<?php

/**
 * @file
 * Contains \Drupal\blindd8\BlindD8Subscriber.
 */

namespace Drupal\blindd8;

use Symfony\Cmf\Component\Routing\RouteObjectInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Cmf\Component\Routing;

/**
 * Subscribes to the kernel request event to completely obliterate the default content.
 *
 * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
 *   The event to process.
 */
class BlindD8Subscriber implements EventSubscriberInterface {

  /**
   * Overrides the content and serves a 404 status code.
   *
   * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
   *   The response event, which we will take over like like a boss.
   */
  public function onResponse(FilterResponseEvent $event) {
    $route_name = \Drupal::request()->get(RouteObjectInterface::ROUTE_NAME);
    if ($route_name == 'blindd8.page') {
      $response = $event->getResponse();
      $response->setContent('Blind date, get it?!');
      $response->setStatusCode('404');
    }
  }

  /**
   * Registers the methods in this class that should be listeners.
   *
   * @return array
   *   An array of event listener definitions.
   */
  static function getSubscribedEvents(){
    $events[KernelEvents::RESPONSE][] = array('onResponse', 100);
    return $events;
  }

}