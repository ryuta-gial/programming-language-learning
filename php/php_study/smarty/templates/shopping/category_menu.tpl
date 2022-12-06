<div id="category">
<ul>
<li>
<a href="/test/kanri/smarty/shopping/list.php">全て</a>
</li>
{foreach from=$cateArr item=value}
<li>
<a href="/test/kanri/smarty/shopping/list.php?ctg_id={$value.ctg_id}">{$value.category_name}</a></li>
{/foreach}
<br/>
<li>
<form method="post" action="/test/kanri/smarty/shopping/list.php">
<input type="text" style="width:80px" value="" placeholder="検索" name="word" />
<input type="submit" name="wsend" value="検索"/>
</li>
</ul>
</div>
