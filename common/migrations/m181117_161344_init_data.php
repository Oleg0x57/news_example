<?php

use yii\db\Migration;

/**
 * Class m181117_161344_init_data
 */
class m181117_161344_init_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \common\models\User();
        $user->username = 'login';
        $user->email = 'test@test.ru';
        $user->setPassword('password');
        $user->generateAuthKey();
        $user->save();

        $root1 = new \common\models\Category();
        $root1->title = 'Новостная лента 1';
        $root1->makeRoot();
        $root2 = new \common\models\Category();
        $root2->title = 'Новостная лента 2';
        $root2->makeRoot();

        $firstLevel1 = new \common\models\Category();
        $firstLevel1->title = 'Главные новости';
        $firstLevel1->appendTo($root1);

        $firstLevel2 = new \common\models\Category();
        $firstLevel2->title = 'Авто новости';
        $firstLevel2->appendTo($root1);

        $firstLevel3 = new \common\models\Category();
        $firstLevel3->title = 'Новости недвижимости';
        $firstLevel3->appendTo($root1);

        $firstLevel4 = new \common\models\Category();
        $firstLevel4->title = 'Шоу-бизнес';
        $firstLevel4->appendTo($root2);

        $firstLevel5 = new \common\models\Category();
        $firstLevel5->title = 'Афиша';
        $firstLevel5->appendTo($root2);

        $secondLevel1 = new \common\models\Category();
        $secondLevel1->title = 'Покупка';
        $secondLevel1->appendTo($firstLevel3);

        $secondLevel2 = new \common\models\Category();
        $secondLevel2->title = 'Продажа';
        $secondLevel2->appendTo($firstLevel3);

        $secondLevel3 = new \common\models\Category();
        $secondLevel3->title = 'Концерты';
        $secondLevel3->appendTo($firstLevel5);

        $secondLevel4 = new \common\models\Category();
        $secondLevel4->title = 'Театры';
        $secondLevel4->appendTo($firstLevel5);

        $newsMain1 = new \common\models\News();
        $newsMain1->title = 'Главная новость 1';
        $newsMain1->announcement = 'Анонс новости';
        $newsMain1->content = 'Подробный текст новости';
        $newsMain1->category_id = $firstLevel1->id;
        $newsMain1->save();
        $newsMain2 = new \common\models\News();
        $newsMain2->title = 'Главная новость 2';
        $newsMain2->announcement = 'Анонс новости';
        $newsMain2->content = 'Подробный текст новости';
        $newsMain2->category_id = $firstLevel1->id;
        $newsMain2->save();
        $newsMain3 = new \common\models\News();
        $newsMain3->title = 'Главная новость 3';
        $newsMain3->announcement = 'Анонс новости';
        $newsMain3->content = 'Подробный текст новости';
        $newsMain3->category_id = $firstLevel1->id;
        $newsMain3->save();
        $newsMain4 = new \common\models\News();
        $newsMain4->title = 'Главная новость 4';
        $newsMain4->announcement = 'Анонс новости';
        $newsMain4->content = 'Подробный текст новости';
        $newsMain4->category_id = $firstLevel1->id;
        $newsMain4->save();

        $newsAuto1 = new \common\models\News();
        $newsAuto1->title = 'Solaris';
        $newsAuto1->announcement = 'Анонс новости';
        $newsAuto1->content = 'Подробный текст новости';
        $newsAuto1->category_id = $firstLevel2->id;
        $newsAuto1->save();
        $newsAuto2 = new \common\models\News();
        $newsAuto2->title = 'Prado';
        $newsAuto2->announcement = 'Анонс новости';
        $newsAuto2->content = 'Подробный текст новости';
        $newsAuto2->category_id = $firstLevel2->id;
        $newsAuto2->save();
        $newsAuto3 = new \common\models\News();
        $newsAuto3->title = 'BMW';
        $newsAuto3->announcement = 'Анонс новости';
        $newsAuto3->content = 'Подробный текст новости';
        $newsAuto3->category_id = $firstLevel2->id;
        $newsAuto3->save();
        $newsAuto4 = new \common\models\News();
        $newsAuto4->title = 'UAZ';
        $newsAuto4->announcement = 'Анонс новости';
        $newsAuto4->content = 'Подробный текст новости';
        $newsAuto4->category_id = $firstLevel2->id;
        $newsAuto4->save();

        $homeNews1 = new \common\models\News();
        $homeNews1->title = 'Продам дом';
        $homeNews1->announcement = 'Анонс новости';
        $homeNews1->content = 'Подробный текст новости';
        $homeNews1->category_id = $secondLevel2->id;
        $homeNews1->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('user');
        $this->truncateTable('news');
        $this->truncateTable('category');

        return true;
    }
}
