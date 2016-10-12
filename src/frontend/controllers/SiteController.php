<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace frontend\controllers;


use frontend\components\FrontendController;

class SiteController extends FrontendController
{
    public function publicActions()
    {
        return ['*'];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $cache = \Yii::$app->cache;
        // try retrieving $data from cache
        $news = $cache->get('__site_index_news');

        if ($news === false) {
            $news = \Yii::$app->juhe->getNews();
            // store $data in cache so that it can be retrieved next time
            $cache->set('__site_index_news', $news, 15 * 60);
        }

        return $this->render('index', [
            'news' => $news
        ]);
    }
}