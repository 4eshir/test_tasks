1. Допускаем, что у нас уже существуют одноименные автосгенерированные через Gii классы (Users.php и Clients.php)
2. Базовый набор моделей представляет из себя три группы классов:
2.1 Исходные модели (Users.php и Clients.php)
2.2 Модели-репозитории для процессов получения/изменения данных (UsersRepository.php и ClientsRepository.php)
2.3 Рабочие модели для расширения базового функционала моделей (UsersWork.php и ClientsWork.php)
2.4 Модели для UI-форм - реализация будет зависеть от форм