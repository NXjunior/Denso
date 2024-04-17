<?php

use yii\db\Migration;

/**
 * Class m240417_045201_alterBooking
 */
class m240417_045201_alterBooking extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('booking', 'previous_target', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('booking', 'previous_target');
    }
}
