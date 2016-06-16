<?php namespace App\Tests\Actions;

use App\Tests\TestCase;
use Facebook\WebDriver\WebDriverBy;
use \Mockery as mockery;
use App\Actions;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ActionsTest
 *
 * Example of tests to run on your actions
 *
 * @package App\Tests\Actions
 * @author Jason Michels <michelsja@icloud.com>
 * @version $Id$
 */
class ActionsTest extends TestCase
{
    /**
     * Test can get homepage using selenium
     */
    public function testCanGetHomepage()
    {
        $this->webDriver->get('http://localhost:9000/');
        $this->assertEquals(
            '{"message":"Welcome To Lift!"}',
            $this->webDriver->findElement(WebDriverBy::cssSelector('body'))->getText()
        );
    }

    /**
     * Test can get a message
     */
    public function testCanGetMessage()
    {
        $request = mockery::mock(Request::class);

        $response = Actions\getMessage($request);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertJsonStringEqualsJsonString('{"message":"Welcome To Lift!"}', $response->getContent());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Test can get user handler
     */
    public function testCanGetUserHandler()
    {
        $request = mockery::mock(Request::class);
        $args = ['id' => 1];

        $response = Actions\getUserHandler($request, $args);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertJsonStringEqualsJsonString('{"userId":"1","name":"Jason Michels"}', $response->getContent());
    }
}