<div class="views-exposed-form">
    <div class="views-exposed-widgets clearfix">
        <!-- Статус -->
        <div class="views-widget">
            <div class="caption">
                <?= $widgets['filter-field_lot_status_value']->label?>
            </div>
            <?= $widgets['filter-field_lot_status_value']->widget?>
        </div>
        <!-- местонахождение -->
        <div class="views-widget">
            <div class="caption">
                <?= $widgets['filter-field_lot_location_value']->label?>
            </div>
            <?= $widgets['filter-field_lot_location_value']->widget?>
        </div>

        <!-- Цена edit-field-tovar-price-value -->

        <div class="views-widget">
            <div class="caption">
                <?= $widgets['filter-field_lot_price_value']->label?>
            </div>
            <div id="demo_2"></div>

            <div class="min-max-price">
                <?= $widgets['filter-field_lot_price_value']->widget?>
            </div>

        </div>

        <!-- Сортировка -->

        <div class="views-widget">
            <? if(isset($sort_by)) echo $sort_by;?>
            <? if(isset($sort_order)) echo $sort_order;?>
        </div>

        <div class="" id="filter-button">
            <!-- применить -->
            <div class="views-exposed-widget views-submit-button">
                <?= $button;?>
            </div>

            <!-- кнопка отмены -->
            <?if (!empty($reset_button)):?>
                <div class="views-exposed-widget views-reset-button">
                    <a onclick="document.location.reload(true);">Отменить</a>
                </div>
            <?endif;?>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function () {

    var demo = jQuery("#demo_2");
    demo.ionRangeSlider({
        type: "double",
        min: 0,
        max: 2000000,
        from: 0,
        to: 2000000
    });

    jQuery("#edit-field-lot-price-value-min").val(0);
    jQuery("#edit-field-lot-price-value-max").val(2000000);

    demo.on("change", function () {
        let input = jQuery(this);
        let from = input.data("from");
        let to = input.data("to");

        jQuery("input[name='field_lot_price_value[min]']").val(from);
        jQuery("input[name='field_lot_price_value[max]']").val(to);
    });

    var d5_instance = demo.data("ionRangeSlider");

    d5_instance.update({
        from: jQuery("input[name='field_lot_price_value[min]']").val(),
        to: jQuery("input[name='field_lot_price_value[max]']").val()
    });
})
</script>
