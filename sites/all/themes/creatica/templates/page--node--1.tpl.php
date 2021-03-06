



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

    <div class="container">
        <div class="row">
            <div class="not_found-container">
                <div class="col-1">
                    <div>
                        <p>ТАКОЙ СТРАНИЦЫ НЕ СУЩЕСТВУЕТ</p>
                        <a href="/">На главную</a>
                    </div>
                </div>
                <div class="col-2">
                    <p>4</p>
                    <p>4</p>
                </div>
            </div>
        </div>
    </div>
    <?php print render($page['footer']); ?>
