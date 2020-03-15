<? if (!$auth) : ?>

  <form method="post" action="/auth/login/">
    <input type='text' name='login' placeholder='Логин'>
    <input type='password' name='pass' placeholder='Пароль'>
    Save? <input type='checkbox' name='save'>
    <input type='submit' name='send'>
  </form>

<? else: ?>
  Добро пожаловать! <?= $user ?> <a href="/auth/logout/">Выход</a><br>
<? endif; ?>
<div class="menu-wrapper">
  <a class="menu-link" href="/">Главная</a>
  <a class="menu-link" href="/catalog">Каталог</a>
  <a class="menu-link" href="/feedback">Отзывы</a>
  <a class="menu-link" href="/basket">Корзина <span class="count"><?= $count ?></span></a>
  <a class="menu-link" href="/async-calc">Асинх. к-ор</a>
  <a class="menu-link" href="/calculator">Калькулятор</a>
  <?php if (is_auth() && !is_admin()):?>
  <a class="menu-link" href="/my-orders/">Мои заказы</a>
  <?php endif;?>
    <? if (is_admin()): ?>
      <a class="menu-link" href="/admin/">Заказы</a>
      <a class="menu-link" href="/users/">Пользователи</a>
    <? endif; ?>
</div>
