<?php namespace WhiteFrame\WhiteFrame;

use App;

/**
 * Class WhiteFrame
 * @package WhiteFrame\WhiteFrame
 */
class WhiteFrame
{
    /**
     * Check if the complete framework is registered
     *
     * @return bool
     */
    public static function isLoaded()
    {
        return array_key_exists('WhiteFrame\WhiteFrame\WhiteFrameServiceProvider', App::getLoadedProviders());
    }
}