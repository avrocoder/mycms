<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="generator" content="ApiGen 2.8.0" />
	<meta name="robots" content="noindex" />

	<title>File helpers/ESIterator.php | ESIterator</title>

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
				<li><a href="class-ESIterator.md">ESIterator</a></li>
				<li class="active"><a href="class-ESIteratorException.md">ESIteratorException</a></li>
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
			<li>
				<a href="class-ESIteratorException.md" title="Summary of ESIteratorException"><span>Class</span></a>
			</li>
		</ul>
		<ul>
			<li>
				<a href="tree.md" title="Tree view of classes, interfaces, traits and exceptions"><span>Tree</span></a>
			</li>
		</ul>
		<ul>
		</ul>
	</div>

<pre><code><span id="1" class="l"><a class="l" href="#1">  1: </a><span class="xlang">&lt;?php</span>
</span><span id="2" class="l"><a class="l" href="#2">  2: </a>
</span><span id="3" class="l"><a class="l" href="#3">  3: </a><span class="php-keyword1">class</span> <a id="ESIteratorException" href="#ESIteratorException">ESIteratorException</a> <span class="php-keyword1">extends</span> CException{
</span><span id="4" class="l"><a class="l" href="#4">  4: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">function</span> <a id="___construct" href="#___construct">__construct</a>(<span class="php-var">$message</span> = <span class="php-keyword1">null</span>) {
</span><span id="5" class="l"><a class="l" href="#5">  5: </a>        parent::__construct(<span class="php-var">$message</span>);
</span><span id="6" class="l"><a class="l" href="#6">  6: </a>    }
</span><span id="7" class="l"><a class="l" href="#7">  7: </a>}
</span><span id="8" class="l"><a class="l" href="#8">  8: </a><span class="php-comment">/**
</span></span><span id="9" class="l"><a class="l" href="#9">  9: </a><span class="php-comment"> * @author Edward Stock &lt;edward.vstock@gmail.com&gt;
</span></span><span id="10" class="l"><a class="l" href="#10"> 10: </a><span class="php-comment"> * @copyright (c) 2013, RED STAR design
</span></span><span id="11" class="l"><a class="l" href="#11"> 11: </a><span class="php-comment"> */</span>
</span><span id="12" class="l"><a class="l" href="#12"> 12: </a><span class="php-keyword1">class</span> <a id="ESIterator" href="#ESIterator">ESIterator</a> {
</span><span id="13" class="l"><a class="l" href="#13"> 13: </a>    <span class="php-comment">/**
</span></span><span id="14" class="l"><a class="l" href="#14"> 14: </a><span class="php-comment">     * Выходной массив
</span></span><span id="15" class="l"><a class="l" href="#15"> 15: </a><span class="php-comment">     * @var array $out
</span></span><span id="16" class="l"><a class="l" href="#16"> 16: </a><span class="php-comment">     */</span>
</span><span id="17" class="l"><a class="l" href="#17"> 17: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-var"><a id="$_out" href="#$_out">$_out</a></span> = <span class="php-keyword1">array</span>();
</span><span id="18" class="l"><a class="l" href="#18"> 18: </a>    
</span><span id="19" class="l"><a class="l" href="#19"> 19: </a>    <span class="php-comment">/**
</span></span><span id="20" class="l"><a class="l" href="#20"> 20: </a><span class="php-comment">     * Входной массив
</span></span><span id="21" class="l"><a class="l" href="#21"> 21: </a><span class="php-comment">     * @var array $levels
</span></span><span id="22" class="l"><a class="l" href="#22"> 22: </a><span class="php-comment">     */</span>
</span><span id="23" class="l"><a class="l" href="#23"> 23: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-var"><a id="$_levels" href="#$_levels">$_levels</a></span> = <span class="php-keyword1">array</span>();
</span><span id="24" class="l"><a class="l" href="#24"> 24: </a>    
</span><span id="25" class="l"><a class="l" href="#25"> 25: </a>    <span class="php-comment">/**
</span></span><span id="26" class="l"><a class="l" href="#26"> 26: </a><span class="php-comment">     * Линия начального (первого) уровня пункта
</span></span><span id="27" class="l"><a class="l" href="#27"> 27: </a><span class="php-comment">     * @var string $starLine
</span></span><span id="28" class="l"><a class="l" href="#28"> 28: </a><span class="php-comment">     */</span>
</span><span id="29" class="l"><a class="l" href="#29"> 29: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">static</span> <span class="php-var"><a id="$startLine" href="#$startLine">$startLine</a></span> = <span class="php-quote">' | '</span>;
</span><span id="30" class="l"><a class="l" href="#30"> 30: </a>    
</span><span id="31" class="l"><a class="l" href="#31"> 31: </a>    <span class="php-comment">/**
</span></span><span id="32" class="l"><a class="l" href="#32"> 32: </a><span class="php-comment">     * Линия остальных пунктов
</span></span><span id="33" class="l"><a class="l" href="#33"> 33: </a><span class="php-comment">     * @static string $continousLine
</span></span><span id="34" class="l"><a class="l" href="#34"> 34: </a><span class="php-comment">     */</span>
</span><span id="35" class="l"><a class="l" href="#35"> 35: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">static</span> <span class="php-var"><a id="$continousLine" href="#$continousLine">$continousLine</a></span> = <span class="php-quote">' -- '</span>;
</span><span id="36" class="l"><a class="l" href="#36"> 36: </a>    
</span><span id="37" class="l"><a class="l" href="#37"> 37: </a>    <span class="php-comment">/**
</span></span><span id="38" class="l"><a class="l" href="#38"> 38: </a><span class="php-comment">     * Временный массив для пунктов меню
</span></span><span id="39" class="l"><a class="l" href="#39"> 39: </a><span class="php-comment">     * @var array $menu
</span></span><span id="40" class="l"><a class="l" href="#40"> 40: </a><span class="php-comment">     */</span>
</span><span id="41" class="l"><a class="l" href="#41"> 41: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-var"><a id="$_menu" href="#$_menu">$_menu</a></span> = <span class="php-keyword1">array</span>();
</span><span id="42" class="l"><a class="l" href="#42"> 42: </a>    
</span><span id="43" class="l"><a class="l" href="#43"> 43: </a>    <span class="php-comment">/**
</span></span><span id="44" class="l"><a class="l" href="#44"> 44: </a><span class="php-comment">     * Берем крайний уровень, от него будет двигаться
</span></span><span id="45" class="l"><a class="l" href="#45"> 45: </a><span class="php-comment">     * @param string $tableName название таблицы
</span></span><span id="46" class="l"><a class="l" href="#46"> 46: </a><span class="php-comment">     * @return integer максмимальный существующий уровень пункта
</span></span><span id="47" class="l"><a class="l" href="#47"> 47: </a><span class="php-comment">     */</span>
</span><span id="48" class="l"><a class="l" href="#48"> 48: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_getMaxLevel" href="#_getMaxLevel">getMaxLevel</a>(<span class="php-var">$tableName</span>){
</span><span id="49" class="l"><a class="l" href="#49"> 49: </a>        <span class="php-var">$sql</span> = <span class="php-quote">&quot;SELECT MAX(level) FROM </span><span class="php-var">$tableName</span><span class="php-quote">&quot;</span>;
</span><span id="50" class="l"><a class="l" href="#50"> 50: </a>        <span class="php-keyword1">return</span> (int) Yii::app()-&gt;db-&gt;createCommand(<span class="php-var">$sql</span>)-&gt;queryScalar();
</span><span id="51" class="l"><a class="l" href="#51"> 51: </a>    }   
</span><span id="52" class="l"><a class="l" href="#52"> 52: </a>    
</span><span id="53" class="l"><a class="l" href="#53"> 53: </a>    <span class="php-comment">/**
</span></span><span id="54" class="l"><a class="l" href="#54"> 54: </a><span class="php-comment">     * Готовим наши массивы для заполнения, создаем уровни
</span></span><span id="55" class="l"><a class="l" href="#55"> 55: </a><span class="php-comment">     * @param string $className
</span></span><span id="56" class="l"><a class="l" href="#56"> 56: </a><span class="php-comment">     * @param array $params массив параметров.
</span></span><span id="57" class="l"><a class="l" href="#57"> 57: </a><span class="php-comment">     * @throws ESIteratorException
</span></span><span id="58" class="l"><a class="l" href="#58"> 58: </a><span class="php-comment">     */</span>
</span><span id="59" class="l"><a class="l" href="#59"> 59: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_prepareData" href="#_prepareData">prepareData</a>(<span class="php-var">$className</span>,<span class="php-var">$params</span> = <span class="php-keyword1">array</span>()){
</span><span id="60" class="l"><a class="l" href="#60"> 60: </a>        <span class="php-var">$criteria</span> = <span class="php-keyword1">new</span> CDbCriteria();
</span><span id="61" class="l"><a class="l" href="#61"> 61: </a>        
</span><span id="62" class="l"><a class="l" href="#62"> 62: </a>        <span class="php-keyword1">if</span>(<span class="php-keyword1">isset</span>(<span class="php-var">$params</span>[<span class="php-quote">'order'</span>]))     
</span><span id="63" class="l"><a class="l" href="#63"> 63: </a>            <span class="php-var">$criteria</span>-&gt;order = <span class="php-var">$params</span>[<span class="php-quote">'order'</span>].<span class="php-quote">' ASC'</span>;
</span><span id="64" class="l"><a class="l" href="#64"> 64: </a>        <span class="php-keyword1">else</span>
</span><span id="65" class="l"><a class="l" href="#65"> 65: </a>            <span class="php-var">$criteria</span>-&gt;order = <span class="php-quote">'id ASC'</span>;
</span><span id="66" class="l"><a class="l" href="#66"> 66: </a>        
</span><span id="67" class="l"><a class="l" href="#67"> 67: </a>        
</span><span id="68" class="l"><a class="l" href="#68"> 68: </a>        <span class="php-keyword1">if</span>(<span class="php-keyword1">isset</span>(<span class="php-var">$params</span>[<span class="php-quote">'sql'</span>]))
</span><span id="69" class="l"><a class="l" href="#69"> 69: </a>            <span class="php-var">$data</span> = <span class="php-var">$className</span>::model()-&gt;findBySql(<span class="php-var">$params</span>[<span class="php-quote">'sql'</span>]);
</span><span id="70" class="l"><a class="l" href="#70"> 70: </a>        <span class="php-keyword1">else</span>
</span><span id="71" class="l"><a class="l" href="#71"> 71: </a>            <span class="php-var">$data</span> = <span class="php-var">$className</span>::model()-&gt;findAll(<span class="php-var">$criteria</span>);
</span><span id="72" class="l"><a class="l" href="#72"> 72: </a>        
</span><span id="73" class="l"><a class="l" href="#73"> 73: </a>        <span class="php-var">$tableName</span> = <span class="php-var">$className</span>::model()-&gt;tableName(); 
</span><span id="74" class="l"><a class="l" href="#74"> 74: </a>        <span class="php-keyword1">if</span>(!<span class="php-keyword1">isset</span>(<span class="php-var">$data</span>[<span class="php-num">0</span>]-&gt;level))
</span><span id="75" class="l"><a class="l" href="#75"> 75: </a>            <span class="php-keyword1">throw</span> <span class="php-keyword1">new</span> ESIteratorException(<span class="php-quote">&quot;В таблице </span><span class="php-var">$tableName</span><span class="php-quote"> класса </span><span class="php-var">$className</span><span class="php-quote"> не обнаружено поле 'level'&quot;</span>);
</span><span id="76" class="l"><a class="l" href="#76"> 76: </a>        <span class="php-keyword1">elseif</span>(<span class="php-var">$data</span> === <span class="php-keyword1">null</span>)
</span><span id="77" class="l"><a class="l" href="#77"> 77: </a>            <span class="php-keyword1">return</span> <span class="php-keyword1">null</span>;
</span><span id="78" class="l"><a class="l" href="#78"> 78: </a>        
</span><span id="79" class="l"><a class="l" href="#79"> 79: </a>        <span class="php-var">$count</span> = self::getMaxLevel(<span class="php-var">$tableName</span>);
</span><span id="80" class="l"><a class="l" href="#80"> 80: </a>        
</span><span id="81" class="l"><a class="l" href="#81"> 81: </a>        <span class="php-keyword1">for</span>(<span class="php-var">$in</span> = <span class="php-num">0</span>,<span class="php-var">$cn</span> = <span class="php-num">1</span>; <span class="php-var">$in</span> &lt;= <span class="php-var">$count</span>; <span class="php-var">$in</span>++,<span class="php-var">$cn</span>++)
</span><span id="82" class="l"><a class="l" href="#82"> 82: </a>            <span class="php-keyword1">foreach</span>(<span class="php-var">$data</span> <span class="php-keyword1">AS</span> <span class="php-var">$value</span>)
</span><span id="83" class="l"><a class="l" href="#83"> 83: </a>                <span class="php-keyword1">if</span>(<span class="php-var">$value</span>-&gt;level == <span class="php-var">$in</span>)
</span><span id="84" class="l"><a class="l" href="#84"> 84: </a>                    self::<span class="php-var">$_levels</span>[<span class="php-var">$cn</span>][] = <span class="php-var">$value</span>;     
</span><span id="85" class="l"><a class="l" href="#85"> 85: </a>    }
</span><span id="86" class="l"><a class="l" href="#86"> 86: </a>    
</span><span id="87" class="l"><a class="l" href="#87"> 87: </a>    <span class="php-comment">/**
</span></span><span id="88" class="l"><a class="l" href="#88"> 88: </a><span class="php-comment">     * Рекурсивно обходит массив и заполняет его
</span></span><span id="89" class="l"><a class="l" href="#89"> 89: </a><span class="php-comment">     * @param array $levels массив с уровнями
</span></span><span id="90" class="l"><a class="l" href="#90"> 90: </a><span class="php-comment">     * @param integer $i счетчик
</span></span><span id="91" class="l"><a class="l" href="#91"> 91: </a><span class="php-comment">     * @param integer $index идентификатор пердыдущего пункта меню
</span></span><span id="92" class="l"><a class="l" href="#92"> 92: </a><span class="php-comment">     * @return void
</span></span><span id="93" class="l"><a class="l" href="#93"> 93: </a><span class="php-comment">     */</span>
</span><span id="94" class="l"><a class="l" href="#94"> 94: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_recursiveIterateLevels" href="#_recursiveIterateLevels">recursiveIterateLevels</a>(<span class="php-var">$levels</span>,<span class="php-var">$i</span>,<span class="php-var">$index</span>){
</span><span id="95" class="l"><a class="l" href="#95"> 95: </a>        <span class="php-keyword1">if</span>(!<span class="php-keyword2">is_array</span>(<span class="php-var">$levels</span>[<span class="php-var">$i</span>])) <span class="php-keyword1">return</span>;
</span><span id="96" class="l"><a class="l" href="#96"> 96: </a>        <span class="php-keyword1">foreach</span>(<span class="php-var">$levels</span>[<span class="php-var">$i</span>] <span class="php-keyword1">AS</span> <span class="php-var">$item</span>){
</span><span id="97" class="l"><a class="l" href="#97"> 97: </a>            <span class="php-keyword1">if</span>(<span class="php-var">$item</span>-&gt;parent_id == <span class="php-var">$index</span>){
</span><span id="98" class="l"><a class="l" href="#98"> 98: </a>                self::<span class="php-var">$_out</span>[<span class="php-var">$item</span>-&gt;id] = self::drawLines(<span class="php-var">$i</span>).<span class="php-var">$item</span>-&gt;title;
</span><span id="99" class="l"><a class="l" href="#99"> 99: </a>                self::recursiveIterateLevels(<span class="php-var">$levels</span>, <span class="php-var">$i</span>+<span class="php-num">1</span>, <span class="php-var">$item</span>-&gt;id);
</span><span id="100" class="l"><a class="l" href="#100">100: </a>            }
</span><span id="101" class="l"><a class="l" href="#101">101: </a>        }
</span><span id="102" class="l"><a class="l" href="#102">102: </a>    }
</span><span id="103" class="l"><a class="l" href="#103">103: </a>    
</span><span id="104" class="l"><a class="l" href="#104">104: </a>    <span class="php-comment">/**
</span></span><span id="105" class="l"><a class="l" href="#105">105: </a><span class="php-comment">     * Выводит линии в зависимости от уровня. 1й уровень - &lt;code&gt;static $startLine&lt;/code&gt;
</span></span><span id="106" class="l"><a class="l" href="#106">106: </a><span class="php-comment">     * 2ой уровень - &lt;code&gt;static $continousLine&lt;/code&gt;
</span></span><span id="107" class="l"><a class="l" href="#107">107: </a><span class="php-comment">     * @param integer $i количество итераций
</span></span><span id="108" class="l"><a class="l" href="#108">108: </a><span class="php-comment">     * @return string Нарисованные линии. Например:
</span></span><span id="109" class="l"><a class="l" href="#109">109: </a><span class="php-comment">     * &lt;pre&gt;| Главная&lt;/pre&gt;
</span></span><span id="110" class="l"><a class="l" href="#110">110: </a><span class="php-comment">     * &lt;pre&gt;| -- Подпункт&lt;/pre&gt;
</span></span><span id="111" class="l"><a class="l" href="#111">111: </a><span class="php-comment">     * &lt;pre&gt;| -- -- Подпункт подпункта&lt;/pre&gt;
</span></span><span id="112" class="l"><a class="l" href="#112">112: </a><span class="php-comment">     * &lt;br&gt;
</span></span><span id="113" class="l"><a class="l" href="#113">113: </a><span class="php-comment">     * Для указания своих линий, использовать: 
</span></span><span id="114" class="l"><a class="l" href="#114">114: </a><span class="php-comment">     * &lt;code&gt;ESIterator::$startLine = 'корневой пункт'&lt;/code&gt; и
</span></span><span id="115" class="l"><a class="l" href="#115">115: </a><span class="php-comment">     * &lt;code&gt;ESIterator::$continousLine = 'все остальные пункты'&lt;/code&gt; соответственно
</span></span><span id="116" class="l"><a class="l" href="#116">116: </a><span class="php-comment">     */</span>
</span><span id="117" class="l"><a class="l" href="#117">117: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_drawLines" href="#_drawLines">drawLines</a>(<span class="php-var">$i</span>)
</span><span id="118" class="l"><a class="l" href="#118">118: </a>    {
</span><span id="119" class="l"><a class="l" href="#119">119: </a>        <span class="php-keyword1">if</span>(<span class="php-var">$i</span> == <span class="php-num">1</span>)
</span><span id="120" class="l"><a class="l" href="#120">120: </a>            <span class="php-keyword1">return</span> self::<span class="php-var">$startLine</span>;
</span><span id="121" class="l"><a class="l" href="#121">121: </a>        
</span><span id="122" class="l"><a class="l" href="#122">122: </a>        <span class="php-var">$outString</span> .= self::<span class="php-var">$startLine</span>;
</span><span id="123" class="l"><a class="l" href="#123">123: </a>        <span class="php-keyword1">for</span>(<span class="php-var">$q</span> = <span class="php-num">1</span>;<span class="php-var">$q</span> &lt; <span class="php-var">$i</span>; <span class="php-var">$q</span>++){
</span><span id="124" class="l"><a class="l" href="#124">124: </a>            <span class="php-var">$outString</span> .= self::<span class="php-var">$continousLine</span>;
</span><span id="125" class="l"><a class="l" href="#125">125: </a>        }
</span><span id="126" class="l"><a class="l" href="#126">126: </a>        
</span><span id="127" class="l"><a class="l" href="#127">127: </a>        <span class="php-keyword1">return</span> <span class="php-var">$outString</span>;
</span><span id="128" class="l"><a class="l" href="#128">128: </a>    }
</span><span id="129" class="l"><a class="l" href="#129">129: </a>    
</span><span id="130" class="l"><a class="l" href="#130">130: </a>    
</span><span id="131" class="l"><a class="l" href="#131">131: </a>    <span class="php-comment">/**
</span></span><span id="132" class="l"><a class="l" href="#132">132: </a><span class="php-comment">     * Генерируем многоуровнеый отсортированный массив.
</span></span><span id="133" class="l"><a class="l" href="#133">133: </a><span class="php-comment">     * Применимо как для всяких категорий так и для пунктов меню.
</span></span><span id="134" class="l"><a class="l" href="#134">134: </a><span class="php-comment">     * Главное требование - таблица должна иметь 3 обязательных поля:
</span></span><span id="135" class="l"><a class="l" href="#135">135: </a><span class="php-comment">     * &lt;code&gt;int parent_id, int level, string title&lt;/code&gt;
</span></span><span id="136" class="l"><a class="l" href="#136">136: </a><span class="php-comment">     * 
</span></span><span id="137" class="l"><a class="l" href="#137">137: </a><span class="php-comment">     * Можно смело использовать вместо &lt;code&gt;CHtml::listData(Class::model()-&gt;findAll(),'id','title')&lt;/code&gt;
</span></span><span id="138" class="l"><a class="l" href="#138">138: </a><span class="php-comment">     * @param string $className Имя класса AR.
</span></span><span id="139" class="l"><a class="l" href="#139">139: </a><span class="php-comment">     * @return array &lt;code&gt;id=&gt;title&lt;/code&gt;
</span></span><span id="140" class="l"><a class="l" href="#140">140: </a><span class="php-comment">     * @throws ESIteratorException если поле 'level' отсутствует в таблице, то метод выбросит 
</span></span><span id="141" class="l"><a class="l" href="#141">141: </a><span class="php-comment">     * исключение
</span></span><span id="142" class="l"><a class="l" href="#142">142: </a><span class="php-comment">     */</span>
</span><span id="143" class="l"><a class="l" href="#143">143: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_getLevels" href="#_getLevels">getLevels</a>(<span class="php-var">$className</span>){
</span><span id="144" class="l"><a class="l" href="#144">144: </a>        
</span><span id="145" class="l"><a class="l" href="#145">145: </a>        self::prepareData(<span class="php-var">$className</span>);  
</span><span id="146" class="l"><a class="l" href="#146">146: </a>
</span><span id="147" class="l"><a class="l" href="#147">147: </a>        <span class="php-var">$i</span> = <span class="php-num">1</span>;
</span><span id="148" class="l"><a class="l" href="#148">148: </a>        <span class="php-keyword1">foreach</span>(self::<span class="php-var">$_levels</span>[<span class="php-var">$i</span>] <span class="php-keyword1">AS</span> <span class="php-var">$item</span>){           
</span><span id="149" class="l"><a class="l" href="#149">149: </a>            self::<span class="php-var">$_out</span>[<span class="php-var">$item</span>-&gt;id] = self::drawLines(<span class="php-var">$i</span>).<span class="php-var">$item</span>-&gt;title;
</span><span id="150" class="l"><a class="l" href="#150">150: </a>            self::recursiveIterateLevels(self::<span class="php-var">$_levels</span>, <span class="php-var">$i</span>+<span class="php-num">1</span>, <span class="php-var">$item</span>-&gt;id);
</span><span id="151" class="l"><a class="l" href="#151">151: </a>        }
</span><span id="152" class="l"><a class="l" href="#152">152: </a>        <span class="php-keyword1">return</span> self::<span class="php-var">$_out</span>;
</span><span id="153" class="l"><a class="l" href="#153">153: </a>    }
</span><span id="154" class="l"><a class="l" href="#154">154: </a>    
</span><span id="155" class="l"><a class="l" href="#155">155: </a>    
</span><span id="156" class="l"><a class="l" href="#156">156: </a>    <span class="php-comment">/**
</span></span><span id="157" class="l"><a class="l" href="#157">157: </a><span class="php-comment">     * Итерирует пункты меню для CGridView через итератор CArrayDataProvider.
</span></span><span id="158" class="l"><a class="l" href="#158">158: </a><span class="php-comment">     * Использовать в CArrayDataProvider, так так метод возвращает массив
</span></span><span id="159" class="l"><a class="l" href="#159">159: </a><span class="php-comment">     * @param string $className имя класса CActiveRecord
</span></span><span id="160" class="l"><a class="l" href="#160">160: </a><span class="php-comment">     * @return array
</span></span><span id="161" class="l"><a class="l" href="#161">161: </a><span class="php-comment">     */</span>
</span><span id="162" class="l"><a class="l" href="#162">162: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_getForDataProvider" href="#_getForDataProvider">getForDataProvider</a>(<span class="php-var">$className</span>){
</span><span id="163" class="l"><a class="l" href="#163">163: </a>        self::prepareData(<span class="php-var">$className</span>);
</span><span id="164" class="l"><a class="l" href="#164">164: </a>        
</span><span id="165" class="l"><a class="l" href="#165">165: </a>        <span class="php-var">$i</span> = <span class="php-num">1</span>;
</span><span id="166" class="l"><a class="l" href="#166">166: </a>        
</span><span id="167" class="l"><a class="l" href="#167">167: </a>        <span class="php-keyword1">foreach</span>(self::<span class="php-var">$_levels</span>[<span class="php-var">$i</span>] <span class="php-keyword1">AS</span> <span class="php-var">$item</span>){
</span><span id="168" class="l"><a class="l" href="#168">168: </a>            (<span class="php-keyword1">isset</span>(<span class="php-var">$item</span>-&gt;title))? <span class="php-var">$item</span>-&gt;title = self::drawLines(<span class="php-var">$i</span>).<span class="php-var">$item</span>-&gt;title : <span class="php-keyword1">false</span>;
</span><span id="169" class="l"><a class="l" href="#169">169: </a>            self::<span class="php-var">$_out</span>[] = <span class="php-var">$item</span>;          
</span><span id="170" class="l"><a class="l" href="#170">170: </a>            self::recursiveDataIterator(self::<span class="php-var">$_levels</span>,<span class="php-var">$i</span>+<span class="php-num">1</span>,<span class="php-var">$item</span>-&gt;id);
</span><span id="171" class="l"><a class="l" href="#171">171: </a>        }
</span><span id="172" class="l"><a class="l" href="#172">172: </a>        
</span><span id="173" class="l"><a class="l" href="#173">173: </a>        <span class="php-keyword1">return</span> self::<span class="php-var">$_out</span>;
</span><span id="174" class="l"><a class="l" href="#174">174: </a>    }
</span><span id="175" class="l"><a class="l" href="#175">175: </a>    
</span><span id="176" class="l"><a class="l" href="#176">176: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_recursiveDataIterator" href="#_recursiveDataIterator">recursiveDataIterator</a>(<span class="php-var">$levels</span>,<span class="php-var">$i</span>,<span class="php-var">$index</span>){
</span><span id="177" class="l"><a class="l" href="#177">177: </a>        <span class="php-keyword1">if</span>(!<span class="php-keyword2">is_array</span>(<span class="php-var">$levels</span>[<span class="php-var">$i</span>])) <span class="php-keyword1">return</span>;
</span><span id="178" class="l"><a class="l" href="#178">178: </a>        <span class="php-comment">/* @var $item object CActiveRecord */</span>
</span><span id="179" class="l"><a class="l" href="#179">179: </a>        <span class="php-keyword1">foreach</span>(<span class="php-var">$levels</span>[<span class="php-var">$i</span>] <span class="php-keyword1">AS</span> <span class="php-var">$item</span>){
</span><span id="180" class="l"><a class="l" href="#180">180: </a>            <span class="php-keyword1">if</span>(<span class="php-var">$item</span>-&gt;parent_id == <span class="php-var">$index</span>){
</span><span id="181" class="l"><a class="l" href="#181">181: </a>                (<span class="php-keyword1">isset</span>(<span class="php-var">$item</span>-&gt;title))? <span class="php-var">$item</span>-&gt;title = self::drawLines(<span class="php-var">$i</span>).<span class="php-var">$item</span>-&gt;title : <span class="php-keyword1">false</span>;
</span><span id="182" class="l"><a class="l" href="#182">182: </a>                self::<span class="php-var">$_out</span>[] = <span class="php-var">$item</span>;
</span><span id="183" class="l"><a class="l" href="#183">183: </a>        
</span><span id="184" class="l"><a class="l" href="#184">184: </a>                self::recursiveDataIterator(<span class="php-var">$levels</span>, <span class="php-var">$i</span>+<span class="php-num">1</span>, <span class="php-var">$item</span>-&gt;id);
</span><span id="185" class="l"><a class="l" href="#185">185: </a>            }
</span><span id="186" class="l"><a class="l" href="#186">186: </a>        }
</span><span id="187" class="l"><a class="l" href="#187">187: </a>    }
</span><span id="188" class="l"><a class="l" href="#188">188: </a>    
</span><span id="189" class="l"><a class="l" href="#189">189: </a>    <span class="php-comment">/**
</span></span><span id="190" class="l"><a class="l" href="#190">190: </a><span class="php-comment">     * Устанавливает новый уровень в соответствии с родителем
</span></span><span id="191" class="l"><a class="l" href="#191">191: </a><span class="php-comment">     * @param object $model Указатель текущего класса {$this}
</span></span><span id="192" class="l"><a class="l" href="#192">192: </a><span class="php-comment">     * @return integer
</span></span><span id="193" class="l"><a class="l" href="#193">193: </a><span class="php-comment">     */</span>
</span><span id="194" class="l"><a class="l" href="#194">194: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_setNewLevel" href="#_setNewLevel">setNewLevel</a>(<span class="php-var">$model</span>){
</span><span id="195" class="l"><a class="l" href="#195">195: </a>        <span class="php-var">$level</span> = <span class="php-num">0</span>;
</span><span id="196" class="l"><a class="l" href="#196">196: </a>        
</span><span id="197" class="l"><a class="l" href="#197">197: </a>        <span class="php-var">$model</span>-&gt;parent_id = (int) <span class="php-var">$model</span>-&gt;parent_id;
</span><span id="198" class="l"><a class="l" href="#198">198: </a>        
</span><span id="199" class="l"><a class="l" href="#199">199: </a>        <span class="php-keyword1">if</span>(<span class="php-keyword1">empty</span>(<span class="php-var">$model</span>-&gt;parent_id))
</span><span id="200" class="l"><a class="l" href="#200">200: </a>            <span class="php-var">$model</span>-&gt;parent_id = <span class="php-num">0</span>;
</span><span id="201" class="l"><a class="l" href="#201">201: </a>        <span class="php-var">$sql</span> = <span class="php-quote">&quot;SELECT level FROM </span><span class="php-var">{$model-&gt;tableName()}</span><span class="php-quote"> WHERE id = </span><span class="php-var">$model</span><span class="php-quote">-&gt;parent_id&quot;</span>;
</span><span id="202" class="l"><a class="l" href="#202">202: </a>        <span class="php-var">$result</span> = (int) Yii::app()-&gt;db-&gt;createCommand(<span class="php-var">$sql</span>)-&gt;setFetchMode(PDO::FETCH_OBJ)-&gt;queryScalar();
</span><span id="203" class="l"><a class="l" href="#203">203: </a>        
</span><span id="204" class="l"><a class="l" href="#204">204: </a>        <span class="php-keyword1">if</span>(<span class="php-var">$model</span>-&gt;parent_id !== <span class="php-num">0</span>)
</span><span id="205" class="l"><a class="l" href="#205">205: </a>            <span class="php-var">$level</span> = <span class="php-var">$result</span> + <span class="php-num">1</span>;
</span><span id="206" class="l"><a class="l" href="#206">206: </a>        
</span><span id="207" class="l"><a class="l" href="#207">207: </a>        <span class="php-keyword1">return</span> <span class="php-var">$level</span>;
</span><span id="208" class="l"><a class="l" href="#208">208: </a>    }
</span><span id="209" class="l"><a class="l" href="#209">209: </a>    
</span><span id="210" class="l"><a class="l" href="#210">210: </a>    
</span><span id="211" class="l"><a class="l" href="#211">211: </a>    
</span><span id="212" class="l"><a class="l" href="#212">212: </a>
</span><span id="213" class="l"><a class="l" href="#213">213: </a>    
</span><span id="214" class="l"><a class="l" href="#214">214: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_getForMenu" href="#_getForMenu">getForMenu</a>(<span class="php-var">$className</span>){
</span><span id="215" class="l"><a class="l" href="#215">215: </a>        <span class="php-comment">//готовим массивы для обработки</span>
</span><span id="216" class="l"><a class="l" href="#216">216: </a>        self::prepareData(<span class="php-var">$className</span>,<span class="php-keyword1">array</span>(<span class="php-quote">'order'</span>=&gt;<span class="php-quote">'position'</span>));
</span><span id="217" class="l"><a class="l" href="#217">217: </a>        <span class="php-comment">//обрабатываем данные </span>
</span><span id="218" class="l"><a class="l" href="#218">218: </a>        self::iterateForMenu(<span class="php-num">1</span>, <span class="php-keyword1">null</span>);
</span><span id="219" class="l"><a class="l" href="#219">219: </a>        <span class="php-comment">/*
</span></span><span id="220" class="l"><a class="l" href="#220">220: </a><span class="php-comment">         * Так как метод выше заполняет массив в виде $id=&gt;$data array
</span></span><span id="221" class="l"><a class="l" href="#221">221: </a><span class="php-comment">         * нам нужно пересобрать его в вид int N...=&gt;$data array
</span></span><span id="222" class="l"><a class="l" href="#222">222: </a><span class="php-comment">         * Дабы
</span></span><span id="223" class="l"><a class="l" href="#223">223: </a><span class="php-comment">         */</span>
</span><span id="224" class="l"><a class="l" href="#224">224: </a>        
</span><span id="225" class="l"><a class="l" href="#225">225: </a>        
</span><span id="226" class="l"><a class="l" href="#226">226: </a>        <span class="php-keyword1">foreach</span>(self::<span class="php-var">$_menu</span> <span class="php-keyword1">AS</span> <span class="php-var">$value</span>):
</span><span id="227" class="l"><a class="l" href="#227">227: </a>            self::<span class="php-var">$_out</span>[] = <span class="php-var">$value</span>;
</span><span id="228" class="l"><a class="l" href="#228">228: </a>        <span class="php-keyword1">endforeach</span>;
</span><span id="229" class="l"><a class="l" href="#229">229: </a>        
</span><span id="230" class="l"><a class="l" href="#230">230: </a>        
</span><span id="231" class="l"><a class="l" href="#231">231: </a>        
</span><span id="232" class="l"><a class="l" href="#232">232: </a>        <span class="php-keyword1">return</span> self::<span class="php-var">$_out</span>;
</span><span id="233" class="l"><a class="l" href="#233">233: </a>    }
</span><span id="234" class="l"><a class="l" href="#234">234: </a>    
</span><span id="235" class="l"><a class="l" href="#235">235: </a>    <span class="php-comment">/**
</span></span><span id="236" class="l"><a class="l" href="#236">236: </a><span class="php-comment">     * Проводим хирургическую операцию по рекурсивной отдаче
</span></span><span id="237" class="l"><a class="l" href="#237">237: </a><span class="php-comment">     * см. комментарии по ходу кода
</span></span><span id="238" class="l"><a class="l" href="#238">238: </a><span class="php-comment">     * @param type $i level
</span></span><span id="239" class="l"><a class="l" href="#239">239: </a><span class="php-comment">     * @param type $index parent_id
</span></span><span id="240" class="l"><a class="l" href="#240">240: </a><span class="php-comment">     * @return array
</span></span><span id="241" class="l"><a class="l" href="#241">241: </a><span class="php-comment">     */</span>
</span><span id="242" class="l"><a class="l" href="#242">242: </a>    <span class="php-keyword1">private</span> <span class="php-keyword1">static</span> <span class="php-keyword1">function</span> <a id="_iterateForMenu" href="#_iterateForMenu">iterateForMenu</a>(<span class="php-var">$i</span>,<span class="php-var">$index</span>){
</span><span id="243" class="l"><a class="l" href="#243">243: </a>        <span class="php-keyword1">if</span>(!<span class="php-keyword2">is_array</span>(self::<span class="php-var">$_levels</span>[<span class="php-var">$i</span>])) <span class="php-keyword1">return</span> <span class="php-keyword1">array</span>();
</span><span id="244" class="l"><a class="l" href="#244">244: </a>        
</span><span id="245" class="l"><a class="l" href="#245">245: </a>        <span class="php-comment">//вешаем счетчик</span>
</span><span id="246" class="l"><a class="l" href="#246">246: </a>        <span class="php-var">$cnt</span> = <span class="php-num">0</span>;       
</span><span id="247" class="l"><a class="l" href="#247">247: </a>        
</span><span id="248" class="l"><a class="l" href="#248">248: </a>        <span class="php-comment">//мы вызвали метод НЕ из цикла, поэтому parent_id у нас будет NULL</span>
</span><span id="249" class="l"><a class="l" href="#249">249: </a>        <span class="php-comment">//соответственно мы только начинаем заполнять массив</span>
</span><span id="250" class="l"><a class="l" href="#250">250: </a>        <span class="php-keyword1">if</span>(<span class="php-var">$index</span> === <span class="php-keyword1">null</span>){
</span><span id="251" class="l"><a class="l" href="#251">251: </a>            <span class="php-keyword1">foreach</span>(self::<span class="php-var">$_levels</span>[<span class="php-var">$i</span>] <span class="php-keyword1">AS</span> <span class="php-var">$item</span>){
</span><span id="252" class="l"><a class="l" href="#252">252: </a>                <span class="php-var">$visible</span> = (<span class="php-var">$item</span>-&gt;published == <span class="php-quote">'1'</span>) ? <span class="php-keyword1">true</span> : <span class="php-keyword1">false</span>;
</span><span id="253" class="l"><a class="l" href="#253">253: </a>                <span class="php-var">$alias</span> = <span class="php-quote">'#'</span>;
</span><span id="254" class="l"><a class="l" href="#254">254: </a>                    <span class="php-keyword1">if</span>(<span class="php-var">$item</span>-&gt;alias !== <span class="php-quote">'#'</span>)
</span><span id="255" class="l"><a class="l" href="#255">255: </a>                        <span class="php-var">$alias</span> = Yii::app()-&gt;createUrl(<span class="php-quote">'content/router'</span>,<span class="php-keyword1">array</span>(
</span><span id="256" class="l"><a class="l" href="#256">256: </a>                            <span class="php-quote">'alias'</span>=&gt;<span class="php-var">$item</span>-&gt;alias));
</span><span id="257" class="l"><a class="l" href="#257">257: </a>                    
</span><span id="258" class="l"><a class="l" href="#258">258: </a>                self::<span class="php-var">$_menu</span>[<span class="php-var">$item</span>-&gt;id] = <span class="php-keyword1">array</span>(
</span><span id="259" class="l"><a class="l" href="#259">259: </a>                    <span class="php-quote">'label'</span>=&gt;<span class="php-var">$item</span>-&gt;title,
</span><span id="260" class="l"><a class="l" href="#260">260: </a>                    <span class="php-quote">'url'</span>=&gt;<span class="php-var">$alias</span>,
</span><span id="261" class="l"><a class="l" href="#261">261: </a>                    <span class="php-quote">'visible'</span>=&gt;<span class="php-var">$visible</span>,
</span><span id="262" class="l"><a class="l" href="#262">262: </a>                    <span class="php-quote">'htmlOptions'</span>=&gt;<span class="php-keyword1">array</span>(<span class="php-quote">'class'</span>=&gt;<span class="php-quote">'topnav'</span>),
</span><span id="263" class="l"><a class="l" href="#263">263: </a>                    <span class="php-comment">//тут метод вызывает сам себя, но только уже с переданным parent_id</span>
</span><span id="264" class="l"><a class="l" href="#264">264: </a>                    <span class="php-comment">//соответственно сюда мы уже не попадем, а пойдем нише в ELSE</span>
</span><span id="265" class="l"><a class="l" href="#265">265: </a>                    <span class="php-quote">'items'</span>=&gt;self::iterateForMenu(<span class="php-var">$i</span>+<span class="php-num">1</span>,<span class="php-var">$item</span>-&gt;id)
</span><span id="266" class="l"><a class="l" href="#266">266: </a>
</span><span id="267" class="l"><a class="l" href="#267">267: </a>                );
</span><span id="268" class="l"><a class="l" href="#268">268: </a>                
</span><span id="269" class="l"><a class="l" href="#269">269: </a>            }
</span><span id="270" class="l"><a class="l" href="#270">270: </a>        }<span class="php-keyword1">else</span>{
</span><span id="271" class="l"><a class="l" href="#271">271: </a>            <span class="php-keyword1">foreach</span>(self::<span class="php-var">$_levels</span>[<span class="php-var">$i</span>] <span class="php-keyword1">AS</span> <span class="php-var">$item</span>){
</span><span id="272" class="l"><a class="l" href="#272">272: </a>                <span class="php-keyword1">if</span>(<span class="php-var">$item</span>-&gt;parent_id == <span class="php-var">$index</span>){
</span><span id="273" class="l"><a class="l" href="#273">273: </a>                    <span class="php-var">$visible</span> = (<span class="php-var">$item</span>-&gt;published == <span class="php-quote">'1'</span>) ? <span class="php-keyword1">true</span> : <span class="php-keyword1">false</span>;
</span><span id="274" class="l"><a class="l" href="#274">274: </a>                    <span class="php-comment">//создаем динамически массивы</span>
</span><span id="275" class="l"><a class="l" href="#275">275: </a>                    <span class="php-var">$alias</span> = <span class="php-quote">'#'</span>;
</span><span id="276" class="l"><a class="l" href="#276">276: </a>                    <span class="php-keyword1">if</span>(<span class="php-var">$item</span>-&gt;alias !== <span class="php-quote">'#'</span>)
</span><span id="277" class="l"><a class="l" href="#277">277: </a>                        <span class="php-var">$alias</span> = Yii::app()-&gt;createUrl(<span class="php-quote">'content/router'</span>,<span class="php-keyword1">array</span>(
</span><span id="278" class="l"><a class="l" href="#278">278: </a>                            <span class="php-quote">'alias'</span>=&gt;<span class="php-var">$item</span>-&gt;alias));
</span><span id="279" class="l"><a class="l" href="#279">279: </a>                    
</span><span id="280" class="l"><a class="l" href="#280">280: </a>                    <span class="php-var">$arr</span>[] = <span class="php-keyword1">array</span>(
</span><span id="281" class="l"><a class="l" href="#281">281: </a>                        <span class="php-quote">'label'</span>=&gt;<span class="php-var">$item</span>-&gt;title,
</span><span id="282" class="l"><a class="l" href="#282">282: </a>                        <span class="php-quote">'url'</span>=&gt;<span class="php-var">$alias</span>,
</span><span id="283" class="l"><a class="l" href="#283">283: </a>                        <span class="php-quote">'visible'</span>=&gt;<span class="php-var">$visible</span>,
</span><span id="284" class="l"><a class="l" href="#284">284: </a>                        <span class="php-quote">'htmlOptions'</span>=&gt;<span class="php-keyword1">array</span>(<span class="php-quote">'class'</span>=&gt;<span class="php-quote">'subnav'</span>),
</span><span id="285" class="l"><a class="l" href="#285">285: </a>                        <span class="php-comment">//опять вызываем себя, с parent_id,и сюда же вернемся</span>
</span><span id="286" class="l"><a class="l" href="#286">286: </a>                        <span class="php-quote">'items'</span>=&gt;self::iterateForMenu(<span class="php-var">$i</span>+<span class="php-num">1</span>,<span class="php-var">$item</span>-&gt;id));
</span><span id="287" class="l"><a class="l" href="#287">287: </a>                    
</span><span id="288" class="l"><a class="l" href="#288">288: </a>                    <span class="php-var">$cnt</span>++;
</span><span id="289" class="l"><a class="l" href="#289">289: </a>                    
</span><span id="290" class="l"><a class="l" href="#290">290: </a>                    <span class="php-comment">//если наш счетчик достиг края объекта, то мы наконец вернем</span>
</span><span id="291" class="l"><a class="l" href="#291">291: </a>                    <span class="php-comment">//форматированный массив в предыдущий пункт меню</span>
</span><span id="292" class="l"><a class="l" href="#292">292: </a>                    <span class="php-keyword1">if</span>(<span class="php-var">$cnt</span> == <span class="php-keyword2">count</span>(self::<span class="php-var">$_levels</span>[<span class="php-var">$i</span>]))
</span><span id="293" class="l"><a class="l" href="#293">293: </a>                        <span class="php-keyword1">return</span> <span class="php-var">$arr</span>;
</span><span id="294" class="l"><a class="l" href="#294">294: </a>                    <span class="php-comment">//если мы не у края, то продолжим заполнять</span>
</span><span id="295" class="l"><a class="l" href="#295">295: </a>                    <span class="php-keyword1">else</span>                    
</span><span id="296" class="l"><a class="l" href="#296">296: </a>                        <span class="php-keyword1">continue</span>;
</span><span id="297" class="l"><a class="l" href="#297">297: </a>                }<span class="php-keyword1">else</span>           
</span><span id="298" class="l"><a class="l" href="#298">298: </a>                    <span class="php-keyword1">return</span> <span class="php-keyword1">array</span>();
</span><span id="299" class="l"><a class="l" href="#299">299: </a>
</span><span id="300" class="l"><a class="l" href="#300">300: </a>            }
</span><span id="301" class="l"><a class="l" href="#301">301: </a>        }
</span><span id="302" class="l"><a class="l" href="#302">302: </a>    }
</span><span id="303" class="l"><a class="l" href="#303">303: </a>    
</span><span id="304" class="l"><a class="l" href="#304">304: </a>    <span class="php-keyword1">public</span> <span class="php-keyword1">function</span> <a id="___destruct" href="#___destruct">__destruct</a>() {
</span><span id="305" class="l"><a class="l" href="#305">305: </a>        <span class="php-keyword1">unset</span>(self::<span class="php-var">$_levels</span>,self::<span class="php-var">$_menu</span>,self::<span class="php-var">$_out</span>);
</span><span id="306" class="l"><a class="l" href="#306">306: </a>    } 
</span><span id="307" class="l"><a class="l" href="#307">307: </a></span>}</code></pre>

	<div id="footer">
		ESIterator API documentation generated by <a href="http://apigen.org">ApiGen 2.8.0</a>
	</div>
</div>
</div>
</body>
</html>