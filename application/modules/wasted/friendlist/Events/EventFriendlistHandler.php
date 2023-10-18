<?php

namespace Pg\modules\friendlist\Events;

use Pg\libraries\EventDispatcher;
use Pg\libraries\EventHandler;
use Pg\modules\friendlist\models\FriendlistModel;

class EventFriendlistHandler extends EventHandler
{
    /**
     * Init handler
     *
     * @return void
     */
    public function init()
    {
        $event_handler = EventDispatcher::getInstance();
        $ci = &get_instance();

        $event_handler->addListener('user_login', function ($params) {
            $ci = &get_instance();

            if (!$ci->pg_module->is_module_installed('mobile') ||
                !$ci->pg_module->get_module_config('mobile', 'use_notifications')) {
                return;
            }

            $user_data = $params->getData();            
            $ci->load->model(['Friendlist_model', 'Mobile_model']);

            $friends = $ci->Friendlist_model->getFriendlist($user_data['id'], 1, FriendlistModel::FRIEND_ONLINE_LIMIT);
            foreach ($friends as $friend) {
                if (empty($friend['user']['is_deleted'])) {
                    $title = l('push_friend_online', 'friendlist', $friend['user']['lang_id']);
                    $body = str_replace("[friend]", $user_data['output_name'], l('friend_online', 'friendlist', $friend['user']['lang_id']));
                    $ci->Mobile_model->pushNotification(
                        $friend['user']['id'],
                        $title,
                        $body,
                        "",
                        "",
                        ['user_id' => $user_data['id']],
                        site_url() . 'users/view/' . $friend['user']['id']
                    );
                }
            }
        });
    }
}
