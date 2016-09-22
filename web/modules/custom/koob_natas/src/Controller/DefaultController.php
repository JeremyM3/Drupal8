<?php

namespace Drupal\koob_natas\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\koob_natas\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Listing.
   *
   * @return string
   *   Return Hello string.
   */
  public function listing() {

    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'book', '=');
    $query->condition('status', 1);
    $query->range(0, 10);
    $query->sort('created', 'ASC');
    $patate = $query->execute();

    $nodes = \Drupal\node\Entity\Node::loadMultiple($patate);

    //kint($nodes);die();

    foreach($nodes as $node) {
      $books[] = node_view($node, 'teaser');
    }

    return [
      '#theme' => 'book_list',
      'books' => $books,
    ];
  }

}
