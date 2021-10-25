<script>
<?php
  $ajax_url = admin_url('admin-ajax.php');
  $defaults = array('necessary' => true, 'performance' => true, 'functionality' => true);
  $cookie_manager = isset($_SESSION['cookie_manager']) ? $_SESSION['cookie_manager'] + $defaults : $defaults;
?>
  var ajaxURL = '<?php echo $ajax_url?>';
  var cookieManagerData = <?php echo json_encode($cookie_manager) ?>;
  function cookieEnabled(type) {
    return cookieManagerData[type];
  }
  function cookieManager(type, state) {
    cookieManagerData[type] = state;
    $.ajax({
        type: "POST",
        url: ajaxURL,
        data: {
            action : 'cookie_manager',
            type: type,
            state: +state
        },
        success: function (response) {
            //console.log('AJAX response : ',response);
        }
    });
  }

</script>