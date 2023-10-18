<?php

return [
    'admin' => [
        1 => [
            'page' => false,
            'selector' => '',
            'attr' => '',
            'title' => 'Добро пожаловать в ваш будущий сайт знакомств!',
            'content' => '<div class="embed-responsive embed-responsive-16by9"><iframe src="https://www.youtube.com/embed/k3UGFrMhozM?wmode=transparent" class="embed-responsive-item"  frameborder="0" allowfullscreen></iframe></div><br><br>Давайте проведем обзорный тур по панели администратора.<br><br>Нажмите <strong>Дальше</strong>, чтобы перейти к следующему шагу, или нажмите <strong>Закрыть</strong>, чтобы спрятать этот путеводитель. Вернуться к нему позже вы сможете через иконку шапки-конфедератки.',
        ],
        2 => [
            'page' => 'admin/start',
            'selector' => '.quick-stats',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Быстрая статистика',
            'content' => 'В этом разделе вы увидите, сколько новых регистраций было на этой неделе у вас на сайте по сравнению с прошлой неделей, сколько вы заработали за неделю, и сколько в среднем тратят ваши пользователи.<br><br>Здесь также можно выводить любую другую информацию. Скажите нам, что вам хотелось бы видеть в этом разделе.',
        ],
        3 => [
            'page' => 'admin/start',
            'selector' => '#chart_div',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Посещения за неделю',
            'content' => 'Прямо сейчас график показывает случайно сгенерированное количество посещений сайта. Но после того, как вы установите и настроите свой сайт знакомств, система начнет собирать реальные данные.',
        ],
        4 => [
            'page' => 'admin/start',
            'selector' => '.dashboard__content',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Лента модерации',
            'content' => 'В ленте модерации вы сразу видите, если что-то требует вашего внимания.<br><br>Список объектов для модерации включает аватары пользователей, фото, аудио и видео файлы, офлайн платежи, жалобы, и так далее.',
        ],
        5 => [
            'page' => '',
            'selector' => '#sidebar-menu',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Основное меню администратора',
            'content' => 'Левое меню приведет вас в нужный раздел сайта.<br><br>Разделы объединены по смыслу: все, что касается пользователей, их активность на сайте (включая загрузки файлов и платежи), настройка сайта снаружи и изнутри, дополнительные функции.',
        ],
        6 => [
            'page' => 'admin/ausers',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Администраторы',
            'content' => 'В этом разделе вы можете создать учетные записи для нескольких администраторов с равными правами. Если хотите ограничить права доступа, создайте модератора — у модераторов будет доступ только к разрешенным разделам сайта.',
        ],
        7 => [
            'page' => 'admin/users/index',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Пользователи',
            'content' => 'Здесь собрана информация о пользователях сайта: имена и адреса электронной почты, дата регистрации, сколько денег у них на счету.<br><br>Есть фильтр пользователей по имени, никнейму и т.д.',
        ],
        8 => [
            'page' => 'admin/tickets',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Обратная связь',
            'content' => 'В этот раздел приходят сообщения от пользователей, присланные через встроенную систему обратной связи (тикеты).<br><br>Вы можете и сами связаться с любым из пользователей напрямую. Ваше сообщение появится в личном кабинете пользователя.',
        ],
        9 => [
            'page' => 'admin/media',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Загрузки',
            'content' => 'Раздел Загрузки служит местом хранения файлов, которыми делятся пользователи вашего сайта: фото, видео, аудио. Вы можете удалить любой файл из списка или назначить ему статус 18+.<br><br>Здесь же выводится список пользовательских альбомов. Если создадите альбом администратора, он будет доступен для всех пользователей.',
        ],
        10 => [
            'page' => 'admin/moderation',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Модерация',
            'content' => 'Правила модерации позволяют вам управлять контентом, который создают пользователи. Система проверяет тексты на запрещенные слова. Запрещенные слова в раздел Фильтр вы также добавляете сами.<br><br>После окончания настройки проверяйте вкладку Объекты на модерации, или смотрите ленту модерации на домашней странице.',
        ],
        11 => [
            'page' => 'admin/payments/index',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Платежи',
            'content' => 'Активируйте платежные системы, которые хотите использовать на своем сайте знакомств, назначайте валюту сайта.<br><br>Редактируйте платные услуги, устанавливайте собственные цены для каждой услуги в разделе <strong>Сервисы</strong>. Создавайте и редактируйте группы подписки на членство в разделе <strong>Права доступа</strong>. Вы можете создать подписку на 30 дней или на год, решать вам.',
        ],
        12 => [
            'page' => 'admin/banners',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Баннеры',
            'content' => 'Вы можете разрешить пользователям своего сайта знакомств размещать баннеры за дополнительную плату. В панели администратора настраиваются цены, позиции баннеров на страницах, период размещения. Здесь же баннеры пользователей проходят модерацию.<br><br>Вы также можете размещать собственные баннеры или баннеры партнеров.',
        ],
        13 => [
            'page' => 'admin/start/menu/interface-items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Интерфейс',
            'content' => 'В разделе <strong>Темы</strong> вы найдете редактор дизайн-темы, логотипа, размеров шрифта и цветовой схемы вашего сайта.<br><br>В <strong>Меню</strong> — настроите меню пользовательской части и раздела администратора.',
        ],
        14 => [
            'page' => 'admin/start/menu/content_items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Содержание',
            'content' => 'Набор инструментов в этом разделе поможет вам редактировать содержание вашего сайта знакомств, включая варианты местоположения (страны, регионы, города), типы пользователей (женщина, мужчина и т.д.), пользовательское соглашение и другую информацию.<br><br>Используйте встроенный инструмент <strong>Языковые версии</strong>, чтобы создавать новые языковые версии сайта и редактировать слова и фразы, которые используются на вашем сайте.<br><br>Подключитесь к RSS-каналам, чтобы ежедневно получать новости и гороскопы, или добавляйте их на сайт вручную.',
        ],
        15 => [
            'page' => '/admin/start/menu/system-items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Система',
            'content' => 'Тонкая настройка системы. Вы можете отредактировать размер всех иконок на сайте, разрешить к загрузке определенные форматы аудио файлов, изменить количество выводимых элементов на странице поиска. Или просто оставьте данные по умолчанию, этого достаточно.<br><br>Однако вам стоит обратить внимание на настройку SEO и подключение социальных сетей.',
        ],
        16 => [
            'page' => 'admin/marketing/index',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Маркетинг',
            'content' => 'Мы хотим помочь вам узнать больше о посетителях и пользователях вашего сайта знакомств, возвращать их на сайт специально подобранными уведомлениями, получать обратную связь от людей и предлагать им поддержку. Все это можно сделать с помощью популярной системы Intercom.io, с которой мы предлагаем бесплатную базовую интеграцию.<br><br>Мы также бесплатно подключим ваш сайт к Гугл Аналитике. Напишите нам в чате, чтобы узнать подробности.',
        ],
        17 => [
            'page' => '/admin/start/menu/add_ons_items',
            'selector' => '.right_col',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Дополнительные модули',
            'content' => 'Дополнительные модули помогут вам развлечь пользователей и даже заработать. Настраивайте их в этом разделе.<br><br>В магазине Dating Pro кроме модулей продаются еще дизайн-темы, интеграции со сторонними решениями, маркетинговые и хостинговые услуги. Нажмите <strong>Перейти в магазин модулей</strong>, чтобы просмотреть весь список.',
        ],
        18 => [
            'page' => 'admin/start',
            'selector' => '',
            'attr' => '',
            'title' => 'Возвращаемся к панели управления',
            'content' => 'Вот мы и закончили обзорный тур!<br><br>Что же дальше?<br><br>В <a href="https://www.datingpro.com/academy/" target="_blank">Академии Dating Pro</a> вы найдете подробные инструкции и ответы на популярные вопросы (на англ.). Посмотрите <a href="https://www.datingsoftware.ru/startup-guide/" target="_blank">пошаговое руководство по запуску сайта знакомств</a>.<br><br>Хотите узнать цены на разные сборки Dating Pro? Нажмите на кнопку <strong>Купить</strong>, чтобы перейти на страницу с ценами.',
        ],
    ],
    'user' => [
        1 => [
            'page' => 'users/search',
            'selector' => '',
            'attr' => '',
            'title' => 'Добро пожаловать!',
            'content' => '<div class="embed-responsive embed-responsive-16by9"><iframe src="https://www.youtube.com/embed/XVd9HXjAkBc?wmode=transparent" class="embed-responsive-item"  frameborder="0" allowfullscreen></iframe></div><br><br>Это пользовательская часть. Мы покажем вам, что увидят пользователи вашего будущего сайта знакомств после регистрации.<br><br>Нажмите <strong>Дальше</strong>, чтобы перейти к следующему шагу, или нажмите <strong>Закрыть</strong>, чтобы спрятать этот путеводитель. Вернуться к нему позже вы сможете через иконку шапки-конфедератки.',
        ],
        2 => [
            'page' => false,
            'selector' => '.menu-alerts-item',
            'attr' => 'background:rgba(255,0,0,.2);',
            'function' => '$(".menu-alerts-item .dropdown-menu").addClass("guide-show");',
            'reset' => '$(".menu-alerts-item .dropdown-menu").removeClass("guide-show");',
            'title' => 'Уведомления',
            'content' => 'Слева вверху появляются уведомления о новых гостях, сообщениях, виртуальных подарках и так далее. Выводятся системные сообщения, то есть письма от администратора сайта.',
        ],
        3 => [
            'page' => false,
            'selector' => '.left-menu__user',
            'function' => '$("#slidemenu-outer,#slidemenu").show();',
            'reset' => '$("#slidemenu,#slidemenu-outer").hide();',
            'attr' => 'background:rgba(255,0,0,.2);margin-right:-15px;padding-right:15px;',
            'title' => 'Левое меню',
            'content' => 'Левое меню — основной способ навигации по сайту. Здесь собраны ссылки, которые понадобятся пользователю.<br><br>Сразу под формой поиска находится строка с быстрым доступом к пополнению внутреннего счета. Выводится количество денег на счету у пользователя.',
        ],
        4 => [
            'page' => false,
            'selector' => '.user_quick_menu .dropdown-menu',
            'function' => '$(".user_quick_menu .dropdown-menu").addClass("guide-show");',
            'reset' => '$(".user_quick_menu .dropdown-menu").removeClass("guide-show");',
            'attr' => 'box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Правое меню',
            'content' => 'В правое меню мы вынесли основные служебные ссылки для удобства пользователей: анкета, настройка, аккаунт, выход с сайта.<br><br>Теперь давайте посмотрим, как выглядит аккаунт пользователя.',
        ],
        5 => [
            'page' => 'users/account',
            'selector' => '.my-account-menu',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);box-shadow: 2px 2px 10px #d9534f;',
            'title' => 'Аккаунт пользователя',
            'content' => 'В этом разделе сосредоточена большая часть платных опций сайта знакомств. Пользователь может зайти прямо сюда и что-то выбрать, но система будет предлагать ему заплатить за услугу или стать членом платной группы и в других местах.<br><br>Нажмите <strong>Дальше</strong>, чтобы перейти на страницу выбора групп.',
        ],
        6 => [
            'page' => 'access_permissions/index',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'Платные группы',
            'content' => 'Эта страница создана для сравнения разных групп пользователей по правам доступа. Далее пользователь выбирает нужный ему период и переходит к оплате.<br><br>Теперь давайте посмотрим на страницу собственной анкеты пользователя.',
        ],
        7 => [
            'page' => 'users/profile',
            'selector' => '',
            'function' => '$(document).ready(function(){$(\'[data-toggle="popover"]\').popover(\'show\');$(".popover-content").css("box-shadow","2px 2px 10px #d9534f");$(".user_preview-js").find(".media").css("overflow", "visible");});',
            'reset' => '',
            'attr' => '',
            'title' => 'Собственная анкета',
            'content' => 'На странице собственной анкеты пользователь может включить одну из специальных услуг, например, поднять или выделить анкету в поиске. Отсюда же отправляются приглашения друзьям присоединиться к сайту.<br><br>Как выглядит анкета другого пользователя? Нажмите <strong>Дальше</strong>, чтобы это узнать.',
        ],
        8 => [
            'page' => 'users/view/11/profile',
            'selector' => '',
            'function' => '$(document).ready(function(){$(\'[data-toggle="popover"]\').popover(\'show\');$(".popover-content").css("box-shadow","2px 2px 10px #d9534f");$(".user_preview-js").find(".media").css("overflow", "visible")});',
            'reset' => '',
            'attr' => '',
            'title' => 'Просмотр чужой анкеты',
            'content' => 'Со страницы пользователя можно отправить ему или ей сообщение, поцелуй или виртуальный подарок, отправить заявку в друзья, добавить в список избранных и так далее.<br><br>Давайте посмотрим на стену активности этого пользователя.',
        ],
        9 => [
            'page' => 'users/view/11/wall',
            'selector' => '.b-timeline-addpost',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);margin-top:-10px;padding-top:20px;',
            'title' => 'Стена событий пользователя',
            'content' => 'В стене пользователя можно оставить ему текстовое сообщение или поделиться фотографией, песней или видео. Вы также увидите сообщения от других пользователей.<br><br>Теперь перейдем в галерею пользователя.',
        ],
        10 => [
            'page' => 'users/view/11/gallery',
            'selector' => '.view-user__media',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);padding:5px;',
            'title' => 'Мультимедиа-галерея пользователя',
            'content' => 'В галерее показаны все фото, аудио- и видеофайлы, которые загружает и сохраняет пользователь. Альбомы — это коллекции файлов.<br><br>Сейчас посмотрим на главную стену активности на домашней странице сайта.',
        ],
        11 => [
            'page' => 'start/homepage',
            'selector' => '.g-flatty-block',
            'function' => '',
            'reset' => '',
            'attr' => 'background:rgba(255,0,0,.2);padding:5px;',
            'title' => 'Главная стена событий',
            'content' => 'В этой стене отображаются события пользователя и его или ее друзей: загрузка файлов, посты в стене, начало и конец дружбы и др.<br><br>Пользователи сами выбирают, какие из событий кому показывать, а также решают, какие события хотят видеть сами.<br><br>Теперь давайте снова откроем левое меню.',
        ],
        12 => [
            'page' => 'start/homepage/#user_user-menu-activities',
            'selector' => '#user_user-menu-activities',
            'function' => '$("#slidemenu-outer,#slidemenu").show();',
            'reset' => '$("#slidemenu,#slidemenu-outer").hide();',
            'attr' => 'background:rgba(255,0,0,.2);margin-right:-15px;padding-right:15px;',
            'title' => 'Мои занятия',
            'content' => 'В этом разделе собраны интересные занятия, которые помогут пользователям завязать беседу и узнать друг друга получше.<br><br>Познакомимся с некоторыми из этих занятий поближе и начнем с ассоциаций.',
        ],
        13 => [
            'page' => 'associations/index',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'Ассоциации',
            'content' => 'Пользователи сравнивают друг друга с изображениями на картинках, обмениваются краткими сообщениями, после чего система предлагает продолжить общение. Это хороший способ привлечь к себе внимание и завязать разговор.<br><br>Все картинки загружает администратор сайта.<br><br>Перейдем к разделу симпатий.',
        ],
        14 => [
            'page' => 'like_me/index/demo_guide',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'Симпатии',
            'content' => 'Принцип работы симпатий схож с популярным мобильным сервисом знакомств Тиндер. Пользователи листают фотографии и отмечают понравившихся людей. Если оба человека понравились друг другу, система предлагает продолжить общение.<br><br>В списке выводятся люди, которые подходят по критериям пользователя, указанным в анкете (пол, возраст).<br><br>Наш следующий шаг — раздел компаньонов.',
        ],
        15 => [
            'page' => 'companions/index',
            'selector' => '',
            'function' => '',
            'reset' => '',
            'attr' => '',
            'title' => 'Компаньоны',
            'content' => 'Компаньоны — место, где люди смогут искать попутчиков для совместных путешествий.<br><br>Пользователь сайта знакомств создает объявление, указывает место назначения и свои пожелания к попутчику: пол, возраст, согласие разделить расходы на поездку. Другие пользователи сайта просматривают это объявление и, при желании, отправляют свою заявку.<br><br>Нажмите <strong>Дальше</strong>, чтобы завершить этот обзорный тур.',
        ],
        16 => [
            'page' => 'users/search',
            'selector' => '',
            'attr' => '',
            'title' => 'Возвращаемся к странице поиска',
            'content' => 'Мы завершили обзорный тур по пользовательской части.<br><br>Что же дальше?<br><br>В <a href="https://www.datingpro.com/academy/" target="_blank">Академии Dating Pro</a> вы найдете подробные инструкции и ответы на популярные вопросы (на англ.). Посмотрите <a href="https://www.datingsoftware.ru/startup-guide/" target="_blank">пошаговое руководство по запуску сайта знакомств</a>.<br><br>Хотите узнать цены на разные сборки Dating Pro? Нажмите на кнопку <strong>Купить</strong>, чтобы перейти на страницу с ценами.',
        ],
    ],
];
