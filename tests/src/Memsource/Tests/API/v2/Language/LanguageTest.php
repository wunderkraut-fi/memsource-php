<?php

namespace Memsource\Tests;

use Memsource\API\v2\Language\Language;
use Symfony\Component\HttpFoundation\Response;

class LanguageTest extends MemsourceTestCase {

  /** @var Language */
  private $language;

  public function setUp() {
    parent::setUp();
    $this->language = new Language($this->memsource);
  }

  /**
   * @test
   */
  public function listSupportedLanguagesShouldReturn401UnauthorizedResponseOnInvalidToken() {
    $response = $this->language->listSupportedLanguages();

    $this->assertJsonResponse(Response::HTTP_UNAUTHORIZED, $response);
  }
}
