<?php
/**
 * @link http://www.yiizh.com/
 * @copyright Copyright (c) 2016 yiizh.com
 * @license http://www.yiizh.com/license/
 */

namespace common\components;


use yii\helpers\ArrayHelper;

class View extends \yii\web\View
{
    /**
     * 注册菜单项
     * 注：已有菜单项不被覆盖
     * @param string $menu 菜单名
     * @param string $label 菜单项名
     * @param string|array $link 菜单项链接
     * @param array $options 菜单项参数
     */
    public function registerMenuItem($menu, $label, $link, $options = [])
    {
        $items = $this->getMenu($menu);
        $items[] = ['label' => $label, 'url' => $link, 'options' => $options];
        $this->setMenu($menu, $items);
    }

    /**
     * 注册菜单项（多个）
     * 注：已有菜单项不被覆盖
     *
     * @param string $menu 菜单名
     * @param array $items 菜单项
     */
    public function registerMenuItems($menu, $items = [])
    {
        $menuItems = $this->getMenu($menu);
        $menuItems = ArrayHelper::merge($menuItems, $items);
        $this->setMenu($menu, $menuItems);
    }

    /**
     * 设置菜单项
     * 注：已有菜单项会被覆盖
     *
     * @param string $menu 菜单名
     * @param array $items 菜单项
     */
    public function setMenu($menu, $items = [])
    {
        $this->params['menus'][$menu] = $items;
    }

    /**
     * @param string $menu 菜单名
     * @return array
     */
    public function getMenu($menu)
    {
        return ArrayHelper::getValue($this->params, 'menus.' . $menu, []);
    }
}