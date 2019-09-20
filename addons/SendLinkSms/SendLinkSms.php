<?php

namespace addons\SendLinkSms;    // 注意命名空间规范

use myxland\addons\Addons;
use app\common\model\Addons as addonsModel;
use org\Curl;

/**
 * 领克短信通道
 */
class SendLinkSms extends Addons
{
    // 该插件的基础信息
    public $info = [
        'name' => 'SendLinkSms',    // 插件标识
        'title' => '领客短信插件',    // 插件名称
        'description' => '领客短信插件，请勿和其它短信通道一起使用',    // 插件简介
        'status' => 0,    // 状态
        'author' => 'Ly',
        'version' => '0.1',
        'url' => 'http://api.uoleem.com.cn/sms/httpBatchSend'
    ];

    /**
     * 插件安装方法
     * @return bool
     */
    public function install()
    {
        return true;
    }

    /**
     * 插件卸载方法
     * @return bool
     */
    public function uninstall()
    {
        return true;
    }

    /**
     * 实现的sendLinkSms钩子方法
     *
     * @param $params
     * @return array
     */
    public function sendLinkSms($params)
    {
        $result = [
            'status' => false,
            'data' => [],
            'msg' => '发送失败'
        ];
        $addonModel = new addonsModel();
        $setting = $addonModel->getSetting($this->info['name']);
        if (empty($setting)) {
            return $result;
        }

        // 设置发送传值
        $data = [
            'username' => $setting['username'],
            'pwd' => $setting['pwd'],
            'mobile' => $params['params']['mobile'],
            'content' => '【' . $setting['sms_prefix'] . '】' . $params['params']['content'],
            'ts' => '',
        ];

        $curl = new Curl();

        $sms_res = $curl->post($this->info['url'], $data);
        $sms_res = json_decode($sms_res, true);
        if ($sms_res['code'] != 0) {
            $result['msg'] = $sms_res['message'];
            return $result;
        }

        $result['msg'] = '发送成功';
        $result['status'] = true;
        return $result;
    }

    public function config($params = [])
    {
        $this->assign('config', $params);
        return $this->fetch('config');
    }
}