Спасибо за скачивание продукта PG Dating Pro.

Если у вас появляются вопросы, приходите к нам в чат: https://www.datingsoftware.ru/ (окно чата открывается в правом нижнем углу).

------------------------------
СИСТЕМНЫЕ ТРЕБОВАНИЯ
------------------------------

Вот ссылка на системные требования в академии Dating Pro (на англ.): https://www.datingpro.com/academy/setup/system-requirements/

- Версия PHP 5.5 или выше (для версий с закрытым кодом максимум PHP 5.6)
- Расширения gd2, iconv, mbstring для PHP
- Расширения для баз данных PHP: pdo/mysqli/mysql
- Версия MySQL 5.1 или выше
- Поддержка XML
- Поддержка ionCube PHP Loader версии v4.0.12 и выше (обязательно для версий с закрытым кодом)
- Библиотека mod_rewrite и поддержка файлов .htaccess с атрибутом RewriteRule
- Поддержка кронов (планировщик задач)
- Расширение ffmpeg-php (требуется для конвертации видео, отображения миниатюры, продолжительности видео и т.д.)
- Должна быть разрешена функция shell_exec
- Операционная система сервера: Unix, Windows
- Обратите внимание: IIS не поддерживается
- Версия Android: 4.0 и выше; версия iOS: 6.0 и выше

Системные требования сети Dating Pro Network:
- Расширения pcntl и posix для PHP
	
*****Обратите внимание: Мы можем прислать образ для установки в контейнере Docker. Напишите на почту sales@pilotgroup.net или приходите в чат: https://www.datingsoftware.ru/.


------------------------------
ИНСТРУКЦИЯ ПО УСТАНОВКЕ
------------------------------

*****Подробная инструкция с иллюстрациями (на англ.) здесь: https://www.datingpro.com/academy/setup/installation-instructions/, еще есть видео: https://www.youtube.com/watch?v=7ddx1LgEe9s

1. Скачайте файлы скрипта в виде архива, распакуйте его, залейте все файлы и папки в корневую директорию своего сайта. .

*****Убедитесь, что используете двоичный режим передачи во время загрузки.

2. Создайте пустую базу данных MySQL и добавьте к ней пользователя со всеми правами, чтобы скрипт мог наполнить базу данных.

*****Рекомендуем делать резервную копию (бэкап) базы данных раз в месяц.

3. Раздайте права 777 на следующие файлы:

application/config/landings_module_routes.php
application/config/langs_route.php
application/config/seo_module_routes.php
application/config/seo_module_routes.xml
m/index.html
m/scripts/app.js
robots.txt
sitemap.xml

и папки:

