<?php
/**
 * @file
 * Contains Drupal\foo_bar\ParamConverter\FooBarParamConverter
 */

namespace Drupal\foo_bar\ParamConverter;

use Drupal\Core\ParamConverter\ParamConverterInterface;
use Drupal\Core\ParamConverter\EntityConverter;
use Drupal\Core\Entity\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;

class FooBarParamConverter extends EntityConverter implements ParamConverterInterface
{

  public function __construct(EntityManagerInterface $entity_manager)
  {
    parent::__construct($entity_manager);
  }

  /**
   * {@inheritdoc}
   */
  public function convert($value, $definition, $name, array $defaults, Request $request)
  {
    if (!$entity = parent::convert($value, $definition, $name, $defaults, $request)) {
      return;
    }
    
    return $entity;
  }

  /**
   * {@inheritdoc}
   */
  public function applies($definition, $name, Route $route)
  {
    if (parent::applies($definition, $name, $route)) {
      return $definition['type'] === 'entity:foo_bar';
    }
    return FALSE;
  }
}