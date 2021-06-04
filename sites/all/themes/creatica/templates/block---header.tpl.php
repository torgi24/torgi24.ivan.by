<!---<div id="header-wrapper">

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
   
      <a href="user/logout">Выход</a>
   
    <?endif;?>

   </header>
   
   <nav id="navigation">
      <div id="main-menu">
        <?php 
          if (module_exists('i18n_menu')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
        ?>
         <?php print render($page['search']); ?>
      </div>
    </nav> 

</div>-->