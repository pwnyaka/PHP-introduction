<h2>Мои заказы</h2>
<?php for ($i = 0; $i < count($userOrders); $i++): ?>
  <div class="order">
    <p>Заказ №<span><?= $i + 1 ?></span></p>
    <p>На имя:<span><?= $userOrders[$i]["name"] ?></span></p>
    <p>Телефон:<span><?= $userOrders[$i]["phone"] ?></span></p>
    <p>Статус заказа:<span><?= $userOrders[$i]['statusText'] ?></span></p>
    <button class="detail-btn" data-id="<?= $userOrders[$i]["id"] ?>">Подробнее</button>
    <div class="user-details hidden" data-id="<?= $userOrders[$i]["id"] ?>">
      <ol>
          <?php foreach ($userOrdersDetails as $userOrderDetails): ?>
              <?php if ($userOrders[$i]["id"] == $userOrderDetails["id"]): ?>
              <li><p>Товар:<span><?= $userOrderDetails["prodName"] ?>, </span>  Количество:<span><?= $userOrderDetails["quantity"] ?>.</span></p></li>
              <?php endif; ?>
          <?php endforeach; ?>
      </ol>

    </div>
  </div>
<?php endfor; ?>
<script>
  let detailButtons = document.querySelectorAll('.detail-btn');
  detailButtons.forEach(function (elem) {
    elem.addEventListener('click', () => {
      let id = elem.getAttribute('data-id');
      document.querySelector(`.user-details[data-id="${id}"]`).classList.toggle('hidden');
    })
  })
</script>
