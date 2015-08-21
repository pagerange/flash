<?php

require '../src/Pagerange/Flash/Flash.php';
require '../src/Pagerange/Flash/Views/Message.php';

use Pagerange\Flash\Flash;
use Pagerange\Flash\Views\Message;

$flash = new Flash;

$flash->message('This message is a success', array('alert-success'));

echo $flash->flash();
