<h2>Корзина</h2>
<div class="cart-wrapper">
  <div class="cart-product">
    <div class="cart-product-wrapper">
      <span>Наименование</span>
    </div>
    <div class="cart-description">
      Описание
    </div>
    <div class="cart-cost">Цена</div>
  </div>
    <?php foreach ($basket as $item):?>
  <div class="cart-product" id="<?=$item["basket_id"]?>">
    <div class="cart-product-wrapper">
      <img style="width: 200px;" src="img/<?=$item["imgName"]?>" alt="">
      <span><?=$item["prodName"]?></span>
    </div>
    <div class="cart-description"><?=$item["description"]?></div>
    <div class="cart-cost"><span class="product-sum" data-id="<?=$item["basket_id"]?>"><?=$item["cost"]*$item["quantity"]?></span> RUB Кол-во: <span class="quantity" data-id="<?=$item["basket_id"]?>"><?=$item["quantity"]?></span></div>
<!--   это шаблон и он не должен ничего считать, его дело отображать, cost*quantity использовал для начального отображения, при переходе на basket
  в целях экономии времени, а так надо через params передавать, а потом уже json ом получать асинхронно-->
    <button class="del-btn" data-id="<?=$item["basket_id"]?>">X</button>
  </div>
    <?php endforeach; ?>
  <span>ОБЩАЯ СТОИМОСТЬ (всего лишь) <span class="total-sum"><?=$basketSum?></span>  RUB</span>
  <hr>
  <p>Оформить заказ:</p>
  <form action="/basket/addorder/" method="post">
    <input required type="text" name="name" placeholder="Имя">
    <input required type="text" name="phone" placeholder="Телефон">
    <input type="submit" value="Оформить заказ">
  </form>
</div>
<script src="js/basket.js"></script>