<?php
// +----------------------------------------------------------------------
// | JSHOP [ 小程序商城 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2018 http://jihainet.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: tianyu <tianyu@jihainet.com>
// +----------------------------------------------------------------------
namespace app\api\controller;
use app\common\controller\Api;
use app\common\model\ArticleType;
use app\common\model\Article;
use app\common\model\WeixinMediaMessage;
use think\facade\Request;


/**
 * 文章
 * Class Articles
 * @package app\api\controller
 */
class Articles extends Api
{
    /**
     * 获取全部文章分类列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getArticleType()
    {
        $articleType = new ArticleType();
        return $articleType->articleTypeList();
    }


    /**
     * 获取文章列表
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getArticleList()
    {
        $article = new Article();
        $type_id = Request::param('type_id', false);
        $page = Request::param('page', 1);
        $limit = Request::param('limit', 10);

        return $article->articleList($type_id, $page, $limit);
    }


    /**
     * 获取单个文章的详细信息
     * @return array|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getArticleDetail()
    {
        $article_id = Request::param('article_id', 0);
        if(!$article_id) return error_code(10051);
        $article = new Article();
        return $article->articleDetail($article_id);
    }


    /**
     * 微信信息
     * @return array|mixed
     */
    public function getWeixinMessage()
    {
        $result = [
            'status' => true,
            'msg'    => '获取成功',
            'data'   => []
        ];
        $msg_id = Request::param('id', 0);
        if(!$msg_id) return error_code(10051);
        $messageModel = new WeixinMediaMessage();
        $result['data'] = $messageModel->getInfo($msg_id);
        $result['data']['content'] = clearHtml($result['data']['content'], ['width', 'height']);//清除文章中宽高
        $result['data']['content'] = str_replace("<img", "<img style='max-width: 100%'", $result['data']['content']);
        $result['data']['ctime'] = time_ago($result['data']['ctime']);
        return $result;
    }
}