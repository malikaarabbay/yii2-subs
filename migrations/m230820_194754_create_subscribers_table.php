<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscribers}}`.
 */
class m230820_194754_create_subscribers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscribers}}', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull()->comment('Событие'),
            'email' => $this->string()->notNull()->comment('Получатель'),
            'is_blocked' => $this->smallInteger(1)->defaultValue(0)->comment('Заблокирован'),
            'created_at' => $this->integer()->notNull()->comment('Дата создания'),
            'updated_at' => $this->integer()->notNull()->comment('Дата изменения'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subscribers}}');
    }
}
