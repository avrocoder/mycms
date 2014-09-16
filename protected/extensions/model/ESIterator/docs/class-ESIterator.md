<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="generator" content="ApiGen 2.8.0" />

	<title>Class ESIterator | ESIterator</title>

	<script type="text/javascript" src="resources/combined.js?2056212191"></script>
	<script type="text/javascript" src="elementlist.js?4127875162"></script>
	<link rel="stylesheet" type="text/css" media="all" href="resources/style.css?3505392360" />

</head>

<body>
<div id="left">
	<div id="menu">
		<a href="readme.md" title="Overview"><span>Overview</span></a>


		<div id="groups">
		</div>



		<div id="elements">
			<h3>Classes</h3>
			<ul>
				<li class="active"><a href="class-ESIterator.md">ESIterator</a></li>
				<li><a href="class-ESIteratorException.md">ESIteratorException</a></li>
			</ul>





		</div>
	</div>
</div>

<div id="splitter"></div>

<div id="right">
<div id="rightInner">
	<form id="search">
		<input type="hidden" name="cx" value="" />
		<input type="hidden" name="ie" value="UTF-8" />
		<input type="text" name="q" class="text" />
		<input type="submit" value="Search" />
	</form>

	<div id="navigation">
		<ul>
			<li>
				<a href="readme.md" title="Overview"><span>Overview</span></a>
			</li>
			<li class="active">
<span>Class</span>			</li>
		</ul>
		<ul>
			<li>
				<a href="tree.md" title="Tree view of classes, interfaces, traits and exceptions"><span>Tree</span></a>
			</li>
		</ul>
		<ul>
		</ul>
	</div>

<div id="content" class="class">
	<h1>Class ESIterator</h1>











	<div class="info">
		
		
		
		

				<b>Copyright:</b>
				(c) 2013, RED STAR design<br />
				<b>Author:</b>
				Edward Stock &lt;<a
href="mailto:edward.vstock&#64;gmail.com">edward.vstock&#64;<!---->gmail.com</a>&gt;<br />
		<b>Located at</b> <a href="source-class-ESIterator.md#8-307" title="Go to source code">helpers/ESIterator.php</a><br />
	</div>



	<table class="summary" id="methods">
	<caption>Methods summary</caption>
	<tr data-order="getLevels" id="_getLevels">

		<td class="attributes"><code>
			 public static
			array
			
			</code>
		</td>

		<td class="name"><div>
		<a class="anchor" href="#_getLevels">#</a>
		<code><a href="source-class-ESIterator.md#131-153" title="Go to source code">getLevels</a>( <span>string <var>$className</var></span> )</code>

		<div class="description short">
			
<p>Генерируем многоуровнеый
отсортированный массив. Применимо как для
всяких категорий так и для пунктов меню.
Главное требование - таблица должна иметь 3
обязательных поля: <code>int parent_id, int level, string
title</code></p>

		</div>

		<div class="description detailed hidden">
			
<p>Генерируем многоуровнеый
отсортированный массив. Применимо как для
всяких категорий так и для пунктов меню.
Главное требование - таблица должна иметь 3
обязательных поля: <code>int parent_id, int level, string
title</code></p>

<p>Можно смело использовать вместо
<code>CHtml::listData(&lt;span
class="php-keyword1"&gt;Class&lt;/span&gt;::model()-&gt;findAll(),&lt;span
class="php-quote"&gt;'id'&lt;/span&gt;,&lt;span
class="php-quote"&gt;'title'&lt;/span&gt;)</code></p>



				<h4>Parameters</h4>
				<div class="list"><dl>
					<dt><var>$className</var></dt>
					<dd><code>string</code><br>$className Имя класса AR.</dd>
				</dl></div>

				<h4>Returns</h4>
				<div class="list">
					<code>array</code><br><code>id=&gt;title</code><br />
				</div>

				<h4>Throws</h4>
				<div class="list">
					<code><code><a href="class-ESIteratorException.md">ESIteratorException</a></code></code><br>если поле 'level' отсутствует в таблице, то
метод выбросит исключение<br />
				</div>



		</div>
		</div></td>
	</tr>
	<tr data-order="getForDataProvider" id="_getForDataProvider">

		<td class="attributes"><code>
			 public static
			array
			
			</code>
		</td>

		<td class="name"><div>
		<a class="anchor" href="#_getForDataProvider">#</a>
		<code><a href="source-class-ESIterator.md#156-174" title="Go to source code">getForDataProvider</a>( <span>string <var>$className</var></span> )</code>

		<div class="description short">
			
