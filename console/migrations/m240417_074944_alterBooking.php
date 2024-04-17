<?php

use yii\db\Migration;

/**
 * Class m240417_074944_alterBooking
 */
class m240417_074944_alterBooking extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('booking', 'method', $this->integer()->notNull()->defaultValue(10));
        $this->addColumn('booking', 'walkin_date', $this->date());
        $this->addColumn('booking', 'walkin_time', $this->time());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('booking', 'method');
        $this->dropColumn('booking', 'walkin_date');
        $this->dropColumn('booking', 'walkin_time');
    }
}
