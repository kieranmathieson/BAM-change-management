<?php

/**
 * @file
 * Contains \Drupal\blindd8\Controller\Blindd8Controller.
 */

namespace Drupal\blindd8\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines a controller to experiment with.
 */
class Blindd8Controller extends ControllerBase
{

  /**
   * Provides a page that we can experiment with.
   *
   * @return array
   *   A render array as expected by drupal_render().
   */
  public function content()
  {
    // Get our username
    $account = \Drupal::currentUser(); // Another way of using \Drupal::service('current_user');
    $name = $account->getAccountName();

    // Generate a UUID
    $uuid_generator = \Drupal::service('uuid');
    $uuid = $uuid_generator->generate();

    try {
      $blindd8Service = \Drupal::service('blindd8.blindd8ingservice');
    }
    catch (\Exception $ex) {
      return 'Poop';
    }

    // Send it forth!
    $output = array(
      '#markup' => $this->t('Hey, @name, here\'s a unique ID for you: @uuid', array('@name' => $name, '@uuid' => $uuid))
    . $blindd8Service->getTagline(),
    );
    return $output;
  }
}