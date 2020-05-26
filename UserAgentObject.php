<?php

namespace yii\useragentparser;

use yii\base\BaseObject;

/**
 * Class UserAgentObject
 * @package yii\useragentparser
 */
class UserAgentObject extends BaseObject
{
    /** @var  string|null */
    public $userAgent;

    /** @var  string|null */
    public $platform;

    /** @var  string|null */
    public $browser;

    /** @var  string|null */
    public $version;
}
