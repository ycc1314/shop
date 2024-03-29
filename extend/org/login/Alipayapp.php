<?php

namespace org\login;
use app\common\model\UserToken;
use org\Alipay;
use app\common\model\UserWx;

class Alipayapp
{
    /**
     * 支付宝小程序登录
     * @param $code
     * @param $userInfo
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function codeToInfo($code, $userInfo)
    {
        $result = [
            'status' => false,
            'data'   => [],
            '
            
            msg'    => ''
        ];
        $userWxModel = new UserWx();
        $alipay     = new Alipay();

        $config = getAddonsConfig('MPAlipay');
        if(!$config)
        {
            $result['msg'] = '请开启支付宝小程序插件';
            return $result;
        }
        $result = $alipay->code_to_token($config['mp_alipay_appid'], $code);
        if (!$result['status'])
        {
            return $result;
        }

        if(isset($result['data']['alipay_user_id']) && $result['data']['alipay_user_id'])
        {
            $where['unionid'] = $result['data']['alipay_user_id'];
        }
        $where['openid'] = $result['data']['user_id'];
        $where['type']   = $userWxModel::TYPE_ALIPAY;
        $info            = $userWxModel->where($where)->find();
        if($info)
        {
            //更新session_key
            $userWxModel->save(['session_key' => $result['data']['access_token']], $where);
            $user_alipay_id = $info['id'];
            if($info['user_id'])
            {
                //绑定好手机号码了，去登陆,去取user_token
                $userTokenModel = new UserToken();
                $re             = $userTokenModel->setToken($info['user_id'], 3);
                if($re['status'])
                {
                    $result['data'] = ['token' => $re['data']];
                }
            }
        }
        else
        {
            $data = [
                'unionid' => $result['data']['alipay_user_id'],
                'type' => $userWxModel::TYPE_ALIPAY,
                'openid' => $result['data']['user_id'],
                'session_key' => $result['data']['access_token'],
                'avatar' => $userInfo['avatar'],
                'nickname' => $userInfo['nickname'],
                'gender' => $userInfo['gender'] ? $userInfo['gender'] : '',
                'language' => $userInfo['language'] ? $userInfo['language'] : '',
                'city' => $userInfo['city'] ? $userInfo['city'] : '',
                'province' => $userInfo['province'] ? $userInfo['province'] : '',
                'country' => $userInfo['country'] ? $userInfo['country'] : ''
            ];

            $userWxModel->save($data);
            $user_alipay_id = $userWxModel->id;
        }
        $result['data']['user_wx_id'] = $user_alipay_id;
        return $result;
    }
}