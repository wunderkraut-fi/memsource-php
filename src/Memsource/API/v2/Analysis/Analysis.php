<?php

namespace Memsource\API\v2\Analysis;

use Memsource\Memsource;
use Memsource\Model\Parameters;
use Symfony\Component\HttpFoundation\JsonResponse;

class Analysis {

  const PATH_BASE = '/web/api/v2/analyse/';
  const PATH_LIST_BY_PROJECT = self::PATH_BASE . 'listByProject';

  /** @var Memsource */
  private $memsource;

  /**
   * @param Memsource $memsource
   */
  public function __construct(Memsource $memsource) {
    $this->memsource = $memsource;
  }

  /**
   * @param string $token
   * @param int $project
   * @return JsonResponse
   */
  public function listByProject($token, $project) {
    $parameters = new Parameters();
    $parameters->token = $token;
    $parameters->project = $project;

    return $this->memsource->post(self::PATH_LIST_BY_PROJECT, $parameters);
  }
}
