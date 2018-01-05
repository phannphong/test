<?php

namespace Drupal\business_rules\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides local tasks to Business Rules entities.
 */
class BusinessRulesLocalTask extends DeriverBase implements ContainerDeriverInterface {

  /**
   * {@inheritdoc}
   */
  public function __construct(ContainerInterface $container) {

  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static($container);
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $this->derivatives = [];

    $entity_types = [
      'business_rule',
      'business_rules_action',
      'business_rules_condition',
      'business_rules_variable',
    ];

    foreach ($entity_types as $entity_type) {
      $this->derivatives["entity.$entity_type.collection.list"] = [
        'title'            => t('List'),
        'route_name'       => "entity.$entity_type.collection",
        'parent_id'        => "entity.$entity_type.collection",
        'route_parameters' => ['view_mode' => 'list'],
        'weight'           => 10,
      ];

      $this->derivatives["entity.$entity_type.collection.tags"] = [
        'title'            => t('Tags list'),
        'route_name'       => "entity.$entity_type.collection",
        'parent_id'        => "entity.$entity_type.collection",
        'route_parameters' => ['view_mode' => 'tags'],
        'weight'           => 20,
      ];
    }

    foreach ($this->derivatives as &$entry) {
      $entry += $base_plugin_definition;
    }

    return $this->derivatives;
  }

}
