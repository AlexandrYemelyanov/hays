<template>
	<div>
		<form class="hays_form" id="SGFORM">
			<div class="box check-salary-benchmark">
				<h2 class="underline">Проверь свою заработную плату с Hays</h2>
				<p
						class="text-heading"
				>Достаточно ли вам платят относительно ваших коллег в индустрии? Независимо от того, ищете ли вы новую
					работу или планируете просить о повышении заработной платы, наш барометр поможет понять, каковы
					средние показатели внутри рынка. Просто заполните поля ниже (вся информация хранится анонимно) и
					барометр покажет, как ваша позиция соотносится с самыми высокими, средними и низкими показателями на
					данной позиции.</p>
				<div class="row">
					<div class="col col-4 first">
						<!--salary guide design change for enCA-->
						<ul class="form label-in-row salary-benchmark">
							<li class="first">
								<label class="required">Отрасль / Функция</label>
								<select
										v-model="activeIndustry"
										@change="handleInputChange('industry')"
										class="selectbox_salary_guide mandatory"
										name="category_salary_guide"
										:disabled="inputs.industry.disabled"
								>
									<option value>Пожалуйста, выберите</option>
									<option
											v-for="industry in industries"
											:value="industry.id"
									>{{industry.label}}
									</option>
								</select>
								<input
										name="INDUSTRY_value"
										id="SGFORMINDUSTRY_value"
										type="hidden"
										value
								>
								<label
										v-if="!inputs.industry.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li id="query1">
								<label class="required">Направление / Специализация</label>
								<select
										:disabled="inputs.sector.disabled"
										id="SGFORMSECTOR"
										v-model="activeSector"
										@change="handleInputChange('sector')"
										class="mandatory"
										name="SECTOR"
								>
									<option v-if="inputs.sector.loading" value>Загрузка...</option>
									<option v-else value>Пожалуйста, выберите</option>
									<option
											v-for="sector in sectors"
											:value="sector.label"
									>{{sector.label}}
									</option>
								</select>
								<input
										name="SECTOR_value"
										id="SGFORMSECTOR_value"
										type="hidden"
										value
								>
								<label
										v-if="!inputs.sector.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li id="query5">
								<label class="required">Названиие позиции</label>
								<select
										v-model="activePosition"
										id="SGFORMPOSITIONNAME"
										name="POSITIONNAME"
										@change="handleInputChange('position')"
										class="mandatory"
										:disabled="inputs.position.disabled"
								>
									<option v-if="inputs.position.loading" value>Загрузка...</option>
									<option v-else value>Пожалуйста, выберите</option>
									<option
											v-for="position in uniquePositions"
											:value="position"
									>{{position}}
									</option>
								</select>
								<input
										name="POSITIONNAME_value"
										id="SGFORMPOSITIONNAME_value"
										type="hidden"
										value
								>
								<label
										v-if="!inputs.position.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li>
								<label class="required">Опыт работы</label>
								<select
										v-model="activeExperience"
										id="SGFORMEXPERIENCE"
										@change="handleInputChange('experience')"
										class="mandatory"
										name="EXPERIENCE"
										:disabled="inputs.experience.disabled"
								>
									<option
											v-if="!inputs.experience.disabled"
											value
									>Пожалуйста, выберите
									</option>
									<option v-else-if="inputs.experience.loading" value>Загрузка...</option>
									<option v-else value>-</option>
									<option
											v-for="experience in filteredExperiences"
											:value="experience.id"
									>{{experience.label}}
									</option>
								</select>
								<input
										name="EXPERIENCE_value"
										id="SGFORMEXPERIENCE_value"
										type="hidden"
										value
								>
								<label
										v-if="!inputs.companyTypes.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li id="query4">
								<label class="required">Тип компании</label>
								<select
										v-model="activeCompanyType"
										id="SGFORMCOMPANY"
										@change="handleInputChange('companyTypes')"
										class="mandatory"
										name="COMPANY"
										:disabled="inputs.companyTypes.disabled"
								>
									<option
											v-if="!inputs.companyTypes.disabled"
											value
									>Пожалуйста, выберите
									</option>
									<option
											v-else-if="inputs.companyTypes.loading"
											value
									>Загрузка...
									</option>
									<option v-else value>-</option>
									<option
											v-for="companyType in filteredCompanyTypes"
											:value="companyType.id"
									>{{companyType.label}}
									</option>
								</select>
								<input
										name="COMPANY_value"
										id="SGFORMCOMPANY_value"
										type="hidden"
										value
								>
								<label
										v-if="!inputs.companyTypes.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li id="query6">
								<label class="required">Регион</label>
								<select
										v-model="activeLocation"
										id="SGFORMLOCATIONNAME"
										name="LOCATIONNAME"
										@change="handleInputChange('region')"
										class="mandatory"
										:disabled="inputs.region.disabled"
								>
									<option
											v-if="!inputs.region.disabled"
											value
									>Пожалуйста, выберите
									</option>
									<option v-else-if="inputs.region.loading" value>Загрузка...</option>
									<option v-else value>-</option>
									<option
											v-for="location in filteredLocations"
											:value="location.id"
									>{{location.label}}
									</option>
								</select>
								<input
										name="LOCATIONNAME_value"
										id="SGFORMLOCATIONNAME_value"
										type="hidden"
										value
								>
								<label
										v-if="!inputs.region.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li>
								<label
										id="label"
										class="required"
								>Текущая зарплата ({{currencySign}})</label>
								<input
										v-model="salary"
										id="currentSalary"
										@change="handleInputChange('salary')"
										class="mandatory number noDecimal"
										type="text"
										autocomplete="off"
										placeholder="Пожалуйста, введите Вашу зарплату"
										:disabled="inputs.salary.disabled"
								>
								<label
										v-if="!inputs.salary.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li>
								<label>Email адрес</label>
								<div class="input">
									<input
											v-model="userEmail"
											type="text"
											class="email"
											autocomplete="off"
											name="SGEmail"
											id="Email_value"
											placeholder="Пожалуйста, введите Ваш e-mail"
											:disabled="inputs.email.disabled"
									>
								</div>
							</li>
							<li>
								<input
										class="checkbox"
										id="SGFORMDisclaimer"
										type="checkbox"
										name="Disclaimer"
										v-model="policy"
								>
								<label for="SGFORMDisclaimer">
									* Я прочитал и принимаю условия
									<a
											href="/oferta-trudoustroistvo/"
											target="_blank"
									>Договора публичной оферты по содействию в трудоустройстве</a>, ознакомился с
									<a
											:href="`${themeRootDir}/../../uploads/hays_-_private-policy.pdf`"
											target="_blank"
									>Политикой обработки персональных данных</a>.
								</label>
								<label
										v-if="!inputs.policy.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li>
								<input
										class="checkbox"
										id="SGFORMSendAgree"
										type="checkbox"
										name="Disclaimer"
										v-model="sendAgree"
								>
								<label for="SGFORMSendAgree">
									Я прочитал и принимаю <a href="/oferta-marketing/" target="_blank">условия Договора
									публичной оферты по осуществлению маркетинговых рассылок</a>.
								</label>
								<label
										v-if="!inputs.policy.valid"
										class="error"
								>Это поле обязательно для заполнения.</label>
							</li>
							<li class="last">
								<input
										type="button"
										id="submitbutton"
										name="Submit"
										class="btn btn-block wj-btn-standard"
										value="Показать результат"
										:disabled="hasLoadingInputs"
										@click.prevent="checkSalary()"
								>
							</li>
							<li>
								<a href="/res/salary-guide-2/" class="btn btn-block wj-btn-standard">Скачать гид</a>
							</li>
						</ul>
					</div>

					<div
							v-if="salary !== '' && positionForCompare && barometerVisible"
							class="col col-4 barometerDisplay last floatRight barometer-active"
					>
						<p class="text-headingforuk">
							<b>
								Ниже приведены результаты сравнения вашей заработной планы с показателями на рынке.
								Все актуальные вакансии доступны <a href="https://hays.ru/search/">по ссылке</a>
							</b>
						</p>
						<div class="barometerSGUpdated">
							<div
									id="baramoterAngle"
									:style="`transform: rotate(${barometerRotateDegree}deg); -webkit-transform: rotate(${barometerRotateDegree}deg);`"
							></div>
						</div>
						<div class="legend legendSGUpdated">
							<table>
								<tbody>
								<tr>
									<td class="color-palate">
										<img
												:src="`${themeRootDir}/assets/img/icons/legend_self.png`"
												class="self"
												alt
										>
									</td>
									<td class="nameUK">Ваша</td>
									<td
											id="self_salary"
											class="amount"
									>{{salaryString}} {{currencySign}}
									</td>
								</tr>
								<tr>
									<td class="color-palate">
										<img
												:src="`${themeRootDir}/assets/img/icons/legend_highest.png`"
												class="highest"
												alt
										>
									</td>
									<td class="nameUK">Максимальная</td>
									<td
											id="highest_salary"
											class="amount"
									>{{(+positionForCompare.maxSalary).toLocaleString('ru-RU')}} {{currencySign}}
									</td>
								</tr>
								<tr>
									<td class="color-palate">
										<img
												:src="`${themeRootDir}/assets/img/icons/legend_avarage.png`"
												class="avarage"
												alt
										>
									</td>
									<td class="nameUK">Средняя</td>
									<td
											id="average_salary"
											class="amount"
									>{{(+positionForCompare.averageSalary).toLocaleString('ru-RU')}} {{currencySign}}
									</td>
								</tr>
								<tr>
									<td class="color-palate">
										<img
												:src="`${themeRootDir}/assets/img/icons/legend_lowest.png`"
												class="lowest"
												alt
										>
									</td>
									<td class="nameUK">Минимальная</td>
									<td
											id="lowest_salary"
											class="amount"
									>{{(+positionForCompare.minSalary).toLocaleString('ru-RU')}} {{currencySign}}
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						<!--Changes for my salary display -->
						<div class="salary-data">
							<p
									id="salary-range"
									:class="['salary-range', salaryDifference < 0 ? 'lowest' : 'high']"
									v-if="salaryDifference !== 0"
							>Ваша зарплата на {{Math.abs(salaryDifference).toLocaleString('ru-RU')}} {{currencySign}}
								{{salaryDifference < 0 ? 'ниже' : 'выше'}} чем средняя.</p>
							<p
									class="salary-range average"
									v-else
							>Ваша зарплата совпадает со средней</p>
							<div
									id="user-salary"
									class="user-salary"
							>{{salaryString}} {{currencySign}} / месяц
							</div>
							<span
									class="myCurrentSalary"
							>Моя текущая зарплата на позиции {{activePosition}}</span>
						</div>
						<div class="action hideInSGUpdated">
							<a
									href="/send-resume/"
									class="input btn wj-btn-standard"
							>Отправить резюме</a>
							<a href="/contacts/" class="input btn wj-btn-standard">Связаться с нами</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
	import api from "./api";

	export default {
		data() {
			return {
				currencySign: "₽",
				themeRootDir: window.salaryCheckerWP.themeRoot,
				activeIndustry: "",
				industries: window.salaryCheckerWP.industries,
				sectors: [],
				activeSector: "",
				companyTypes: [],
				activeCompanyType: "",
				positions: [],
				activePosition: "",
				experiences: [],
				activeExperience: "",
				locations: [],
				activeLocation: "",
				salary: "",
				userEmail: "",
				policy: true,
				sendAgree: true,
				inputs: {
					industry: {
						id: "industry",
						disabled: false,
						valid: true,
						required: true,
						valueProp: "activeIndustry",
						type: "select",
						labelsProp: "industries"
					},
					sector: {
						id: "sector",
						disabled: false,
						loading: false,
						valid: true,
						required: true,
						valueProp: "activeSector",
						type: "select",
						labelsProp: "sectors"
					},
					position: {
						id: "position",
						disabled: false,
						valid: true,
						required: true,
						valueProp: "activePosition",
						type: "select",
						labelsProp: "positions"
					},
					experience: {
						id: "experience",
						disabled: true,
						valid: true,
						required: true,
						valueProp: "activeExperience",
						type: "select",
						labelsProp: "experiences"
					},
					companyTypes: {
						id: "companyTypes",
						disabled: true,
						valid: true,
						required: true,
						valueProp: "activeCompanyType",
						type: "select",
						labelsProp: "companyTypes"
					},
					region: {
						id: "region",
						disabled: true,
						valid: true,
						required: true,
						valueProp: "activeLocation",
						type: "select",
						labelsProp: "locations"
					},
					salary: {
						id: "salary",
						disabled: false,
						valid: true,
						required: true,
						valueProp: "salary"
					},
					policy: {
						id: "policy",
						disabled: false,
						valid: true,
						required: true,
						valueProp: "policy"
					},
					email: {
						id: "email",
						disabled: false,
						valid: true,
						valueProp: "userEmail"
					}
				},
				barometerVisible: false
			};
		},
		watch: {
			activeIndustry() {
				this.fetchUpdateSectors();
			},
			activeSector() {
				this.activePosition = "";
				this.fetchUpdatePositionsData();
			},
			activePosition() {
				this.activeExperience = "";
				this.activeLocation = "";
				this.activeCompanyType = "";
			},
			filteredExperiences() {
				if (this.filteredExperiences.length) {
					this.enableInput("experience");
				} else {
					this.disableIpnut("experience");
				}
			},
			filteredCompanyTypes() {
				if (this.filteredCompanyTypes.length) {
					this.enableInput("companyTypes");
				} else {
					this.disableIpnut("companyTypes");
				}
			},
			filteredLocations() {
				if (this.filteredLocations.length) {
					this.enableInput("region");
				} else {
					this.disableIpnut("region");
				}
			}
		},
		computed: {
			activePositionObjects() {
				return this.positions.filter(position => {
					let isActive = position.label === this.activePosition;

					if (this.activeCompanyType)
						isActive =
							isActive &&
							position.companyType === this.activeCompanyType;

					if (this.activeLocation)
						isActive =
							isActive &&
							position.companyType === this.activeCompanyType;

					return isActive;
				});
			},
			filteredExperiences() {
				return this.experiences.filter(experience => {
					for (let position of this.activePositionObjects) {
						if (position.experience === experience.id) return true;
					}

					return false;
				});
			},
			filteredLocations() {
				return this.locations.filter(location => {
					for (let position of this.activePositionObjects) {
						if (position.location === location.id) return true;
					}

					return false;
				});
			},
			filteredCompanyTypes() {
				return this.companyTypes.filter(type => {
					for (let position of this.activePositionObjects) {
						if (position.companyType === type.id) return true;
					}

					return false;
				});
			},
			uniquePositions() {
				return this.positions
					.map(position => position.label)
					.filter(
						(position, index, self) => self.indexOf(position) === index
					);
			},
			positionForCompare() {
				return this.positions.find(position => {
					return (
						position.label === this.activePosition &&
						position.location === this.activeLocation &&
						position.companyType === this.activeCompanyType &&
						position.experience === this.activeExperience
					);
				});
			},
			barometer() {
				if (this.positionForCompare && (this.salary || this.salary === 0)) {
					let average = +this.positionForCompare.averageSalary;
					let min = +this.positionForCompare.minSalary;
					let max = +this.positionForCompare.maxSalary;
					let salary = +this.salary.replace(/\D/g, "");

					let precent = parseInt((100 * (salary - min)) / (max - min));
					if (precent < 0) precent = 0;
					if (precent > 100) precent = 100;

					// let minAvgMiddle = min + (average - min) / 2
					// let avgMaxMiddle = average + (max - average) / 2

					if (salary < average) {
						precent = (((salary - min) * 100) / (average - min)) / 2;
					}

					if (salary === average) {
						precent = 50;
					}

					if (salary > average) {
						precent =
							50 + ((salary - average) * 100) / (max - average) / 2;
					}

					return precent;
				}

				return undefined;
			},
			barometerRotateDegree() {
				if (this.barometer != undefined) {
					let rotate = 50 + (270 * (this.barometer / 100));

					if (rotate < 50) rotate = 50;
					if (rotate > 320) rotate = 320;

					return rotate;
				}

				return 0;
			},
			salaryDifference() {
				if (this.positionForCompare && this.salary) {
					let average = +this.positionForCompare.averageSalary;
					let salary = +this.salary.replace(/\D/g, "");

					return salary - average;
				}

				return undefined;
			},
			salaryString() {
				return (+this.salary.replace(/\D/g, "")).toLocaleString("ru-RU");
			},
			hasLoadingInputs() {
				return Object.values(this.inputs).filter(input => input.loading).length > 0;
			}
		},
		methods: {
			checkSalary() {
				if (this.hasLoadingInputs) return false;

				if (this.positionForCompare && (this.salary || this.salary === 0)) {
					this.barometerVisible = true;
				} else {
					this.validate();
					this.barometerVisible = false;
				}
			},
			enableInput(name) {
				this.inputs[name].disabled = false;
			},
			disableIpnut(name) {
				this.inputs[name].disabled = true;
			},
			setLoadingInput(name) {
				this.inputs[name].loading = true;
			},
			removeLoadingInput(name) {
				this.inputs[name].loading = false;
			},
			handleInputChange(name) {
				this.validate(name);
			},
			validateSelect(input) {
				if (
					input.required &&
					this[input.labelsProp].length > 0 &&
					!this[input.valueProp]
				) {
					input.valid = false;
				} else {
					input.valid = true;
				}
			},
			validateSingle(input) {
				if (input.type && input.type === "select") {
					this.validateSelect(input);
					return;
				}

				if (!this[input.valueProp] && input.required) {
					input.valid = false;
				} else {
					input.valid = true;
				}
			},
			validate(name = "all") {
				if (name === "all") {
					Object.values(this.inputs).forEach(this.validateSingle);
				} else {
					let input = this.inputs[name];
					this.validateSingle(input);
				}
			},
			fetchUpdateSectors() {
				this.setLoadingInput("sector");

				this.activeSector = '';
				this.activeExperience = '';
				this.activeLocation = '';
				this.activeCompanyType = '';
				this.position = '';

				api.getSectors(this.activeIndustry).then(result => {
					this.removeLoadingInput("sector");
					this.sectors = result.sectors;
				});
			},
			fetchUpdatePositionsData() {
				this.setLoadingInput("position");
				this.setLoadingInput("companyTypes");
				this.setLoadingInput("region");
				this.setLoadingInput("experience");

				api.getPositions({
					industry: this.activeIndustry,
					sector: this.activeSector
				}).then(result => {
					console.log(result);
					this.experiences = result.experiences;
					this.locations = result.locations;
					this.companyTypes = result.companyTypes;
					this.positions = result.positions;

					if (this.companyTypes.length <= 0) {
						this.disableIpnut("companyTypes");
					}
					if (this.locations.length <= 0) {
						this.disableIpnut("region");
					}
					if (this.experiences.length <= 0) {
						this.disableIpnut("experience");
					}

					this.activeExperience = '';
					this.activeLocation = '';
					this.activeCompanyType = '';
					this.position = '';

					this.removeLoadingInput("position");
					this.removeLoadingInput("companyTypes");
					this.removeLoadingInput("region");
					this.removeLoadingInput("experience");
				});
			}
		}
	};
