
<?
$node = node_load($nid);
//$main_images = field_get_items('node', $node, 'field_lot_img');
$main_images = $node->field_lot_img['und'][0]['uri'];
$main_imageNew = $node->field_lot_img['und'][0]['uri'];
$main_imageNew =str_replace('public://', '', $main_imageNew);
$images = field_get_items('node', $node, 'field_lot_gallery');
/*
if($node->field_lot_price_status['und'][0]['value'] == 'priceType1'){
  $start_price = $node->field_lot_price['und'][0]['value'];

  $step = round((($node->field_lot_price['und'][0]['value'] - $node->field_lot_min_price['und'][0]['value'] ) / 5), 2);
}
else{
  $step = round(($node->field_lot_price['und'][0]['value'] / 100 * $node->field_lot_percent_step['und'][0]['value']) , 2);
}
*/
$step = round(($node->field_lot_price['und'][0]['value'] / 100 * $node->field_lot_percent_step['und'][0]['value']) , 2);

$field = field_get_items('node', $node, 'field_trading_start');
$output = field_view_value('node', $node, 'field_trading_start', $field[0]);


if(empty($content['links']['statistics']['#links']['statistics_counter']['title'])){
  $statistics[1] =  0;
}else{
  $statistics =  explode(' ', $content['links']['statistics']['#links']['statistics_counter']['title']);
}

?>



