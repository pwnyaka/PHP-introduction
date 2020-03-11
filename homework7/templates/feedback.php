<h2>Отзывы</h2>


<div class="feedback-wrapper">
    <?= $message ?>
  <form class="feedback-form" action="/feedback/<?=$action?>" method="post">
    <p>Оставьте отзыв</p>
    <input hidden type="text" name="id" value="<?=$editFeedback["id"]?>">
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$editFeedback["name"] ?? ""?>"><br>
    <textarea name="message" placeholder="Отзыв" cols="40" rows="5"><?=$editFeedback["feedback"] ?? ""?></textarea>
    <input class="upload-button feedback-button" type="submit" value="<?=$buttonText?>">
  </form>

    <? foreach ($feedback as $value): ?>

      <div class="feedback">
        <div class="author">
          <strong><?= $value['name'] ?>:</strong>
        </div>
        <div class="text">
          <p><?= $value['feedback'] ?></p>
        </div>
        <div class="admin-block">
          <a class="admin-edit" href="/feedback/edit/?id=<?= $value['id'] ?>" title="Редактировать"><i class="fa fa-pencil"></i></a>
          <a class="admin-delete" href="/feedback/delete/?id=<?= $value['id'] ?>" title="Удалить отзыв"><i class="fa fa-trash"></i></a>
        </div>
      </div>
      <hr>
    <? endforeach; ?>
</div>
