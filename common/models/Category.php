<?php

namespace common\models;

use creocoder\nestedsets\NestedSetsBehavior;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property int $tree
 * @property int $lft
 * @property int $rgt
 * @property int $depth
 *
 * @property News[] $news
 */
class Category extends \yii\db\ActiveRecord
{
    public $parent_category_id;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_category_id', 'tree', 'lft', 'rgt', 'depth'], 'safe'],
            [['title'], 'required'],
            [['tree', 'lft', 'rgt', 'depth'], 'default', 'value' => null],
            [['tree', 'lft', 'rgt', 'depth'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'lft' => 'Lft',
            'tree' => 'Tree',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'parentCategory' => 'Родительская категория',
            'parent_category_id' => 'Родительская категория',
        ];
    }

    public function behaviors()
    {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
            ],
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['category_id' => 'id']);
    }

    public function getParentCategory()
    {
        return $this->parents(1)->one();
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }

    public static function getForDropdown()
    {
        return self::find()->select(['title', 'id'])->indexBy('id')->column();
    }
}
