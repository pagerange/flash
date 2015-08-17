<?php

require dirname(__DIR__) . '/src/Pagerange/Flash/Flash.php';

use Pagerange\Session\Flash;

class FlashTest extends PHPUnit_Framework_TestCase
{

    private static $flash;

    public function setUp()
    {
      $_SESSION = array();
    }

    public static function setUpBeforeClass()
    {
        if(session_status() !=  PHP_SESSION_ACTIVE) {
            @session_start();
            @ob_start();
        }


       $flash = new Flash();
       $flash->message('The message has been set', ['alert-success']);
    }

    public static function tearDownAfterClass()
    {
        session_destroy();
    }

    public function testFlashMessagelExists()
    {
       $this->assertTrue($flash->check(), 'A flash message should exist at this point');
    }

    public function testGetMessage()
    {
        $this->assertTrue(is_array($flash->getMessage()), 'The flash message should be an array');
    }

    public function testMessageContent()
    {
        $msg = $flash->getMessage();
        $this->assertEquals('The message has been set', $msg['message'], 'Message text should be correct');
    }

    public function testClassesContent()
    {
        $msg = static::$flash->getMessage();
        $this->assertEquals('alert-success', $msg['classes'][0], 'Classes text should be correct');
    }

    public function testFlashMessageRemovedAfterDisplay()
    {
        $flash->flash();
        $this->assertFalse(static::$flash->check(), 'No flash message should exist after being displayed once.');
    }


}
