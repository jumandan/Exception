<?php
namespace tests;

require_once __DIR__.'/../vendor/autoload.php';

use JumandanException\Exception;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testGenericException()
    {
        $e = new \Exception('Test exception');
        $this->assertInternalType('string', Exception::asString($e));
    }

    public function testJumandanException()
    {
        $e = new Exception('test', ['field' => 'value']);
        $this->assertInternalType('string', Exception::asString($e));
        $this->assertInternalType('string', (string)$e);
        $this->assertEquals(
            Exception::asString($e),
            (string)$e
        );
    }
}
