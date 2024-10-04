<?php

return [
    'label' => [
        'env' => [
            'timezone'        => 'Часовой пояс',
            'secretKey'       => 'Секретный ключ',
            'defLocale'       => 'Локаль по-умолчанию',
            'useMultiLocales' => 'Использовать мультиязычность',
            'useFrontend'     => 'Использовать Frontend-контроллер',
            'useViewData'     => 'Использовать файлы отображения',
        ],
        'auth' => [
            'useCors'               => 'Использовать CORS',
            'allowPreRegistration'  => 'Разрешить предрегистрацию пользователя',
            'loginType'             => 'Вариант авторизации',
            'loginTypeList'         => 'Варианты видов авторизации',
            'use2fa'                => 'Использовать двухфакторную аутентификацию',
            '2faField'              => 'Поле для двухфакторной аутентификацию',
            'useSession'            => 'Использовать сессии',
            'useToken'              => 'Использовать токен',
            'useJwt'                => 'Использовать JWT',
            'jwtSecretKey'          => 'JWT секретный ключ',
            'jwtSessionsLimit'      => 'Кол-во JWT-подключений',
            'jwtLiveTime'           => 'Время жизни токена (минут)',
            'jwtRefreshTime'        => 'Время жизни токена обновления (дней)',
            'jwtAlg'                => 'Алгоритм шифрования JWT',
            'useWhiteIpList'        => 'Разрешить доступ только по IP-адресам из списка',
            'whiteIpList'           => 'Список разрешенный IP-адресов',
            'verifyCodeLength'      => 'Кол-во. символов кода проверки',
            'verifyCodeTime'        => 'Время действия кода (минут)',
            'useRecovery'           => 'Разрешить пользователю восстанавливать пароль',
            'recoveryField'         => 'Поле для восстановления пароля',
            'recoveryCodeTime'      => 'Время действия хеша восстановления (минут)',
            'authSmsMessage'        => 'Текст смс для авторизации',
            'attempts'              => 'Количество попыток авторизации',
            'freezeLoginTime'       => 'Время блокировки после неверных попыток авторизации',
            'codeSmsDelayTime'      => 'Временные периоды отправки кода SMS регистрации/авторизации',
            'codeEmailDelayPeriods' => 'Временные периоды отправки кода Email регистрации/авторизации',
        ],
        'seo' => [
            'useSitemap'        => 'Включить использование sitemap',
            'allowSiteIndexing' => 'Разрешить индексирование сайта',
            'sitemapBatchQty'   => 'Размер пакета для карты сайта',
            'useRobotsTxt'      => 'Включить использование robots.txt',
            'defRobotsTxt'      => 'Содержание robots.txt (по умолчанию)',
        ],
        'email' => [
            'fromEmail'     => 'Адрес отправителя',
            'fromName'      => 'Имя отправителя',
            'replyEmail'    => '',
            'replyName'     => '',
            'returnEmail'   => 'Email для недоставленных писем',
            'userAgent'     => 'Email user agent',
            'charset'       => 'Кодировка электронной почты',
            'protocol'      => 'Протокол электронной почты',
            'mailPath'      => 'Путь к серверу Sendmail',
            'priority'      => 'Приоритет',
            'mailType'      => 'Тип почты',
            'smtpHost'      => 'SMTP Хост',
            'smtpUser'      => 'SMTP Пользователь',
            'smtpPass'      => 'SMTP Пароль',
            'smtpPort'      => 'SMTP Порт',
            'smtpTimeout'   => 'SMTP таймаут',
            'smtpKeepalive' => 'SMTP KeepAlive',
            'smtpCrypto'    => 'SMTP Crypto',
        ],
        'filemanager' => [
            'uploadConfigField'              => 'Название поля загружаемого файла',
            'uploadConfigMaxSize'            => 'Максимальный размер загружаемого файла (Mб.)',
            'uploadConfigExtInImages'        => 'Разрешенный для загрузки формат изображений',
            'uploadConfigExtInFiles'         => 'Разрешенный для загрузки формат файлов',
            'uploadConfigCreateWebp'         => 'Разрешить создание изображений в формате webp',
            'uploadConfigWebpQuality'        => 'Качество WebP изображения',
            'uploadConfigThumbPrefix'        => 'Название префикса миниатюры файлового менеджера',
            'uploadConfigThumbQuality'       => 'Качество миниатюры для файлового менеджера',
            'uploadConfigThumbMaintainRatio' => 'Сохранять соотношение сторон миниатюры файлового менеджера',
            'uploadConfigThumbMasterDim'     => 'Ось масштабирования миниатюры в файловом менеджере',
            'uploadConfigThumbWidth'         => 'Ширина миниатюры для файлового менеджера',
            'uploadConfigThumbHeight'        => 'Высота миниатюры для файлового менеджера',
        ],
    ],
    'context' => [
        'env' => [
            'timezone'        => 'Часовой пояс',
            'secretKey'       => '',
            'defLocale'       => '',
            'useMultiLocales' => '',
            'useFrontend'     => '',
            'useViewData'     => '',
        ],
        'auth' => [
            'useCors'               => 'Технология современных браузеров, которая позволяет предоставить веб-страницам доступ к ресурсам другого домена',
            'allowPreRegistration'  => 'Разрешить предрегистрацию пользователя, если его аккаунт не создан',
            'loginType'             => 'Варианты авторизации:: email, sms, email:sms, 2fa:email, 2fa:sms:email',
            'loginTypeList'         => 'Варианты видов авторизации',
            'use2fa'                => 'Использовать двухфакторную аутентификацию',
            '2faField'              => 'Доступные поля: email,phone',
            'useSession'            => 'Используется стандартный механизм авторизации',
            'useToken'              => '',
            'useJwt'                => 'Это открытый стандарт для создания токенов доступа, основанный на формате JSON. Как правило, используется для передачи данных для аутентификации в клиент-серверных приложениях.',
            'jwtSecretKey'          => '',
            'jwtSessionsLimit'      => '',
            'jwtLiveTime'           => 'Время жизни токена (минут)',
            'jwtRefreshTime'        => 'Время жизни токена обновления (дней)',
            'jwtAlg'                => 'Доступные алгоритмы: ES384, ES256, ES256K, HS256, HS384, HS512, RS256, RS384, RS512',
            'useWhiteIpList'        => '',
            'whiteIpList'           => '',
            'verifyCodeLength'      => 'Кол-во. символов кода проверки',
            'verifyCodeTime'        => 'Время действия кода (минут)',
            'useRecovery'           => 'Разрешить пользователю восстанавливать пароль',
            'recoveryField'         => 'Доступные поля для восстановления пароля: ',
            'recoveryCodeTime'      => 'Время действия хеша восстановления (минут)',
            'authSmsMessage'        => 'Код:{0} для входа. Никому не сообщайте его.',
            'attempts'              => 'Количество попыток авторизации',
            'freezeLoginTime'       => 'Время блокировки после неверных попыток авторизации',
            'codeSmsDelayTime'      => 'Временные периоды отправки кода SMS регистрации/авторизации',
            'codeEmailDelayPeriods' => 'Временные периоды отправки кода Email регистрации/авторизации',
        ],
        'seo' => [
            'useSitemap'        => '',
            'allowSiteIndexing' => '',
            'sitemapBatchQty'   => '',
            'useRobotsTxt'      => '',
            'defRobotsTxt'      => '',
        ],
        'email' => [
            'fromEmail'     => '',
            'fromName'      => '',
            'replyEmail'    => '',
            'replyName'     => '',
            'returnEmail'   => '',
            'userAgent'     => '',
            'charset'       => '',
            'protocol'      => 'Может принимать следующие значения: mail, sendmail, smtp',
            'priority'      => 'Приоритет',
            'mailType'      => 'Может принимать следующие значения: html, text',
            'smtpHost'      => '',
            'smtpUser'      => '',
            'smtpPass'      => '',
            'smtpPort'      => '',
            'smtpTimeout'   => '',
            'smtpKeepalive' => '',
            'smtpCrypto'    => 'Может принимать следующие значения: ssl, tls',
        ],
        'filemanager' => [
            'uploadConfigField'              => 'Название поля загружаемого файла',
            'uploadConfigMaxSize'            => 'Максимальный размер загружаемого файла (Mб.)',
            'uploadConfigExtInImages'        => 'Разрешенный для загрузки формат изображений',
            'uploadConfigExtInFiles'         => 'Разрешенный для загрузки формат файлов',
            'uploadConfigCreateWebp'         => 'Разрешить создание изображений в формате webp',
            'uploadConfigWebpQuality'        => 'Качество WebP изображения',
            'uploadConfigThumbPrefix'        => 'Название префикса миниатюры файлового менеджера',
            'uploadConfigThumbQuality'       => 'Качество миниатюры для файлового менеджера',
            'uploadConfigThumbMaintainRatio' => 'Сохранять соотношение сторон миниатюры файлового менеджера',
            'uploadConfigThumbMasterDim'     => 'Ось масштабирования миниатюры в файловом менеджере',
            'uploadConfigThumbWidth'         => 'Ширина миниатюры для файлового менеджера',
            'uploadConfigThumbHeight'        => 'Высота миниатюры для файлового менеджера',
        ],
    ],
    'errors' => [
        'deleteIsDefault' => 'Нельзя удалить эту настройку',
    ],
];
