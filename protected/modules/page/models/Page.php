<?php

/**
 * This is the model class for table "tbl_page".
 *
 * The followings are the available columns in table 'tbl_page':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $keywords
 * @property string $description
 * @property integer $status
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Page extends CActiveRecord
{
    const PUBLISHED = 2;
    const DRAFT = 1;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('title, content, keywords, description, user_id, created_at, updated_at', 'required'),
			array('title, slug, content, keywords, description, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title, slug', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, slug, content, keywords, description, user', 'safe', 'on'=>'search'),
                        array('slug', 'unique'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'slug' => 'Slug',
			'content' => 'Content',
			'keywords' => 'Keywords',
			'description' => 'Description',
			'status' => 'Status',
			'user' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
                
                $criteria->with = array('user');

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		//$criteria->compare('content',$this->content,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('description',$this->description,true);
                $criteria->compare('status',$this->status,true);
		$criteria->compare('username',$this->user,true);
                
                $sort = new CSort();
                $sort->attributes = array(
                    'user'=>array(
                        'asc'=>'username',
                        'desc'=>'username DESC',
                    ),
                    '*',
                );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'sort'=>$sort,
                    
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeValidate() 
        {
            $this->user_id = Yii::app()->user->id;
            $now = time();
            if($this->isNewRecord)
            {
                $this->created_at = $now;
                $this->updated_at = $now;
            }
            else
            {
                $this->updated_at = $now;
            }
            
            return parent::beforeValidate();
        }
        
        public function scopes() {
            return array(
                'published'=>array(
                    'condition'=>'status='.self::PUBLISHED,
                ),
                'draft'=>array(
                    'condition'=>'status='.self::DRAFT,
                ),
            );
        }
        
        public function getUrl()
        {
            return Yii::app()->createAbsoluteUrl('page', array('slug' => $this->slug));
        }
        
        public function getStatusList()
        {
            return array(
                '1'=>'draft',
                '2'=>'published',
            );
        }
}
