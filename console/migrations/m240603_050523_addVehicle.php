<?php

use yii\db\Migration;

/**
 * Class m240603_050523_addVehicle
 */
class m240603_050523_addVehicle extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vehicle',[
            'id' => $this->primaryKey(),
            'plate' => $this->string(255)->notNNull(),
            'province' => $this->string(255)->notNull(),
            'type' => $this->smallInteger()->notnull(), // 10 : Motorcycle, 20 : Car
            'brand'=> $this->string(255)->notnull(), // list options
            'model' => $this->string(255)->notnull(), // list options
            'color' => $this->string(255)->notnull(),
            'image' => $this->string(255),
            'plate_image' => $this->string(255),
        ]);

        $this->createIndex(
            'idx_unique-vehicle-plate-province',
            'vehicle',
            ['plate', 'province'],
            true
        );

        $this->createTable('vehicle_request', [
            'id' => $this->primaryKey(),
            'vehicle_id' => $this->integer()->notNull(),
            'requested_id' => $this->integer()->notNull(), // student, teacher, other
            'requested_role' =>$this->smallInteger()->notnull(), // 10: student, 20: teacher, 30: other
            'approver' => $this->integer(),
            'approved_at' => $this->timestamp(),
            'status' => $this->integer()->notNull()->defaultValue(0), //0: request, 10: approves, -1: reject
            'creator' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updater' => $this->integer(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-vehicle_request-vehicle_id',
            'vehicle_request',
            'vehicle_id'
        );

        $this->addForeignKey(
            'fk-vehicle_request-approver',
            'vehicle_request',
            'approver',
            'user',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-vehicle_request-vehicle_id',
            'vehicle_request',
            'vehicle_id',
            'vehicle',
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
            'idx_unique-vehicle-plate-province',
            'vehicle',
        );

        $this->dropTable('vehicle');


        $this->dropIndex(
            'idx-vehicle_request-vehicle_id',
            'vehicle_request',
        );

        $this->dropForeignKey(
            'fk-vehicle_request-approver',
            'vehicle_request',
        );

        $this->dropForeignKey(
            'fk-vehicle_request-vehicle_id',
            'vehicle_request',
        );

        $this->dropTable('vehicle_request');


    }

}
