<?php

use yii\db\Migration;

/**
 * Class m240411_075110_alterPeriod
 */
class m240411_075110_alterPeriod extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('booking', 'deleter', $this->integer());
        $this->addColumn('booking', 'deleted_at', $this->timestamp());
        $this->addColumn('booking', 'completed_at', $this->timestamp());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('booking', 'deleter');
        $this->dropColumn('booking', 'deleted_at');
        $this->dropColumn('booking', 'completed_at');
    }
}
