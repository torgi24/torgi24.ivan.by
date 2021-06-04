<? if ($logged_in) : ?>
  <?php
  $query = db_query("SELECT nid  FROM favorites WHERE uid='" . $user->uid . "'");
  $result = $query->fetchAll();
  ?>



  <div class="person-lots">
    <div class="title-lots">
      <p>Избранное:</p>
    </div>
    <div class="favorite-slider" id="favorite-slider">
      <? foreach ($result as $item) : ?>
        <? $node_item = node_load($item->nid) 
        ?>

        <? //= $node->title;
        ?>
        <? //var_dump($node)
        ?>
        <? //var_dump($node_item->type) 
        ?>
        <? if ($node_item->type == 'lot') : ?>
          <div class="lot">
            <div class="lot-image">
              <img src="<?= file_create_url($node_item->field_lot_img[LANGUAGE_NONE][0]['uri']); ?>" alt="">
              <div class="close-lot">
                <a href="/delete/favorites/<?= $item->nid ?>">
                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 2.09356L17.9786 0L9.99997 8.26322L2.02145 0L0 2.09356L7.97858 10.3567L0 18.6199L2.02145 20.7135L9.99997 12.4503L17.9786 20.7135L20 18.6199L12.0214 10.3567L20 2.09356Z" fill="white" />
                  </svg>
                </a>
              </div>
            </div>
            <div class="lot-description">
              <p><?= 'Лот №' . $item->nid . '"' . $node_item->title . '"'; ?></p>
            </div>
            <div class="lot-location">
              <div class="location-img">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.175 2.29999C2.32156 2.29999 0 4.70754 0 7.66667C0 8.555 0.214166 9.43578 0.621302 10.217L4.892 18.227C4.94886 18.3338 5.0572 18.4 5.175 18.4C5.2928 18.4 5.40114 18.3338 5.458 18.227L9.73027 10.2144C10.1358 9.43578 10.35 8.55496 10.35 7.66663C10.35 4.70754 8.02844 2.29999 5.175 2.29999ZM5.175 10.35C3.74828 10.35 2.58752 9.14623 2.58752 7.66667C2.58752 6.1871 3.74828 4.98334 5.175 4.98334C6.60172 4.98334 7.76248 6.1871 7.76248 7.66667C7.76248 9.14623 6.60172 10.35 5.175 10.35Z" fill="#3686CD" />
                </svg>
              </div>
              <p><?= field_view_value('node', $node_item, 'field_lot_location', field_get_items('node', $node_item, 'field_lot_location')[0])['#markup'] ?></p>
            </div>
            <div class="lot-time">
              <div class="lot-time-img">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0)">
                    <path d="M16.106 4.73621C15.7332 4.91656 15.5771 5.36517 15.7575 5.73779C16.2502 6.75568 16.5 7.85284 16.5 9C16.5 13.1354 13.1354 16.5 9 16.5C4.86456 16.5 1.5 13.1354 1.5 9C1.5 4.86456 4.86456 1.5 9 1.5C10.7137 1.5 12.3235 2.05957 13.656 3.1181C13.9792 3.3761 14.4518 3.32208 14.7098 2.9978C14.9678 2.67371 14.9138 2.20166 14.5893 1.94403C13.0118 0.690308 11.0268 0 9 0C4.03766 0 0 4.03766 0 9C0 13.9623 4.03766 18 9 18C13.9623 18 18 13.9623 18 9C18 7.62488 17.6997 6.30707 17.1075 5.08466C16.9276 4.71112 16.4775 4.55548 16.106 4.73621Z" fill="#296BA6" fill-opacity="0.8" />
                    <path d="M9 3C8.586 3 8.25 3.336 8.25 3.75V9C8.25 9.414 8.586 9.75 9 9.75H12.75C13.164 9.75 13.5 9.414 13.5 9C13.5 8.586 13.164 8.25 12.75 8.25H9.75V3.75C9.75 3.336 9.414 3 9 3Z" fill="#296BA6" fill-opacity="0.8" />
                  </g>
                  <defs>
                    <clipPath id="clip0">
                      <rect width="18" height="18" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <p><?= "Дата проведения торгов: " . date("d.m.Y", field_get_items('node', $node_item, 'field_trading_start')[0]['value']); ?></p>
            </div>
            <div class="lot-bet">
              <p><?= field_view_value('node', $node_item, 'field_lot_price', field_get_items('node', $node_item, 'field_lot_price')[0])['#markup'] ?></p>
            </div>
            <a href="<?= '/node/'.$item->nid?>">
              <button class="lot-button">
                <p>Подробнее</p>
              </button>
            </a>
          </div>
        <? elseif ($node_item->type == 'tovar') : ?>
          <div class="lot">
            <div class="lot-image">
              <img src="<?= file_create_url($node_item->field_tovar_img[LANGUAGE_NONE][0]['uri']); ?>" alt="">
              <div class="close-lot">
                <a href="/delete/favorites/<?= $item->nid ?>">
                  <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 2.09356L17.9786 0L9.99997 8.26322L2.02145 0L0 2.09356L7.97858 10.3567L0 18.6199L2.02145 20.7135L9.99997 12.4503L17.9786 20.7135L20 18.6199L12.0214 10.3567L20 2.09356Z" fill="white" />
                  </svg>
                </a>
              </div>
              
            </div>
            <div class="lot-description">
              <p><?= 'Лот №' . $item->nid . '"' . $node_item->title . '"'; ?></p>
            </div>
            <div class="lot-location">
              <div class="location-img">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.175 2.29999C2.32156 2.29999 0 4.70754 0 7.66667C0 8.555 0.214166 9.43578 0.621302 10.217L4.892 18.227C4.94886 18.3338 5.0572 18.4 5.175 18.4C5.2928 18.4 5.40114 18.3338 5.458 18.227L9.73027 10.2144C10.1358 9.43578 10.35 8.55496 10.35 7.66663C10.35 4.70754 8.02844 2.29999 5.175 2.29999ZM5.175 10.35C3.74828 10.35 2.58752 9.14623 2.58752 7.66667C2.58752 6.1871 3.74828 4.98334 5.175 4.98334C6.60172 4.98334 7.76248 6.1871 7.76248 7.66667C7.76248 9.14623 6.60172 10.35 5.175 10.35Z" fill="#3686CD" />
                </svg>
              </div>
              <p><?= field_view_value('node', $node_item, 'field_tovar_location', field_get_items('node', $node_item, 'field_tovar_location')[0])['#markup'] ?></p>
            </div>
          
            <div class="lot-bet">
              <p><?= field_view_value('node', $node_item, 'field_tovar_price', field_get_items('node', $node_item, 'field_tovar_price')[0])['#markup'] . ' бел.руб.' ?></p>
            </div>
            <a href="<?= '/node/'.$item->nid?>">
              <button class="lot-button">
                <p>Подробнее</p>
              </button>
            </a>
          </div>
        <? endif; ?>


      <? endforeach; ?>
    <? endif; ?>
    </div>
  </div>

