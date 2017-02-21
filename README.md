CCL a simple library for CMS extensions
====================

Build Status
---------------------
[![Build Status](https://travis-ci.org/Digital-Peak/ccl.svg?branch=unstable)](https://travis-ci.org/Digital-Peak/ccl)
[![Coverage Status](https://coveralls.io/repos/github/Digital-Peak/ccl/badge.svg?branch=unstable)](https://coveralls.io/github/Digital-Peak/ccl?branch=unstable)

Status
---------------------
This is a fresh project under heavy development. The target is to provide a framework which will allow to use extensions on different CMS's like Joomla or Wordpress.

## Installation via Composer

Add `"Digital-Peak/ccl": "dev-unstable"` to the require block in your composer.json and then run `composer install`.

```json
{
	"require": {
            "Digital-Peak/ccl": "dev-unstable"
        },
        "repositories": [
            {
                "url": "https://github.com/Digital-Peak/ccl.git",
                "type": "git"
            }
        ]
     }
}
```

Alternatively, you can simply run the following from the command line:

```sh
composer require Digital-Peak/ccl "dev-unstable"
```

## About

### Requirements

- CCL works with PHP 5.6 or above.

### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/Digital-Peak/ccl/issues)
### Author

Allon Moritz for Digital Peak - <http://twitter.com/digitpeak><br />
See also the list of [contributors](https://github.com/Digital-Peak/ccl/contributors) which participated in this project.

### License

CCL is licensed under the MIT License - see the `LICENSE` file for details.