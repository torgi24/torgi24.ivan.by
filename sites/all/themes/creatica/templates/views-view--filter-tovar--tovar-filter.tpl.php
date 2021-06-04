
<div class="container top-filter <?php print $classes;?>">
    <div class="row">
        <div class='top-filter-items' style ='justify-content: end;'>
            <div class="item">
                <?print theme('breadcrumb', array('breadcrumb'=>drupal_get_breadcrumb()));?>
            </div>
            <div class="count" style='margin-right:20px'><?= render($header)?></div>
            <div class="count"><?= render($footer)?></div>
        </div>
        
        <div class="list-content">
        <!-- filter -->
            <div class="catalog-container">
                <div id="parameters">
                    <p class="title">Параметры</p>
                    <?= render($exposed)?>
                </div>
            </div>
            <div class="shopping-list">
                <div class="shopping-list-line ss">
                    <div class="d-none" style='display:none'> <?php echo '<pre>';count($rows);echo '</pre>'; ?></div>
                   <?= render($rows)?>
                </div>

            </div>
           
        </div>
        <?= render($pager)?>
    </div>
    
</div>
