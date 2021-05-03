# api-restful-laravel
API RESTful Laravel

## Especificações

- [x] CRUD de usuário
- [x] Obter endereços
- [x] Obter endereço por id
- [x] Obter Cidades
- [x] Obter Cidades por id
- [x] Obter Estados
- [x] Obter Estado por id
- [x] Obter total de usuários cadastrados por cidade
- [x] Obter total de usuários cadastrados por estado

## Configurar bases de dados e serviços

The project uses [MySql](https://www.mysql.com/downloads), [PHP 7.3.27](https://www.php.net/downloads.php) and [Insomnia](https://insomnia.rest/download).

## Como instalar

### Backend (API RESTful)

* Para descargar el proyecto, siga las instrucciones a continuación.:

```
1. git clone https://github.com/ortizmas/api-restful-laravel.git
2. cd api-restful-laravel
3. composer install
4. cp .env.example .env
5. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed
8. php artisan serve
```

* Endpoints

```
1. CRUD de usuário
	- CREATE http://127.0.0.1:8000/api/users
	{
		"name":"Lucy Vargas",
		"email":"luca2ss@gmail.com",
		"password":"password",
		"cep":"55300000",
		"street":"Rua Luzer",
		"number":2,
		"district":"Capoeiruçu",
		"additional":"FADBA",
		"city_id":3,
		"state_id": 4
	}

	- READ http://127.0.0.1:8000/api/users
	- UPDATE hhttp://127.0.0.1:8000/api/users/1
	{
		"name":"Eber Ortiz",
		"email":"email@gmail.com",
		"password":"password123"
	}
	- DELETE http://127.0.0.1:8000/api/users/4
		
```

```
2. Obter endereços => http://127.0.0.1:8000/api/addresses
3. Obter endereço por id => http://127.0.0.1:8000/api/addresses/1
4. Obter Cidades => http://127.0.0.1:8000/api/cities
5. Obter Cidades por id => hhttp://127.0.0.1:8000/api/cities/500
6. Obter Estados => http://127.0.0.1:8000/api/states
7. Obter Estado por id => http://127.0.0.1:8000/api/states/12
8. Obter total de usuários cadastrados por cidade => http://127.0.0.1:8000/api/get-total-users-by-city
9. Obter total de usuários cadastrados por estado => http://127.0.0.1:8000/api/get-total-users-by-state
		
```

