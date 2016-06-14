<?php

return [
    'plugin' => [
        'name' => 'Денежные единицы',
        'description' => 'Конвертация между денежными единицами',
        'tab' => 'Денежные единицы',
        'manage_currencies' => 'Управление валютой',
    ],
    'currency' => [
        'title' => 'Управление валютой',
        'update_title' => 'Обновить валюту',
        'create_title' => 'Создать валюту',
        'select_label' => 'Выбрать валюту',
        'unset_default' => 'Валюта ":currency" не может быть вторичной',
        'disabled_default' => 'Валюта ":currency" отключена и не может быть валютой по-умолчанию',
        'enable_or_disable_title' => 'Вкл. или Откл.',
        'enabled_label' => 'Вкл.',
        'enabled_help' => 'Отключенные валюты не видны для front-end',
        'enable_or_disable' => 'Вкл. или Откл.',
        'selected_amount' => 'Валюты selected: :amount',
        'enable_success' => 'Успешно включены выбранные валюты',
        'disable_success' => 'Успешно отключены выбранные валюты',
        'name' => 'Имя',
        'code' => 'Код',
        'is_primary' => 'По-умолчанию',
        'is_primary_help' => 'Выбрать эту валюту по-умолчанию',
        'is_enabled' => 'Включена',
        'is_enabled_help' => 'Сделать валюту доступной',
        'currency_code' => 'Код',
        'currency_code_help' => 'Код валюты, например RUB',
        'currency_name' => 'Название валюты',
        'currency_name_help' => '',
        'currency_symbol' => 'Символ',
        'currency_symbol_help' => 'Символ рядом с суммой $',
        'decimal_point' => 'Разделитель',
        'decimal_point_help' => 'Разделитель десятичной части',
        'thousand_separator' => 'Разделитель тысяч',
        'thousand_separator_help' => 'Символ между тысячами',
        'place_symbol_before' => 'Символ перед суммой',
        'not_available_help' => 'Не задано ни одной валюты',
        'hint_currencies' => 'Create new currencies here for translating front-end content. The default currency represents the content before it has been translated.',
    ],
    'currency_picker' => [
        'name' => 'Выбор валюты',
        'description' => 'Список валют'
    ],
    'converter' => [
        'class_name' => 'Конвертор',
        'refresh_interval' => 'Обновить интервал'
    ]
];