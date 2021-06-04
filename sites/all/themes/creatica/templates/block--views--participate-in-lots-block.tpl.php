<? $nodes_id  = db_query("SELECT nid From auction_access WHERE uid = :uid", array(':uid' => $user->uid))->fetchAll();

//var_dump($nodes_id[0]->nid);
//$node  = node_load($nodes_id[0]->nid);
//$node  = node_load(23);
function link_node($catalog, $node_title){

    return strtolower('/'.str_replace(' ', '-', str_replace(".", "", $catalog)).'/'.str_replace(' ', '-', str_replace(".", "", $node_title)));
}

?>






<div class="container">
<div class="row">
    <?//$catalog = field_view_value('node', $node, 'field_lot_katalog', field_get_items('node', $node, 'field_lot_katalog')[0])['#title'];
    //$link = link_node($catalog, $node->title);
    //$date = field_get_items('node', $node, 'field_trading_start')[0]['value'];

//$link = str_replace(' ', '-', $link);
//echo $link;?>
<?//= strtolower($node->title)?>
<?//= $node->nid?>
<?//= field_view_value('node', $node, 'field_lot_status', field_get_items('node', $node, 'field_lot_status')[0])["#markup"];?>
<?//= field_view_value('node', $node, 'field_lot_location', field_get_items('node', $node, 'field_lot_location')[0])["#markup"];?>

<?//= $link?>
<?//= date('d',$date) - date('d', time());?>
<pre>
<?//= var_dump(field_view_value('node', $node, 'field_lot_katalog', field_get_items('node', $node, 'field_lot_katalog')[0])['#title']);?>
</pre>
</div>
</div>


<div class="container">
    <div class="row">
        <div class = 'direct_implementation' style='margin-top:50px;margin-bottom:50px;'>
            <?php if (!empty($block->subject)): ?>
                <h2  style='margin-bottom:50px'><?php print $block->subject ?></h2>
            <?php endif;?>

            <div id='chek_input_container'>

                <div id='chek_input'>

                    <svg width="14" height="15" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.8535 0.202764C12.6583 -0.067588 12.3417 -0.067588 12.1464 0.202764L4.04147 11.425L0.853546 7.01096C0.658317 6.74057 0.34172 6.74057 0.146441 7.01096C-0.0488136 7.28131 -0.0488136 7.71964 0.146441 7.99003L3.68796 12.8937C3.88314 13.1639 4.19983 13.164 4.39506 12.8937L12.8535 1.18183C13.0488 0.911445 13.0488 0.473116 12.8535 0.202764Z" fill="#3686CD"/>
                    </svg>

                </div>

                <p>Учавствую в торгах <span>сегодня</span></p>
            </div>

            <div style='display:flex'>
                <?foreach($nodes_id as $item):?>
                    <?
                      $node  = node_load($item->nid);

                      if(empty($node)) continue;
                      $date = date('d',field_get_items('node', $node, 'field_trading_start')[0]['value'])  - date('d', time());
                      if(date('Y-m-d',field_get_items('node', $node, 'field_trading_start')[0]['value'])  < date('Y-m-d', time())) continue;
                      $catalog = field_view_value('node', $node, 'field_lot_katalog', field_get_items('node', $node, 'field_lot_katalog')[0])['#title'];
                      $link = link_node($catalog, $node->title);
                      $lot_location =  field_view_value('node', $node, 'field_lot_location', field_get_items('node', $node, 'field_lot_location')[0]);
                      $lot_img = field_view_value('node', $node, 'field_lot_img', field_get_items('node', $node, 'field_lot_img')[0]);

                      //if($date < 0) continue;
                      //$date = date('d',$date) - date('d', time());
                    ?>


                <div class="shachmatka-product  <?if($date != 0) echo 'active';?>">

                      <div>
                          <div class="product-image">
                            <?= render($lot_img);?>

                          </div>

                          <div class="product-description">
                              <p>Лот № <?= $node->nid.' “'.$node->title.'”'?></p>
                          </div>
                      </div>

                      <div>
                          <div class="product-location">

                              <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5.175 2.29999C2.32156 2.29999 0 4.70754 0 7.66667C0 8.555 0.214166 9.43578 0.621302 10.217L4.892 18.227C4.94886 18.3338 5.0572 18.4 5.175 18.4C5.2928 18.4 5.40114 18.3338 5.458 18.227L9.73027 10.2144C10.1358 9.43578 10.35 8.55496 10.35 7.66663C10.35 4.70754 8.02844 2.29999 5.175 2.29999ZM5.175 10.35C3.74828 10.35 2.58752 9.14623 2.58752 7.66667C2.58752 6.1871 3.74828 4.98334 5.175 4.98334C6.60172 4.98334 7.76248 6.1871 7.76248 7.66667C7.76248 9.14623 6.60172 10.35 5.175 10.35Z" fill="#3686CD" />
                              </svg>

                              <?= render($lot_location);?>
                          </div>



                          <div class="product-price">
                          <?= $node->field_lot_price['und'][0]['value'].' бел.руб';?>
                          </div>

                          <div class="product-button">
                            <a href="<?= '/node/'.$node->nid?>" class="more-info">
                                <p>Подробнее</p>

                            </a>
                          </div>



                      </div>

                  </div>

                <?endforeach?>
            </div>
        </div>
    </div>
</div>


