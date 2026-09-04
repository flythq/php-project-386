---
paths:
  - 'typespec/**'
---

# Typespec

## Регенерация клиентского SDK после правки контракта
После правки TypeSpec-контракта запускать `npm run tsp:smoke && npm run sdk:build` и коммитить оба артефакта: `api/openapi/openapi.yaml` (OpenAPI-спецификация) и `resources/js/api/schema.d.ts` (сгенерированные TS-типы для фронтенд-SDK). `tsp:build` уже включает `sdk:build` в цепочку. Не править `schema.d.ts` вручную — он авто-генерируется из openapi.yaml через openapi-typescript.
