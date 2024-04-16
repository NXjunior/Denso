<?php

use yii\db\Migration;

/**
 * Class m240408_054657_addBaseTable
 */
class m240408_054657_addBaseTable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'abs' => $this->string(20)->notNull(),
            'creator' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updater' => $this->integer(),
            'updated_at' => $this->timestamp(),
            'logo' => $this->string(255),
            'status' => $this->integer()->notNull()->defaultValue(10),
            'domain' => $this->string(255),
        ]);

        $this->createIndex(
            'idx-company-name',
            'company',
            'name'
        );

        $this->addForeignKey(
            'fk-company-creator',
            'company',
            'creator',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-company-updater',
            'company',
            'updater',
            'user',
            'id',
            'CASCADE'
        );

        $this->createTable('period', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'desp' => $this->string(255),
            'start_date' => $this->timestamp(),
            'end_date' => $this->timestamp(),
            'creator' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updater' => $this->integer(),
            'updated_at' => $this->timestamp(),
            'status' => $this->integer()->notNull()->defaultValue(10),
        ]);

        $this->createIndex(
            'idx-period-company_id',
            'period',
            'company_id'
        );

        $this->createIndex(
            'idx-period-start_date',
            'period',
            'start_date'
        );

        $this->addForeignKey(
            'fk-period-company_id',
            'period',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-period-creator',
            'period',
            'creator',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-period-updater',
            'period',
            'updater',
            'user',
            'id',
            'CASCADE'
        );

        $this->createTable('slot', [
            'id' => $this->primaryKey(),
            'period_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'desp' => $this->string(255),
            'note' => $this->text(),
            'extra' => $this->json()->null()->defaultValue(null),
            'slot_date' => $this->date(),
            'time_start' => $this->time(),
            'time_end' => $this->time(),
            'quota' => $this->integer()->notNull(),
            'creator' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updater' => $this->integer(),
            'updated_at' => $this->timestamp(),
            'status' => $this->integer()->notNull()->defaultValue(10),
        ]);

        $this->createIndex(
            'idx-slot-slot_date',
            'slot',
            'slot_date'
        );

        $this->addForeignKey(
            'fk-slot-period_id',
            'slot',
            'period_id',
            'period',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-slot-creator',
            'slot',
            'creator',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-slot-updater',
            'slot',
            'updater',
            'user',
            'id',
            'CASCADE'
        );


        $this->createTable('logs', [
            'id' => $this->primaryKey(),
            'type' => $this->string(255),
            'logs' => $this->json(),
        ]);


        $this->createIndex(
            'idx-logs-type',
            'logs',
            'type'
        );

        // $this->createTable('appointment', [
        //     'id' => $this->primaryKey(),
        //     'emp_id' => $this->integer()->notNull(),
        //     'slot_id' => $this->integer()->notNull(),
        //     'status' => $this->integer()->notNull()->defaultValue(10), //scheduled, canceled, completed
        //     'creator' => $this->integer()->notNull(),
        //     'created_at' => $this->timestamp(),
        //     'updater' => $this->integer(),
        //     'updated_at' => $this->timestamp(),
        // ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropIndex(
            'idx-slot-slot_date',
            'slot',
            'slot_date'
        );

        $this->dropForeignKey(
            'fk-slot-period_id',
            'slot',
        );

        $this->dropForeignKey(
            'fk-slot-creator',
            'slot',
        );

        $this->dropForeignKey(
            'fk-slot-updater',
            'slot',
        );

        $this->dropTable('slot');

        $this->dropIndex(
            'idx-period-company_id',
            'period',
        );

        $this->dropIndex(
            'idx-period-start_date',
            'period',
        );

        $this->dropForeignKey(
            'fk-period-company_id',
            'period',
        );

        $this->dropForeignKey(
            'fk-period-creator',
            'period',
        );

        $this->dropForeignKey(
            'fk-period-updater',
            'period',
        );

        $this->dropTable('period');


        $this->dropIndex(
            'idx-company-name',
            'company',
        );

        $this->dropTable('company');

        $this->dropIndex(
            'idx-logs-type',
            'logs',
        );

        $this->dropTable('logs');
    }
}
