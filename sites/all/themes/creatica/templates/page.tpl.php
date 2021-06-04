


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
      <a onclick="openModalLogin();">Войти</a>
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
        <?//php if (theme_get_setting('breadcrumbs')): ?><div id="breadcrumbs"><?//php if ($breadcrumb): print $breadcrumb; endif;?></div><?//php endif; ?>
      </div>
  </div>
  
  <?php print render($page['slider']); ?>

  <?php print render($page['secondary_content']); ?>

 <div id="main-wrapper">
  <div id="main">
      
   <?php if ($page['sidebar_first']): ?>
    <aside id="sidebar" role="complementary" class="sidebar clearfix">
      <?php print render($page['sidebar_first']); ?>
    </aside>  
  <?php endif; ?>
  
    <section id="post-content" role="main">
    
    <?php print $messages; ?>  
    <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
    <?php print render($page['help']); ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

      
	<?php if (arg(1) == 'register') : ?>
	<?php global $base_url; ?>
	<ul class="regtabs">
		<li class="<?php if (arg(0) == 'user') echo 'active';?>">
			<a href="<?php print $base_url; ?>/user/register">Физическое лицо</a>
		</li>
		<li class="<?php if (arg(0) == 'juridical') echo 'active';?>">
			<a href="<?php print $base_url; ?>/juridical/register">Юридическое лицо</a>
		</li>
	</ul>
	<?php endif; ?>
   
  </section> 


  

  
  </div>
  <div class="clear"></div>
 </div>

 <div class="container" id='main-content'>
    <div class="row">
  
       <?php print render($page['content']); ?>
      
    </div>
  </div>
  

 <div id="footer-wrapper">  
  <div id="footer"> 
  
  <div id="copy">
  <?php print render($page['copy']) ?>
  </div>
  
    <div id="counter">
  <?php print render($page['counter']) ?>
  </div>
  
 <div id="dev">
  <?php print render($page['dev']) ?>
  </div>
  
 </div>
 </div>


</div>

<?php print render($page['footer']); ?>

