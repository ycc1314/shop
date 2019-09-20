<?php
namespace addons\MPAlipay;	// 注意命名空间规范

use app\common\model\Setting;
use myxland\addons\Addons;
use app\common\model\Addons as addonsModel;
/**
 * 支付宝小程序插件
 */
class MPAlipay extends Addons
{
    // 该插件的基础信息
    public $info = [
        'name' => 'MPAlipay',	// 插件标识
        'title' => '支付宝小程序插件',	// 插件名称
        'description' => '安装后可使用支付宝小程序',	// 插件简介
        'status' => 0,	// 状态
        'author' => 'mark',
        'version' => '0.1'
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


    public function config($params = [])
    {
        $this->assign('config', $params);
        return $this->fetch('config');
    }

}