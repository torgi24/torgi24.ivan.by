  <div id="branding" class="clearfix">
    <?php print $breadcrumb; ?>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h1 class="page-title"><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php print render($primary_local_tasks); ?>
  </div>

  <div id="page">
    <?php if ($secondary_local_tasks): ?>
      <div class="tabs-secondary clearfix"><?php print render($secondary_local_tasks); ?></div>
    <?php endif; ?>

    <div id="content" class="clearfix">
      <div class="element-invisible"><a id="main-content"></a></div>
      <?php if ($messages): ?>
        <div id="console" class="clearfix"><?php print $messages; ?></div>
      <?php endif; ?>
      <?php if ($page['help']): ?>
        <div id="help">
          <?php print render($page['help']); ?>
        </div>
      <?php endif; ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php print render($page['content']); ?>
    </div>

    <div id="footer">
      <?php print $feed_icons; ?>
    </div>

<script>
    function toFixedNoRounding(n, valNum) {
  const reg = new RegExp("^-?\\d+(?:\\.\\d{0," + n + "})?", "g")
  const a = valNum.match(reg)[0];
  const dot = a.indexOf(".");
  if (dot === -1) { // integer, insert decimal dot and pad up zeros
      return a + "." + "0".repeat(n);
  }
  const b = n - (a.length - dot) + 1;
  return b > 0 ? (a + "0".repeat(b)) : a;
}

document.querySelector('#edit-field-lot-min-price-und-0-value').addEventListener('change' , function(){
          this.value = toFixedNoRounding(2,this.value)

})
</script>
    <!--Подключаем библиотеку-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#edit-submit").click(function(){
          for(var i=0;i<12;i++) {
            if ($('#edit-field-lot-status-und-status' + i).is(':checked')) {
              var status = $('#edit-field-lot-status-und-status' + i).val();
            }
          }
          if(status == 'status10' || status == 'status11') {
            var node = $('a.active').attr('href');
            node = node.replace('/node/', '');
            node = node.replace('/edit', '');
            $.ajax({
              url: "../../copy_node.php",
              type:"POST",
              data:{nodeMy: node},
              success:function(result){
                //console.log(result);
                //alert(result);
              }});
          }
        });
      });
    </script>
  </div>
