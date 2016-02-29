[![Build Status](https://travis-ci.org/pagerange/flash.svg?branch=master)](https://travis-ci.org/pagerange/flash)

# Flash

## Flash messaging

This class provides a simple wrapper for setting and displaying flash messages using the PHP session.

### Dependencies

None.

### Installation

Note: has not yet been released on Packagist.  You can still install  using Composer by adding a repositories section to composer.json:

```json

{

 "repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/pagerange/flash.git"
  }
 ],
 "require": {
  "pagerange/flash": "@alpha"
 }

}

```

Then install with composer:

```bash

  composer install

```

### Features

Note: session must be started manually with `session_start()` 

* Set Flash message
* Set array of CSS classes for Flash message
* Check if flash message is set
* Display Flash message

### Usage

```

use Pagerange\Flash\Flash;

$flash = new Flash();

// set flash message with class alert-success
$flash->message('You are now logged in!', ['alert', alert-success']); 

// output flash message, if any.  Message is removed from session after display.
// Returns empty string if flash message is not set.
$flash->flash() 

```

Flash messaging is output in a div with the class 'flash' by default.  You can add additional classes as the second parameter in an array when setting the message.

```html

  // Flash message in sample above would be output like so:

  	<div class="flash alert alert-success">
		You are now logged in
	</div>

```

If you are using jQuery, the following snippet adds a slow rolldown and rollup of Flash messages.  

Note: Flash messaging will work without jQuery, but will have no animation.

```javascript

	$(document).ready(function(){
		$(".flash").hide()
			.slideDown()
			.delay(2000)
			.slideUp('slow');
  });

```


### Support

[Pagerange/Flash Github issues page](https://github.com/pagerange/session/issues/)

### License

The MIT License (MIT)

Copyright (c) 2015  by Steve George <steve@pagerange.com>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction, including without limitation
the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions
of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

