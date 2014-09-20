<?php

/**
 * This is the model class for table "{{menu_item}}".
 *
 * The followings are the available columns in table '{{menu_item}}':
 * @property integer $id
 * @property integer $menu_id
 * @property integer $parent_id
 * @property string $title
 * @property string $link
 * @property integer $isInternalRoute
 * @property integer $level
 * @property integer $order
 * @property string $description
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property MenuItem $parent
 * @property MenuItem[] $menuItems
 * @property Menu $menu
 */
class MenuItem extends BaseBackendModel
{
        public $order=100;
        public $isInternalRoute=1;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{menu_item}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('menu_id, title, link, order, status', 'required'),
			array('menu_id, parent_id, isInternalRoute, level, order, status', 'numerical', 'integerOnly'=>true),
			array('title, link, description', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, menu_id, parent_id, title, link, order, description, status', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'MenuItem', 'parent_id'),
			'child' => array(self::HAS_MANY, 'MenuItem', 'parent_id'),
			'menu' => array(self::BELONGS_TO, 'Menu', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'menu_id' => 'Menu',
			'parent_id' => 'Parent',
			'title' => 'Title',
			'link' => 'Link',
			'order' => 'Order',
			'description' => 'Description',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('menu_id',$this->menu_id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getParentTitle()
        {
            return ($this->parent_id !== null) ? $this->parent->title : '-';
        }
        
        public function beforeValidate() {
            ($this->parent_id == null) ? $this->level=0 : $this->level=$this->parent->level+1;
            return parent::beforeValidate();
        }
        
        
        /*Rerurns array in the format of the listData for CHtml::dropDown()
         * @param integer menu_id the id menu
         * @return listData for CHtml::dropDown()
         */
        public function getListData($menu_id=0)
        {
            Yii::import('application.modules.core.helpers.model.AdjacencyList');
            $params=array();
            if ($menu_id!=0)
            {
                $params=array(
                    'condition'=>'menu_id=:menu_id',
                    'params'=>array(':menu_id'=>$menu_id),
                );
            }
            $listData=AdjacencyList::getLevels('MenuItem', $params);
            return $listData;
        }
}
