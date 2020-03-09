<h2>Car shop</h2>
<div class="wrapper">
    <?php foreach ($images as $item): ?>
    <div class="img-wrapper">
      <a class="img-link" target="_blank" href="/product/?id=<?= $item["id"] ?>"><img class="img-mini" src="img/<?= $item["imgName"] ?>" alt="alt img"></a>
      <span><a class="text-link" target="_blank" href="/product/?id=<?= $item["id"] ?>"><?=$item["prodName"]?></a></span>
      <span class="product-views"><i class="fa fa-eye"></i> <?=$item['views']?></span>
    </div>
    <?php endforeach; ?>
</div>
<form class="upload" method="post" enctype="multipart/form-data">
    <h5>TODO Блок добавления нового товара</h5>
    <input type="file" name="myfile[]" multiple>
    <input class="upload-button" type="submit"  name="send">
  <?php if ($error): ?>
  <p><?=$error?></p>
  <?php endif; ?>
</form>