

<script src="https://www.google.com/recaptcha/api.js?render=6LeSDswZAAAAABYPzLUtozWb4RFRIXgFsbwm9fCf"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('6LeSDswZAAAAABYPzLUtozWb4RFRIXgFsbwm9fCf', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
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

    
  <div class="container" id='main-content'>
        <div class="row">
        <h2 class='page-title'>Контакты</h2>
            <div class="contacts-container">
            
                <div class="contact-info">
                       
                        <div class="item">
                            <div class="icon-block">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.9849 21.41L16.6495 22.7808C15.6435 23.1779 14.8399 23.4801 14.2415 23.6879C13.6425 23.8963 12.9464 24 12.1533 24C10.9355 24 9.98817 23.7017 9.31254 23.1091C8.63692 22.5141 8.299 21.7602 8.299 20.8456C8.299 20.4915 8.32352 20.1274 8.3745 19.7563C8.42591 19.3849 8.50765 18.9665 8.6195 18.4989L9.87675 14.0489C9.9886 13.6228 10.0837 13.2191 10.1598 12.8373C10.237 12.4578 10.2742 12.1087 10.2742 11.7945C10.2742 11.2262 10.1566 10.8287 9.92235 10.6052C9.68811 10.3824 9.24113 10.2692 8.57755 10.2692C8.25254 10.2692 7.91849 10.3213 7.57799 10.4219C7.23599 10.523 6.94367 10.6207 6.69824 10.7115L7.03444 9.33956C7.85805 9.00422 8.64531 8.71706 9.39837 8.47874C10.1514 8.23976 10.863 8.12017 11.536 8.12017C12.7455 8.12017 13.6788 8.41249 14.3342 8.99712C14.9896 9.58219 15.3172 10.3406 15.3172 11.2752C15.3172 11.4686 15.2957 11.8093 15.2495 12.2963C15.2043 12.7844 15.1202 13.2315 14.9976 13.6383L13.7457 18.0704C13.6431 18.4264 13.5508 18.8333 13.4706 19.2913C13.3878 19.7462 13.3482 20.0938 13.3482 20.327C13.3482 20.9155 13.4794 21.3173 13.7425 21.5309C14.0075 21.7445 14.4639 21.8507 15.1122 21.8507C15.4166 21.8507 15.7629 21.7967 16.1477 21.6907C16.5315 21.5847 16.8113 21.4915 16.9849 21.41ZM17.3024 2.80273C17.3024 3.57493 17.0113 4.23442 16.4265 4.77668C15.8431 5.32088 15.1402 5.5932 14.3179 5.5932C13.493 5.5932 12.7883 5.32088 12.1983 4.77668C11.6094 4.23421 11.3142 3.57493 11.3142 2.80273C11.3142 2.03203 11.6094 1.37147 12.1983 0.82232C12.7872 0.274035 13.4932 0 14.3179 0C15.14 0 15.8431 0.27468 16.4265 0.82232C17.0118 1.37147 17.3024 2.03225 17.3024 2.80273Z" fill="#3686CD" fill-opacity="0.8"/>
                                </svg>
                            </div>
                            <div class="content">
                                <p class="title">Полное наименование: ООО "Расантехторг"</p>
                                <p class="title">Информация о банке:</p>
                                <ul>
                                    <li>р/с (IBAN): BY56UNBS30120893600010000933 в ЗАО «БСБ Банк»,код (BIC): UNBSBY2X</li>
                                    <li>Адрес банка: г. Минск, пр. Победителей 23/3</li>
                                    <li>УНП 191514793, ОКПО 380270205000</li>
                                </ul>
                            </div>
                        </div>

                        <div class="item">
                            <div class="icon-block">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                    <path d="M23.347 17.6136L19.9977 14.2643C18.8015 13.0681 16.768 13.5467 16.2896 15.1016C15.9307 16.1782 14.7346 16.7763 13.658 16.537C11.2657 15.9389 8.03602 12.8289 7.43793 10.317C7.07908 9.24036 7.79679 8.04419 8.87334 7.68538C10.4284 7.20691 10.9068 5.17343 9.71066 3.97726L6.36138 0.627989C5.40445 -0.209329 3.96905 -0.209329 3.13173 0.627989L0.859009 2.90071C-1.41371 5.29305 1.09824 11.6327 6.72023 17.2547C12.3422 22.8767 18.6819 25.5083 21.0743 23.116L23.347 20.8432C24.1843 19.8863 24.1843 18.4509 23.347 17.6136Z" fill="#3686CD" fill-opacity="0.8"/>
                                    </g>
                                    <defs>
                                    <clipPath id="clip0">
                                    <rect width="24" height="24" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="content">
                                <p class="title">Телефоны:</p>
                                <ul>
                                    <li>+375 29 607 79 50 - Сергей Васильевич ( управляющий)</li>
                                    <li>+375 29 982 65 56 - Юрисконсульт</li>
                                    <li>+375 29 607 72 87 - Оператор №1</li>
                                    <li>+375 29 607 76 81 - Оператор №2</li>
                                </ul>
                            </div>
                        </div>

                        <div class="item">
                            <div class="icon-block">
                                <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.50114 4.64629C3.79505 7.5521 9.57483 12.6643 11.2736 14.2583C11.5016 14.4734 11.7462 14.5828 12.0001 14.5828C12.2535 14.5828 12.4977 14.4745 12.7252 14.2604C14.4255 12.6648 20.2052 7.5521 23.4992 4.64629C23.7043 4.46572 23.7355 4.14834 23.5695 3.92759C23.1857 3.41748 22.6134 3.125 22.0001 3.125H2.00016C1.38689 3.125 0.814593 3.41748 0.430828 3.92764C0.264796 4.14834 0.296062 4.46572 0.50114 4.64629Z" fill="#3686CD" fill-opacity="0.8"/>
                                    <path d="M23.7105 6.22098C23.5333 6.13504 23.3248 6.16502 23.1773 6.29627C21.02 8.20106 18.1778 10.7178 16.0342 12.6383C15.9215 12.739 15.858 12.887 15.8604 13.0422C15.8629 13.1968 15.9317 13.3428 16.0479 13.4394C18.0396 15.1011 21.0411 17.3869 23.2085 19.0114C23.295 19.0765 23.3975 19.1096 23.5005 19.1096C23.5787 19.1096 23.6568 19.0908 23.7286 19.0521C23.8956 18.9631 24.0005 18.784 24.0005 18.5887V6.69349C24.0005 6.49056 23.8872 6.30594 23.7105 6.22098Z" fill="#3686CD" fill-opacity="0.8"/>
                                    <path d="M0.792 19.0115C2.95997 17.3869 5.96194 15.1011 7.95314 13.4394C8.06934 13.3428 8.1382 13.1968 8.14064 13.0422C8.14308 12.8871 8.07961 12.7391 7.96683 12.6384C5.82324 10.7178 2.98045 8.2011 0.823266 6.29631C0.674813 6.16506 0.465844 6.13611 0.290063 6.22102C0.113297 6.30598 0 6.4906 0 6.69353V18.5888C0 18.7841 0.105 18.9632 0.271969 19.0522C0.343734 19.0908 0.421875 19.1096 0.500016 19.1096C0.603047 19.1096 0.705563 19.0766 0.792 19.0115Z" fill="#3686CD" fill-opacity="0.8"/>
                                    <path d="M23.3873 20.4284C21.294 18.8685 17.438 15.9602 15.1363 14.0141C14.9488 13.855 14.6773 13.86 14.4927 14.0259C14.0411 14.4363 13.6631 14.7822 13.3951 15.0334C12.5718 15.8075 11.4292 15.8075 10.604 15.0324C10.3369 14.7817 9.95904 14.4347 9.50735 14.0258C9.32426 13.859 9.05229 13.8539 8.86427 14.0141C6.5703 15.9535 2.70996 18.8654 0.613289 20.4284C0.49657 20.5159 0.421382 20.6507 0.406757 20.7997C0.392601 20.9487 0.439945 21.0967 0.538101 21.2066C0.91657 21.6313 1.44977 21.875 2.00009 21.875H22.0001C22.5504 21.875 23.0831 21.6313 23.4625 21.2066C23.5602 21.0972 23.608 20.9492 23.5939 20.8002C23.5792 20.6512 23.504 20.5159 23.3873 20.4284Z" fill="#3686CD" fill-opacity="0.8"/>
                                    </svg>
                                </svg>
                            </div>
                            <div class="content content-email">
                                <p class="title">E-mail:</p>
                                <ul>
                                    <li>info@torgi24.by</li>
                                </ul>
                            </div>
                        </div>
      
                    
                </div>

                <form class="contact-form">
                    <p class="title">Свяжитесь с нами:</p>
                    <p class="subtitle">Вы можете получить обратную связь на любой интересующий Вас вопрос</p>
                    <div>
                        <input type="text" name='surname' placeholder="Фамилия">
                        <input type="text" name='name'  placeholder="Имя">
                    </div>
                    <input name ='email' type="email" placeholder="Адрес электронной почты">
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Сообщение"></textarea>
                    <input type="submit" value="Отправить" id="send">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                </form>
            </div>
        </div>
    </div>

  </section> <!-- /#main -->
  
  </div>
  <div class="clear"></div>
 </div>

 
 <?php print render($page['footer']); ?>