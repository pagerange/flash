<?php

session_start();
ob_start();

require dirname(__DIR__) . '/src/Pagerange/Flash/Flash.php';

use Pagerange\Flash\Flash;

class FlashTest extends PHPUnit_Framework_TestCase
{

    private static $flash;

    public function setUp()
    {
       $_SESSION = array();
       static::$flash = new Flash();
       static::$flash->message('The message has been set', ['alert-success']);
    }

    public function testFlashMessageExists()
    {
       $this->assertTrue(static::$flash->check(), 'A flash message should exist at this point');
    }

    public function testGetMessage()
    {
        $this->assertTrue(is_array(static::$flash->getMessage()), 'The flash message should be an array');
    }

    public function testMessageContent()
    {
        $msg = static::$flash->getMessage();
        $this->assertEquals('The message has been set', $msg['message'], 'Message text should be correct');
    }

    public function testClassesContent()
    {
        $msg = static::$flash->getMessage();
        $this->assertEquals('alert-success', $msg['classes'][0], 'Classes text should be correct');
    }

    public function testFlashMessageRemovedAfterDisplay()
    {
        static::$flash->flash();
        $this->assertFalse(static::$flash->check(), 'No flash message should exist after being displayed once.');
    }


}
