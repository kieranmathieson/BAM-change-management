<?php

namespace Drupal\sheep\Controller;

use Drupal\Core\Controller\ControllerBase;

class SheepController extends ControllerBase {
    public function noSheepCount() {
        return array(
            '#theme' => 'sheepnocount',
            '#test_var' => $this->t('Test Value'),
        );
    }
    public function sheepCount($count) {
        return array(
            '#type' => 'markup',
            '#markup' => $this->t('Sheep count: ' . $count),
        );
    }
    public function evilSheep() {
        return [
            '#type' => 'markup',
            '#markup' => $this->t('Sheep count: ' . $count),
//            '#theme' => 'evilsheep',
//            '#how_evil' => $this->t('Very!'),
        ];
    }
}
