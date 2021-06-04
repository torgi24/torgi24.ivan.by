<div class="shachmatka-product shachmatka-product-element">

    <div>
        <div class="product-image">
            <?= render($fields['field_lot_img']->content)?>
            <?if($fields['field_type_auction']->content == 'На понижение'):?>
                <div class="sale-product-block">
                    <p>Понижение цены</p>
                </div>
            <?endif?>
        </div>

        <div class="product-description">
            <p>Лот №<?= render($fields['field_lot_number']->content)?> “<?= render($fields['title']->content)?>”</p>
        </div>
    </div>

    <div>
        <div class="product-location">

            <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.175 2.29999C2.32156 2.29999 0 4.70754 0 7.66667C0 8.555 0.214166 9.43578 0.621302 10.217L4.892 18.227C4.94886 18.3338 5.0572 18.4 5.175 18.4C5.2928 18.4 5.40114 18.3338 5.458 18.227L9.73027 10.2144C10.1358 9.43578 10.35 8.55496 10.35 7.66663C10.35 4.70754 8.02844 2.29999 5.175 2.29999ZM5.175 10.35C3.74828 10.35 2.58752 9.14623 2.58752 7.66667C2.58752 6.1871 3.74828 4.98334 5.175 4.98334C6.60172 4.98334 7.76248 6.1871 7.76248 7.66667C7.76248 9.14623 6.60172 10.35 5.175 10.35Z" fill="#3686CD" />
            </svg>

            <?= render($fields['field_lot_location']->content)?>
        </div>

        <div class="product-time">
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

            <p><?= render($fields['field_trading_start']->content)?></p>
        </div>

        <div class="product-price">
            <?= render($fields['field_lot_price']->content)?>
        </div>
        <div class="product-button">
            <?= render($fields['view_node']->content)?>
        </div>
    </div>

</div>


<div class="list-product" style='display:none'>
    <div class="list-product-image">
        <?= render($fields['field_lot_img']->content)?>
    </div>

    <div class="list-product-info">
        <div class="list-product-name">
            <p>Лот №<?= render($fields['field_lot_number']->content)?> </p>
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg" style='display:none'>
                <path d="M17 4.78489C17 2.14223 14.9446 0 12.4091 0C10.7535 0 9.30768 0.916443 8.49995 2.28604C7.69232 0.916443 6.24584 0 4.59027 0C2.05483 0 0 2.14223 0 4.78489C0 6.22367 0.611694 7.51088 1.57576 8.38744L8.08102 15.1681C8.19212 15.2839 8.34279 15.3489 8.49995 15.3489C8.65711 15.3489 8.80778 15.2839 8.91888 15.1681L15.4241 8.38744C16.3882 7.51088 17 6.22367 17 4.78489Z" fill="#3686CD"/>
            </svg>
        </div>

        <div class="list-product-description">
            <p><?= render($fields['title']->content)?></p>
        </div>

        <div class="list-product-status">
            <p><?= render($fields['field_lot_status']->content)?></p>

        <div class="list-product-location">
            <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.175 0.300049C2.32156 0.300049 0 2.7076 0 5.66673C0 6.55506 0.214166 7.43584 0.621302 8.21707L4.892 16.2271C4.94886 16.3339 5.0572 16.4 5.175 16.4C5.2928 16.4 5.40114 16.3339 5.458 16.2271L9.73027 8.21443C10.1358 7.43584 10.35 6.55502 10.35 5.66669C10.35 2.7076 8.02844 0.300049 5.175 0.300049ZM5.175 8.35005C3.74828 8.35005 2.58752 7.14629 2.58752 5.66673C2.58752 4.18716 3.74828 2.9834 5.175 2.9834C6.60172 2.9834 7.76248 4.18716 7.76248 5.66673C7.76248 7.14629 6.60172 8.35005 5.175 8.35005Z" fill="#3686CD"/>
            </svg>
            <?= render($fields['field_lot_location']->content)?>
        </div>


        <div class="list-product-category">

            <??>

        </div>

        <div class="list-product-price">
            <?= render($fields['field_lot_price']->content)?>
        </div>

        <div class="list-product-torgi-block">

                <div class="beforeBeginning">
                <?= render($fields['field_trading_start']->content)?>
                </div>

            <div class="more-details">
                <?= render($fields['view_node']->content)?>
            </div>
        </div>
    </div>
</div>
