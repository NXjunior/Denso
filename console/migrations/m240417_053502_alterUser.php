<?php

use yii\db\Migration;

/**
 * Class m240417_053502_alterUser
 */
class m240417_053502_alterUser extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'company_id', $this->integer()->notNull()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'company_id');
    }
}
