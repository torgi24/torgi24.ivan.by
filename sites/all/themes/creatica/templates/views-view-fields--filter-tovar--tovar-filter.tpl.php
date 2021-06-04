<div class="shachmatka-product">
    <div>


        <div class="product-image">
            <?= render($fields['field_tovar_img']->content)?>
            <div class="sale-product-block" style='opacity:0'>
                <p>Понижение цены</p>
                <p>-10%</p>
            </div>
        </div>

        <div class="product-description">
            <p>Лот №<span><?= render($fields['field_tovar_number']->content)?> “<?= render($fields['title']->content)?>”</span></p>
        </div>
    </div>

    <div>
        <div class="product-location">

            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.175 2.29999C2.32156 2.29999 0 4.70754 0 7.66667C0 8.555 0.214166 9.43578 0.621302 10.217L4.892 18.227C4.94886 18.3338 5.0572 18.4 5.175 18.4C5.2928 18.4 5.40114 18.3338 5.458 18.227L9.73027 10.2144C10.1358 9.43578 10.35 8.55496 10.35 7.66663C10.35 4.70754 8.02844 2.29999 5.175 2.29999ZM5.175 10.35C3.74828 10.35 2.58752 9.14623 2.58752 7.66667C2.58752 6.1871 3.74828 4.98334 5.175 4.98334C6.60172 4.98334 7.76248 6.1871 7.76248 7.66667C7.76248 9.14623 6.60172 10.35 5.175 10.35Z" fill="#3686CD" />
            </svg>

            <?= render($fields['field_tovar_location']->content)?>
        </div>


        <div class="product-price">
            <?= render($fields['field_tovar_price']->content)?>
        </div>
        <div class="product-button">
            <?= render($fields['view_node']->content)?>
        </div>
    </div>

</div>
