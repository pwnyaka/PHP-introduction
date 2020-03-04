<h2>My gallery</h2>
<div class="wrapper">
    <?php foreach ($images as $item): ?>
    <div class="img-wrapper">
      <a target="_blank" href="/?page=fullsize&id=<?= $item["id"] ?>"><img class="img-mini" src="img/<?= $item["name"] ?>" alt="alt img"></a>
      <span><i class="fa fa-eye"></i> <?=$item['views']?></span>
    </div>
    <?php endforeach; ?>
</div>
<form method="post" enctype="multipart/form-data">
    <h5>Загрузите свои изображения</h5>
    <input type="file" name="myfile[]" multiple>
    <input type="submit" class="button" name="send">
  <?php if ($error): ?>
  <p><?=$error?></p>
  <?php endif; ?>
</form>