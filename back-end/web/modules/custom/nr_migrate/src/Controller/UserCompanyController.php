<?php

namespace Drupal\nr_migrate\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * User Company Controller to list users and there associated company.
 */
class UserCompanyController extends ControllerBase implements ContainerInjectionInterface {
  use \Drupal\Core\StringTranslation\StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    /** @var \Drupal\webform_submission_log\Controller\WebformSubmissionLogController $instance */
    $instance = parent::create($container);
    $instance->entityTypeManager = $container->get('entity_type.manager');
    return $instance;
  }

  /**
   * Function to retrive node content.
   */
  public function content() {
    // Fetch users node and their associated companies.
    $query = $this->entityTypeManager->getStorage('node')->getQuery()
      ->condition('type', 'user')
      ->accessCheck(FALSE);
    $users = $query->execute();
    $header = [
      $this->t('User'),
      $this->t('Company'),
    ];
    $rows = [];

    foreach ($users as $user) {
      $user = $this->entityTypeManager->getStorage('node')->load($user);
      if ($user->hasField('field_company') && !$user->get('field_company')->isEmpty()) {
        $company = $user->get('field_company')->entity;
        if ($company) {
          $cName = $company->title->value;
          $cId = $company->id();
        }
      }
      $rows[] = [
        'data' => [
          $this->t('<a href="@url" target="_blank">@title</a>', [
            '@url' => '/node/' . $user->id(),
            '@title' => $user->title->value,
          ]),
          empty($cName) ? '' : $this->t('<a href="@url" target="_blank">@name</a>', [
            '@url' => '/node/' . $cId,
            '@name' => $cName,
          ]),
        ],
      ];

    }

    if (empty($rows)) {
      $rows[] = [
        'data' => [
          ['data' => $this->t('No users found.'), 'colspan' => 2],
        ],
      ];
    }

    $build = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#cache' => [
        'max-age' => 0,
      ],
    ];

    return $build;
  }

}
