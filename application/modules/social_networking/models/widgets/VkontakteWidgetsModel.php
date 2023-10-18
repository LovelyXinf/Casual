<?php

namespace Pg\modules\social_networking\models\widgets;

/**
 * Social networking vkontakte widgets model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class VkontakteWidgetsModel extends \Model
{
    public $widget_types = array(
        'comments',
        'like',
        'share',
    );
    public $openapi = false;
    public $head_loaded = false;
    private $has_key = false;

    public function getHeader($service_data = array(), $locale = '', $types = array())
    {
        $header = '';
        $appid = isset($service_data['app_key']) ? $service_data['app_key'] : false;
        if ($appid) {
            $this->has_key = true;
        }
        $header .= '
    <script>
        var vkontakte = [];
        var vkontakte_share = [];';
        if (!$this->openapi) {
            $header .= $appid ? ('
        loadScripts("https://userapi.com/js/api/openapi.js?48", function(){
                VK.init({apiId: ' . $appid . ', onlyWidgets: true});
                for(var i in vkontakte){
                    vkontakte[i]();
                }
            },
            [],
            {async: false}
        );') : '';
            $this->openapi = true;
        }

        $header .= '
        loadScripts("https://vk.com/js/api/share.js?11", function(){
                $(".vk_share").html(VK.Share.button(false,{type: "button"}));
            },
            [],
            {async: false}
        );
    </script>';
        $this->head_loaded = (bool) $header;

        return $header;
    }

    public function getLike()
    {
        return $this->head_loaded && $this->openapi ? '
    <div id="vk_like"></div>
    <script type="text/javascript">
        vkontakte.push(function(){
            VK.Widgets.Like("vk_like", {type: "button", verb: 1, height: 28});
        });
    </script>' : '';
    }

    public function getShare()
    {
        return $this->head_loaded ? '<div class="vk_share"></div>' : '';
    }

    public function getComments()
    {
        return $this->head_loaded && $this->openapi && $this->has_key ? '
    <div id="vk_comments"></div>
    <script type="text/javascript">
        window.onload = function () {
            VK.Widgets.Comments("vk_comments", {limit: 10, width: "496", attach: "*"});
        }
    </script>' : '';
    }
}
