<style>
	.save-job-alert-container {
		margin-left: auto;
		margin-right: auto;
		background: #ffffff;
		padding: 20px 50px 20px 20px;
		position: fixed;
		bottom: 0;
		width: 100%;
		max-width: 1220px;
		z-index: 999;
	}

	.save-job-alert-container p {
		margin-bottom: 10px;
		font-weight: bold;
		color: #002776;
		text-align: center;
	}

	.alert-row {
		margin-left: -15px;
		margin-right: -15px;
		display: flex;
		justify-content: space-between;
	}
	@media (max-width: 980px) {
		.alert-row {
			flex-wrap: wrap;
		}
	}

	.alert-column {
		padding-left: 15px;
		padding-right: 15px;
	}
	.alert-column:nth-of-type(2) {
		flex: 1 0 300px;
	}
	@media (max-width: 980px) {
		.alert-column:nth-of-type(3) {
			margin-top: 20px;
			flex: 100%;
		}
	}

	.alert-input {
		width: 100%;
		padding: 8px;
		height: 40px;
		border: solid 1px #e3e3e3;
		background: #fafafa;
	}

	.alert-submit {
		border: none;
		height: 40px;
		display: flex;
		align-items: center;
		justify-content: center;
		width: 100%;
		max-width: 100px;
		border-radius: 0;
		font-weight: 500;
		font-size: 12px;
		color: #fff;
		cursor: pointer;
		background: #e98201;
	}
	.alert-submit.success {
		background: #969696 !important;
	}

	.alert-flex {
		display: flex;
		justify-content: space-between;
	}

	.alert-checkbox {
		margin-bottom: 5px;
		font-size: 14px;
	}

	.alert-checkbox__input {
		padding: 0;
		background: initial;
		border: initial;
		width: auto;
		cursor: default;
		margin: 3px 3px 3px 4px;
	}

	.alert-message {
		font-size: 12px;
		margin-top: 5px;
		line-height: 1.2;
	}

	.alert-message.success {
		color: green;
	}

	.alert-message.fail {
		color: red;
	}
</style>

<div class="save-job-alert-container" style="display:none;">
	<form method="POST" class="save-job-alert-form">
		<div class="alert-row">
			<div class="alert-column">
				<p>Подпишитесь на вакансии по вашему запросу</p>
			</div>
			<div class="alert-column">
				<div class="alert-flex">
					<input id="jobAlertEmail" class="alert-input" placeholder="Введите свою почту" required type="email">
					<button class="alert-submit">Подписаться</button>
				</div>
				<div class="alert-message"></div>
			</div>
			<div class="alert-column">
				<div class="alert-checkbox">
					<input
							required
						class="alert-checkbox__input"
						id="disclaimer"
						type="checkbox"
						name="Disclaimer"
					>
					<label for="disclaimer">
						Я прочитал и принимаю условия Договора публичной оферты по осуществлению рассылок вакансий.
					</label>
				</div>
				<div class="alert-checkbox">
					<input
						class="alert-checkbox__input"
						id="sendAgree"
						type="checkbox"
						name="sendAgree"
					>
					<label for="sendAgree">
						Я прочитал и принимаю <a href="/oferta-marketing/" target="_blank">условия Договора
							публичной оферты по осуществлению маркетинговых рассылок</a>.
					</label>
				</div>
			</div>
		</div>
	</form>
</div>