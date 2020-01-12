<div class="modal">
  <div class="modal-dialog">
    <div class="modal-dialog__close"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/modal/close.svg" alt="Закрыть"></div>
    <h2 class="modal-title">Оставьте ваши контактные данные</h2>
    <div class="modal-content">
      <form action="mail.php" method="POST" id="modal-form" class="modal-form form">
        <input type="text" name="user_name" class="modal-form__input form__input" placeholder="Введите ваше имя">
        <input type="tel" name="user_tel" class="modal-form__input form__input__tel form__input" placeholder="Введите ваш номер">
        <input type="text"  name="user_text" class="modal-form__input form__input" placeholder="Введите ваше сообщение">
        <button type="submit" class="button modal-form__button form__button">Отправить</button>
      </form>
    </div>
  </div>
</div>
<div class="modalty">
  <div class="modalty-dialog">
    <div class="modalty-dialog__close"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/modal/close.svg" alt="Закрыть"></div>
    <h2 class="modalty-title">Благодарим за заявку!</h2>
    <p class="modalty-content">Если вы верно указали данные, то в скорем времени с вами свяжуться</p>
  </div>
</div>
<footer class="footer-section footer">
  <div class="container">
    <p id="back-top" class="back-top"> <a href="#top" class="back-top__link"><img class="back-top__image" src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/up-arrow.svg" alt="Вверх"></a></p>
    <?php wp_nav_menu( [
          'theme_location'  => 'footermenu',
          'container' => null,
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          'menu_class'      => 'footerbar-list navbar-list' , 
        ] ); ?>
    <div class="footer-block">
      <ul class="footer-list"><li class="footer-list__title"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/phone-call.svg" alt="" class="footer-list__icon">
      <p>Наши контакты</p></li>
        <li class="footer-list__item"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/customer-service.svg" alt="Оператор"
            class="footer-list__icon__sub">
          Екатерина</li>
          <?php wp_nav_menu( [
          'theme_location'  => 'footer-telmenu',
          'container' => null,
          'menu_class'      => 'footer-list__item', 
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          'walker' => new Footer_Tel_Walker()
          
        ] ); ?>
        <li class="footer-list__item"><a href="#"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/mail.svg" alt="Письмо"
              class="footer-list__icon__sub">watchforyou12@gmail.com</a></li>

      </ul>
      <ul class="footer-list"><li class="footer-list__title"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/clock.svg" alt="Часы" class="footer-list__icon"><p>График работы</p></li>
        
        <li class="footer-list__item"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/check-mark.svg" alt="Готово" class="footer-list__icon__sub">
          Пн - Вс </li>
        <li class="footer-list__item"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/check-mark.svg" alt="Готово" class="footer-list__icon__sub">
          С 9:00 до 23:00 </li>
        <li class="footer-list__item"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/footer/check-mark.svg" alt="Готово" class="footer-list__icon__sub">
          Без выходных </li>
      </ul>
      <form action="mail.php" method="POST" class="form footer-form">
        <h2 class="footer-form__title">Подпишитесь на нашу рассылку</h2>
        <input type="text" name="user_email" class="form-input footer-form__input" placeholder="Введите ваш e-mail">
        <button type="submit" class="button form-button footer-form__button">Подписаться</button>
      </form>
    </div>
    <ul class="footer-links">
      <?php wp_nav_menu( [
          'theme_location'  => 'footer-mediamenu',
          'container' => null,
          'menu_class'      => 'footer-links', 
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          'walker' => new Footer_Media_Walker()
          
        ] ); ?>
    </ul>
    <div class="footer-copyright">
      <p class="footer-copyright__item">Watch for You &copy; 2019</p>
      <a href="" class="footer-copyright__item">Сайт создал: Anton Nesterenko</a>
    </div>
  </div>
</footer>

<?php
wp_footer();
?>
</body>

</html>