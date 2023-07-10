<?php

namespace addons\Member;

use Yii;
use common\components\Migration;
use common\interfaces\AddonWidget;

/**
 * 升级数据库
 *
 * Class Upgrade
 * @package addons\Member
 */
class Upgrade extends Migration implements AddonWidget
{
    /**
     * @var array
     */
    public $versions = [
        '1.0.0', // 默认版本
        '1.0.1', '1.0.2', '1.0.3'
    ];

    /**
     * @param $addon
     * @return mixed|void
     * @throws \yii\db\Exception
     */
    public function run($addon)
    {
        switch ($addon->version) {
            case '1.0.3' :
                $this->addColumn('{{%member_invoice}}', 'opening_bank_account', "varchar(100) NULL DEFAULT '' COMMENT '公司开户行账号'");
                $this->addColumn('{{%member_invoice}}', 'phone', "varchar(50) NULL DEFAULT '' COMMENT '公司电话'");
                $this->addColumn('{{%member_invoice}}', 'remark', "varchar(255) NULL DEFAULT '' COMMENT '备注'");
                break;
            case '1.0.2' :
                $this->addColumn('{{%member}}', 'bg_image', "varchar(200) NULL DEFAULT '' COMMENT '个人背景图'");
                $this->addColumn('{{%member}}', 'description', "varchar(200) NULL DEFAULT '' COMMENT '个人说明'");
                break;
            case '1.0.1' :
                $this->addColumn('{{%member_withdraw_deposit}}', 'batch_no', "varchar(100) NULL DEFAULT '' COMMENT '批量转账单号'");
                break;
        }
    }
}
