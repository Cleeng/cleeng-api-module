CleengApiModule - Zend Framework 2 wrapper for Cleeng PHP SDK
=============================================================

See [Cleeng API Reference](http://cleeng.com/open/v3/Reference) for Cleeng API documentation.

Installation
------------

`CleengApiModule` supports installation via [Composer](http://getcomposer.org/):

1. Add `cleeng/cleeng-api-module` to your `composer.json` file:

```
"requires": {
    "cleeng/cleeng-api-module": "dev-master"
}
```

2. Run `composer.phar update` to download this module and Cleeng PHP SDK.

3. You don't need to configure anything to use Customer API. If you want to use other methods, copy
`config/cleeng_api.local.php.dist` file from module directory to your `config/autoload` dir, remove ".dist"
 extenstion, and edit this file (you'll need at least your publisher token).

4. Enable CleengApiModule in your `application.config.php` file:

```php
return array(
    'modules' => array(
        'Application',
        'CleengApiModule',
        // other modules...
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
```

Usage
-----

Once installation is complete, you can access Cleeng API from application's service manager. It is stored
as `Cleeng\Api` identifier:

```php
// inside controller
$cleengApi = $this->getServiceLocator()->get('Cleeng\Api');

// check if customer has access to an offer
if ($cleengApi->isAccessGranted('R123123123_US')) {
    // ...
}
```

CleengApiModule provides handy shortcut for enabling [Cleeng Javascript API](http://cleeng.com/open/v3/JS_API_Reference/Cleeng_JavaScript_Library)
from within your views:

```php
<?php
$this->enableCleengJsApi();  // this will add JS API url to <script> tag in HEAD section
?>

<script type="text/javascript">
// example usage of Cleeng API
$('a.some_button').click(function () {
    CleengApi.purchase('R123123123_US');
});
</script>
```