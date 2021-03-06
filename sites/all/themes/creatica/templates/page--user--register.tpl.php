<div id="wrapper">


<div id="header-wrapper">

<header id="header"  role="banner">

  <div>
    <?php if ($logo): ?>
     <div id="logo">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
      <?php print render($page['header_left']); ?>
      </div>
    <?php endif; ?>
  </div>
   <?php print render($page['header_center']); ?>

   <?php if (!$logged_in): ?>
    <div id='login-user-header'>
      <div id="login-user-container">
        <div class='close' onclick='closeModalLogin();'></div>
        <?php print render($page['header_right']); ?>
      </div>
    </div>
    <div id="block-login">
      <a href="/user/register">Регистрация</a>
    </div>
  <?else:?>
    <div id='user-block'>
      <a href="<?= "/user/"?>"  id='link-edit-profile'>
        <svg viewBox="0 0 512 512.00019"  xmlns="http://www.w3.org/2000/svg"><path d="m256 511.996094c-141.484375 0-256-114.65625-256-255.996094 0-141.488281 114.496094-256 256-256 141.488281 0 255.996094 114.496094 255.996094 256 0 141.476562-114.667969 255.996094-255.996094 255.996094zm0 0" fill="#66a9df"/><path d="m256 0v511.996094c141.328125 0 255.996094-114.519532 255.996094-255.996094 0-141.5-114.507813-256-255.996094-256zm0 0" fill="#4f84cf"/><path d="m256 316c-74.488281 0-145.511719 32.5625-197.417969 102.96875 103.363281 124.941406 294.6875 123.875 396.65625-2.230469-25.179687-25.046875-81.894531-100.738281-199.238281-100.738281zm0 0" fill="#d6f3fe"/><path d="m455.238281 416.738281c-48.140625 59.527344-120.371093 95.257813-199.238281 95.257813v-195.996094c117.347656 0 174.058594 75.699219 199.238281 100.738281zm0 0" fill="#bdecfc"/><path d="m256 271c-49.628906 0-90-40.375-90-90v-30c0-49.625 40.371094-90 90-90 49.625 0 90 40.375 90 90v30c0 49.625-40.375 90-90 90zm0 0" fill="#d6f3fe"/><path d="m256 61v210c49.628906 0 90-40.371094 90-90v-30c0-49.628906-40.371094-90-90-90zm0 0" fill="#bdecfc"/></svg>
      </a>

      <div id='login-user'>
        <?print($user->name);?>
      </div>

      <a id ='exit' href="/user/logout">Выход</a>
    </div>


  <?endif;?>

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


</div>

<div id="catalog-container">
<?php print render($page['catalog_nav']); ?>
</div>

<div class="container" style = 'display:none'>
    <div class="row">
        <div id="breadcrumbs">
            <nav class="breadcrumb">
                <a href="/">Главная /</a>
                Регистрация
            </nav>
        </div>
        <h1 class="page-title">Регистрация</h1>

    </div>
</div>

