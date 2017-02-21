DPF a simple framework for CMS extensions
====================

Build Status
---------------------
[![Build Status](https://travis-ci.org/Digital-Peak/dpf.svg?branch=unstable)](https://travis-ci.org/Digital-Peak/dpf)
[![Coverage Status](https://coveralls.io/repos/github/Digital-Peak/dpf/badge.svg?branch=unstable)](https://coveralls.io/github/Digital-Peak/dpf?branch=unstable)

Status
---------------------
This is a fresh project under heavy development. The target is to provide a framework which will allow to use extensions on different CMS's like Joomla or Wordpress.

## Installation via Composer

Add `"joomla/ldap": "~1.0"` to the require block in your composer.json and then run `composer install`.

```json
{
	"require": {
		"joomla/ldap": "~1.0"
	}
}
```

Alternatively, you can simply run the following from the command line:

```sh
composer require joomla/ldap "~1.0"
```