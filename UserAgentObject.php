<?php

namespace yii\useragentparser;

/**
 * Class UserAgentObject
 * @package yii\useragentparser
 */
class UserAgentObject extends \yii\base\BaseObject
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