<div class="container">
    <div class="row">
        <div class="registration-nav">
        <?php if (arg(1) == 'register') : ?>
            <?php global $base_url; ?>
            <ul class="regtabs">
                <li class="<?php if (arg(0) == 'user' && arg(1) == 'register') echo 'active';?>">
                    <a href="<?php print $base_url; ?>/user/register">Физическое лицо</a>
                </li>
                <li class="<?php if (arg(0) == 'juridical') echo 'active';?>">
                    <a href="<?php print $base_url; ?>/juridical/register">Юридическое лицо</a>
                </li>
                <li class="<?php if (arg(0) == 'user') echo 'active';?>">
                    <a href="<?php print $base_url; ?>/user">Войти</a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
        <form id="registration-form" class="user-info-from-cookie user-info-from-cookie-processed" enctype="multipart/form-data" action="/user/register" method="post" id="user-register-form" accept-charset="UTF-8">
            <div class="col-1">

                <!-- изображение пользователя -->
                <div id="user-image">
                    <img src="/sites/default/files/nooname_2.png" alt="" id='upload_user_photo' class="img-fluid"/>

                    <? print render($page['content']['system_main']['field_user_img']);?>

                    <div class="group-button">
                        <input type="button" value="Загрузить фото" id = "upload_photo" />
                        <!--<input type="button" value="Удалить"/>-->
                    </div>
                </div>

            </div>
            <div class="col-2">

                <!-- не являюсь -->

                <div class="item">
                    <div class="item-group">
                        <div class="itm-check">
                            <?print render($page['content']['system_main']['profile_physical']['field_phys_true']['und'])?>
                        </div>
                    </div>
                </div>


                 <!-- Личная информация -->
                 <div class="item">

                    <p class="item-title">
                        <?print($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['#title'])?>
                    </p>

                    <div class="input-group">
                        <div class="left-block">

                            <!-- Фамилия  -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_pn_lastname']['und']);?>
                            <!-- Имя  -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_pn_name']['und']);?>
                            <!-- Отчество  -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_pn_patrname']['und']);?>

                        </div>

                        <div class="right-block">
                            <!-- Дата рождения -->

                            <? print render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_borndate']['und']);?>
                            <!-- Пол  -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_address']['und']);?>
                            <!-- Адрес  -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_sex']['und']);?>
                            <!-- Номер -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_phone']['und']);?>
                        </div>

                    </div>

                </div>


                <!-- Паспортные данные -->
                <div class="item">

                    <p class="item-title">
                        <?print($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['#title'])?>
                    </p>

                    <div class="input-group">

                        <div class="left-block">

                            <!-- Серия и номер паспорт -->
                            <?print render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_series']['und'])?>

                            <!-- Кем выдан паспорт -->
                            <?print render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_authority']['und'])?>
                        </div>

                        <div class="right-block">

                            <!-- Дата выдачи -->
                            <?print render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_authdate']['und'])?>

                            <!-- Идентификационный номер -->
                            <?print render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_unicnumber']['und'])?>
                        </div>

                    </div>

                </div>

                <!-- Банковские реквизиты -->
                <div class="item">

                    <p class="item-title">
                        <?print($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['#title'])?>
                    </p>

                    <div class="input-group">

                        <div class="left-block">

                            <!-- Номер карт-счета -->
                            <?print render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_card']['und'])?>

                            <!-- BIC Банка -->
                            <?//print render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_bancode']['und'])?>
                        </div>

                        <div class="right-block">
                             <!-- Срок действия карты -->
                            <?print render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_action_card']['und'])?>

                            <!-- Адрес -->
                            <?//print render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_address']['und'])?>

                        </div>

                    </div>

                </div>



                <!-- Почтовый адрес -->
                <div class="item">

                    <p class="item-title">
                        <?print($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['#title'])?>
                    </p>

                    <div class="input-group">

                        <div class="left-block">
                            <!-- страна -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_country']['und']);?>
                            <!-- Населенный пункт -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_city']['und']);?>
                            <!-- Индекс -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_index']['und']);?>
                        </div>

                        <div class="right-block">
                            <!-- Улица -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_street']['und']);?>
                            <!-- Дом, корпус -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_homecorpus']['und']);?>
                            <!-- Квартира -->
                            <? print render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_appartment']['und']);?>
                        </div>

                    </div>

                </div>

                <input type="hidden" name="form_build_id" value="<?= $page['content']['system_main']['#build_id']?>">
                <input type="hidden" name="form_id" value="user_register_form">

                <!-- логин / пароль -->
                <div class="item">
                    <?php print render($page['content']['system_main']['account']); ?>

                </div>

                <!-- кнопка регистрация -->
                <div class="item physSubmitDiv">
                    <?php print render($page['content']['system_main']['actions']); ?>
                </div>
            </div>
        </form>
    </div>
</div>

<?php print render($page['footer']); ?>
  <script src="../sites/all/themes/creatica/js/jquery.maskedinput.min.js"></script>
  <script>
    /*Длина полей*/
    document.getElementById('edit-profile-physical-field-phys-passport-und-0-field-phys-pp-unicnumber-und-0-value').setAttribute('maxLength',14);
    document.getElementById('edit-profile-physical-field-phys-bankrecvizites-und-0-field-phys-br-card-und-0-value').setAttribute('maxLength',28);
    /*Маска*/
    jQuery(document).ready(function($) {
      $("#edit-profile-physical-field-phys-info-und-0-field-phys-ph-phone-und-0-value").mask("+ 375 (99) 99-99-999");
      $("#edit-profile-physical-field-phys-bankrecvizites-und-0-field-phys-br-action-card-und-0-value").mask("99/99");
    });

  </script>
