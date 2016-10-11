<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace frontend\components;

use Yii;

class BaseManageController extends FrontendController
{
    public $layout = 'manage';

    public function init()
    {
        parent::init();
        $webUser = Yii::$app->user;
        $this->getView()->registerMenuItems('top',[
            [
                'label' => '链接',
                'visible' => $webUser->can('manageLink'),
                'items' => [
                    ['label' => '链接管理', 'url' => ['/manage/link/index']],
                    ['label' => '新增链接', 'url' => ['/manage/link/create']],
                    '<li class="divider"></li>',
                    ['label'=>'回收站','url'=>['/manage/link/trash']]
                ]
            ],
            [
                'label' => '分类',
                'visible' => $webUser->can('manageLink'),
                'items' => [
                    ['label' => '分类管理', 'url' => ['/manage/catalog/index']],
                    ['label' => '新增分类', 'url' => ['/manage/catalog/create']],
                    '<li class="divider"></li>',
                    ['label'=>'回收站','url'=>['/manage/catalog/trash']]
                ]
            ],
        ]);
    }

}