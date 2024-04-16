<?php

use yii\db\Migration;

/**
 * Class m240415_021508_addActivity
 */
class m240415_021508_addActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'booking_id' => $this->integer()->notNull(),
            'kind' => $this->string(50)->notNull(), //visited, vaccinated
            'remark' => $this->string(255),
            'creator' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updater' => $this->integer(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-activity-booking_id',
            'activity',
            'booking_id'
        );

        $this->addForeignKey(
            'fk-activity-booking_id',
            'activity',
            'booking_id',
            'booking',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropIndex(
            'idx-activity-booking_id',
            'activity',
        );

        $this->dropForeignKey(
            'fk-activity-booking_id',
            'activity',
        );

        $this->dropTable('activity');
    }
}
