<?php

/**
 *
 * Simple Flash messaging class
 * @author Steve George <steve@glort.com>
 * @version 1.0
 * @license MIT
 * @updated 2015-08-05
 */

namespace Pagerange\Flash;

class Flash
{

    public function message($message, $classes = [])
    {
        $flash = [
            'message' => $message,
            'classes' => $classes
        ];
        $_SESSION['flash'] = $flash;
    }

    public function flash()
    {
        if ($this->check()) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $this->create($flash);
        } else {
            return false;
        }
    }

    public function check()
    {
        if (array_key_exists('flash', $_SESSION) && !empty($_SESSION['flash'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getMessage()
    {
        if ($this->check()) {
           return $_SESSION['flash'];
        } else {
            return false;
        }
    }

    private function getClasses($flash)
    {
        $classes = '';

        if (count($flash['classes'])) {
            foreach ($flash['classes'] as $value) {
                $classes .= "$value ";
            }  // end foreach
        } // end if
        trim($classes);
        return $classes;
    }


    private function create($flash)
    {
        $classes = $this->getClasses($flash);
        return require( __DIR__ . '/views/message.php');
    }

// end of class
}
