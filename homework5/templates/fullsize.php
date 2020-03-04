<?php
executeQuery("UPDATE pictures SET views = views + 1 WHERE id = {$picture['id']}");
?>
<img class="fullsize" src="img/<?=$picture["name"] ?>" alt="">
<p class="views">Количество просмотров: <?=$picture["views"]?></p>