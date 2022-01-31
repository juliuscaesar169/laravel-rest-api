# Laravel 8.0 REST API

API REST que brinda servicios de consulta, registro y eliminado lógico de clientes.


## Features
- Registro de usuarios (clientes).
- Buscar usuarios por DNI y/o email.
- Eliminado lógico de usuarios.
- Servicio de autenticación mediante Sanctum.
- Protección para SQL injection.


## Requerimientos mínimos

- PHP Version 7.3 en adelante.


## Inicialización del projecto

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


## Uso de API

Los servicios estan a disposición para los usuarios (customers) registrados, por lo que se aconseja iniciar por la ruta de register. Luego con su token de autenticación temporal podrá acceder a los demás servicios como lo es la busqueda de usuarios por dni o email.
Nota: el seeder actual de la base de datos es sencillo con fin de uso operativo, actualmente cuenta con una comuna y región standard, por lo que de momento no dispondrá de abundante cantidad de datos predefinidos.


## Rutas

```
# Public
POST   /api/login
    @body:  email
    --> Devuelve un token de autenticación, necesario para acceder a los demas servicios.

POST   /api/register
    @body:  dni, id_reg, id_com, email, name, last_name, address(opcional)
    --> Registro de usuario (customer).
    --> Devuelve un token de autenticación, necesario para acceder a los demas servicios.

# Protected
GET    /api/customers/:search
    @params:  'dni' o 'email'(incluir '@')
    --> Consultar por un customer mediante dni o email.

POST   /api/customers
    @body:  dni, id_reg, id_com, email, name, last_name, address(opcional)
    --> Crear 'customer'.

DELETE   /api/customers/:dni
    --> Eliminar logicamente a un 'customer'.

POST   /api/logout
    --> Cierre de sesión y eliminación de token actual.
```


##### HEADER REQUEST
```
Authorization: Accept
{{auth_token}}: application/json
```


### Proximas features y mejoras
- Manejo de errores.
- Manejo de Logs de entrada y salida de información.

