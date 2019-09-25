<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Поле :attribute должно быть принято.',
    'active_url' => 'Значение поля :attribute не является действительным URL.',
    'after' => 'Значение поля :attribute должно быть датой после :date.',
    'after_or_equal' => 'Значение поля :attribute должно быть датой после или совпадать с :date.',
    'alpha' => ':Attribute может содержать только буквы.',
    'alpha_dash' => ':Attribute может содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ':Attribute может содержать только буквы и цифры.',
    'array' => ':Attribute должно быть массивом.',
    'before' => 'Значение поля :attribute должен быть датой до :date.',
    'before_or_equal' => 'Значение поля :attribute должна быть датой до или совпадать с :date.',
    'between' => [
        'numeric' => 'Значение поля :attribute должен быть между :min и :max.',
        'file' => 'Размер :attribute должен быть от :min и до :max килобайт.',
        'string' => 'Длина текста в поле :attribute должна быть от :min и до :max символов.',
        'array' => 'Количество элементов :attribute должно быть от :min и до :max.',
    ],
    'boolean' => 'Поле :attribute должно быть логического типа.',
    'confirmed' => 'Поле подтверждения :attribute не совпадает.',
    'date' => ':Attribute не является допустимой датой.',
    'date_equals' => 'Дата :attribute должна совпадать с :date.',
    'date_format' => 'Дата :attribute не соответствует формату :format.',
    'different' => 'Значения :attribute и :other должны отличаться.',
    'digits' => ':Attribute должно содержать :digits цифр.',
    'digits_between' => ':Attribute должно содержать от :min и до :max цифр.',
    'dimensions' => 'Изображение :attribute имеет недопустимые размеры.',
    'distinct' => 'Поле :attribute имеет повторяющееся значение.',
    'email' => ':Attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':Attribute должен оканчиваться одним из следующих значений: :values',
    'exists' => 'Выбранное значение :attribute недействительно.',
    'file' => ':Attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => ':Attribute должен быть больше :value.',
        'file' => 'Размер :attribute должен быть больше :value килобайт.',
        'string' => 'Длина текста в поле :attribute должена быть более :value символов.',
        'array' => 'Количество элементов :attribute должно быть больше :value.',
    ],
    'gte' => [
        'numeric' => ':Attribute должно быть больше или равно :value.',
        'file' => 'Размер :attribute должен быть больше или равен :value килобайт.',
        'string' => 'Длина текста в поле :attribute должна быть :value или более символов.',
        'array' => 'Количество элементов :attribute должно быть :value или более.',
    ],
    'image' => ':Attribute должен быть изображением.',
    'in' => 'Выбранное значение :attribute недействительно.',
    'in_array' => 'Значение :attribute не содержится в :other.',
    'integer' => 'Значение :attribute должно быть целым числом.',
    'ip' => 'Значение :attribute должен быть действительным IP-адресом.',
    'ipv4' => 'Значение :attribute должно быть действительным адресом IPv4.',
    'ipv6' => 'Значение :attribute должно быть действительным адресом IPv6.',
    'json' => 'Значение :attribute должен быть корректной JSON строкой.',
    'lt' => [
        'numeric' => ':Attribute должно быть меньше :value.',
        'file' => 'Размер :attribute должен быть меньше :value килобайт.',
        'string' => 'Длина текста в поле :attribute должна быть меннее :value символов.',
        'array' => 'Количество элементов :attribute должно быть менее :value.',
    ],
    'lte' => [
        'numeric' => ':Attribute должно быть меньше или равно :value.',
        'file' => 'Размер :attribute должен быть меньше или равен :value килобайт.',
        'string' => 'Длина текста в поле :attribute должна быть :value или более символов.',
        'array' => 'Количество элементов :attribute не может быть более :value items.',
    ],
    'max' => [
        'numeric' => ':Attribute не может быть больше :max.',
        'file' => 'Размер :attribute не может быть больше :max килобайт.',
        'string' => 'Длина текста в поле :attribute не может быть более :max символов.',
        'array' => 'Количество элементов :attribute не может быть более :max items.',
    ],
    'mimes' => 'Файл :attribute должен иметь тип: :values.',
    'mimetypes' => 'Файл :attribute должен иметь тип: :values.',
    'min' => [
        'numeric' => ':Attribute не может быть меньше :min.',
        'file' => 'Размер :attribute должен быть минимум :min килобайт.',
        'string' => 'Длина текста в поле :attribute должна быть минимум :min символов.',
        'array' => 'Количество элементов :attribute должно быть не менее :min.',
    ],
    'not_in' => 'Выбранное значение :attribute недействительно.',
    'not_regex' => 'Неверный формат :attribute.',
    'numeric' => ':Attribute должно быть числом.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Неверный формат :attribute.',
    'required' => 'Поле :attribute обязательное.',
    'required_if' => 'Поле :attribute обязательное когда :other имеет значение :value.',
    'required_unless' => 'Поле :attribute обязательное если :other не установлено в :values.',
    'required_with' => 'Поле :attribute обязательное когда присутствует :values.',
    'required_with_all' => 'Поле :attribute обязательное когда присутствуют :values.',
    'required_without' => 'Поле :attribute обязательное когда отсутствует :values.',
    'required_without_all' => 'Поле :attribute обязательное когда отсутствуют :values.',
    'same' => ':Attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':Attribute должно быть :size.',
        'file' => 'Размер :attribute должен быть :size килобайт.',
        'string' => 'Длина :attribute должна быть :size символов.',
        'array' => 'Количество элементов :attribute должно быть :size.',
    ],
    'starts_with' => ':Attribute должен начинаться с одного из следующих значений: :values',
    'string' => ':Attribute должен быть строкой.',
    'timezone' => ':Attribute должен быть действительной временной зоной.',
    'unique' => ':Attribute уже занято.',
    'uploaded' => ':Attribute не удалось загрузить.',
    'url' => 'Неверный формат :attribute.',
    'uuid' => ':Attribute должен быть действительным UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'title' => 'заголовок',
        'body' => 'сообщение',
        'email' => 'адрес электронной почты',
        'name' => 'имя',
        'password' => 'пароль',
        'password-confirm' => 'подтверждение пароля',
    ],

];