<p>Итерирует пункты меню для CGridView через
итератор CArrayDataProvider. Использовать в
CArrayDataProvider, так так метод возвращает
массив</p>

		</div>

		<div class="description detailed hidden">
			
<p>Итерирует пункты меню для CGridView через
итератор CArrayDataProvider. Использовать в
CArrayDataProvider, так так метод возвращает
массив</p>



				<h4>Parameters</h4>
				<div class="list"><dl>
					<dt><var>$className</var></dt>
					<dd><code>string</code><br>$className имя класса CActiveRecord</dd>
				</dl></div>

				<h4>Returns</h4>
				<div class="list">
					<code>array</code><br />
				</div>




		</div>
		</div></td>
	</tr>
	<tr data-order="setNewLevel" id="_setNewLevel">

		<td class="attributes"><code>
			 public static
			integer
			
			</code>
		</td>

		<td class="name"><div>
		<a class="anchor" href="#_setNewLevel">#</a>
		<code><a href="source-class-ESIterator.md#189-208" title="Go to source code">setNewLevel</a>( <span>object <var>$model</var></span> )</code>

		<div class="description short">
			
<p>Устанавливает новый уровень в
соответствии с родителем</p>

		</div>

		<div class="description detailed hidden">
			
<p>Устанавливает новый уровень в
соответствии с родителем</p>



				<h4>Parameters</h4>
				<div class="list"><dl>
					<dt><var>$model</var></dt>
					<dd><code>object</code><br>$model Указатель текущего класса {$this}</dd>
				</dl></div>

				<h4>Returns</h4>
				<div class="list">
					<code>integer</code><br />
				</div>




		</div>
		</div></td>
	</tr>
	<tr data-order="getForMenu" id="_getForMenu">

		<td class="attributes"><code>
			 public static
			
			
			</code>
		</td>

		<td class="name"><div>
		<a class="anchor" href="#_getForMenu">#</a>
		<code><a href="source-class-ESIterator.md#214-233" title="Go to source code">getForMenu</a>( <span>mixed <var>$className</var></span> )</code>

		<div class="description short">
			
		</div>

		<div class="description detailed hidden">
			







		</div>
		</div></td>
	</tr>
	<tr data-order="__destruct" id="___destruct">

		<td class="attributes"><code>
			 public 
			
			
			</code>
		</td>

		<td class="name"><div>
		<a class="anchor" href="#___destruct">#</a>
		<code><a href="source-class-ESIterator.md#304-306" title="Go to source code">__destruct</a>( )</code>

		<div class="description short">
			
		</div>

		<div class="description detailed hidden">
			







		</div>
		</div></td>
	</tr>
	</table>












	<table class="summary" id="properties">
	<caption>Properties summary</caption>
	<tr data-order="startLine" id="$startLine">
		<td class="attributes"><code>
			public static 
			string
		</code></td>

		<td class="name">
				<a href="source-class-ESIterator.md#25-29" title="Go to source code"><var>$startLine</var></a>
		</td>
		<td class="value"><code><span class="php-quote">' | '</span></code></td>
		<td class="description"><div>
			<a href="#$startLine" class="anchor">#</a>

			<div class="description short">
				
<p>Линия начального (первого) уровня
пункта</p>

			</div>

			<div class="description detailed hidden">
				
<p>Линия начального (первого) уровня
пункта</p>


			</div>
		</div></td>
	</tr>
	<tr data-order="continousLine" id="$continousLine">
		<td class="attributes"><code>
			public static 
			string
		</code></td>

		<td class="name">
				<a href="source-class-ESIterator.md#31-35" title="Go to source code"><var>$continousLine</var></a>
		</td>
		<td class="value"><code><span class="php-quote">' -- '</span></code></td>
		<td class="description"><div>
			<a href="#$continousLine" class="anchor">#</a>

			<div class="description short">
				
<p>Линия остальных пунктов</p>

			</div>

			<div class="description detailed hidden">
				
<p>Линия остальных пунктов</p>


			</div>
		</div></td>
	</tr>
	</table>






</div>

	<div id="footer">
		ESIterator API documentation generated by <a href="http://apigen.org">ApiGen 2.8.0</a>
	</div>
</div>
</div>
</body>
</html>
