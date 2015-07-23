<?php

namespace yii\useragentparser;

use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

/**
 * User Agent parser implements a parse based on https://github.com/donatj/PhpUserAgent.
 *
 * To use UserAgentParser, you should configure it in the application configuration like the following,
 *
 * ~~~
 * 'components' => [
 *     ...
 *     'userAgentParser' => [
 *         'class' => 'yii\useragentparser\UserAgentParser',
 *         'nameHttpPropertyUserAgent' => 'HTTP_USER_AGENT'
 *     ],
 *     ...
 * ],
 * ~~~
 *
 * @see https://github.com/NmDimas/yii2-user-agent-parser
 *
 * @author Dmytro Nemesh <nmdimas@ukr.net>
 * @since 1.0
 */
class UserAgentParser extends Component
{
    /**
     * This name which will be  used to extract user-agent a $_SERVER[] in current request.
     * If you use the services through which the traffic is the variable can change.
     *
     * @var string
     */
    public $nameHttpPropertyUserAgent = 'HTTP_USER_AGENT';

    /**
     * This method return UserAgentObject.
     *
     * @param null|string $userAgent You can set user-agent. If $userAgent will be null,
     * user-agent will be uses default $_SERVER['HTTP_USER_AGENT']
     * @return UserAgentObject
     * @throws \yii\base\InvalidConfigException
     */
    public function getUserAgentObject($userAgent = null)
    {
        if (!$userAgent) {
            $userAgent = $this->getUserAgentByRequest();
        }
        $objectData = ArrayHelper::merge(
            ['class' => 'yii\useragentparser\UserAgentObject','userAgent'=>$userAgent],
            $this->parseUserAgent($userAgent)
        );

        return Yii::createObject($objectData);
    }


    /**
     * @param $userAgent
     * @return \string[]
     */
    protected function parseUserAgent($userAgent)
    {
        return parse_user_agent($userAgent);
    }


    /**
     * @return null|string
     */
    private function getUserAgentByRequest()
    {
        return array_key_exists($this->nameHttpPropertyUserAgent, $_SERVER) ?
            $_SERVER[$this->nameHttpPropertyUserAgent] : null;
    }
}
