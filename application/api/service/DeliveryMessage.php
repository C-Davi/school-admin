<?php
/**
 * Created by 七月
 * Author: 七月
 * 微信公号: 小楼昨夜又秋风
 * 知乎ID: 七月在夏天
 * Date: 2017/3/7
 * Time: 13:27
 */

namespace app\api\service;


use app\api\model\User;
use app\lib\exception\OrderException;

class DeliveryMessage extends WxMessage
{
    const DELIVERY_MSG_ID = 'xP2OE9Cwbq3vXG3cBzTbqLmIETLqAhume9oNHDR3ip4';// 小程序模板消息ID号

    //    private $productName;
    //    private $devliveryTime;
    //    private $order

    public function sendDeliveryMessage($order, $tplJumpPage = '')
    {
        if (!$order) {
            throw new OrderException();
        }
        $this->tplID = self::DELIVERY_MSG_ID;
        $this->formID = $order->prepay_id;
        $this->page = $tplJumpPage;
        $this->prepareMessageData($order);
        $this->emphasisKeyWord='keyword3.DATA';
        return parent::sendMessage($this->getUserOpenID($order->user_id));
    }

    private function prepareMessageData($order)
    {
        $dt = new \DateTime();
        $data = [
            'keyword1' => [
                'value' => '顺风速运',
            ],
            'keyword3' => [
                'value' => $order->snap_name,
                'color' => '#27408B'
            ],
            'keyword4' => [
                'value' => $order->order_no
            ],
            'keyword2' => [
                'value' => $dt->format("Y-m-d H:i")
            ]
        ];
        $this->data = $data;
    }

    private function getUserOpenID($uid)
    {
        $user = User::get($uid);
        if (!$user) {
            throw new UserException();
        }
        return $user->openid;
    }
}