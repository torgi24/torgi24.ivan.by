<div id="wrapper">


  <div id="header-wrapper">

    <header id="header" role="banner">

      <div>
        <?php if ($logo) : ?>
          <div id="logo">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
            <?php print render($page['header_left']); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php print render($page['header_center']); ?>

      <?php if (!$logged_in) : ?>
        <div id='login-user-header'>
          <div id="login-user-container">
            <div class='close' onclick='closeModalLogin();'></div>
            <?php print render($page['header_right']); ?>
          </div>
        </div>
        <div id="block-login">
          <a href="#" onclick="openModalLogin();">Войти</a>
          <a href="/user/register">Регистрация</a>
        </div>
      <? else : ?>
        <div id='user-block'>
          <a href="<?= "/user/" ?>" id='link-edit-profile'>
            <svg viewBox="0 0 512 512.00019" xmlns="http://www.w3.org/2000/svg">
              <path d="m256 511.996094c-141.484375 0-256-114.65625-256-255.996094 0-141.488281 114.496094-256 256-256 141.488281 0 255.996094 114.496094 255.996094 256 0 141.476562-114.667969 255.996094-255.996094 255.996094zm0 0" fill="#66a9df" />
              <path d="m256 0v511.996094c141.328125 0 255.996094-114.519532 255.996094-255.996094 0-141.5-114.507813-256-255.996094-256zm0 0" fill="#4f84cf" />
              <path d="m256 316c-74.488281 0-145.511719 32.5625-197.417969 102.96875 103.363281 124.941406 294.6875 123.875 396.65625-2.230469-25.179687-25.046875-81.894531-100.738281-199.238281-100.738281zm0 0" fill="#d6f3fe" />
              <path d="m455.238281 416.738281c-48.140625 59.527344-120.371093 95.257813-199.238281 95.257813v-195.996094c117.347656 0 174.058594 75.699219 199.238281 100.738281zm0 0" fill="#bdecfc" />
              <path d="m256 271c-49.628906 0-90-40.375-90-90v-30c0-49.625 40.371094-90 90-90 49.625 0 90 40.375 90 90v30c0 49.625-40.375 90-90 90zm0 0" fill="#d6f3fe" />
              <path d="m256 61v210c49.628906 0 90-40.371094 90-90v-30c0-49.628906-40.371094-90-90-90zm0 0" fill="#bdecfc" /></svg>
          </a>

          <div id='login-user'>
            <? print($user->name); ?>
          </div>

          <a id='exit' href="/user/logout">Выход</a>
        </div>


      <? endif; ?>

    </header>

    <nav id="navigation">
      <div id="menu-toggle">
      </div>

      <div id="main-menu">
        <?php
        if (module_exists('i18n_menu')) {
          $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
        } else {
          $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
        }
        print drupal_render($main_menu_tree);
        ?>

      </div>

      <div id="search">
        <?php print render($page['search']); ?>
      </div>
    </nav>

    <div id="catalog-container">
      <?php print render($page['catalog_nav']); ?>
    </div>

    <div class="container">
      <div class="row">
        <?php if (theme_get_setting('breadcrumbs')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="registration-nav">
          <ul class="regtabs">
            <!-- <li>
              <a href="#">Физическое лицо</a>
            </li> -->
            <li class="active">
              <a href="#">Юридическое лицо</a>
            </li>
          </ul>
        </div>
        <form class="edit-form" action="<?= $page['content']['system_main']['#action'] ?>" id='<?= $page['content']['system_main']["#id"] ?>' method='post' accept-charset="UTF-8">

          <input type="hidden" name="<?= $page['content']['system_main']["form_build_id"]['#name'] ?>" value='<?= $page['content']['system_main']["form_build_id"]['#value'] ?>'>
          <input type="hidden" name="<?= $page['content']['system_main']["form_token"]['#name'] ?>" value='<?= $page['content']['system_main']["form_token"]['#value'] ?>'>
          <input type="hidden" name="form_id" value='user_profile_form'>

          <div class="user-photo-edit">
            <img src="<?= !empty($page['content']['system_main']['#user']->field_user_img['und'][0]['filename']) ? '/sites/default/files/'.$page['content']['system_main']['#user']->field_user_img['und'][0]['filename'] : '/sites/default/files/nooname_2.png'?>" alt="upload_user_photo">
          </div>
          <div class="edit-information-block">
            <div class="line">

              <!-- не являюсь -->

                <div class="item" style='display:none'>
                    <div class="item-group">
                        <div class="itm-check">
                            <?= render($page['content']['system_main']['profile_juridical']['field_jur_true']['und'])?>
                        </div>
                    </div>
                </div>

              <div class="description block-edit">
                <!-- <p>Наименование организации/предприятия</p>
                <input class="input-long long" placeholder="ОАО “Меленка”"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_name']) ?>

              </div>
            </div>
            <div class="personal-info block-edit">
              <p>Лицо, уполномоченное для заключения договора</p>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>Фамилия</p>
                <input class="input-long" placeholder="Иванов"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_authface']['und'][0]['field_jur_af_lastname']) ?>
              </div>
              <div class="description">
                <!-- <p>Отчество</p>
                <input class="input-long" placeholder="Иванович"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_authface']['und'][0]['field_jur_af_patrname']) ?>
              </div>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>Имя</p>
                <input class="input-long" placeholder="Иван"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_authface']['und'][0]['field_jur_af_name']) ?>
              </div>
              <div class="description">
                <!-- <p>Должность</p>
                <input class="input-long" placeholder="Директор"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_authface']['und'][0]['field_jur_af_jtitle']) ?>
              </div>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p class="descr-p">Документ, на основании которого действует лицо <span class="necessarily">*</span></p>
                <select class="select-long">
                  <option value="_none" class="grey">- Не указано -</option>
                  <option value="Мужской">Свидетельство о государственной регистрации</option>
                  <option value="Женский">Второй документ</option>
                </select> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_authface']['und'][0]['field_jur_af_authdoc']) ?>
              </div>
              <div class="description">
                <!-- <p class="descr-p">Контактный телефон</p>
                <input class="input-long" placeholder="+375 (29) 175 - 25 - 63"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_authface']['und'][0]['field_jur_jp_phone']) ?>
              </div>
            </div>

            <div class="personal-info block-edit">
              <p>Свидетельство о регистрации юр. лица (ЕГР)</p>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>УНП</p>
                <input class="input-long" placeholder="236125963"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_regcertificate']['und'][0]['field_jur_rc_unp']) ?>
              </div>
              <div class="description">
                <!-- <p>Регистрационный номер</p>
                <input class="input-long" placeholder="032230663"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_regcertificate']['und'][0]['field_jur_rc_regnumber']) ?>
              </div>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>ОКПО</p>
                <input class="input-long" placeholder="032230663"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_regcertificate']['und'][0]['field_jur_rc_okpo']) ?>
              </div>
              <div class="description">
                <!-- <p>Регистрирующий орган</p>
                <input class="input-long" placeholder="ГЛАВНОЕ УПРАВЛЕНИЕ ЮСТИЦИИ Минского област"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_regcertificate']['und'][0]['field_jur_rc_regauthority']) ?>
              </div>
            </div>
            <div class="description borndate-select">
              <?= render($page['content']['system_main']['profile_juridical']['field_jur_regcertificate']['und'][0]['field_jur_rc_regdate']) ?>

            </div>


            <div class="personal-info block-edit">
              <p>Банковские реквизиты</p>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>Расчетный счет</p>
                <input class="input-long" placeholder="2325 3325 2332 2336"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_bankrecvizites']['und'][0]['field_jur_br_account_test']) ?>
              </div>
              <div class="description">
                <!-- <p>BIC Банка</p>
                <input class="input-long" placeholder="BLBBBY2X"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_bankrecvizites']['und'][0]['field_jur_br_bankcode']) ?>
              </div>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>Наименование банка</p>
                <input class="input-long" placeholder="Беливестбанк"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_bankrecvizites']['und'][0]['field_jur_br_bankname']) ?>
              </div>
            </div>

            <div class="personal-info block-edit">
              <p>юридический адрес</p>
            </div>
            <div class="line">
              <div class="description select">
                <!-- <p>Страна</p>
                <input class="input-long" placeholder="Беларусь"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_juraddress']['und'][0]['field_jur_ja_country']) ?>
              </div>
              <div class="description">
                <!-- <p>Улица</p>
                <input class="input-long" placeholder="Черноморская"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_juraddress']['und'][0]['field_jur_ja_street']) ?>
              </div>
            </div>
            <div class="line address-edit">
              <div class="description">
                <!-- <p>Населенный пункт</p>
                <input class="input-long" placeholder="г. Минск"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_juraddress']['und'][0]['field_jur_ja_city']) ?>
              </div>
              <div class="address-content input-shorts">
                <div class="description">
                  <!-- <p class="short-p">Дом</p>
                  <input class="input-short" placeholder="11"> -->
                  <?= render($page['content']['system_main']['profile_juridical']['field_jur_juraddress']['und'][0]['field_jur_ja_homecorpus']) ?>
                </div>
                <!-- <div class="description">
                  <p class="short-p">Корпус</p>
                  <input class="input-short" placeholder="1">
                </div> -->
                <div class="description">
                  <!-- <p class="short-p">Квартира</p>
                  <input class="input-short" placeholder="87"> -->
                  <?= render($page['content']['system_main']['profile_juridical']['field_jur_juraddress']['und'][0]['field_jur_ja_appartment']) ?>
                </div>
              </div>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>Индекс</p>
                <input class="input-long" placeholder="2362163"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_juraddress']['und'][0]['field_jur_ja_index']) ?>
              </div>
              <div class="description">
                <!-- <p>Факс</p>
                <input class="input-long" placeholder="80(17) 353- 69- 23"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_juraddress']['und'][0]['field_jur_ja_fax']) ?>
              </div>
            </div>
            <div class="personal-info block-edit">
              <p>Почтовый адрес</p>
            </div>
            <div class="line">
              <div class="description select">
                <!-- <p>Страна</p>
                <input class="input-long" placeholder="Беларусь"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_postaddress']['und'][0]['field_jur_pa_country']) ?>
              </div>
              <div class="description">
                <!-- <p>Улица</p>
                <input class="input-long" placeholder="Черноморская"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_postaddress']['und'][0]['field_jur_pa_street']) ?>
              </div>
            </div>
            <div class="line address-edit">
              <div class="description">
                <!-- <p>Населенный пункт</p>
                <input class="input-long" placeholder="г. Минск"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_postaddress']['und'][0]['field_jur_pa_city']) ?>
              </div>
              <div class="address-content input-shorts">
                <div class="description">
                  <!-- <p class="short-p">Дом</p>
                  <input class="input-short" placeholder="11"> -->
                  <?= render($page['content']['system_main']['profile_juridical']['field_jur_postaddress']['und'][0]['field_jur_pa_homecorpus']) ?>
                </div>
                <div class="description">
                  <!-- <p class="short-p">Квартира</p>
                  <input class="input-short" placeholder="87"> -->
                  <?= render($page['content']['system_main']['profile_juridical']['field_jur_postaddress']['und'][0]['field_jur_pa_appartment']) ?>
                </div>
              </div>
            </div>
            <div class="line">
              <div class="description">
                <!-- <p>Индекс</p>
                <input class="input-long" placeholder="2362163"> -->
                <?= render($page['content']['system_main']['profile_juridical']['field_jur_postaddress']['und'][0]['field_jur_pa_index']) ?>
              </div>
            </div>

            <div class="line">
                    <div class="description" style="display:none">
                        <a href="/user/<?= $user->uid?>/edit"><p>Изменить данные учетной записи?</p></a>
                    </div>
                </div>
            <div class='form-actions form-wrapper group-button change-edit' id='edit-actions'>
              <div id="button-change">
                <?= render($page['content']['system_main']['actions']['submit']) ?>
                <input type="button" value="Отменить" id="cancel-change">
              </div>
            </div>
          </div>
      </div>
    </div>

    <?php print render($page['footer']); ?>
