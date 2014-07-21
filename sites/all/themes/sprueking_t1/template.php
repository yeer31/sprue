<?php

/**
 * @file template.php
 */

function sprueking_t1_theme() {
  return array(
    'sk_product_node_form' => array(
      'arguments' => array(
          'form' => NULL,
      ),
      'template' => 'templates/sk_product-node-form', // set the path here if not in root theme directory
      'render element' => 'form',
    ),
  );
}