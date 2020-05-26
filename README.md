# Yii2 extension for user agent parser 

PHP >= 7.2 support. 
This extension adds support for PhpUserAgent(https://github.com/donatj/PhpUserAgent) to the Yii2 framework.


Installation
------------

```php
'components' => [
      ...
      'userAgentParser' => [
          'class' => 'yii\useragentparser\UserAgentParser',
          'nameHttpPropertyUserAgent' => 'HTTP_USER_AGENT'
      ],
      ...
  ],
```

Usage
-----

If we parse current request

```php
$userAgentInfo = Yii::$app->userAgentParser->getUserAgentObject();
```

or need parse isset user-agent

```php
$userAgentInfo = Yii::$app->userAgentParser->getUserAgentObject($userAgent);
```


$userAgentInfo it's UserAgentObject with properties: 
 - userAgent
 - platform
 - browser
 - version

Best practices
--------------
Add to Yii.php in root for autocompletion for custom components.

```php
 /** @property  \yii\useragentparser\UserAgentParser $userAgentParser */
```


About autocompletion for custom components.

https://github.com/samdark/yii2-cookbook/blob/master/book/ide-autocompletion.md



