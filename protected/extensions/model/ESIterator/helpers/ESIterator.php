<?php

class ESIteratorException extends CException{
	public function __construct($message = null) {
		parent::__construct($message);
	}
}
/**
 * @author Edward Stock <edward.vstock@gmail.com>
 * @copyright (c) 2013, RED STAR design <http://redstardesign.ru>
 */
class ESIterator {
	
	/**
	 * Линия начального (первого) уровня пункта
	 * @var string $starLine
	 */
	public static $startLine = ' | ';
	
	/**
	 * Линия остальных пунктов
	 * @static string $continousLine
	 */
	public static $continousLine = ' -- ';
	
	/**
	 * Выходной массив
	 * @var array $out
	 */
	protected static $_out = array();
	
	/**
	 * Входной массив
	 * @var array $levels
	 */
	protected static $_levels = array();
	
	/**
	 * Временный массив для пунктов меню
	 * @var array $menu
	 */
	protected static $_menu = array();
	
	/**
	 * Берем крайний уровень, от него будет двигаться
	 * @param string $tableName название таблицы
	 * @return integer максмимальный существующий уровень пункта
	 */
	protected static function getMaxLevel($tableName){
		$sql = "SELECT MAX(level) FROM $tableName";
		return (int) Yii::app()->db->createCommand($sql)->queryScalar();
	}	
	
	/**
	 * Готовим наши массивы для заполнения, создаем уровни
	 * @param string $className
	 * @param array $params массив параметров.
	 * @throws ESIteratorException
	 */
	protected static function prepareData($className,$params = array()){
		$criteria = new CDbCriteria();
		
		if(isset($params['order']))		
			$criteria->order = $params['order'].' ASC';
		else
			$criteria->order = 'id ASC';
		
		
		if(isset($params['sql']))
			$data = $className::model()->findBySql($params['sql']);
		else
			$data = $className::model()->findAll($criteria);
		
		$tableName = $className::model()->tableName(); 
		if(!isset($data[0]->level))
			throw new ESIteratorException("В таблице $tableName класса $className не обнаружено поле 'level'");
		elseif($data === null)
			return null;
		
		$count = self::getMaxLevel($tableName);
		
		for($in = 0,$cn = 1; $in <= $count; $in++,$cn++)
			foreach($data AS $value)
				if($value->level == $in)
					self::$_levels[$cn][] = $value; 	
	}
	
	/**
	 * Рекурсивно обходит массив и заполняет его
	 * @param array $levels массив с уровнями
	 * @param integer $i счетчик
	 * @param integer $index идентификатор пердыдущего пункта меню
	 * @return void
	 */
	protected static function recursiveIterateLevels($levels,$i,$index){
		if(!isset($levels[$i])) return;
		foreach($levels[$i] AS $item){
			if($item->parent_id == $index){
				self::$_out[$item->id] = self::drawLines($i).$item->title;
				self::recursiveIterateLevels($levels, $i+1, $item->id);
			}
		}
	}
	
	/**
	 * Выводит линии в зависимости от уровня. 1й уровень - <code>static $startLine</code>
	 * 2ой уровень - <code>static $continousLine</code>
	 * @param integer $i количество итераций
	 * @return string Нарисованные линии. Например:
	 * <pre>| Главная</pre>
	 * <pre>| -- Подпункт</pre>
	 * <pre>| -- -- Подпункт подпункта</pre>
	 * <br>
	 * Для указания своих линий, использовать: 
	 * <code>ESIterator::$startLine = 'корневой пункт'</code> и
	 * <code>ESIterator::$continousLine = 'все остальные пункты'</code> соответственно
	 */
	protected static function drawLines($i)
	{
                if($i == 1)
			return self::$startLine;
		
                $outString='';
		$outString .= self::$startLine;
		for($q = 1;$q < $i; $q++){
			$outString .= self::$continousLine;
		}
		
		return $outString;
	}
	
	
	/**
	 * Генерируем многоуровнеый отсортированный массив.
	 * Применимо как для всяких категорий так и для пунктов меню.
	 * Главное требование - таблица должна иметь 3 обязательных поля:
	 * <code>int parent_id, int level, string title</code>
	 * 
	 * Можно смело использовать вместо <code>CHtml::listData(Class::model()->findAll(),'id','title')</code>
	 * @param string $className Имя класса AR.
	 * @return array <code>id=>title</code>
	 * @throws ESIteratorException если поле 'level' отсутствует в таблице, то метод выбросит 
	 * исключение
	 */
	public static function getLevels($className){
		
		self::prepareData($className);	

		$i = 1;
		foreach(self::$_levels[$i] AS $item){			
			self::$_out[$item->id] = self::drawLines($i).$item->title;
			self::recursiveIterateLevels(self::$_levels, $i+1, $item->id);
		}
		return self::$_out;
	}
	
	
	/**
	 * Итерирует пункты меню для CGridView через итератор CArrayDataProvider.
	 * Использовать в CArrayDataProvider, так так метод возвращает массив
	 * @param string $className имя класса CActiveRecord
	 * @return array
	 */
	public static function getForDataProvider($className){
		self::prepareData($className);
		
		$i = 1;
		
		foreach(self::$_levels[$i] AS $item){
			(isset($item->title))? $item->title = self::drawLines($i).$item->title : false;
			self::$_out[] = $item;			
			self::recursiveDataIterator(self::$_levels,$i+1,$item->id);
		}
		
		return self::$_out;
	}
	
