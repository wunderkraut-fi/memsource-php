<?php

namespace Memsource\Tests;

use Memsource\Memsource;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class MemsourceTestCase extends TestCase {

  const INCORRECT_TOKEN = 'incorrect-token';
  const MEMSOURCE_TEST_BASE_URL = 'http://www.example.com/';

  /** @var Memsource */
  protected $memsource;

  public function setUp() {
    $response = new JsonResponse(
      '{"errorCode":"AuthUnauthorized","errorDescription":"Unauthorized access."}',
      Response::HTTP_UNAUTHORIZED,
      [],
      TRUE
    );

    $this->memsource = $this->prophesize(Memsource::class);
    $this->memsource->post(Argument::any(), Argument::any(), Argument::any())->willReturn($response);
    $this->memsource = $this->memsource->reveal();
  }

  /**
   * @param int $expectedStatusCode
   * @param JsonResponse $jsonResponse
   */
  public function assertJsonResponse($expectedStatusCode, $jsonResponse) {
    $this->assertInstanceOf(JsonResponse::class, $jsonResponse);
    $this->assertEquals($expectedStatusCode, $jsonResponse->getStatusCode());
  }
}