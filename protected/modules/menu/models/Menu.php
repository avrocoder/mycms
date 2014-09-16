<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $description
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property MenuItem[] $menuItems
 */
class Menu extends BaseBackendModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, name, description, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title, name, description', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, name, description, status', 'safe', 'on'=>'search'),
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
			'menuItems' => array(self::HAS_MANY, 'MenuItem', 'menu_id'),
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
			'name' => 'Name',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
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
	 * @return Menu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        private $result = array();
        
        public function getItems($name)
        {
            $model = new Menu;
        
            $criteria=new CDbCriteria();
            $criteria->select=array('id','link','title');
            $criteria->condition='parent_id is NULL AND menu.name=:name AND t.status=:status'; 
            $criteria->params=array(':name'=>$this->name,':status'=>$model::PUBLISHED);
            $criteria->with='menu';
            $itemsFirstLevel = MenuItem::model()->findAll($criteria);

            $i = 0;
            foreach ($itemsFirstLevel as $item)
            {
                $this->result[$i]['id']=$item->id;
                $this->result[$i]['title']=$item->title;
                $this->result[$i]['link']=$item->link;
                $this->subTree($item->id, $i);
                $i++;
            }
            
            return $this->result;
        }
        
        public function subTree($node_id, $id)
        {
            
            $criteria = new CDbCriteria();
            $criteria->condition='parent_id=:id AND t.status=:status';
            $criteria->params=array(':id'=>$node_id,':status'=>$this::PUBLISHED);
            $nodes = MenuItem::model()->findAll($criteria);
            if(count($nodes)==0) return $this->result;
            $i=0;
            foreach ($nodes as $node) {
                $this->result[$id]['items'][$i]['id']=$node->id;
                $this->result[$id]['items'][$i]['title'] = $node->title;
                $this->result[$id]['items'][$i]['link'] = $node->link;

                $criteria = new CDbCriteria();
                $criteria->condition='parent_id=:id AND t.status=:status';
                $criteria->params=array(':id'=>$node->id,':status'=>$this::PUBLISHED);
                $nodes = MenuItem::model()->findAll($criteria);
                if(count($nodes)==0) break;
                $j=0;
                foreach ($nodes as $node) {
                    $this->result[$id]['items'][$i]['items'][$j]['id']=$node->id;
                    $this->result[$id]['items'][$i]['items'][$j]['title'] = $node->title;
                    $this->result[$id]['items'][$i]['items'][$j]['link'] = $node->link;
                    $j++;
                }        

               $i++;     
            }

            return $this->result;
        }
}
