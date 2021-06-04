

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
      <a href="#" onclick="openModalLogin();">Войти</a>
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


<div class="container">
      <div class="row">
        <?php if (theme_get_setting('breadcrumbs')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?>
      </div>
  </div>

<div class="container">
    <div class="row">
        <div class="registration-nav">
            <ul class="regtabs">
                <li class="active">
                    <a href="#">Физическое лицо</a>
                </li>
                <!--<li class="">
                    <a href="#">Юридическое лицо</a>
                </li>-->
            </ul>
        </div>
        <form action="<?= $page['content']['system_main']['#action'] ?>" id='<?= $page['content']['system_main']["#id"] ?>' method='post' accept-charset="UTF-8" class="edit-form">
            <div class="user-photo-edit">
                <img src="<?= !empty($page['content']['system_main']['#user']->field_user_img['und'][0]['filename']) ? '/sites/default/files/'.$page['content']['system_main']['#user']->field_user_img['und'][0]['filename'] : '/sites/default/files/nooname_2.png'?>" alt="upload_user_photo">
       
                <!--<div class="group-button">
                    <input type="button" value="Загрузить фото" id="upload-photo">
                    <input type="button" value="Удалить" id="delete-photo">
                </div>-->
            </div>
            <div class="edit-information-block">
                
                
                <div class="personal-info block-edit">
                    <p>Личная информация</p>
                </div>

                <div style='display:none'><?=render($page['content']['system_main']['profile_physical']['field_phys_true'])?></div>
                <div class="line">
                    <div class="description">
                        <!-- <p>Фамилия</p> -->
                        <!-- <input class="input-long" placeholder="Иванов"> -->
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_pn_lastname']) ?>
                    </div>
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_borndate']) ?>
                    </div>
                </div>
                <div class="line">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_pn_name']) ?>
                    </div>
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_address']) ?>
                    </div>
                </div>
                <div class="line">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_pn_patrname']) ?>
                    </div>
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_sex']) ?>
                        <!-- должен быть селект -->
                    </div>
                </div>

                <div class="line">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_info']['und'][0]['field_phys_ph_phone']) ?>
                    </div>
                </div>

                <div class="personal-info block-edit">
                    <p>Паспортные данные</p>
                </div>
                <div class="line">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_series']) ?>
                    </div>
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_authdate']) ?>
                    </div>
                </div>
                <div class="line">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_authority']) ?>
                    </div>
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_passport']['und'][0]['field_phys_pp_unicnumber']) ?>
                    </div>
                </div>


                <div class="personal-info block-edit">
                    <p>Банковские реквизиты</p>
                </div>
                <div class="line SS1">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_card']) ?>
                    </div>
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_action_card']) ?>
                    </div>
                </div>
                <div class="line SS2">
                    <div class="description" style="display:none">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_bancode']) ?>
                    </div>
                    <div class="description" style="display:none">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_bankrecvizites']['und'][0]['field_phys_br_address']) ?>
                    </div>
                </div>

                <div class="personal-info block-edit">
                    <p>Почтовый адрес</p>
                </div>
                <div class="line">
                    <div class="description select">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_country']) ?>
                    </div>
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_city']) ?>
                    </div>
                </div>
                <div class="line address-edit">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_street']) ?>
                    </div>
                    <div class="address-content input-shorts">
                        <div class="description">
                            <?= render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_homecorpus']) ?>
                        </div>
                        <div class="description">
                            <?= render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_appartment']) ?>
                        </div>
                    </div>
                </div>
                <div class="line">
                    <div class="description">
                        <?= render($page['content']['system_main']['profile_physical']['field_phys_address']['und'][0]['field_phys_pa_index']) ?>
                    </div>
                </div>

                <div class="line">
                    <div class="description" style="display:none>
                        <a href="/user/<?= $user->uid?>/edit"><p>Изменить данные учетной записи?</p></a>
                        
                    </div>
                </div>
                <!--
                <div class="personal-info block-edit">
                    <p>Сменить Логин и пароль</p>
                </div>
                <div class="line">
                    <div class="description">
                        <p>Имя пользователя (псевдоним)</p>
                        <input class="input-long long" placeholder="Участник №120">
                    </div>
                </div>
                <div class="edit-warning">
                    <div class="warning-img">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0C4.2617 0 0 4.26176 0 9.50006C0 14.7384 4.2617 19 9.5 19C14.7383 19 19 14.7384 19 9.50006C19 4.26176 14.7383 0 9.5 0ZM9.5 17.2727C5.21406 17.2727 1.72727 13.7859 1.72727 9.50006C1.72727 5.21418 5.21406 1.72727 9.5 1.72727C13.7859 1.72727 17.2727 5.21418 17.2727 9.50006C17.2727 13.7859 13.7859 17.2727 9.5 17.2727Z" fill="#3686CD" />
                            <path d="M9.49894 4.03031C8.86411 4.03031 8.34766 4.54711 8.34766 5.18234C8.34766 5.817 8.86411 6.33334 9.49894 6.33334C10.1338 6.33334 10.6502 5.817 10.6502 5.18234C10.6502 4.54711 10.1338 4.03031 9.49894 4.03031Z" fill="#3686CD" />
                            <path d="M9.50036 8.06061C9.0234 8.06061 8.63672 8.44729 8.63672 8.92424V14.1061C8.63672 14.583 9.0234 14.9697 9.50036 14.9697C9.97731 14.9697 10.364 14.583 10.364 14.1061V8.92424C10.364 8.44729 9.97731 8.06061 9.50036 8.06061Z" fill="#3686CD" />
                        </svg>
                    </div>
                    <p>Пробелы разрешены; знаки пунктуации запрещены, за исключением точек, тире, апострофов и
                        знаков подчеркивания.</p>
                </div>
                <div class="line">
                    <div class="description">
                        <p>E-Mail</p>
                        <input class="input-long long" placeholder="youemail@gmail.com">
                    </div>
                </div>
                <div class="edit-warning">
                    <div class="warning-img">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 0C4.2617 0 0 4.26176 0 9.50006C0 14.7384 4.2617 19 9.5 19C14.7383 19 19 14.7384 19 9.50006C19 4.26176 14.7383 0 9.5 0ZM9.5 17.2727C5.21406 17.2727 1.72727 13.7859 1.72727 9.50006C1.72727 5.21418 5.21406 1.72727 9.5 1.72727C13.7859 1.72727 17.2727 5.21418 17.2727 9.50006C17.2727 13.7859 13.7859 17.2727 9.5 17.2727Z" fill="#3686CD" />
                            <path d="M9.49894 4.03031C8.86411 4.03031 8.34766 4.54711 8.34766 5.18234C8.34766 5.817 8.86411 6.33334 9.49894 6.33334C10.1338 6.33334 10.6502 5.817 10.6502 5.18234C10.6502 4.54711 10.1338 4.03031 9.49894 4.03031Z" fill="#3686CD" />
                            <path d="M9.50036 8.06061C9.0234 8.06061 8.63672 8.44729 8.63672 8.92424V14.1061C8.63672 14.583 9.0234 14.9697 9.50036 14.9697C9.97731 14.9697 10.364 14.583 10.364 14.1061V8.92424C10.364 8.44729 9.97731 8.06061 9.50036 8.06061Z" fill="#3686CD" />
                        </svg>
                    </div>
                    <p>Существующий адрес электронной почты. Все почтовые сообщения с сайта будут отсылаться на этот
                        адрес. Адрес электронной почты не будет публиковаться и будет использован только по вашему
                        желанию: для восстановления пароля или для получения новостей и уведомлений по электронной
                        почте.</p>
                </div>
                <div class="line">
                    <div class="description">
                        <p>Пароль <span class="necessarily">*</span></p>
                        <input class="input-long" placeholder="">
                    </div>
                    <div class="description">
                        <p>Повторите пароль <span class="necessarily">*</span></p>
                        <input class="input-long" placeholder="">
                    </div>
                </div>-->

                <input type="hidden" name="<?= $page['content']['system_main']["form_build_id"]['#name'] ?>" value='<?= $page['content']['system_main']["form_build_id"]['#value'] ?>'>
                <input type="hidden" name="<?= $page['content']['system_main']["form_token"]['#name'] ?>" value='<?= $page['content']['system_main']["form_token"]['#value'] ?>'>
                <input type="hidden" name="form_id" value='user_profile_form'>

                <div class="group-button change-edit">
                    <?= render($page['content']['system_main']['actions']['submit']) ?>
                    <input type="button" value="Отменить" id="cancel-change">
                </div>
            </div>
        </form>
    </div>

</div>

<?php print render($page['footer']); ?>