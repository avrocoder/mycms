<?php
Yii::import('application.extensions.model.ESIterator.helpers.ESIterator');
Yii::import('application.modules.core.helpers.request.CoreHttpRequest');

class AdjacencyList extends ESIterator {
	
	/**
	 * Готовим наши массивы для заполнения, создаем уровни
	 * @param string $className
	 * @param array $params массив параметров.
	 * @throws ESIteratorException
	 */
	protected static function prepareData($className,$params = array()){
		//clear static variable whicр contain old data
                self::clear();
            
		$criteria = new CDbCriteria();
		
		if(isset($params['menuName']))
                {
                    $criteria->with=array('menu');
			
                    $criteria->condition = 'menu.name=:menuName';
                    $criteria->params=array(':menuName'=>$params['menuName']);
                }
                
                if(isset($params['order']))		
			$criteria->order = $params['order'].' ASC';
		else
			$criteria->order = 't.id ASC';
		
                if(isset($params['condition']))
                {
                    $criteria->condition = $params['condition'];
                    if(isset($params['params']))
                    {
                        $criteria->params=$params['params'];
                    }
                }

                
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
		
	
	public static function getForMenu($className, $menuName='main-menu', $order='title'){
		//готовим массивы для обработки
		self::prepareData($className,array('menuName'=>$menuName, 'order'=>$order));
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
				$visible = ($item->status == Menu::PUBLISHED) ? true : false;
                                $url = '#';
					if($item->link !== '#')
                                        {
                                            if ($item->isInternalRoute)
                                                $url = CoreHttpRequest::parseUrl($item->link);
                                            else
                                                $url = $item->link;
                                        }
						
				self::$_menu[$item->id] = array(
					'label'=>$item->title,
					'url'=>$url,
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
					$visible = ($item->status == Menu::PUBLISHED) ? true : false;
					//создаем динамически массивы
                                        $url = '#';
                                        if($item->link !== '#')
                                        {
                                            if ($item->isInternalRoute)
                                                $url = CoreHttpRequest::parseUrl($item->link);
                                            else
                                                $url = $item->link;
                                        }

					
					$arr[] = array(
						'label'=>$item->title,
						'url'=>$url,
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
	public static function getLevels($className, $params=array()){
		self::prepareData($className, $params);	

		$i = 1;
		foreach(self::$_levels[$i] AS $item){			
			self::$_out[$item->id] = self::drawLines($i).$item->title;
			self::recursiveIterateLevels(self::$_levels, $i+1, $item->id);
		}
		
                return self::$_out;
	}
        
        private function clear()
        {
            self::$_levels='';
            self::$_menu='';
            self::$_out='';
        }
        
       

}