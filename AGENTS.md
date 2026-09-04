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
- `npm run tsp:build` — компиляция TypeSpec-контракта в OpenAPI 3.1 YAML
- `npm run tsp:smoke` — smoke-тест контракта (компиляция + проверки структуры)
- `npm run spec` — полная цепочка: генерация всех артефактов из контракта + проверки (tsp:build, smoke, детерминизм генератора, typecheck)

## Структура проекта

- `routes/web.php` — веб-роуты
- `app/Http/Controllers/` — контроллеры
- `app/Models/` — Eloquent-модели
- `database/migrations/` — миграции
- `database/factories/` — фабрики для тестов
- `resources/views/` — Blade-шаблоны
- `resources/css/app.css`, `resources/js/app.js` — точки входа Vite
- `tests/Feature/`, `tests/Unit/` — тесты PHPUnit
- `typespec/` — API-контракт на TypeSpec (`main.tsp`, `tspconfig.yaml`, `scripts/smoke.mjs`)
- `api/openapi/openapi.yaml` — сгенерированная OpenAPI 3.1 спецификация (коммитится)
- `vite.config.js` — конфиг Vite (+ Tailwind v4 через `@tailwindcss/vite`)

## Рабочие правила

- Следуй конвенциям существующего кода. Перед созданием нового файла проверь соседние.
- Не меняй зависимости проекта без одобрения.
- Не создавай документацию (*.md), если явно не просят.
- Проверяй изменения тестами и линтером перед завершением: `composer test && composer lint`.
- После правки TypeSpec-контракта запускай `npm run tsp:smoke` и коммить обновлённый `api/openapi/openapi.yaml`.
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

## Agent skills

### Issue tracker

Issues live in GitHub Issues for `flythq/php-project-386` (uses `gh`). See `docs/agents/issue-tracker.md`.

### Triage labels

Five canonical labels, used as-is: `needs-triage`, `needs-info`, `ready-for-agent`, `ready-for-human`, `wontfix`. See `docs/agents/triage-labels.md`.

### Domain docs

Single-context: root `CONTEXT.md` + `docs/adr/`. See `docs/agents/domain.md`.
