<div class="orders-container">
    <?php foreach ($orders as $order): ?>
      <div class="order">
        <p>ID:<span><?= $order["id"] ?></span></p>
        <p>Name:<span><?= $order["name"] ?></span></p>
        <p>Phone:<span><?= $order["phone"] ?></span></p>
        <p>Login:<span><?= $order["login"]? $order["login"] : 'Не зарегистрирован'?></span></p>
        <p>Status: <span><?=$order['statusText']?></span></p>
        <a href="/detail/?id=<?=$order["id"]?>">Подробнее</a>
        <?php if ($order['status'] == 0):?>
        <button class="accept" data-id="<?=$order['id']?>">Принять заказ</button>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
</div>
<script src="/js/admin.js"></script>
