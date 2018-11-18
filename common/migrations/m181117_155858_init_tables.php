<?php

use yii\db\Migration;

/**
 * Class m181117_155858_init_tables
 */
class m181117_155858_init_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'tree' => $this->integer(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'depth' => $this->integer()->notNull(),
        ]);
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'announcement' => $this->text(),
            'content' => $this->text(),
            'created' => $this->date()->defaultExpression('NOW()'),
            'category_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_news_category_id', 'news', 'category_id', 'category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
        $this->dropTable('category');

        return true;
    }
}
