<?php

use yii\db\Migration;

/**
 * Class m240410_022303_addTableEmployee
 */
class m240410_022303_addTableEmployee extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'company_id' => $this->integer()->notNull(),
            'code' => $this->string(10)->notNull(),
            'title' => $this->string(50),
            'firstname' => $this->string(255),
            'lastname' => $this->string(255),
            'title_en' => $this->string(50),
            'firstname_en' => $this->string(255),
            'lastname_en' => $this->string(255),
            'creator' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updater' => $this->integer(),
            'updated_at' => $this->timestamp(),
            'status' => $this->integer()->notNull()->defaultValue(10),
        ]);

        $this->createIndex(
            'idx-employee-code',
            'employee',
            'code'
        );

        $this->createIndex(
            'idx-employee-company_id',
            'employee',
            'company_id'
        );



        // 'no' => $this->integer()->notNull(),
        // 'company_code' => $this->string(10)->notNull(),
        // 'plant' => $this->string(10)->notNull(),
        // 'div' => $this->string(10)->notNull(),
        // 'location' => $this->string(10)->notNull(),
        // 'section' => $this->string(255)->notNull(),
        // 'department' => $this->string(255)->notNull(),

        $this->createTable('employee_meta', [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer()->notNull(),
            'meta_key' => $this->string(),
            'meta_value' => $this->text(),
        ]);

        $this->createIndex(
            'idx-employee_meta-employee_id',
            'employee_meta',
            'employee_id'
        );

        $this->createIndex(
            'idx-employee_meta-meta_key',
            'employee_meta',
            'meta_key'
        );

        $this->createIndex(
            'idx_unique-employee_meta-employee_id',
            'employee_meta',
            ['employee_id', 'meta_key'],
            true
        );

        $this->addForeignKey(
            'fk-employee_meta-employee_id',
            'employee_meta',
            'employee_id',
            'employee',
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
            'idx-employee-code',
            'employee',
        );

        $this->dropIndex(
            'idx-employee-company_id',
            'employee',
        );


        $this->dropTable('employee');


        $this->dropIndex(
            'idx-employee_meta-employee_id',
            'employee_meta',
        );

        $this->dropIndex(
            'idx-employee_meta-meta_key',
            'employee_meta',
        );

        $this->dropIndex(
            'idx_unique-employee_meta-employee_id',
            'employee_meta',
        );

        $this->dropForeignKey(
            'fk-employee_meta-employee_id',
            'employee_meta',
        );

        $this->dropTable('employee_meta');
    }
}
