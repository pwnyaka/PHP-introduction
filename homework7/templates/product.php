<div class="product-wrapper">
  <img class="product-img" src="/img/<?=$product["imgName"] ?>" alt="">
  <p class="product-name"><?=$product["prodName"] ?></p>
  <p class="product-desc"><?=$product["description"] ?></p>
  <div class="wrapper1">
    <p class="views"><i class="fa fa-eye"></i>   <?=$product["views"]?></p>
    <p class="views"><b>Цена: </b><?=$product["cost"]?> руб.</p>
  </div>

  <button class="buy-btn">КУПИТЬ</button>
</div>