</script>

<style lang="scss" scoped>
	h2,
	.h2 {
		font-size: 22px;
		color: #002776;
		font-weight: 500;
		line-height: 1;
	}

	p {
		margin: 0 0 15px;
	}

	input[type="text"],
	input[type="password"],
	input[type="search"],
	input[type="tel"],
	input[type="email"],
	input[type="number"],
	textarea,
	select,
	.multiselect .multitoggle {
		font-weight: 400;
		padding: 8px 10px;
		background: #fff;
		color: #333;
		border: 0;
		width: 100%;
		min-height: 40px;
		font-size: 14px;
		resize: none;
	}

	input[type="checkbox"] {
		margin: 3px 0.5ex;
		padding: 0;
		background: initial;
		border: initial;
		width: auto;
		cursor: default;
	}

	input[type="checkbox"] {
		margin: 3px 3px 3px 4px;
	}

	select {
		padding: 7px 8px;
		height: 40px;
		min-height: 0 !important;
		border-radius: 0;
		vertical-align: middle;
		transition: all ease 0.7s;

		&:hover {
			box-shadow: 0 0 2px rgba(0, 158, 217, 0.5);
		}
	}

	select + input,
	input + input,
	label + input,
	textarea + input {
		margin-top: 10px;
	}

	label.error {
		margin-top: 5px !important;
		display: block;
		color: #e98300;
		font-size: 12px;
	}

	.required:after {
		content: "*";
		color: #e40000;
		font-size: 12px;
		margin-left: 2px;
		position: relative;
		top: -5px;
	}

	.row {
		display: flex;
		flex-wrap: wrap;

		.col {
			margin: 0 10px;
		}

		.col:last-child {
			margin-right: 0;
		}
	}

	.box {
		padding: 20px;
		margin: 20px 0 0;
		background: #fff;
	}

	.box .col-4 {
		width: 320px;

		@media screen and (max-width: 980px) {
			width: 100%;
		}
	}

	.box ul {
		list-style: none;
	}

	.tada {
		-webkit-animation-name: tada;
		animation-name: tada;
	}

	#Job_Search li > label {
		min-height: 44px;
		width: auto !important;
	}

	#Job_Search_APAC li > label {
		min-height: 44px;
		width: auto !important;
	}

	.box .content_main ul {
		list-style: outside none disc;
		margin-left: 18px;
		list-style-type: disc;
	}

	.box .hi_inner ul {
		list-style: outside none disc;
		margin-left: 18px;
		list-style-type: disc;
	}

	.intro-btn {
		text-align: center;
		margin-bottom: 20px;
	}

	.intro-btn .btn a {
		color: #fff;
	}

	.disabledOp {
		border: 1px solid #999;
		color: #333;
		opacity: 0.5;
	}

	.disabledOp option {
		color: #000;
		opacity: 1;
	}

	.content-img .salary-guide-pic {
		margin-bottom: 20px;
	}

	.check-youe-salary-benchmark {
		width: 100%;
		margin-top: 20px;
		background: #e98300;
		position: relative;
		padding: 12px 12px 12px 60px;
		text-align: center;
	}

	.check-youe-salary-benchmark:before {
		background: rgba(0, 0, 0, 0) url(./assets/img/sprite.png) no-repeat -26px -34px;
		content: "";
		height: 24px;
		left: 186px;
		position: absolute;
		top: 9px;
		width: 30px;
	}

	.barometer {
		text-align: center;
		margin-top: 37px;
		background: url(./assets/img/barometer.jpg) no-repeat;
		width: 242px;
		height: 242px;
		margin-left: 10px;
		position: relative;
	}

	.barometerukcerow {
		margin-bottom: 30px;
	}

	.barometer > div {
		background: url(./assets/img/kanta.png) no-repeat;
		width: 94px;
		height: 29px;
		position: absolute;
		left: 73px;
		top: 105px;
	}

	.barometer-btn {
		list-style: none;
		position: relative;
		width: 100%;
		text-align: center;
	}

	.barometer-btn li {
		background: #d8dfe1;
		text-align: center;
		padding: 9px 33px;
		display: inline-block;
		margin: 0 0 0 -4px;
		cursor: pointer;
	}

	.barometer-btn li a {
		color: #fff;
		font-weight: 700;
	}

	.barometer-btn li.active {
		background: #739600;
	}

	.barometerDisplayukcerow {
		position: relative;
	}

	.legend {
		list-style: none;
		text-align: center;
		padding: 30px 0;
	}

	.legendukcerow {
		position: absolute;
		top: 150px;
		right: 40px;
	}

	.legend li {
		font-size: 15px;
		color: #666666;
		position: relative;
	}

	.legend li span {
		color: #aaa;
		float: right;
	}

	.legend .self:before {
		content: "";
		background: url(./assets/img/sprite.png) no-repeat 0 0;
		height: 24px;
		width: 24px;
		position: absolute;
		top: -5px;
		left: -29px;
	}

	.legend .highest:before {
		content: "";
		background: url(./assets/img/sprite.png) no-repeat 0 -29px;
		height: 24px;
		width: 24px;
		position: absolute;
		top: 1px;
		left: -29px;
	}

	.legend .avarage:before {
		content: "";
		background: url(./assets/img/sprite.png) no-repeat 0 -51px;
		height: 24px;
		width: 24px;
		position: absolute;
		top: 1px;
		left: -29px;
	}

	.legend .lowest:before {
		content: "";
		background: url(./assets/img/sprite.png) no-repeat 0 -75px;
		height: 24px;
		width: 24px;
		position: absolute;
		top: 3px;
		left: -29px;
	}

	.grey-box {
		background: #e2e2e2;
	}

	.legend .name {
		color: #666;
		font-size: 15px;
		padding-right: 10px;
	}

	.legend table {
		width: auto;
		table-layout: fixed;
		margin: 0 auto;
	}

	.legend .amount {
		color: #aaa;
		font-size: 15px;
		width: 100px;
		word-break: break-all;
		white-space: normal;
	}

	.legend .name {
		width: 70px;
	}

	.legend .color-palate {
		padding-right: 10px;
		padding-top: 8px;
		width: 23px;
		box-sizing: content-box;
	}

	.legend table td {
		vertical-align: top;
	}

	.salary-guide .content-img {
		border-bottom: 1px solid #e5e5e5;
		padding: 20px 0;
	}

	.salary-guide .content-img:first-child {
		padding-top: 0;
	}

	.salary-guide .content-img:last-child {
		border-bottom: none;
	}

	.dowmload-PDF {
		display: block;
		position: relative;
	}

	.dowmload-PDF .input {
		width: 70%;
	}

	.dowmload-PDF a.btn {
		position: absolute;
		top: -5px;
		right: 0;
		height: 40px;
		width: 30%;
	}

	.salary-benchmark input[type="text"],
	.salary-benchmark select,
	.salary-guide-download select,
	.salary-guide-download input[type="text"] {
		background: #fff;
		border: 1px solid #ececec;
	}

	.salary-statement {
		background: #d8ecf3;
	}

	.salary-statement h2 {
		margin: 5px 0;
	}

	.salary-statement p {
		font-size: 14px;
		margin-bottom: 0;
	}

	.underline {
		border-bottom: 1px solid #e5e5e5;
		margin-bottom: 20px !important;
		padding-bottom: 12px;
	}

	.check-salary-benchmark h2 {
		position: relative;
		padding-left: 40px;
	}

	.check-salary-benchmark h2:before {
		background: rgba(0, 0, 0, 0) url(./assets/img/sprite.png) no-repeat -26px -7px;
		content: "";
		height: 24px;
		left: -3px;
		position: absolute;
		top: -2px;
		width: 30px;
	}

	.check-salary-benchmark p {
		font-size: 16px;
		line-height: 20px;
	}

	.check-salary-benchmark .text-heading {
		font-size: 16px;
	}

	@media screen and (max-width: 1024px) {
		.barometer {
			margin: 16px auto 0;
		}

		.legend {
			margin: 0 auto;
			width: 260px;
		}

		.legendukcerow {
			position: static;
		}

		.barometerDisplayukcerow {
			padding: 0;
		}
	}

	.form li {
		padding: 8px 0;
	}

	.form li > label {
		float: left;
		margin: 0 10px 5px 0;
		display: block;

		@media screen and (max-width: 980px) {
			float: none;
		}
	}

	.form .sg_submit_button_tick {
		position: relative;
	}

	.form .sg_submit_button_tick:after {
		position: absolute;
		background: rgba(0, 0, 0, 0) url(./assets/img/sprite.png) no-repeat -26px -29px;
		content: "";
		height: 24px;
		top: 8px;
		width: 30px;
		left: 186px;
	}

	@media screen and (max-width: 980px) {
		.form .sg_submit_button_tick::after {
			left: -1px;
		}
	}

	@media screen and (max-width: 360px) {
		.form .sg_submit_button_tick::after {
			left: 40px;
		}
	}

	.salary-barometer {
		position: relative;
	}

	.barometer-overlay {
		background: #fff;
		height: 570px;
		opacity: 0.6;
		position: absolute;
		right: 0;
		top: 0;
		width: 262px;
		z-index: 1;
	}

	.anythingSlider-default {
		margin: 0;
	}

	.bottom-slider #hero-area-image {
		margin-top: 20px;
		padding: 0;
	}

	.slider-container {
		overflow: hidden;
	}

	.bg-hays-cyan h2 {
		margin-top: 20px;
	}

	.text-container {
		width: 49%;
	}

	.img-container,
	.text-container {
		float: left;
	}

	.anythingSlider-default .forward {
		right: 15px;
	}

	.anythingSlider-default .back {
		right: 48px;
	}

	.bottom-slider .bg-hays-cyan h2 {
		width: 80%;
	}

	.img-container {
		width: 350px;
		height: 250px;
		position: relative;
		display: inline-block;
		overflow: hidden;
		margin-right: 20px;
		clip: rect(0, 350px, 250px, 0);
	}

	.img-container img {
		display: block;
		width: 100%;
		height: 100%;
	}

	.noImage .text-container {
		width: 100%;
		padding: 20px;
	}

	.ui-autocomplete.suggestion li:before {
		content: "\e80d";
		font-family: fontello;
		color: #9f9f9f;
		font-size: 13px;
		font-style: normal;
		padding-right: 10px;
	}

	.ui-autocomplete.history li:before {
		content: "\f1da";
		font-family: fontello;
		color: #9f9f9f;
		font-size: 13px;
		font-style: normal;
		padding-right: 10px;
	}

	.gcs .ui-autocomplete-loading {
		//background: #fff url(./assets/img/ajax-loader_onwhite.gif) no-repeat!important;
		background-position: right center !important;
	}

	.floatRight {
		margin-left: 95px;
	}

	.barometer-active .legend table tr:first-child {
		visibility: visible;
	}

	.salary-data {
		margin: 0 auto;
		width: 80%;
		background: #eee;
		padding: 15px;
		margin-top: 25px;
	}

	.salary-range,
	.user-salary,
	.user-salary span {
		text-align: center;
	}

	.salary-range {
		font-size: 15px;
		font-weight: 700;
		display: none;
	}

	.salary-range.high {
		color: #739600;
	}

	.salary-range.average {
		color: #e98300;
	}

	.salary-range.lowest {
		color: #d71f85;
	}

	.user-salary {
		margin-top: 0;
		font-size: 18px;
		color: #002276;
		font-weight: 700;
	}

	.user-salary span {
		display: block;
		font-size: 14px;
		color: #333;
		font-weight: 400;
	}

	.hideInSGUpdated,
	.salary-data {
		display: none;
	}

	.barometer-active .salary-data {
		display: block;
	}

	.barometer-active .action {
		margin-top: 30px;
		display: block;
	}

	.barometer-active .action .input {
		width: auto;
		font-size: 1.2rem !important;
	}

	.barometerSGUpdated {
		text-align: center;
		margin-top: 15px;
		background: url(./assets/img/barometer.jpg) no-repeat 92px 0;
		width: 440px;
		height: 270px;
		position: relative;
	}

	.barometerSGUpdated > div {
		background: url(./assets/img/kanta_V3.png) no-repeat;
		width: 26px;
		height: 88px;
		position: absolute;
		left: 200px;
		top: 78px;
		transition: transform 1s;
		transition-delay: 0.25s;
	}

	.legendSGUpdated {
		list-style: none;
		text-align: center;
		padding: 30 0;
	}

	.legendSGUpdated table {
		width: auto;
		table-layout: fixed;
	}

	.col-4.barometer-active {
		display: block;
	}

	.myCurrentSalary {
		display: block;
		font-size: 14px;
		color: #333;
		font-weight: 400;
	}

	.myCurrentSalary {
		text-align: center;
	}

	.check-salary-benchmark .text-headingforuk {
		margin-top: 4px;
		font-size: 16px;
	}

	@media screen and (max-width: 768px) {
		.barometerSGUpdated {
			margin: 16px auto 0;
			background-position: center 0;
			width: auto;
		}

		.legendSGUpdated {
			margin: 0 auto;
			width: auto;
		}

		.barometerSGUpdated > div {
			left: 326px;
		}

		.legendSGUpdated table {
			margin: 0 auto;
		}

		.barometer-active .salary-data {
			width: auto;
		}

		.barometer-active .action .input {
			width: 100%;
			font-size: 1.6rem !important;
		}

		.col-4.barometer-active {
			width: auto;
		}
	}

	@media screen and (max-width: 480px) {
		.barometerSGUpdated > div {
			left: 132px;
		}
	}

	.Hays50yrlogo {
		width: 110px;
		float: right;
	}

	.legend .nameUK {
		width: 100px;
	}

	.legend .nameFR {
		width: 141px;
	}

	.legend .amountFR {
		color: #aaa;
		font-size: 15px;
		width: 60px;
		word-break: break-all;
		white-space: normal;
	}

	.legend .amountHU {
		color: #aaa;
		font-size: 15px;
		width: 81px;
		word-break: break-all;
		white-space: normal;
	}

	.label-in-row li > label {
		float: none;
		width: auto;
		margin-right: 0;
	}

	.form li > .checkbox {
		& + label {
			display: inline;
		}
	}

	.wj-btn-standard[disabled] {
		opacity: 0.4;
	}

	.cpc-body ul:not(.wj-reset-list) {
		padding-left: 0;
	}

	.salary-benchmark li .btn {
		width: 100%;
		text-align: center;
	}
</style>