	protected static function recursiveDataIterator($levels,$i,$index){
		if(!isset($levels[$i])) return;
		
		foreach($levels[$i] AS $item){
			if($item->parent_id == $index){
				(isset($item->title))? $item->title = self::drawLines($i).$item->title : false;
				self::$_out[] = $item;
				self::recursiveDataIterator($levels, $i+1, $item->id);
			}
		}
	}
	
	/**
	 * Устанавливает новый уровень в соответствии с родителем
	 * @param object $model Указатель текущего класса {$this}
	 * @return integer
	 */
	public static function setNewLevel($model){
		$level = 0;
		
		$model->parent_id = (int) $model->parent_id;
		
		if(empty($model->parent_id))
			$model->parent_id = 0;
		$sql = "SELECT level FROM {$model->tableName()} WHERE id = $model->parent_id";
		$result = (int) Yii::app()->db->createCommand($sql)->setFetchMode(PDO::FETCH_OBJ)->queryScalar();
		
		if($model->parent_id !== 0)
			$level = $result + 1;
		
 		return $level;
	}
	
	
	

	
	public static function getForMenu($className){
		//готовим массивы для обработки
		self::prepareData($className,array('order'=>'position'));
		//обрабатываем данные	
		self::iterateForMenu(1, null);
		/*
		 * Так как метод выше заполняет массив в виде $id=>$data array
		 * нам нужно пересобрать его в вид int 0,1,2,N...=>$data array
		 * Дабы
		 */
		
		
		foreach(self::$_menu AS $value):
			self::$_out[] = $value;
		endforeach;
		
		
		
		return self::$_out;
	}
	
	/**
	 * Проводим хирургическую операцию по рекурсивной отдаче
	 * см. комментарии по ходу кода
	 * @param type $i level
	 * @param type $index parent_id
	 * @return array
	 */
	protected static function iterateForMenu($i,$index){
		if(!isset(self::$_levels[$i])) return array();
		
		//вешаем счетчик
		$cnt = 0;		
		
		//мы вызвали метод НЕ из цикла, поэтому parent_id у нас будет NULL
		//соответственно мы только начинаем заполнять массив
		if($index === null){
			foreach(self::$_levels[$i] AS $item){
				$visible = ($item->published == '1') ? true : false;
				$alias = '#';
					if($item->alias !== '#')
						$alias = Yii::app()->createUrl('controller/action',array(
							'alias'=>$item->alias));
					
				self::$_menu[$item->id] = array(
					'label'=>$item->title,
					'url'=>$alias,
					'visible'=>$visible,
					'htmlOptions'=>array('class'=>'topnav'),
					//тут метод вызывает сам себя, но только уже с переданным parent_id
					//соответственно сюда мы уже не попадем, а пойдем нише в ELSE
					'items'=>self::iterateForMenu($i+1,$item->id)

				);
				
			}
		}else{
			foreach(self::$_levels[$i] AS $item){
				if($item->parent_id == $index){
					$visible = ($item->published == '1') ? true : false;
					//создаем динамически массивы
					$alias = '#';
					if($item->alias !== '#')
						$alias = Yii::app()->createUrl('controller/action',array(
							'alias'=>$item->alias));
					
					$arr[] = array(
						'label'=>$item->title,
						'url'=>$alias,
						'visible'=>$visible,
						'htmlOptions'=>array('class'=>'subnav'),
						//опять вызываем себя, с parent_id,и сюда же вернемся
						'items'=>self::iterateForMenu($i+1,$item->id));
					
					$cnt++;
					
					//если наш счетчик достиг края объекта, то мы наконец вернем
					//форматированный массив в предыдущий пункт меню
					if($cnt == count(self::$_levels[$i]))
						return $arr;
					//если мы не у края, то продолжим заполнять
					else					
						continue;
				}else			
					return array();

			}
		}
	}
	
//	public function __destruct() {
//		unset(self::$_levels,self::$_menu,self::$_out);
//	} 
}