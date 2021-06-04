<?php

/**
 * @file
 * Default theme implementation for displaying a single search result.
 *
 * This template renders a single search result and is collected into
 * search-results.tpl.php. This and the parent template are
 * dependent to one another sharing the markup for definition lists.
 *
 * Available variables:
 * - $url: URL of the result.
 * - $title: Title of the result.
 * - $snippet: A small preview of the result. Does not apply to user searches.
 * - $info: String of all the meta information ready for print. Does not apply
 *   to user searches.
 * - $info_split: Contains same data as $info, split into a keyed array.
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Default keys within $info_split:
 * - $info_split['module']: The module that implemented the search query.
 * - $info_split['user']: Author of the node linked to users profile. Depends
 *   on permission.
 * - $info_split['date']: Last update of the node. Short formatted.
 * - $info_split['comment']: Number of comments output as "% comments", %
 *   being the count. Depends on comment.module.
 *
 * Other variables:
 * - $classes_array: Array of HTML class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $title_attributes_array: Array of HTML attributes for the title. It is
 *   flattened into a string within the variable $title_attributes.
 * - $content_attributes_array: Array of HTML attributes for the content. It is
 *   flattened into a string within the variable $content_attributes.
 *
 * Since $info_split is keyed, a direct print of the item is possible.
 * This array does not apply to user searches so it is recommended to check
 * for its existence before printing. The default keys of 'type', 'user' and
 * 'date' always exist for node searches. Modules may provide other data.
 * @code
 *   <?php if (isset($info_split['comment'])): ?>
 *     <span class="info-comment">
 *       <?php print $info_split['comment']; ?>
 *     </span>
 *   <?php endif; ?>
 * @endcode
 *
 * To check for all available data within $info_split, use the code below.
 * @code
 *   <?php print '<pre>'. check_plain(print_r($info_split, 1)) .'</pre>'; ?>
 * @endcode
 *
 * @see template_preprocess()
 * @see template_preprocess_search_result()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>

<div class="list-product">
    <div class="list-product-image">
        

        <?if(isset($result['node']->field_tovar_img)):?>
            <img src="<?= file_create_url($result['node']->field_tovar_img[LANGUAGE_NONE][0]['uri']);?>" alt="">
        <?elseif(isset($result['node']->field_lot_img)):?>
            <img src="<?= file_create_url($result['node']->field_lot_img[LANGUAGE_NONE][0]['uri']);?>" alt="">
        <?endif;?>   
    </div>
    
    <div class="list-product-info">
        <div class="list-product-name">
            <p>№ <?= $result['node']->nid?></p>
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" style='display:none'>
                <path d="M17 4.78489C17 2.14223 14.9446 0 12.4091 0C10.7535 0 9.30768 0.916443 8.49995 2.28604C7.69232 0.916443 6.24584 0 4.59027 0C2.05483 0 0 2.14223 0 4.78489C0 6.22367 0.611694 7.51088 1.57576 8.38744L8.08102 15.1681C8.19212 15.2839 8.34279 15.3489 8.49995 15.3489C8.65711 15.3489 8.80778 15.2839 8.91888 15.1681L15.4241 8.38744C16.3882 7.51088 17 6.22367 17 4.78489Z" fill="#3686CD"/>
            </svg>  
        </div>

        <div class="list-product-description">
            <p><?= $result['node']->title?></p>
        </div>
        
        <div class="list-product-status">
            <?if(isset($result['node']->field_tovar_status)):?>
                <?= field_view_value('node', $result['node'], 'field_tovar_status', field_get_items('node', $result['node'], 'field_tovar_status')[0])['#markup'];?>
            <?elseif(isset($result['node']->field_tovar_status)):?>
                <?= field_view_value('node', $result['node'], 'field_tovar_status', field_get_items('node', $result['node'], 'field_tovar_status')[0])['#markup'];?>
            <?endif;?>
        </div>
        
        <div class="list-product-location">
            <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.175 0.300049C2.32156 0.300049 0 2.7076 0 5.66673C0 6.55506 0.214166 7.43584 0.621302 8.21707L4.892 16.2271C4.94886 16.3339 5.0572 16.4 5.175 16.4C5.2928 16.4 5.40114 16.3339 5.458 16.2271L9.73027 8.21443C10.1358 7.43584 10.35 6.55502 10.35 5.66669C10.35 2.7076 8.02844 0.300049 5.175 0.300049ZM5.175 8.35005C3.74828 8.35005 2.58752 7.14629 2.58752 5.66673C2.58752 4.18716 3.74828 2.9834 5.175 2.9834C6.60172 2.9834 7.76248 4.18716 7.76248 5.66673C7.76248 7.14629 6.60172 8.35005 5.175 8.35005Z" fill="#3686CD"/>
            </svg>
            <?if(isset($result['node']->field_tovar_location)):?>
                <?= field_view_value('node', $result['node'], 'field_tovar_location', field_get_items('node', $result['node'], 'field_tovar_location')[0])['#markup'];?>
            <?elseif(isset($result['node']->field_lot_location)):?>
                <?= field_view_value('node', $result['node'], 'field_lot_location', field_get_items('node', $result['node'], 'field_lot_location')[0])['#markup'];?>
            <?endif;?>
        </div>


        <div class="list-product-category">
            <?if(isset($result['node']->field_tovar_katalog)):?>
                <?= field_view_value('node', $result['node'], 'field_tovar_katalog', field_get_items('node', $result['node'], 'field_tovar_katalog')[0])['#title'];?>
            <?elseif(isset($result['node']->field_lot_katalog)):?>
                <?= field_view_value('node', $result['node'], 'field_lot_katalog', field_get_items('node', $result['node'], 'field_lot_katalog')[0])['#title'];?>
            <?endif;?>
        </div>

        <div class="list-product-price">
            <?if(isset($result['node']->field_tovar_katalog)):?>
                <?= field_view_value('node', $result['node'], 'field_tovar_price', field_get_items('node', $result['node'], 'field_tovar_price')[0])['#markup'];?>
            <?elseif(isset($result['node']->field_lot_katalog)):?>
                <?= field_view_value('node', $result['node'], 'field_lot_price', field_get_items('node', $result['node'], 'field_lot_price')[0])['#markup']." BYN";?>
            <?endif;?>
        </div>

        <div class="list-product-torgi-block">
            <?if(isset($result['node']->field_trading_start)):?>
                <div class="beforeBeginning">
                    <?//var_dump(field_view_value('node', $result['node'], 'field_trading_start', field_get_items('node', $result['node'], 'field_trading_start')[0])['#markup'];?>
                    <!--<p>До начала торгов: </p> <span class="start-time">2 дн 15 часов 17 минут</span>-->
                    <?= "Дата проведения торгов: ".date("d.m.Y",field_get_items('node', $result['node'], 'field_trading_start')[0]['value']);?>
                </div>
            <?endif;?>
            
            <div class="more-details">
                <a href="<?= $result['link']?>">Подробнее
                    <svg width="17" height="10" viewBox="0 0 17 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 5.83333L13.3828 5.83333L10.0017 8.825L11.3333 10L17 5L11.3333 0L10.0017 1.175L13.3828 4.16667L0 4.16667V5.83333Z" fill="#3686CD"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
            
