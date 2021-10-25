<h2>Виджет сравнение зарплат</h2>
<form style="margin-top:10px;" action="<?php echo admin_url('admin-post.php') ?>" method="post" enctype="multipart/form-data">
    Загрузите CSV файл с новыми позициями для виджета
    <input type="file" name="data" id="data">
    <input type="hidden" name="action" value="sc_data_import">
    <button style="display:block;" class="button button-primary">Загрузить</button>
</form>