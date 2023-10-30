# Simple Product Manager

## Documentation

### Getting Started

Clone the repository, enter the project directory, then run the below for downloading the back-end dependencies.

```sh
cd api

composer install
```
After that, create a MySQL database with and run `database.sql` which is within the API directory.

Further, configure your local environment variables in the `.env` file by copying the boilerplate, `.env.example`.

```sh
cp .env.example .env
```

Run the PHP server, e.g., in the port 8000:

```sh
php -S localhost:8000 -t .
```

Now, enter the client folder, install the dependencies and run the server.

```sh
cd ..

cd client

npm install

npm run dev
```

Having both server running, configure the base URL of the application. Taking as reference the root directory of the project, open `/api/index.php` and `/client/src/globalConstants.js` and define, consequently, `BASE_CLIENT_URL` and `BASE_API_URL` with the information of the running servers. Look at the examples below:

/api/index.php
```php
define('BASE_CLIENT_URL', 'http://localhost:5173');
```

/client/src/globalconstants
```js
const BASE_API_URL = 'http://localhost:8000';

export { BASE_API_URL };
```