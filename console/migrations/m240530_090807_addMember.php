<?php

use yii\db\Migration;

/**
 * Class m240530_090807_addMember
 */
class m240530_090807_addMember extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('member',[
            'id' => $this->primaryKey(),
            'firstname' => $this->string(100)->notnull(),
            'lastname' => $this->string(100)->notnull(),
            'gender' => $this->string(40)->notnull(),
            'phone' => $this->string(10)->notnull(),
            'role' => $this->string(40)->notnull(),
            'position' => $this->string(100),
            'house_no' => $this->string(),
            'moo' => $this->string(),
            'soi' => $this->string(),
            'road' => $this->string(),
            'tambon' => $this->string(),
            'ampher' => $this->string(),
            'province' => $this->string(),
            'zip_code' => $this->string(5)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(
            'member'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240530_090807_addMember cannot be reverted.\n";

        return false;
    }
    */
}
