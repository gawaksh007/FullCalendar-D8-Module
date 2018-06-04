<?php

namespace Drupal\jscal\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'CalendarBlock' block.
 *
 * @Block(
 *  id = "calendar_block",
 *  admin_label = @Translation("Calendar block"),
 * )
 */

/**
 * Implements hook_page_attachments().
 */

class CalendarBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // $build = [];
    // $build['calendar_block']['#markup'] = 'Implement CalendarBlock.';
  	$form['element']['#markup'] = '<div id="calendar"></div>';
    $form['#attached']['library'][] = 'jscal/js-bodyform';
    return $form;
    // return $build;
    //return \Drupal::formBuilder()->getForm('Drupal\jscal\Form\CalendarForm');
  }

}
