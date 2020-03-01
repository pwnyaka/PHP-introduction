<h2>My gallery</h2>
<div class="wrapper">
    <?php foreach ($images as $item): ?>
        <a target="_blank" href="img/<?= $item ?>"><img style="width: 100%; height: 100%; " src="img/<?= $item ?>" alt="alt img"></a>
    <?php endforeach; ?>
</div>
<form method="post" enctype="multipart/form-data">
    <h5>Загрузите свои изображения</h5>
    <input type="file" name="myfile[]" multiple>
    <input type="submit" class="button" name="send">
</form>