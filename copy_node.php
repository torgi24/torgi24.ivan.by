<?php
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/sites/default/settings.php';
require_once DRUPAL_ROOT . '/includes/database/database.inc';
$node   = $_POST['nodeMy'];
$copy_id  = $node.'-'.rand(0,100000);
echo $copy_id;
//копирование ставок
$result_bets = db_select('auction_bets', 'b')
  ->fields('b', array('uid','nid','timestamp','flag_lot','current_price'))
  ->condition('nid', $node)
  ->execute()
  ->fetchAll();
  foreach($result_bets as $res) {
    db_insert('auction_bets_copy')
      ->fields(array(
        'uid'           =>$res->uid,
        'nid'           =>$res->nid,
        'timestamp'     =>$res->timestamp,
        'flag_lot'      =>$res->flag_lot,
        'current_price' =>$res->current_price,
        'copy_id'       =>$copy_id
      ))->execute();
  }
//удаление ставок текущего нода
db_delete('auction_bets')
  ->condition('nid', $node)
  ->execute();
//копирование участников
$result_access = db_select('auction_access', 'b')
  ->fields('b', array('uid','nid','status'))
  ->condition('nid', $node)
  ->execute()
  ->fetchAll();
foreach($result_access as $res) {
  db_insert('auction_access_copy')
    ->fields(array(
      'uid'           =>$res->uid,
      'nid'           =>$res->nid,
      'status'        =>$res->status,
      'copy_id'       =>$copy_id
    ))->execute();
  }
//количество участников
$result_count_user = db_select('field_data_field_lot_count_user', 'b')
  ->fields('b', array('field_lot_count_user_value'))
  ->condition('entity_id', $node)
  ->execute()
  ->fetchAll();
//начальная цена
$result_price= db_select('field_data_field_lot_price', 'b')
  ->fields('b', array('field_lot_price_value'))
  ->condition('entity_id', $node)
  ->execute()
  ->fetchAll();
//шаг торгов
$result_pass= db_select('field_data_field_lot_pass', 'b')
  ->fields('b', array('field_lot_pass_value'))
  ->condition('entity_id', $node)
  ->execute()
  ->fetchAll();
//номер в таблице протоколов
$result_file_fid= db_select('field_data_field_lot_actcopy', 'b')
  ->fields('b', array('field_lot_actcopy_fid'))
  ->condition('entity_id', $node)
  ->execute()
  ->fetchAll();
//статус
$result_status= db_select('field_data_field_lot_status', 'b')
  ->fields('b', array('field_lot_status_value'))
  ->condition('entity_id', $node)
  ->execute()
  ->fetchAll();
//Имя файла протокола
$result_file_name= db_query("
        select filename from file_managed
        where fid = (select field_lot_actcopy_fid from field_data_field_lot_actcopy where entity_id=$node)")->fetchAll();
//Дата начала торгов
$result_date_start = db_select('field_data_field_trading_start', 'b')
  ->fields('b', array('field_trading_start_value'))
  ->condition('entity_id', $node)
  ->execute()
  ->fetchAll();
//массив инсерта
$arr_inst = array(
  'count_user'    =>$result_count_user[0]->field_lot_count_user_value,
  'lot_price'     =>$result_price[0]->field_lot_price_value,
  'lot_pass'      =>(isset($result_pass[0]->field_lot_pass_value) ? $result_pass[0]->field_lot_pass_value:''),
  'filename'      =>(isset($result_file_name[0]->filename) ? $result_file_name[0]->filename:''),
  'status'        =>$result_status[0]->field_lot_status_value,
  'nid'           =>$node,
  'date_start'    =>$result_date_start[0]->field_trading_start_value,
  'copy_id'       =>$copy_id);
print_r($arr_inst);
//импорт в нашу таблицу-копию
db_insert('auction_lot_copy')->fields($arr_inst)->execute();
//удаляем ссылку на файл в таблице
//db_insert('field_data_field_lot_actcopy')->fields(array('field_lot_actcopy_fid' => ''))->execute();

?>
