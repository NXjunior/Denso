<?php

use yii\db\Migration;

/**
 * Class m240413_003229_addArea
 */
class m240413_003229_addArea extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable('area', [
        //     'id' => $this->primaryKey(),
        //     'period_id' => $this->integer()->notNull(),
        //     'name' => $this->string(255)->notNull(),
        //     'desp' => $this->string(255),
        //     'status' => $this->integer()->notNull()->defaultValue(10),
        //     'creator' => $this->integer()->notNull(),
        //     'created_at' => $this->timestamp(),
        //     'updater' => $this->integer(),
        //     'updated_at' => $this->timestamp(),
        // ]);

        // $this->createIndex(
        //     'idx-slot-period_id',
        //     'area',
        //     'period_id'
        // );

        // $this->addForeignKey(
        //     'fk-area-period_id',
        //     'area',
        //     'period_id',
        //     'period',
        //     'id',
        //     'CASCADE'
        // );

        // $this->dropForeignKey(
        //     'fk-slot-period_id',
        //     'slot',
        // );

        // $this->renameColumn('slot', 'period_id', 'area_id');

        // $this->addForeignKey(
        //     'fk-slot-area_id',
        //     'slot',
        //     'area_id',
        //     'area',
        //     'id',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // $this->dropIndex(
        //     'idx-slot-period_id',
        //     'area',
        // );

        // $this->dropForeignKey(
        //     'fk-slot-area_id',
        //     'slot',
        // );

        // $this->dropTable('area');

        // $this->renameColumn('slot', 'area_id', 'period_id');

        // $this->addForeignKey(
        //     'fk-slot-period_id',
        //     'slot',
        //     'period_id',
        //     'period',
        //     'id',
        //     'CASCADE'
        // );
    }
}
