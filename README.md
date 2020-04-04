# api_fibanacci

### **Распоковка:**
1. Клонировать репозиторий;
2. Выполнить composer update;
3. UI страница index.html;

### **Требования:**

1. Redis v3^
2. Настройки редиректа для apache в файле htaccess для ngnix необходима настройка редиректа из папки fibanacci на файл fibanacci/index.php

### **Тестирование:**

Тестирование построена на локльном использовании PHPunit.
Для этого необходимо установить все зависимости (composer update)
Выполнить команду vendor\bin\phpunit tests