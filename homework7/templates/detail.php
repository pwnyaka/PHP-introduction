<h2>Подробности заказа ID=<?= $_GET["id"] ?></h2>
<?php foreach ($basket as $item): ?>
  <div class="order_details__product">
    <p>good_id: <span><?= $item['good_id'] ?></span></p>
    <p>quantity: <span><?=$item['quantity']?></span></p>
  </div>
<?php endforeach; ?>
