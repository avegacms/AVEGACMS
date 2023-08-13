<?php

return [
    'fields' => [
        'login'     => 'Логин',
        'token'     => 'Токен',
        'email'     => 'Email',
        'phone'     => 'Телефон',
        'pointer'   => 'Поле ввода',
        'password'  => 'Пароль',
        'passconf'  => 'Подтверждение пароля',
        'code'      => 'Код',
        'hash'      => 'Хэш-код',
        'condition' => 'Условие'
    ],
    'errors' => [
        'noData'              => 'Данные не найдены',
        'unknownAuthType'     => 'Неизвестный типа авторизации "{0}".',
        'unknownLoginField'   => 'Неизвестное поле авторизации "{0}".',
        'unknownRole'         => 'Неизвестная роль "{0}".',
        'rulesNotFound'       => 'Неизвестная группа правил.',
        'validationError'     => 'Ошибка валидации',
        'isNotUnique'         => 'Пользователь не найден в системе',
        'unknownUser'         => 'Пользователь не найден в системе',
        'userSessionNotExist' => 'Пользовательская сессия не существует',
        'wrongPassword'       => 'Неправильный пароль',
        'wrongToken'          => 'Неправильный токен',
        'codeExpired'         => 'Время действия кода истекло',
        'wrongCode'           => 'Неверный код',
        'createToken'         => 'Ошибка создания токена',
        'expiresToken'        => 'Время действия токена истекло',
        'tokenNotFound'       => 'Токен не обнаружен',
        'failSendAuthCode'    => 'Не удалось отправить код авторизации',
        'failPasswordUpdate'  => 'Не удалось обновить пароль',
    ]
];
