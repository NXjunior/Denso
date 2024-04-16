<?php

use yii\db\Migration;

/**
 * Class m240411_055310_addTableBooking
 */
class m240411_055310_addTableBooking extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('booking', [
            'id' => $this->primaryKey(),
            'source_id' => $this->string(20)->notNull(), //code
            'company_id' => $this->integer()->notNull(),
            'period_id' => $this->integer()->notNull(),
            'target_id' => $this->integer(),
            'status' => $this->integer()->notNull()->defaultValue(10),
            'creator' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updater' => $this->integer(),
            'updated_at' => $this->timestamp(),
            'last_login' => $this->timestamp(),
        ]);

        $this->createIndex(
            'idx-booking-company_id',
            'booking',
            'company_id'
        );

        $this->createIndex(
            'idx-booking-period_id',
            'booking',
            'period_id'
        );

        $this->createIndex(
            'idx-booking-target_id',
            'booking',
            'target_id'
        );

        $this->createIndex(
            'idx-booking-source_id',
            'booking',
            'source_id'
        );

        $this->addForeignKey(
            'fk-booking-company_id',
            'booking',
            'company_id',
            'company',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-booking-period_id',
            'booking',
            'period_id',
            'period',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-booking-target_id',
            'booking',
            'target_id',
            'slot',
            'id',
            'CASCADE'
        );

        // I am not allergic to the vaccine, eggs or feathers, Neomycin, Polymyxin or Gentamycin
        // I do not have a fever or severe illness- temperature over 37.5 oC at this time
        // I do not have a history of Guillain-Barre Syndrome
        // Have you ever had the influenza vaccine before? (Please mark /)


        // Soreness, redness and swelling at the injection site
        // Fever , malaise and myalgia occur infrequently
        // No common reapctions



        $this->createTable('booking_meta', [
            'id' => $this->primaryKey(),
            'booking_id' => $this->integer()->notNull(),
            'meta_key' => $this->string(), //allergic_egg, fever, Guillain-Barre syndrome, had the influenza vaccine before
            'meta_value' => $this->text(),
        ]);

        $this->createIndex(
            'idx-booking_meta-booking_id',
            'booking_meta',
            'booking_id'
        );

        $this->createIndex(
            'idx-booking_meta-meta_key',
            'booking_meta',
            'meta_key'
        );

        $this->createIndex(
            'idx_unique-booking_meta-booking_id',
            'booking_meta',
            ['booking_id', 'meta_key'],
            true
        );

        $this->addForeignKey(
            'fk-booking_meta-booking_id',
            'booking_meta',
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
    }
}
