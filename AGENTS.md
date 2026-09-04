# Календарь звонков

Сервис записи на звонки по мотивам Cal.com. Laravel 13 + Blade + Tailwind v4 (Vite) + SQLite.

## Команды

- `composer install` — установить PHP-зависимости
- `npm install` — установить JS-зависимости
- `composer run dev` — локальный dev-сервер (PHP + Vite, http://localhost:8000)
- `npm run dev` — Vite dev-сервер с HMR
- `npm run build` — сборка фронтенд-ассетов для production
- `composer test` — тесты (PHPUnit)
- `composer lint` — линтер (Pint, проверка стиля без правок)
- `composer format` — автоформатирование кода (Pint)
- `php artisan migrate` — миграции БД
- `php artisan test --filter=Name` — запуск конкретного теста

## Структура проекта

- `routes/web.php` — веб-роуты
- `app/Http/Controllers/` — контроллеры
- `app/Models/` — Eloquent-модели
- `database/migrations/` — миграции
- `database/factories/` — фабрики для тестов
- `resources/views/` — Blade-шаблоны
- `resources/css/app.css`, `resources/js/app.js` — точки входа Vite
- `tests/Feature/`, `tests/Unit/` — тесты PHPUnit
- `vite.config.js` — конфиг Vite (+ Tailwind v4 через `@tailwindcss/vite`)

## Рабочие правила

- Следуй конвенциям существующего кода. Перед созданием нового файла проверь соседние.
- Не меняй зависимости проекта без одобрения.
- Не создавай документацию (*.md), если явно не просят.
- Проверяй изменения тестами и линтером перед завершением: `composer test && composer lint`.
- Новые PHP-файлы создавай через Artisan (`php artisan make:...`).
- База данных по умолчанию — SQLite (`database/database.sqlite`). В тестах — in-memory.
- Health-роут: `/up`.

## Коммиты — Conventional Commits

Все коммиты (включая от агента) идут по [Conventional Commits](https://www.conventionalcommits.org/):
`feat:`, `fix:`, `test:`, `ci:`, `docs:`, `refactor:`, `chore:` и т.д.
Используй `feat!:`, `fix!:` для breaking changes.

Релизы собираются автоматически через [release-please](https://github.com/googleapis/release-please-action):
он парсит историю коммитов, ведёт release-PR с changelog и тегает версии по semver.
Поэтому формат коммитов обязателен — от него зависит автогенерация релизов.
