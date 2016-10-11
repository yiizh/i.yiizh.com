<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace console\controllers;

use common\models\User;
use console\components\ConsoleController;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Console;

class RbacController extends ConsoleController
{
    public $defaultAction = 'init';
    public function actionInit()
    {
        if (!$this->confirm("确定？此操作将会重建权限树。")) {
            return self::EXIT_CODE_NORMAL;
        }
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // 链接管理权限
        $manageLink = $auth->createPermission('manageLink');
        $manageLink->description = '管理链接';
        $auth->add($manageLink);

        // 分类管理权限
        $manageCatalog = $auth->createPermission('manageCatalog');
        $manageCatalog->description = '管理分类';
        $auth->add($manageCatalog);

        // 角色: 管理员
        $manager = $auth->createRole('manager');
        $manager->description = '管理员';
        $auth->add($manager);

        // 角色: 超级管理员
        $superManager = $auth->createRole('superManager');
        $superManager->description = '超级管理员';

        $auth->add($superManager);

        $auth->addChild($superManager, $manager);
        $auth->addChild($superManager, $manageLink);
        $auth->addChild($superManager, $manageCatalog);

        $this->stdout('权限树已重置。' . PHP_EOL, Console::FG_GREEN);
    }
    /**
     * 分配角色
     *
     * @param $role
     * @param int $id
     */
    public function actionAssign($role, $id)
    {
        $user = User::findOne($id);
        if (!$user) {
            throw new InvalidParamException("没有找到 ID 为 \"{$id}\" 的用户。");
        }
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($role);
        if (!$role) {
            throw new InvalidParamException("没有找到角色 \"{$role}\"。");
        }
        $assignment = $auth->getAssignment($role->name, $user->id);
        if (!$assignment) {
            $auth->assign($role, $user->id);
        }
        $this->stdout('已分配。' . PHP_EOL, Console::FG_GREEN);
    }
}