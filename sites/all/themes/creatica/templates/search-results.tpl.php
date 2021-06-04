
<div id="main-content">
 

<?php if (!$search_results) {?>
    <h2 style='text-align:center'><?php print t('Your search yielded no results');?></h2>
    <?php print search_help('search#noresults', drupal_help_arg());
  }else{?>

  <div class="container">
    <div class="row">
        <div class="list-content">        
          <div class="shopping-list">
            <?= $search_results; ?>
          </div>
        </div>
    </div>
  </div>
  <?}?>
  
</div>
