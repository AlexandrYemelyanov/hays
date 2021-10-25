<?php

/**
 * Search control bal (filters & sorting).
 */

?>

<section class="scv-control-bar">
    <button class="scv-control-bar__reset-results wj-btn-standard">Очистить поиск</button>
    <ul class="scv-control-bar__filters">
        <li class="scv-control-bar__filters-payment">
            <button class="wj-btn-standard wj-icon-cm-adjust">Зарплата<i class="wj-icon-cm-arrow-down"></i></button>
            <ul class="svc-cb-menu__fp">
                <li>
                    <p>Тип оплаты</p>
                    <select class="svc-cb-payment-type">
                        <option value="yearly">Ежегодно</option>
                        <option value="monthly">Ежемесячно</option>
                        <option value="hourly">Ежедневно</option>
                        <option value="daily">Ежечасно</option>
                    </select>
                </li>
                <li>
                    <p>Зарплатный коридор</p>
                    <? /*
                    <select>
                        <option value="0">RUB0</option>
                        <option value="10">RUB10k</option>
                        <option value="20">RUB20k</option>
                        <option value="30">RUB30k</option>
                        <option value="200">RUB30k</option>
                    </select>
                    <select>
                        <option value="0">RUB0</option>
                        <option value="10">RUB10k</option>
                        <option value="20">RUB20k</option>
                        <option value="30">RUB30k</option>
                        <option value="100">RUB200k</option>
                    </select>
                    */ ?>
                </li>
                <li><button class="wj-btn-standard svc-cb-fp">Обновить</button></li>
            </ul>
        </li>
        <li class="scv-control-bar__filters-vacancy-type">
            <button class="wj-btn-standard">Тип вакансии<i class="wj-icon-cm-arrow-down"></i></button>
            <ul class="svc-cb-menu__vt">
                <li><a>Постоянная вакансия<span>&nbsp;645</span></a></li>
                <li><a>Временная вакансия<span>&nbsp;3</span></a></li>
                <li><a>Контракт<span></span></a></li>
            </ul>
        </li>
        <li class="scv-control-bar__filters-sort-by">
            <button class="wj-btn-standard">Сортировать по релевантности<i class="wj-icon-cm-arrow-down"></i></button>
            <ul class="svc-cb-menu__sb">
                <li><a>Сортировать по релевантности</a></li>
                <li><a>Сортировать по названию</a></li>
                <li><a>Сортировать по дате</a></li>
            </ul>
        </li>
    </ul>
</section>