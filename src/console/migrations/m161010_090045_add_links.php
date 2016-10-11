<?php

use yii\db\Migration;

class m161010_090045_add_links extends Migration
{
    public $links = [
        [1, '百度贴吧', 'http://tieba.baidu.com/index.html'],
        [2, '新浪微博', 'http://www.weibo.com/'],
        [3, '搜   狐', 'http://www.sohu.com/'],
        [4, '淘宝特卖', 'http://temai.taobao.com/index.htm?pid=mm_12693563_14176917_62920034'],
        [5, '腾讯空间', 'http://qzone.qq.com/'],
        [6, '网易邮箱', 'http://email.163.com/'],
        [7, '天猫', 'http://s.click.taobao.com/t?e=m%3D2%26s%3DBC5dCPVbg6ccQipKwQzePCperVdZeJvipRe%2F8jaAHci5VBFTL4hn2R%2Bgwh%2F4EyL1%2Bx%2FKLma%2BVNlZZ1Xt1xdksA7whLk%2FJklYfWuVLFcKSPmd3pQAe8APqtwe1GkRTLpEdXLFE7SC8Xix379%2FgWHD1uoPXyFbMSxd'],
        [8, '凤 凰 网', 'http://www.ifeng.com/'],
        [9, '淘 宝 网', 'http://www.taobao.com/'],
        [10, '阿里旅行', 'http://s.click.taobao.com/t?e=m%3D2%26s%3DA%2BJCtf7hAf8cQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAujj4E8BA02khOd0diGy%2FzqCWq18cqI6t7QEpzPETciCXivlwmqvi0q2xFkaU%2F3QbXcJvP5UHXuoCOYKCMu0i0ncHtRpEUy6RHVyxRO0gvF4S5LbtMfCISLU4MpwEDWbLSGFCzYOOqAQ'],
        [11, '央视网', 'http://www.cntv.cn/'],
        [12, '新华人民', 'http://www.xinhuanet.com/'],
        [13, '聚划算', 'http://s.click.taobao.com/t?e=m%3D2%26s%3DUgxma8VwG%2FEcQipKwQzePCperVdZeJviEViQ0P1Vf2kguMN8XjClAujj4E8BA02kLknuM4vEeqmCWq18cqI6t7QEpzPETciCXivlwmqvi0q2xFkaU%2F3QbVW00662PG2K8Cm%2FwUl4ESHcHtRpEUy6RLSgd9R%2Fv5WktY4Qt2cZ1lXqD18hWzEsXQ%3D%3D'],
        [14, '优 酷 网', 'http://www.youku.com/'],
        [15, '新浪爱彩', 'http://www.aicai.com/'],
        [16, '携程网', 'http://www.ctrip.com'],
        [17, '东方财富', 'http://www.eastmoney.com/'],
        [18, '工商银行', 'http://www.icbc.com.cn/'],
    ];

    public function up()
    {
        foreach ($this->links as $link) {
            $this->insert('{{%link}}', [
                'id' => $link[0],
                'title' => $link[1],
                'linkUrl' => $link[2],
                'imageUrl' => '',
                'deleted' => 'N',
                'createdAt' => time(),
                'updatedAt' => time(),
            ]);
        }

    }

    public function down()
    {
        foreach ($this->links as $link) {
            $this->delete('{{%link}}', ['id' => $link[0]]);
        }
    }

}
