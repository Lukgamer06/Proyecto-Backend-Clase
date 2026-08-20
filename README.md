# Proyecto en Clase

Proyecto Laravel ejecutado con Docker y MySQL.

## Inicio

```bash
docker compose up --build -d
docker compose exec app php artisan migrate
```

La aplicacion estara disponible en http://localhost:8000.

Para detener los contenedores:

```bash
docker compose down
```
