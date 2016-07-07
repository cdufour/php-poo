<?php

class Transform
{

}

$arr = [1,2,3];

$list = new Transform($arr);
echo $list->format();

/* affichera
<ul>
	<li>1</li>
	<li>2</li>
	<li>3</li>
</ul>
/*

?>