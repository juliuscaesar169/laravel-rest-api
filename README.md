# Laravel 8.0 REST API

Api rest que brinda servicios de consulta, registro y eliminado lógico de clientes.


## Feactures
- Registro de usuarios (clientes).
- Buscar usuarios por DNI y/o email.
- Eliminado lógico de usuarios.
- Servicio de autenticación mediante Sanctum.
- Protección para SQL injection.

### Proximas feactures y mejoras
- Manejo de errores.
- Manejo de Logs de entrada y salida de información


## Inizialización del projecto

1. Clonar repositorio

```
https://github.com/juliuscaesar169/laravel-rest-api.git
```

2. Ir al projecto

```
    $ cd laravel-rest-api
```

3. Instalar con Composer

```
    $ composer install
```

4. Configurar archivo .env

```
    $ cp .env.example .env
```

5. Conectar a base de datos

Ejemplo de conección a DB para MySQL, archivo .env

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
```

6. Generar APP_KEY

```
   $ php artisan key:generate
```

7. Migración y seed de DB

```
   $ php artisan migrate --seed
```

8. Levantar servidor

```
   $ php artisan serve
```


## Rutas

```
# Public
POST   /api/login
    @body:  email

POST   /api/register
    @body:  dni, id_reg, id_com, email, name, last_name, address(opcional)
    --> Registro de usuario (customer).
    --> Devuelve un token de autenticación, necesario para acceder a los demas servicios.

# Protected
GET    /api/customers/:search
    @params:  'dni' o 'email'(incluir '@')
    --> Consular por un customer mediante dni o email.

POST   /api/customers
    @body:  dni, id_reg, id_com, email, name, last_name, address(opcional)
    --> Crear 'customer'.

DELETE   /api/customers/:dni
    --> Eliminar logicamente a un 'customer'.

POST   /api/logout
```


##### HEADER REQUEST
```
Authorization: Accept
{{auth_token}}: application/json
```


### Proximas feactures y mejoras
- Manejo de errores.
- Manejo de Logs de entrada y salida de información