<h2>Подробности заказа ID=<?= $_GET["id"] ?></h2>
<?php foreach ($basket as $item): ?>
  <div class="order_details__product">
    <p>Product: <span><?= $item['prodName'] ?></span></p>
    <p>Quantity: <span><?=$item['quantity']?></span></p>
  </div>
<?php endforeach; ?>
<p>Сумма заказа: <span><?=$sum?></span></p>
