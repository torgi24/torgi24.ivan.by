<div id="wrapper">


  <div id="header-wrapper">
    <style>

      .pagination {
        display: flex;
        align-items: center;
        justify-content: center;

        width: 100%;
        margin: 0 auto;
        padding: 20px;
      }

      .pagination, .pagination * {
        user-select: none;
      }

      .pagination a {
        font-size: 1.18056vw;
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
        display: flex;
        cursor: pointer;
        justify-content: center;
        align-items: center;
        margin-left: 1.5em;
      }

      .pagination a:first-child {
        margin-left: 0;
      }

      .pagination a.disabled {
        opacity: 0.3;
        pointer-events: none;
        cursor: not-allowed;
        /* 24-02-2021 */
        display: none;
      }

      .pagination a.current {
        /* background: #f3f3f3; */
        width: 2.08333vw;
        height: 2.08333vw;
        border-radius: 2.08333vw;
        background-color: rgba(66, 170, 255, 0.3);
      }

      @media only screen and (max-width: 768px) {
        .pagination a {
          font-size: 2.66667vw;
        }

        .pagination a.current {
          width: 5.33333vw;
          height: 5.33333vw;
          border-radius: 5.33333vw;
        }
      }

    </style>
    <header id="header" role="banner">

      <div>
        <?php if ($logo): ?>
          <div id="logo">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>"
                                                                                         alt="<?php print t('Home'); ?>"/></a>
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
      <? else: ?>
        <div id='user-block'>
          <a href="<?= "/user/" ?>" id='link-edit-profile'>
            <svg viewBox="0 0 512 512.00019" xmlns="http://www.w3.org/2000/svg">
              <path
                d="m256 511.996094c-141.484375 0-256-114.65625-256-255.996094 0-141.488281 114.496094-256 256-256 141.488281 0 255.996094 114.496094 255.996094 256 0 141.476562-114.667969 255.996094-255.996094 255.996094zm0 0"
                fill="#66a9df"/>
              <path
                d="m256 0v511.996094c141.328125 0 255.996094-114.519532 255.996094-255.996094 0-141.5-114.507813-256-255.996094-256zm0 0"
                fill="#4f84cf"/>
              <path
                d="m256 316c-74.488281 0-145.511719 32.5625-197.417969 102.96875 103.363281 124.941406 294.6875 123.875 396.65625-2.230469-25.179687-25.046875-81.894531-100.738281-199.238281-100.738281zm0 0"
                fill="#d6f3fe"/>
              <path
                d="m455.238281 416.738281c-48.140625 59.527344-120.371093 95.257813-199.238281 95.257813v-195.996094c117.347656 0 174.058594 75.699219 199.238281 100.738281zm0 0"
                fill="#bdecfc"/>
              <path
                d="m256 271c-49.628906 0-90-40.375-90-90v-30c0-49.625 40.371094-90 90-90 49.625 0 90 40.375 90 90v30c0 49.625-40.375 90-90 90zm0 0"
                fill="#d6f3fe"/>
              <path d="m256 61v210c49.628906 0 90-40.371094 90-90v-30c0-49.628906-40.371094-90-90-90zm0 0"
                    fill="#bdecfc"/>
            </svg>
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


  </div>

  <div id="catalog-container">
    <?php print render($page['catalog_nav']); ?>
  </div>

  <div id='main-content' class="container top-filter">
      <div class="row">

        <div class='top-filter-items'>
          <div class="item">
            <? print theme('breadcrumb', array('breadcrumb' => drupal_get_breadcrumb())); ?>
          </div>
          <div class="count">Найдено: <?if(count($page['content']["system_main"]['nodes']) > 0) echo count($page['content']["system_main"]['nodes']) - 1; else echo 0;?></div>
          <div class="count count-pages">
            <span class="current_page"><?if(count($page['content']['system_main']['nodes']) < 10) echo 1;?></span>
            из
            <span class="last_page"><?if(count($page['content']['system_main']['nodes']) < 10) echo 1;?></span>
          </div>
          <div style='display:flex; visibility: hidden;'>
            <div id='chess'>
              <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="5" height="3" fill="#C4C4C4"/>
                <rect x="21" width="5" height="3" fill="#C4C4C4"/>
                <rect x="7" width="5" height="3" fill="#C4C4C4"/>
                <rect x="14" width="5" height="3" fill="#C4C4C4"/>
                <rect y="15" width="5" height="3" fill="#C4C4C4"/>
                <rect x="21" y="15" width="5" height="3" fill="#C4C4C4"/>
                <rect x="7" y="15" width="5" height="3" fill="#C4C4C4"/>
                <rect x="14" y="15" width="5" height="3" fill="#C4C4C4"/>
                <rect y="10" width="5" height="3" fill="#C4C4C4"/>
                <rect x="21" y="10" width="5" height="3" fill="#C4C4C4"/>
                <rect x="7" y="10" width="5" height="3" fill="#C4C4C4"/>
                <rect x="14" y="10" width="5" height="3" fill="#C4C4C4"/>
                <rect y="5" width="5" height="3" fill="#C4C4C4"/>
                <rect x="21" y="5" width="5" height="3" fill="#C4C4C4"/>
                <rect x="7" y="5" width="5" height="3" fill="#C4C4C4"/>
                <rect x="14" y="5" width="5" height="3" fill="#C4C4C4"/>
              </svg>
            </div>
            <div id='list'>
              <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="5" height="3" fill="#848484"/>
                <rect x="7" width="19" height="3" fill="#848484"/>
                <rect y="15" width="5" height="3" fill="#848484"/>
                <rect x="7" y="15" width="19" height="3" fill="#848484"/>
                <rect y="10" width="5" height="3" fill="#848484"/>
                <rect x="7" y="10" width="19" height="3" fill="#848484"/>
                <rect y="5" width="5" height="3" fill="#848484"/>
                <rect x="7" y="5" width="19" height="3" fill="#848484"/>
              </svg>
            </div>
          </div>
        </div>

        <!--<h2 style='text-align:center;padding:20px'><? /*= $page['content']["system_main"]['term_heading']['term']["#term"]->name*/ ?></h2>-->
        <div class="list-content cont">

          <div class="shopping-list SSS container " style='justify-content:center'>

            <? if (!empty($page['content']["system_main"]['nodes'])): ?>
              <? foreach ($page['content']["system_main"]['nodes'] as $item): ?>
                <? if ($item['#theme'] != 'node'): ?>
                  <? continue ?>
                <? endif ?>

                <div class="list-product single-item">
                  <div class="list-product-image ">

                    <? if (isset($item['#node']->field_tovar_img)): ?>

                      <img src="<?= file_create_url($item['#node']->field_tovar_img[LANGUAGE_NONE][0]['uri']); ?>"
                           alt="">
                    <? elseif (isset($item['#node']->field_lot_img)): ?>

                      <img src="<?= file_create_url($item['#node']->field_lot_img[LANGUAGE_NONE][0]['uri']); ?>" alt="">
                    <? endif; ?>
                  </div>

                  <div class="list-product-info">
                    <div class="list-product-name">
                      <p>№ <?= $item['#node']->nid ?></p>
                      <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                           style='display:none'>
                        <path
                          d="M17 4.78489C17 2.14223 14.9446 0 12.4091 0C10.7535 0 9.30768 0.916443 8.49995 2.28604C7.69232 0.916443 6.24584 0 4.59027 0C2.05483 0 0 2.14223 0 4.78489C0 6.22367 0.611694 7.51088 1.57576 8.38744L8.08102 15.1681C8.19212 15.2839 8.34279 15.3489 8.49995 15.3489C8.65711 15.3489 8.80778 15.2839 8.91888 15.1681L15.4241 8.38744C16.3882 7.51088 17 6.22367 17 4.78489Z"
                          fill="#3686CD"/>
                      </svg>
                    </div>

                    <div class="list-product-description">
                      <p><?= $item['#node']->title ?></p>
                    </div>

                    <div class="list-product-status">
                      <? if (isset($item['#node']->field_tovar_status)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_tovar_status', field_get_items('node', $item['#node'], 'field_tovar_status')[0])['#markup']; ?>
                      <? elseif (isset($item['#node']->field_tovar_status)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_tovar_status', field_get_items('node', $item['#node'], 'field_tovar_status')[0])['#markup']; ?>
                      <? endif; ?>
                    </div>

                    <div class="list-product-location">
                      <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M5.175 0.300049C2.32156 0.300049 0 2.7076 0 5.66673C0 6.55506 0.214166 7.43584 0.621302 8.21707L4.892 16.2271C4.94886 16.3339 5.0572 16.4 5.175 16.4C5.2928 16.4 5.40114 16.3339 5.458 16.2271L9.73027 8.21443C10.1358 7.43584 10.35 6.55502 10.35 5.66669C10.35 2.7076 8.02844 0.300049 5.175 0.300049ZM5.175 8.35005C3.74828 8.35005 2.58752 7.14629 2.58752 5.66673C2.58752 4.18716 3.74828 2.9834 5.175 2.9834C6.60172 2.9834 7.76248 4.18716 7.76248 5.66673C7.76248 7.14629 6.60172 8.35005 5.175 8.35005Z"
                          fill="#3686CD"/>
                      </svg>
                      <? if (isset($item['#node']->field_tovar_location)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_tovar_location', field_get_items('node', $item['#node'], 'field_tovar_location')[0])['#markup']; ?>
                      <? elseif (isset($item['#node']->field_lot_location)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_lot_location', field_get_items('node', $item['#node'], 'field_lot_location')[0])['#markup']; ?>
                      <? endif; ?>
                    </div>


                    <div class="list-product-category">
                      <? if (isset($item['#node']->field_tovar_katalog)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_tovar_katalog', field_get_items('node', $item['#node'], 'field_tovar_katalog')[0])['#title']; ?>
                      <? elseif (isset($item['#node']->field_lot_katalog)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_lot_katalog', field_get_items('node', $item['#node'], 'field_lot_katalog')[0])['#title']; ?>
                      <? endif; ?>
                    </div>

                    <div class="list-product-price">
                      <? if (isset($item['#node']->field_tovar_katalog)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_tovar_price', field_get_items('node', $item['#node'], 'field_tovar_price')[0])['#markup'] . " BYN"; ?>
                      <? elseif (isset($item['#node']->field_lot_katalog)): ?>
                        <?= field_view_value('node', $item['#node'], 'field_lot_price', field_get_items('node', $item['#node'], 'field_lot_price')[0])['#markup'] . " BYN"; ?>
                      <? endif; ?>
                    </div>

                    <div class="list-product-torgi-block">
                      <? if (isset($item['#node']->field_trading_start)): ?>
                        <div class="beforeBeginning">
                          <? //var_dump(field_view_value('node', $item['#node'], 'field_trading_start', field_get_items('node', $item['#node'], 'field_trading_start')[0])['#markup'];?>
                          <!--<p>До начала торгов: </p> <span class="start-time">2 дн 15 часов 17 минут</span>-->
                          <?= "Дата проведения торгов: " . date("d.m.Y", field_get_items('node', $item['#node'], 'field_trading_start')[0]['value']); ?>
                        </div>
                      <? endif; ?>


                      <div class="more-details">
                        <a href="<?= $item['links']['node']['#links']['node-readmore']['href'] ?>">Подробнее
                          <svg width="17" height="10" viewBox="0 0 17 10" fill="none"
                               xmlns="http://www.w3.org/2000/svg">
                            <path
                              d="M0 5.83333L13.3828 5.83333L10.0017 8.825L11.3333 10L17 5L11.3333 0L10.0017 1.175L13.3828 4.16667L0 4.16667V5.83333Z"
                              fill="#3686CD"/>
                          </svg>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>


              <? endforeach; ?>
            <? endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>

    /*let out = localStorage.getItem('output');
    if(out == 1 || localStorage.getItem('output') == null){
      jQuery('.list-product').css('display','none');
      jQuery('.shachmatka-product').css('display','flex');
    }else{
      jQuery('.shachmatka-product').css('display','none');
      jQuery('.list-product').css('display','flex');
    }

    jQuery("#chess").on('click', function(){
      localStorage.setItem('output', 1);

      document.location.reload();
    })

    jQuery("#list").on('click', function(){
      localStorage.setItem('output', 0);

      document.location.reload();
    })*/

    (function ($) {

      var pagify = {
        items: {},
        container: null,
        totalPages: 1,
        perPage: 3,
        currentPage: 0,
        createNavigation: function () {
          this.totalPages = Math.ceil(this.items.length / this.perPage);

          $('.pagination', this.container.parent()).remove();
          var pagination = $('<div class="pagination"></div>').append('<a class="nav prev disabled" data-next="false">Предыдущая</a>');

          for (var i = 0; i < this.totalPages; i++) {
            var pageElClass = "page";
            if (!i)
              pageElClass = "page current";
            var pageEl = '<a class="' + pageElClass + '" data-page="' + (
              i + 1) + '">' + (
              i + 1) + "</a>";
            pagination.append(pageEl);
          }
          pagination.append('<a class="nav next" data-next="true">Следующая</a>');

          this.container.after(pagination);

          var that = this;
          $("body").off("click", ".nav");
          this.navigator = $("body").on("click", ".nav", function () {
            var el = $(this);
            that.navigate(el.data("next"));
          });

          $("body").off("click", ".page");
          this.pageNavigator = $("body").on("click", ".page", function () {
            var el = $(this);
            that.goToPage(el.data("page"));
          });
        },
        navigate: function (next) {
          // default perPage to 5
          if (isNaN(next) || next === undefined) {
            next = true;
          }
          $(".pagination .nav").removeClass("disabled");
          if (next) {
            this.currentPage++;
            if (this.currentPage > (this.totalPages - 1))
              this.currentPage = (this.totalPages - 1);
            if (this.currentPage == (this.totalPages - 1))
              $(".pagination .nav.next").addClass("disabled");
          } else {
            this.currentPage--;
            if (this.currentPage < 0)
              this.currentPage = 0;
            if (this.currentPage == 0)
              $(".pagination .nav.prev").addClass("disabled");
          }

          this.showItems();
        },
        updateNavigation: function () {

          var pages = $(".pagination .page");
          pages.removeClass("current");
          $('.pagination .page[data-page="' + (
            this.currentPage + 1) + '"]').addClass("current");

          var current_page = $('.current').attr('data-page');
          var last_page = $('.pagination .page').last().attr('data-page');

          $('.current_page').html(current_page);
          $('.last_page').html(last_page);
        },
        goToPage: function (page) {

          this.currentPage = page - 1;

          $(".pagination .nav").removeClass("disabled");
          if (this.currentPage == (this.totalPages - 1))
            $(".pagination .nav.next").addClass("disabled");

          if (this.currentPage == 0)
            $(".pagination .nav.prev").addClass("disabled");
          this.showItems();
        },
        showItems: function () {
          this.items.hide();
          var base = this.perPage * this.currentPage;
          this.items.slice(base, base + this.perPage).show();

          this.updateNavigation();
        },
        init: function (container, items, perPage) {
          this.container = container;
          this.currentPage = 0;
          this.totalPages = 1;
          this.perPage = perPage;
          this.items = items;
          this.createNavigation();
          this.showItems();
        }
      };

      // stuff it all into a jQuery method!
      $.fn.pagify = function (perPage, itemSelector) {
        var el = $(this);
        var items = $(itemSelector, el);

        // default perPage to 5
        if (isNaN(perPage) || perPage === undefined) {
          perPage = 3;
        }

        // don't fire if fewer items than perPage
        if (items.length <= perPage) {
          return true;
        }

        pagify.init(el, items, perPage);
      };
    })(jQuery);

    $(".container").pagify(10, ".single-item");

    document.getElementsByClassName('pagination')[0].style.display = 'none';

  </script>

  <?php print render($page['footer']); ?>