<div class="container">

  <div class="row">
    <?print theme('breadcrumb', array('breadcrumb'=>drupal_get_breadcrumb()));?>

    <div class="lot-info">

      <!-- -->
      <div class="gallery">
            <div class="main-img-container" id="main-img-container">

              <div class="main-img-item" class="img-fluid">
                <img src="<?='/sites/default/files/'.$main_imageNew?>" />
              </div>

              <?if(!empty($images)):?>
                <?foreach ($images as $value):?>
                  <div class="main-img-item" >
                    <img src="<?= '/sites/default/files/'.$value['filename']?>" alt="<?= $value['alt']?>" class="img-fluid"/>
                  </div>
                <?endforeach;?>
              <?endif;?>
            </div>
            <?if(!empty($images)):?>
            <div class="divider">

            </div>
            <div class="img-container" id="img-container">
                <div class="main-img-item" class="img-fluid">
                  <img src="<?= '/sites/default/files/'.$main_imageNew?> " />
                </div>
                <?foreach ($images as $value):?>
                  <div class="img-item">
                    <img src="<?= '/sites/default/files/'.$value['filename']?>" alt="<?= $value['alt']?>" class="img-fluid"/>
                  </div>
                <?endforeach;?>

            </div>
            <?endif;?>
      </div>

      <div class="lot-section-2">
          <div class="lot-name">
          <h3><?= $title;?></h3>
          <div class="info-container">
            <div class="info-item field-name-field-lot-number">
              <p>№ лота <span class='field-item'><?= $nid?></span></p>
            </div>
            <div class="info-item views">
              <span>
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0)">
                  <path d="M16.7244 7.69963C15.7703 6.47633 14.5344 5.46447 13.1505 4.77351C11.7378 4.06818 10.218 3.70222 8.63142 3.68303C8.58773 3.68183 8.41228 3.68183 8.36859 3.68303C6.78208 3.70225 5.26224 4.06818 3.84952 4.77351C2.46558 5.46447 1.22979 6.4763 0.275669 7.69963C-0.0918895 8.17088 -0.0918895 8.82913 0.275669 9.30038C1.22976 10.5237 2.46558 11.5355 3.84952 12.2265C5.26224 12.9318 6.78205 13.2978 8.36859 13.317C8.41228 13.3182 8.58773 13.3182 8.63142 13.317C10.2179 13.2978 11.7378 12.9318 13.1505 12.2265C14.5344 11.5355 15.7703 10.5237 16.7244 9.30038C17.0919 8.82907 17.0919 8.17088 16.7244 7.69963ZM4.15847 11.6078C2.86621 10.9626 1.71213 10.0176 0.820996 8.87505C0.648772 8.65422 0.648772 8.3458 0.820996 8.12496C1.7121 6.98241 2.86617 6.03745 4.15847 5.39225C4.5255 5.20904 4.90029 5.05059 5.28203 4.91645C4.29995 5.79926 3.68121 7.07864 3.68121 8.49999C3.68121 9.92141 4.29998 11.2009 5.28216 12.0837C4.90043 11.9495 4.52553 11.791 4.15847 11.6078ZM8.50004 12.6272C6.22423 12.6272 4.37276 10.7758 4.37276 8.49996C4.37276 6.22415 6.22423 4.37272 8.50004 4.37272C10.7758 4.37272 12.6273 6.22419 12.6273 8.49999C12.6273 10.7758 10.7758 12.6272 8.50004 12.6272ZM16.1791 8.87502C15.288 10.0176 14.1339 10.9625 12.8416 11.6077C12.475 11.7907 12.1004 11.9485 11.7192 12.0825C12.7006 11.1997 13.3189 9.92075 13.3189 8.49996C13.3189 7.0784 12.7 5.79886 11.7177 4.91605C12.0996 5.05023 12.4745 5.20887 12.8416 5.39219C14.1339 6.03739 15.288 6.98235 16.1791 8.1249C16.3513 8.34576 16.3513 8.65419 16.1791 8.87502Z" fill="#3686CD"/>
                  <path d="M8.50012 6.73376C7.52621 6.73376 6.73389 7.52609 6.73389 8.5C6.73389 9.47392 7.52621 10.2662 8.50012 10.2662C9.47404 10.2662 10.2664 9.47392 10.2664 8.5C10.2664 7.52609 9.47407 6.73376 8.50012 6.73376ZM8.50012 9.57472C7.90755 9.57472 7.42541 9.09264 7.42541 8.5C7.42541 7.90739 7.90748 7.42532 8.50012 7.42532C9.0927 7.42532 9.57481 7.90739 9.57481 8.5C9.57484 9.09264 9.0927 9.57472 8.50012 9.57472Z" fill="#3686CD"/>
                  </g>
                  <defs>
                  <clipPath id="clip0">
                  <rect width="17" height="17" fill="white"/>
                  </clipPath>
                  </defs>
                  </svg>
              </span>
              <p><?if(count($statistics) > 0){print $statistics[0];}?></p>
            </div>
            <div class="info-item calendar">
              <span style='margin-right:5px'>
              <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0)">
              <path d="M13.7467 8.34906H15.0023C15.2862 8.34906 15.5171 8.13095 15.5171 7.86287V6.67705C15.5171 6.40897 15.2862 6.19086 15.0023 6.19086H13.7467C13.4629 6.19086 13.2319 6.40897 13.2319 6.67705V7.86287C13.2319 8.13095 13.4629 8.34906 13.7467 8.34906ZM13.7593 6.6889H14.9898V7.85101H13.7593V6.6889ZM13.7467 11.5034H15.0023C15.2862 11.5034 15.5171 11.2852 15.5171 11.0172V9.83135C15.5171 9.56326 15.2862 9.34515 15.0023 9.34515H13.7467C13.4629 9.34515 13.2319 9.56326 13.2319 9.83135V11.0172C13.2319 11.2852 13.4629 11.5034 13.7467 11.5034ZM13.7593 9.8432H14.9898V11.0053H13.7593V9.8432ZM10.1638 8.34906H11.4193C11.7032 8.34906 11.9341 8.13095 11.9341 7.86287V6.67705C11.9341 6.40897 11.7032 6.19086 11.4193 6.19086H10.1638C9.87991 6.19086 9.64897 6.40897 9.64897 6.67705V7.86287C9.64897 8.13095 9.87991 8.34906 10.1638 8.34906ZM10.1763 6.6889H11.4068V7.85101H10.1763V6.6889ZM4.25336 12.3516H2.99779C2.71394 12.3516 2.483 12.5697 2.483 12.8378V14.0236C2.483 14.2917 2.71394 14.5098 2.99779 14.5098H4.25336C4.53721 14.5098 4.76815 14.2917 4.76815 14.0236V12.8378C4.76815 12.5697 4.53721 12.3516 4.25336 12.3516ZM4.24081 14.0117H3.01034V12.8496H4.24081V14.0117ZM4.25336 6.19086H2.99779C2.71394 6.19086 2.483 6.40897 2.483 6.67705V7.86287C2.483 8.13095 2.71394 8.34906 2.99779 8.34906H4.25336C4.53721 8.34906 4.76815 8.13095 4.76815 7.86287V6.67705C4.76815 6.40893 4.53721 6.19086 4.25336 6.19086ZM4.24081 7.85101H3.01034V6.6889H4.24081V7.85101ZM10.1638 11.4294H11.4193C11.7032 11.4294 11.9341 11.2113 11.9341 10.9432V9.7574C11.9341 9.48932 11.7032 9.27121 11.4193 9.27121H10.1638C9.87991 9.27121 9.64897 9.48932 9.64897 9.7574V10.9432C9.64897 11.2113 9.87991 11.4294 10.1638 11.4294ZM10.1763 9.76926H11.4068V10.9314H10.1763V9.76926ZM15.779 1.138H14.6517V0.757264C14.6517 0.339701 14.292 0 13.8499 0H13.7288C13.2867 0 12.927 0.339701 12.927 0.757264V1.138H5.0731V0.757264C5.0731 0.339701 4.71341 0 4.27129 0H4.15021C3.70809 0 3.3484 0.339701 3.3484 0.757264V1.138H2.22112C1.49321 1.138 0.901001 1.69731 0.901001 2.38478V15.7549C0.901001 16.4415 1.4924 17 2.21936 17H15.7808C16.5078 17 17.0992 16.4415 17.0992 15.7549V2.38478C17.0991 1.69731 16.5069 1.138 15.779 1.138ZM13.4543 0.757264C13.4543 0.614324 13.5775 0.498047 13.7288 0.498047H13.8499C14.0012 0.498047 14.1244 0.614324 14.1244 0.757264V1.138H13.4543V0.757264ZM3.87578 0.757264C3.87578 0.614324 3.9989 0.498047 4.15025 0.498047H4.27133C4.42267 0.498047 4.54579 0.614324 4.54579 0.757264V1.138H3.87582V0.757264H3.87578ZM16.5718 15.7549C16.5718 16.1668 16.217 16.502 15.7808 16.502H2.21933C1.78314 16.502 1.42831 16.1668 1.42831 15.7549V15.7533C1.64923 15.9105 1.92384 16.0039 2.22112 16.0039H12.9115C13.2642 16.0039 13.5957 15.8742 13.845 15.6387L16.5718 13.0634V15.7549ZM13.576 15.1885C13.5966 15.1079 13.6079 15.0238 13.6079 14.9374V13.2751C13.6079 12.9616 13.8779 12.7066 14.2098 12.7066H15.9698C16.0614 12.7066 16.1504 12.696 16.2357 12.6765L13.576 15.1885ZM16.5718 4.69671H5.33677C5.19115 4.69671 5.0731 4.80821 5.0731 4.94574C5.0731 5.08327 5.19115 5.19476 5.33677 5.19476H16.5718V11.6401C16.5718 11.9536 16.3018 12.2086 15.9698 12.2086H14.2098C13.5871 12.2086 13.0805 12.687 13.0805 13.2751V14.9374C13.0805 15.2509 12.8105 15.5059 12.4786 15.5059H2.22112C1.78399 15.5059 1.42834 15.17 1.42834 14.7571V5.19476H4.28208C4.4277 5.19476 4.54575 5.08327 4.54575 4.94574C4.54575 4.80821 4.4277 4.69671 4.28208 4.69671H1.42831V2.38478C1.42831 1.97193 1.78395 1.63605 2.22108 1.63605H3.3484V2.36825C3.3484 2.78581 3.70809 3.12551 4.15021 3.12551C4.29583 3.12551 4.41388 3.01401 4.41388 2.87649C4.41388 2.73896 4.29583 2.62746 4.15021 2.62746C3.99886 2.62746 3.87575 2.51119 3.87575 2.36825V1.63605H12.927V2.36825C12.927 2.78581 13.2867 3.12551 13.7288 3.12551C13.8744 3.12551 13.9925 3.01401 13.9925 2.87649C13.9925 2.73896 13.8744 2.62746 13.7288 2.62746C13.5775 2.62746 13.4543 2.51119 13.4543 2.36825V1.63605H15.779C16.2162 1.63605 16.5718 1.97193 16.5718 2.38478V4.69671ZM4.25336 9.27121H2.99779C2.71394 9.27121 2.483 9.48932 2.483 9.7574V10.9432C2.483 11.2113 2.71394 11.4294 2.99779 11.4294H4.25336C4.53721 11.4294 4.76815 11.2113 4.76815 10.9432V9.7574C4.76815 9.48929 4.53721 9.27121 4.25336 9.27121ZM4.24081 10.9314H3.01034V9.76926H4.24081V10.9314ZM6.58077 8.34906H7.83634C8.1202 8.34906 8.35114 8.13095 8.35114 7.86287V6.67705C8.35114 6.40897 8.1202 6.19086 7.83634 6.19086H6.58077C6.29692 6.19086 6.06598 6.40897 6.06598 6.67705V7.86287C6.06598 8.13095 6.29692 8.34906 6.58077 8.34906ZM6.59333 6.6889H7.82379V7.85101H6.59333V6.6889ZM10.176 14.0117C10.1695 13.8797 10.054 13.7745 9.9126 13.7745C9.76698 13.7745 9.64893 13.886 9.64893 14.0236C9.64893 14.2917 9.87987 14.5098 10.1637 14.5098H11.4193C11.7031 14.5098 11.9341 14.2917 11.9341 14.0236V12.8378C11.9341 12.5697 11.7031 12.3516 11.4193 12.3516H10.1637C9.87987 12.3516 9.64893 12.5697 9.64893 12.8378V13.1797C9.64893 13.3173 9.76698 13.4288 9.9126 13.4288C10.0582 13.4288 10.1763 13.3173 10.1763 13.1797V12.8496H11.4067V14.0117H10.176ZM6.58077 11.4294H7.83634C8.1202 11.4294 8.35114 11.2113 8.35114 10.9432V9.7574C8.35114 9.48932 8.1202 9.27121 7.83634 9.27121H6.58077C6.29692 9.27121 6.06598 9.48932 6.06598 9.7574V10.9432C6.06598 11.2113 6.29692 11.4294 6.58077 11.4294ZM6.59333 9.76926H7.82379V10.9314H6.59333V9.76926ZM6.58077 14.5098H7.83634C8.1202 14.5098 8.35114 14.2917 8.35114 14.0236V12.8378C8.35114 12.5697 8.1202 12.3516 7.83634 12.3516H6.58077C6.29692 12.3516 6.06598 12.5697 6.06598 12.8378V14.0236C6.06598 14.2917 6.29692 14.5098 6.58077 14.5098ZM6.59333 12.8496H7.82379V14.0117H6.59333V12.8496Z" fill="#3686CD"/>
              </g>
              <defs>
              <clipPath id="clip0">
              <rect width="18" height="17" fill="white"/>
              </clipPath>
              </defs>
              </svg>

              </span>
              <p><?= date('d.m.Y', $field[0]['value'])?></p>
            </div>
          </div>


        </div>
        <div class="lot-details-container">
        <div class="lot-details">
          <div class="details arrow-btn">
            <h4 class ="">Сведения о лоте</h4>
          </div>
          <div class="details-wrapper" id="details-panel">
            <div class="details-container">
              <div class="detail-item">
                <div class="detail-info"><p>Статус:</p></div>
                <div class="detail-info-2 status_node"><?= render($content['field_lot_status'])?></div>
              </div>
              <div class="detail-item">
                <div class="detail-info"><p>Категория:</p></div>
                <div class="detail-info-2"><?= render($content['field_lot_katalog'])?></div>
              </div>
              <?if($content['field_type_auction']['#items'][0]['value'] == 'autctionType1'):?>
                <div class="detail-item">
                  <div class="detail-info"><p>Тип аукциона:</p></div>
                  <div class="detail-info-2"><?= render($content['field_type_auction'])?></div>
                </div>
              <?endif;?>

              <?if(isset($content['field_lot_actcopy'])):?>
                <!-- <div class="detail-item" style="display:none"> -->
                <div class="detail-item" >
                  <div class="detail-info"><p>Копия акта о проведенных торгах:</p></div>
                  <div class="detail-info-2"><?= render($content['field_lot_actcopy'])?></div>
                </div>
              <?endif;?>

              <?if($is_admin && $node->field_lot_status['und'][0]['value'] == 'status5' || $is_admin && $node->field_lot_status['und'][0]['value'] == 'status4'):?>
                <!-- <div class="detail-item" style="display:none"> -->
                <div class="detail-item" >
                  <div class="detail-info"><p>Ссылка на скачивание протокола </p></div>
                  <div class="detail-info-2"><a href="<?= '/auction/print/'.$nid?>">Скачать</a></div>
                </div>
              <?endif?>

              <?if(isset($content['field_lot_pdf_img'])):?>
                <div class="detail-item">
                    <div class="detail-info"><p>Дополнительные изображения:</p></div>
                    <div class="detail-info-2"><?= render($content['field_lot_pdf_img'])?></div>
                </div>
              <?endif;?>


              <div class="detail-item">
                <div class="detail-info"><p>Собственник имущества:</p></div>
                <div class="detail-info-2"><?= render($content['field_lot_owner'])?></div>
              </div>
              <div class="detail-item">
                <div class="detail-info"><p>Местонахождение:</p></div>
                <div class="detail-info-2"><?= render($content['field_lot_location'])?></div>
              </div>
              <div class="detail-item">
                <div class="detail-info"><p>Контакты для связи:</p></div>
                <div class="detail-info-2"><?= render($content['field_lot_cont_for_comm'])?></div>
              </div>

            </div>

           <div class="buttons">
              <?= render($content['participate_button'])?>
              <?= render($content['favorite_button'])?>
            </div>

          </div>
          <?//if($content['field_lot_status'][0]['#markup'] == 'Проводятся торги'):?>
          <div id='user_bet-container' style='display:none'>
            <div class="details arrow-btn-bet active">
                <h4>Ставки участников</h4>
            </div>
            <div class="users-bet" id="panel">
                <table class="user-table">
                    <thead>
                        <tr>
                            <td>Время</td>
                            <td>Логин пользователя</td>
                            <td>Сумма ставки</td>
                        </tr>
                    </thead>
                    <tbody id="user-table">
                    </tbody>
                </table>
            </div>

          </div>

          <?//endif;?>
        </div>

        <div class="price-info SS">
          <div class="start-price">
            <p class="start-text">Начальная цена:</p>
            <span class='first-price'><b><?= render($content['field_lot_price'])?></b></span>
          </div>
          <?//if($node->field_lot_status['und'][0]['value'] == 'status1' || $node->field_lot_status['und'][0]['value'] == 'status2' || $node->field_lot_status['und'][0]['value'] == 'status8'):?>
            <div class="step-torg">
            <p>Шаг торгов:</p>
            <p class="price-text" id ='step_auction'>
              <?if($node->field_lot_status['und'][0]['value'] == 'status1' || $node->field_lot_status['und'][0]['value'] == 'status2' || $node->field_lot_status['und'][0]['value'] == 'status4'  || $node->field_lot_status['und'][0]['value'] == 'status7'):?>
                <?= $step.' бел.руб.';?>
              <?else:?>
                <?=  render($content['field_lot_pass'])?>
              <?endif?>


            </p>
          </div>

          <?if($node->field_type_auction['und'][0]['value'] == 'autctionType1' ):?>
          <div class="min-price">
            <p>Минимальная цена:</p>
            <p class="price-text"><?= render($content['field_lot_min_price'])?></p>
          </div>
          <?endif;?>

            <div class="min-price">
              <p>Дата и время начала торгов:</p>
              <p class="price-text"><?= date('d.m.Y; H:i:s',$node->field_trading_start['und'][0]['value'])?></p>
            </div>

            <div class="min-price">
              <p>Дата и время завершения торгов:</p>
              <p class="price-text"><?= date('d.m.Y; H:i:s',$node->field_trading_end['und'][0]['value'])?></p>
            </div>

            <?if($node->field_lot_status['und'][0]['value'] == 'status1'):?>
              <div class="min-price">
                <p>Окончание подачи заявок:</p>
                <p class="price-text"><?= date('d.m.Y; H:i:s',$node->field_filing_end['und'][0]['value'])?></p>
              </div>
            <?endif;?>

          <?if($node->field_lot_status['und'][0]['value'] == 'status5'):?>
            <div class="min-price">
              <p>Предпоследняя ставка, время:</p>
              <p class="price-text"><?= $node->field_penultimate_bid['und'][0]['value']?></p>
            </div>

            <div class="min-price">
              <p>Последняя ставка, время:</p>
              <p class="price-text"><?= $node->field_max_price['und'][0]['value']?></p>
            </div>

            <div class="min-price">
              <p>Количество ставок:</p>
              <p class="price-text"><?= render($content['field_number_bets'])?></p>
            </div>

          <?endif;?>

          <div class="participants">
              <p>Количество участников</p>
              <p class="price-text"><?= render($content['field_lot_count_user'])?></p>
          </div>

          <?= render($content['auction_winner'])?>
          <?= render($content['auction_mainform'])?>

        </div>
      </div>
    </div>
    </div>

    <div class="pay-info-container">
        <div class="payment">
          <div class="payment-info">
            <div class="payment-text">
                <?= render($content['field_lot_payment'])?>
            </div>
          </div>
          <div class="payment-date">

            <p>
            <?= render($content['field_lot_payment_deadline'])?>
            </p>
          </div>
          <div class="payment-cost">
            <p>
            <?= render($content['field_lot_kkk'])?>
            </p>
          </div>
        </div>
        <div class="additional-info">
          <!--<div class="additional-head">
            <h4>Дополнительная информация</h4>
          </div>-->
          <div class="additional-text">
            <p>
            <?= render($content['field_lot_info'])?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?= render($content['winner']);?>