application/libraries/dompdf/lib/fonts/
application/modules/export/models/drivers
application/views/admin/logo
application/views/admin/mobile-logo
application/views/admin/sets
application/views/admin/sets/default
application/views/admin/sets/default/css
application/views/admin/sets/default/img
application/views/default/logo
application/views/default/mobile-logo
application/views/default/sets
application/views/default/sets/default
application/views/default/sets/default/css
application/views/flatty/logo
application/views/flatty/mobile-logo
application/views/flatty/sets
application/views/flatty/sets/default
application/views/flatty/sets/default/css
temp
temp/*
uploads
uploads/*

* означает применить действие ко всем подкаталогам

*****Обратите внимание: Вам также будет предложено изменить права доступа к файлам /application/config/install.php и /config.php во время установки. После этого нажмите на 'Refresh', чтобы обновить информацию и продолжить установку.

4. Откройте в браузере http://www.yourdomain.com/ (где www.yourdomain.com - это ваше доменное имя, подключённое к серверу). Таким образом вы попадаете на страницу установки.

5. Ознакомьтесь с лицензионным соглашением и нажмите на 'I agree', если вы согласны со всеми условиями.

6. Укажите доступ к FTP (хост, пользователь и пароль) и нажмите кнопку 'Next'.

7. Следующий шаг - указать параметры базы данных. Для продолжения установки нажмите 'Next'.

8. Далее идёт установка языков. Выберите язык, который у вас будет выводиться по умолчанию на сайте. Требуется выбрать как минимум одну языковую версию.

9.1. Когда система начнёт установку, необходимо будет указать ключ заказа ("order key"). Ключ находится в файле order_key.txt в корневой папке сайта.

9.2. Заполните данные администратора, логин и пароль. Логин и пароль потребуются при авторизации в панели администратора. Вы сможете отредактировать эту информацию позже.

9.3. Укажите данные сервера SMTP - это нужно для рассылок. Почтовый протокол можно узнать у хостера.

Нажмите 'Save', и дальше процесс установки скрипта завершится автоматически.

10. В конце вам нужно будет настроить кроны (планировщик задач).

Укажите правильный путь к PHP. На нашем тестовом сервере это /usr/bin/php. Чтобы узнать путь на своем сервере, свяжитесь с системным администратором хостинга. 

11. Нажмите 'Finish'. Ваш сайт знакомств установлен и вы можете приступать к настройке сайта. 

Зайти в пользовательскую часть можно по ссылке http://www.yourdomain.com/.
Данные доступа тестового пользователя: walter@mail.com / 123456

Зайти в панель администратора можно по ссылке http://www.yourdomain.com/admin.
Данные доступа администратора: логин и пароль, указанные вами на шаге 9.2. 

*****В этом разделе академии вы найдете инструкции по настройке и управлению сайтом (на англ.): https://www.datingpro.com/academy/admin-mode/


------------------------------
НАСТРОЙКА КРОНА ЧЕРЕЗ SSH
------------------------------

   1. Зайдите на сервер через SSH
   2. Введите команду:
	crontab -e
    Откроется текстовый редактор.
   3. Время указывается вручную. Вместо звездочки * подставляются все возможные значения для каждой позиции. Обычно позиций пять:
      минута | час | день месяца | месяц | день недели   
      Minute | Hour | Day | Month | Weekday
   4. После времени пишется команда.
   5. Пример планировщика:
    */10 * * * * php ~/crons/cron.php >> ~/cronlog.log ~/cronerr.err
    Этот крон будет выполняться каждые 10 минут.
   6. Чтобы сохранить изменения, введите команду: 
	control-key o
   7. Чтобы выйти из редактора, введите команду:
	control-key x
   8. В консоли вы увидите:
      crontab: installing new crontab
   9. Готово.


------------------------------
НЕСТАНДАРТНЫЕ СЛУЧАИ
------------------------------

1. Требуется установка ionCube PHP Loader:

Это значит, что файлы скрипта закодированы. Установите ionCube PHP Loader версии v4.0.12 и выше на сервере, где вы хотите установить PG Dating Pro.

2. Пустая белая страница:

Включите отображение ошибок в файле config.php в корне сайта:

Замените 
define("DISPLAY_ERRORS", false);

на  
define("DISPLAY_ERRORS", true);

Дальше анализируйте сообщение об ошибке.

3. Установка прекращается и не запускается снова:
ИЛИ
4. Невозможно найти запрашиваемый URL (The requested URL ... was not found on this server):

В файле /application/config/config.php найдите URI PROTOCOL и в строке 

$config['uri_protocol']    = 'AUTO';

замените 'AUTO' на одну из других настроек: PATH_INFO, QUERY_STRING, REQUEST_URI, ORIG_PATH_INFO.

5. Нет соединения с базой данных 
Cannot connect to host (Access denied for user 'username'@'host' (using password: YES)):

Проверьте, есть ли соединение с сервером. Ошибка может также быть связана с опечаткой в имени базы данных, имени пользователя, в пароле, либо с отсутствием прав у пользователя.

6. Открывается страница с надписью 'No input file specified':

Создайте резервную копию файлы .htaccess из корневой папки сайта. 
Откройте файл .htaccess и отредактируйте его, закомментировав все строки кроме строки с RewriteRule, чтобы осталось:

RewriteRule ^(.*)$ index.php?/$1? [L,QSA]

В файле /application/config/config.php замените 'AUTO' на 'REQUEST_URI' в строке:

$config['uri_protocol']    = 'REQUEST_URI';



Если у вас остались вопросы, вы знаете, где нас найти: https://www.datingsoftware.ru/
