<?php

use yii\db\Migration;

/**
 * Class m240530_102853_addVehicle
 */
class m240530_102853_addVehicle extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vehicle',[
            'id' => $this->primaryKey(),
            'requested_id' => $this->integer()->notNull(),
            'requested_type' => $this->smallInteger(),
            'licencer_id' => $this->integer(),
            'type' => $this->string(),
            'brand' => $this->string(),
            'model' => $this->string(),
            'color' => $this->string(),
            'registration' => $this->string(),
            'register_province' => $this->string(),
            'photo_side' => $this->string(),
            'photo_registration' => $this->string(),
            'request_date' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'license_date' => $this->timestamp()->null(),
        ]);

        $this->addForeignKey(
            'fk-vehicle-requested_member_id',
            'vehicle',
            'requested_member_id',
            'member',
            'id',
            'CASCADE',
        );

        $this->addForeignKey(
            'fk-vehicle-licencer_member_id',
            'vehicle',
            'licencer_member_id',
            'member',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-vehicle-requested_member_id',
            'vehicle'
        );
        $this->dropForeignKey(
            'fk-vehicle-licencer_member_id',
            'vehicle'
        );
        $this->dropTable(
            'vehicle'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240530_102853_addVehicle cannot be reverted.\n";

        return false;
    }
    */
}
