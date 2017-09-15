<?php

return [
    'admin' => [
        'changes_saved' => 'Изменения успешно сохранены!',
        'control' => [
            'optimization' => [
                'update_routes_cache_success' => 'Кэш маршрутов успешно обновлен!',
                'update_config_cache_success' => 'Кэш конфигурации успешно обновлен!',
                'update_view_cache_success' => 'Кэш шаблонизатора успешно очищен!',
                'update_app_cache_success' => 'Кэш приложения успешно очищен!',
                'update_app_cache_fail' => 'Не удалось очистить кэш приложения.',
            ],
            'payments' => [
                'robokassa' => [
                    'unknowns_algo' => 'Такого алгоритма расчета контрольной суммы для Robokassa нет в списке.'
                ],
                'interkassa' => [
                    'unknowns_algo' => 'Такого алгоритма расчета контрольной суммы для Interkassa нет в списке.'
                ],
            ]
        ],
        'servers' => [
            'add' => [
                'success' => 'Сервер ":name" успешно создан.',
                'fail' => 'Не удалось создать сервер.',
                'category' => [
                    'add' => [
                        'success' => 'Категория ":name" создана.'
                    ],
                    'remove' => [
                        'success' => 'Категория удалена.',
                        'last' => 'Должна остаться хотя бы одна категория для данного сервера.'
                    ]
                ]
            ],
            'list' => [
                'enable' => [
                    'success' => 'Сервер включен.',
                    'fail' => 'Не удалось включить сервер!',
                ],
                'disable' => [
                    'success' => 'Сервер отключен.',
                    'fail' => 'Не удалось отключить сервер!',
                ],
            ],
            'remove' => [
                'success' => 'Сервер удален.',
                'last' => 'Удалить последний сервер невозможно!',
            ]
        ],
        'items' => [
            'add' => [
                'success' => 'Предмет создан успешно.',
                'fail' => 'Не удалось создать предмет.'
            ],
            'edit' => [
                'success' => 'Предмет изменен успешно.',
                'not_found' => 'Предмет не найден.',
                'fail' => 'Не удалось изменить предмет.'
            ],
            'remove' => [
                'success' => 'Предмет удален вместе с товарами, привязанными к нему.',
                'fail' => 'Не удалось удалить предмет.'
            ]
        ],
        'products' => [
            'add' => [
                'item_not_found' => 'Предмет с идентификатором :id не найден.',
                'success' => 'Товар добавлен.',
                'fail' => 'Не удалось добавить товар.',
            ],
            'edit' => [
                'success' => 'Товар успешно обновлен.',
                'fail' => 'Ошибка при обновлении товара.'
            ],
            'remove' => [
                'success' => 'Товар удален.',
                'fail' => 'Не удалось удалить товар.'
            ]
        ],
        'news' => [
            'add' => [
                'success' => 'Новость успешно опубликована!',
                'fail' => 'Не удалось опубликовать новость.'
            ],
            'edit' => [
                'success' => 'Новость успешно обновлена!',
                'fail' => 'Не удалось обновить новость.'
            ],
            'remove' => [
                'success' => 'Новость удалена.',
                'fail' => 'Не удалось удалить новость.'
            ],
        ],
        'pages' => [
            'url_already_exists' => 'Страница с таким адресом уже существует!',
            'add' => [
                'success' => 'Страница успешно создана!',
                'fail' => 'Не удалось создать страницу.'
            ],
            'edit' => [
                'success' => 'Страница успешно обновлена!',
                'fail' => 'Не удалось обновить страницу.'
            ],
            'delete' => [
                'success' => 'Страница удалена.',
                'fail' => 'Не удалось удалить страницу.'
            ]
        ],
        'users' => [
            'edit' => [
                'block' => [
                    'successful' => [
                        'temporarily' => [
                            'with_reason' => 'Аккаунт этого пользователя заблокирован до :until по причине ":reason".',
                            'without_reason' => 'Аккаунт этого пользователя заблокирован до :until.'
                        ],
                        'permanently' => [
                            'with_reason' => 'Аккаунт этого пользователя заблокирован навсегда по причине ":reason".',
                            'without_reason' => 'Аккаунт этого пользователя заблокирован навсегда.'
                        ],
                    ],
                    'fail' => 'Заблокировать пользователя не удалось.',
                    'not_found' => 'Пользователь не найден.',
                    'cannot_block_yourself' => 'Вы не можете заблокировать самого себя.',
                ],
                'unblock' => [
                    'success' => 'Пользователь разблокирован.',
                    'fail' => 'Не удалось разблокировать пользователя.',
                    'not_found' => 'Пользователь не найден.'
                ],
                'save' => [
                    'success' => 'Пользователь успешно изменён.',
                    'fail' => 'Изменить пользователя неудалось вследствии ошибки.',
                    'username_already_exists' => 'Имя пользователя :username уже используется.',
                    'email_already_exists' => 'Адрес электронной почты :email уже используется.',
                    'not_found' => 'Пользователь не найден.'
                ],
                'remove' => [
                    'self' => 'Вы не можете удалить самого себя.',
                    'not_found' => 'Пользователь с таким идентификатором не найден.',
                    'success' => 'Пользователь удален.'
                ],
                'sessions' => [
                    'success' => 'Логин-сессии данного пользователя успешно сброшены!',
                    'fail' => 'Не удалось сбросить логин-сессии данного пользователя!'
                ]
            ],
            'list' => [
                'activate' => [
                    'success' => 'Аккаунт пользователя подтвержден.',
                    'already' => 'Аккаунт пользователя уже подтвержден.',
                ]
            ]
        ],
        'other' => [
            'debug' => [
                'mail' => [
                    'success' => 'Сообщение успешно отправлено!',
                    'fail' => 'Сообщение отправить не удалось.'
                ]
            ]
        ],
        'rcon' => [
            'selected_server' => 'Выбран сервер: ',
            'empty_input' => 'Вам следует ввести команду!',
            'connect_error' => 'Не удалось подключится к сокету.'
        ],
        'statistics' => [
            'show' => [
                'clear_cache_success' => 'Кэш статистики очищен!'
            ],
            'payments' => [
                'complete' => [
                    'success' => 'Платеж успешно подтвержден',
                    'already_complete' => 'Платеж уже завершен',
                    'not_found' => 'Платеж не найден.',
                ]
            ]
        ]
    ],
    'api' => [
        'disabled' => 'Отключено',
        'forbidden' => 'Доступ запрещен'
    ],
    'auth' => [
        'signin' => [
            'welcome' => 'Добро пожаловать, :username.',
            'frozen' => 'Вы произвели слишком большое количество попыток входа. Возможность авторизации будет недоступна последующие :delay секунд.',
            'not_activated' => 'Ваш аккаунт не активирован. Проверьте свою почту на наличие нашего письма.',
            'only_for_admins' => 'Вход обычным пользователям запрещен.',
            'invalid_credentials' => 'Пользователь с такими данными не найден.'
        ],

        'signup' => [
            'success' => 'Вы успешно зарегистрированы!',
            'fail' => 'Не удалось зарегистрировать пользователя, вследствии внутренней ошибки сервера.',
            'username_already_exists' => 'Имя пользователя :username уже используется.',
            'email_already_exists' => 'Адрес электронной почты :email уже используется.',
            'disabled'=> 'Функция регистрации отключена.'
        ],

        'forgot' => [
            'success' => 'На вашу почту отправлено письмо с инструкциями по сбросу пароля.',
            'user_not_found' => 'Пользователь с таким адресом электронной почты не найден!',
            'disabled' => 'Администрация проекта отключила возможность восстановления пароля'
        ],

        'reset' => [
            'success' => 'Пароль изменен успешно.',
            'fail' => 'Не удалось сменить пароль.',
            'invalid_code' => 'Код сброса пароля не существует или истек срок восстановления пароля.',
        ],

        'activation' => [
            'success' => 'Ваш аккаунт успешно активирован!',
            'fail' => 'Код активации недействителен или устарел.',
            'user_not_found' => 'Пользователь с таким адресом электронной почты не найден.',
            'already' => 'Этот аккаунт уже подтвержден.',
            'repeat' => 'Сообщение на почту отправлено повторно.',
        ],

        'logout' => 'Вы вышли из аккаунта.'
    ],

    'profile' => [
        'password' => [
            'success' => 'Пароль успешно изменен!',
            'fail' => 'Не удалось изменить пароль.',
            'disabled' => 'Возможность смены пароля отключена.'
        ],
        'settings' => [
            'sessions' => 'Логин-сессии успешно сброшены. Вам потребуется авторизоваться заново.'
        ],
        'character' => [
            'skin' => [
                'success' => 'Новый скин установлен успешно!',
                'disabled' => 'Возможность смены скина отключена.',
                'invalid_ratio' => 'Неверный размер изображения.',
            ],
            'cloak' => [
                'success' => 'Новый плащ установлен успешно!',
                'disabled' => 'Возможность смены плаща отключена.',
                'invalid_ratio' => 'Неверный размер изображения.',
            ]
        ]
    ],

    'shop' => [
        'catalog' => [
            'buy' => [
                'success' => 'Покупка успешно совершена!',
                'invalid_username' => 'Имя пользователя слишком короткое или содержит недопустимые символы.',
                'invalid_count' => 'Недопустимое количество товара.',
            ],
            'news' => [
                'disabled' => 'Отображение новостей отключено',
                'no_more' => 'Новостей больше нет.',
            ]
        ],
        'cart' => [
            'buy' => [
                'success' => 'Покупка успешно совершена!',
                'invalid_username' => 'Имя пользователя слишком короткое или содержит недопустимые символы.',
                'invalid_count' => 'Недопустимое количество товара.',
            ],
            'success' => [
                'message' => 'Товар добавлен в корзину.',
                'btn' => 'Уже в корзине',
            ],
            'full' => 'Невозможно добавить товар. Корзина переполнена.',
            'already_in' => 'Товар уже есть в корзине.',
            'remove' => [
                'success' => 'Товар убран из корзины.',
                'fail' => 'Не удалось убрать товар из крзины.'
            ]
        ]
    ],

    'payments' => [
        'fillupbalance' => [
            'invalid_sum' => 'Сумма должна быть положительным числом и быть не меньше :min.'
        ],
        'success' => 'Оплата проведена успешно.',
        'error' => 'Оплата не удалась.',
        'wait' => 'Платеж обрабатывается. Пожалуйста, подождите.'
    ],

    'request_error' => 'Во время выполнения запроса произошла ошибка.',
    'captcha_required' => 'Вы должны подтвердить то, что не являетесь роботом.'
];
