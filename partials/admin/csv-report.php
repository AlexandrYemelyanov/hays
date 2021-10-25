<?php 
ini_set('display_errors', 'On'); // сообщения с ошибками будут показываться
error_reporting(E_ALL); // E_ALL - отображаем ВСЕ ошибки

$dateStart = isset($_GET['date-start']) ? $_GET['date-start'] : null; 
$dateStop = isset($_GET['date-stop']) ? $_GET['date-stop'] : null;

?>

<h2>Генерация CSV отчета</h2>

<form action="<?php echo admin_url('admin-post.php'); ?>">
	<label for="date-start">Начальная дата:</label>
	<input type="date" value="<?=strip_tags(isset($dateStart) ? $dateStart : '')?>" name="date-start" >
	<label for="date-stop">Конечная дата:</label>
	<input type="date" value="<?=strip_tags(isset($dateStop) ? $dateStop : '')?>" name="date-stop" >
	<input name="action" type="hidden" value="generate_csv_report">
	<input class="button button-primary" type="submit">
</form>

<form style="margin-top:25px;" action="<?php echo admin_url('admin-post.php'); ?>">
	<input hidden name="published" value="true" type="text">
	<input name="action" type="hidden" value="generate_csv_report">
	<button class="button button-primary">Все опубликованные</button>
</form>





