<form class="cookie-manager" id="cookie-manager">
	<fieldset>
		<h4>Необходимые файлы Cookies</h4>
		<div class="cookie-manager-controls">
			<label><input type="radio" name="necessary" value="1"<?php if (cookie_enabled('necessary')) echo ' checked' ?>> Вкл</label>
			<label><input type="radio" name="necessary" value="0"<?php if (!cookie_enabled('necessary')) echo ' checked' ?>> Выкл</label>
		</div>
	</fieldset>
	<fieldset>
		<h4>Эксплуатационные файлы Cookies</h4>
		<div class="cookie-manager-controls">
			<label><input type="radio" name="performance" value="1"<?php if (cookie_enabled('performance')) echo ' checked' ?>> Вкл</label>
			<label><input type="radio" name="performance" value="0"<?php if (!cookie_enabled('performance')) echo ' checked' ?>> Выкл</label>
		</div>
	</fieldset>
	<fieldset>
		<h4>Функциональные файлы Cookies</h4>
		<div class="cookie-manager-controls">
			<label><input type="radio" name="functionality" value="1"<?php if (cookie_enabled('functionality')) echo ' checked' ?>> Вкл</label>
			<label><input type="radio" name="functionality" value="0"<?php if (!cookie_enabled('functionality')) echo ' checked' ?>> Выкл</label>
		</div>
	</fieldset>
</form>
<script>
(function($) {
	$('#cookie-manager input').change(function() {
		cookieManager(this.name, Boolean(+this.value));
	});
})(jQuery);
</script>
