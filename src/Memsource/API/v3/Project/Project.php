<?php

namespace Memsource\API\v3\Project;

use Memsource\Memsource;
use Memsource\Model\Parameters;
use Symfony\Component\HttpFoundation\JsonResponse;

class Project {

  const PATH_BASE = '/web/api/v3/project/';
  const PATH_GET = self::PATH_BASE . 'get';
  const PATH_LIST = self::PATH_BASE . 'list';

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
  public function getProject($token, $project) {
    $parameters = new Parameters();
    $parameters->project = $project;
    $parameters->token = $token;

    return $this->memsource->post(self::PATH_GET, $parameters);
  }

  /**
   * @param string $token
   * @return JsonResponse
   */
  public function listProjects($token) {
    $parameters = new Parameters();
    $parameters->token = $token;

    return $this->memsource->post(self::PATH_LIST, $parameters);
  }
}
