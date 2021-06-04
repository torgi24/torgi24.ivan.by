

<!-- -->
<div class="container">
    <div class="row">
        <div id="breadcrumbs" style='display:none'>
            <nav class="breadcrumb list-breadcrumb" >
                <a href="/">Главная / Торги</a>
                <div class="found">
                    Найдено: <?= count($rows)?> лота
                </div>
                <div class="found-page" style='opacity:0'>
                    1 из 25
                </div>
                <div class="sort-by" style='opacity:0'>
                    <p>Сортировать по:</p>
                    <select class="change-select">
                        <option value="_none" class="grey">цене</option>
                        <option value="1">дате</option>
                    </select>
                </div>
                <div class="species_change" style='opacity:0'>
                    <a class="spisok" href="#"></a>
                    <a class="shaxmatka" href="#"></a>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- end -->

<div class="container">
    <div class="row">
        <pre>
        <?if($is_admin):?>
            
            <?
            //field_get_items('node', node_load($nid), 'field_tovar_img');
                //$node = node_load($nid);
                //$image_count = count(field_get_items('node', $node, 'field_tovar_img'));
                ?>
        <?endif;?>
        </pre>
    </div>
</div>


<div class="container">
    <div class="row">
    <div class="list-content">
        <!-- filter -->
        <div class="filter" style='opacity:0'>
            <p>Параметры</p>
            <p>Категории</p>
            <p>Регион</p>
            <p>Тип объявления</p>
            <p>Тип</p>
            <p>Статус</p>
        </div>
        <div class="shopping-list">
                <div class="shopping-list-line">
                <?foreach($rows as $row):?>
                    <div class="shachmatka-product">
                        <?if($is_admin):?>
                            <?//print_r($row;
                            ?>
                            <?//= date("D,F d,Y - H:i");?>
                        <?endif;?>
                        <div>
                            <div class="product-image">
                                <?= $row['field_tovar_img']?>
                                <div class="sale-product-block" style='opacity:0'>
                                    <p>Понижение цены</p>
                                    <p>-10%</p>
                                </div>
                            </div>
                            
                            <div class="product-description">
                                <p>“<?= $row['title']?>”</p>
                            </div>
                        </div>
                        <div>

                        
                        <div class="product-location">
                            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.175 2.29999C2.32156 2.29999 0 4.70754 0 7.66667C0 8.555 0.214166 9.43578 0.621302 10.217L4.892 18.227C4.94886 18.3338 5.0572 18.4 5.175 18.4C5.2928 18.4 5.40114 18.3338 5.458 18.227L9.73027 10.2144C10.1358 9.43578 10.35 8.55496 10.35 7.66663C10.35 4.70754 8.02844 2.29999 5.175 2.29999ZM5.175 10.35C3.74828 10.35 2.58752 9.14623 2.58752 7.66667C2.58752 6.1871 3.74828 4.98334 5.175 4.98334C6.60172 4.98334 7.76248 6.1871 7.76248 7.66667C7.76248 9.14623 6.60172 10.35 5.175 10.35Z"
                                    fill="#3686CD" />
                            </svg>
                            <?= $row['field_tovar_location']?>
                        </div>
                                
                        
                        
                            <div class="product-price">
                                <?= $row['field_tovar_price']?>
                            </div>
                            <div class="product-button">
                                <?= $row['view_node']?>
                            </div>
                        
                    </div>
                <?endforeach?>    
            </div>
        </div>
    </div>
</div>