# Propel for Ditto
**a Ditto bundle**

## Basic Use
```php
Engine::load()->bundle('Propel')
	->setProject('unit')
	->init();
```
## Using cross project (as in unit)
```php
$loader = new \ClassLoader\Loader;
$loader->registerNamespaceDirectory('Ditto\Propel', $_SERVER['DOCUMENT_ROOT']. '/unit/vendor/ditto/propel-bundle/src/Ditto/Propel');
$loader->setAutoloader();
Engine::load()->bundle('Propel')
	->setProject('unit')
	->forceRoot($_SERVER['DOCUMENT_ROOT'] . '/unit/')
	->init();
```