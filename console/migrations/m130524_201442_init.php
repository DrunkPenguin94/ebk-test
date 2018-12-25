<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'access_token'=> $this->string(32)->notNull(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%data}}', [
            'id' => $this->primaryKey(),
            'id_user'=>  $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'n' => $this->integer()->notNull(),
            'str' => $this->text()->notNull(),
            'result'=> $this->integer()->notNull(),

        ], $tableOptions);

        $this->createIndex(
            'data-id_user',
            'data',
            'id_user'
        );

        $this->addForeignKey(
            'fk-data-id_user',
            'data',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );

//        $this->insert("user",[
//
//        ]);
    }

    public function down()
    {
        $this->dropTable('{{%data}}');
        $this->dropTable('{{%user}}');
    }
}
