# Portfolio Backend API

Backend completo en Laravel para el sistema de portafolio personal con panel de administración.

## Características

-   🔐 **Autenticación con Laravel Sanctum**
-   👤 **Gestión de perfil personal**
-   💻 **CRUD de tecnologías**
-   📁 **CRUD de proyectos**
-   💼 **CRUD de experiencia laboral**
-   📧 **Sistema de contacto**
-   🖼️ **Subida de imágenes**
-   📱 **API REST completa**
-   🔒 **Middleware de seguridad**

## Instalación

### 1. Clonar el repositorio

```bash
git clone <url-del-repositorio>
cd portfolio-backend
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar base de datos

Editar el archivo `.env` con tus credenciales de base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 5. Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

### 6. Crear enlace simbólico para storage

```bash
php artisan storage:link
```

### 7. Iniciar servidor de desarrollo

```bash
php artisan serve
```

La API estará disponible en `http://localhost:8000`

## Configuración para Frontend

### URLs permitidas por CORS

En el archivo `.env`, configura las URLs de tu frontend:

```env
FRONTEND_URL=http://localhost:3000
SANCTUM_STATEFUL_DOMAINS=localhost:3000,127.0.0.1:3000
```

## Endpoints de la API

### Públicos

-   `GET /api/portfolio` - Obtener todos los datos del portafolio
-   `POST /api/contact` - Enviar mensaje de contacto

### Autenticación

-   `POST /api/login` - Iniciar sesión
-   `POST /api/logout` - Cerrar sesión (requiere auth)
-   `GET /api/me` - Obtener usuario autenticado (requiere auth)

### Protegidos (requieren autenticación)

-   `GET /api/profile` - Obtener perfil
-   `PUT /api/profile` - Actualizar perfil
-   `GET /api/technologies` - Listar tecnologías
-   `POST /api/technologies` - Crear tecnología
-   `PUT /api/technologies/{id}` - Actualizar tecnología
-   `DELETE /api/technologies/{id}` - Eliminar tecnología
-   `GET /api/projects` - Listar proyectos
-   `POST /api/projects` - Crear proyecto
-   `PUT /api/projects/{id}` - Actualizar proyecto
-   `DELETE /api/projects/{id}` - Eliminar proyecto
-   `GET /api/experiences` - Listar experiencias
-   `POST /api/experiences` - Crear experiencia
-   `PUT /api/experiences/{id}` - Actualizar experiencia
-   `DELETE /api/experiences/{id}` - Eliminar experiencia
-   `GET /api/contacts` - Listar mensajes de contacto
-   `PATCH /api/contacts/{id}/read` - Marcar mensaje como leído
-   `DELETE /api/contacts/{id}` - Eliminar mensaje

### Subida de archivos

-   `POST /api/upload/image` - Subir imagen (requiere auth)
-   `DELETE /api/upload/image` - Eliminar imagen (requiere auth)

## Credenciales por defecto

**Admin:**

-   Email: `admin@portfolio.com`
-   Contraseña: `admin123`

## Uso desde el Frontend

### 1. Configurar Axios (opcional)

```javascript
import axios from "axios";

const api = axios.create({
    baseURL: "http://localhost:8000/api",
    withCredentials: true,
});
```

### 2. Login

```javascript
const login = async (email, password) => {
    const response = await api.post("/login", { email, password });
    const { token } = response.data;

    // Guardar token
    localStorage.setItem("token", token);

    // Configurar header para futuras requests
    api.defaults.headers.common["Authorization"] = `Bearer ${token}`;

    return response.data;
};
```

### 3. Obtener datos del portafolio

```javascript
const getPortfolioData = async () => {
    const response = await api.get("/portfolio");
    return response.data;
};
```

### 4. Actualizar perfil

```javascript
const updateProfile = async (profileData) => {
    const response = await api.put("/profile", profileData);
    return response.data;
};
```

## Estructura de la base de datos

### Tablas principales:

-   `users` - Usuarios del sistema
-   `profiles` - Información del perfil personal
-   `technologies` - Stack tecnológico
-   `projects` - Proyectos del portafolio
-   `experiences` - Experiencia laboral
-   `contacts` - Mensajes de contacto

## Comandos útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Ver rutas disponibles
php artisan route:list

# Crear nueva migración
php artisan make:migration create_table_name

# Crear modelo con controlador y migración
php artisan make:model ModelName -mcr

# Ejecutar migraciones
php artisan migrate

# Rollback migraciones
php artisan migrate:rollback

# Recrear base de datos
php artisan migrate:fresh --seed
```

## Producción

### 1. Optimizaciones

```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Variables de entorno

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com
FRONTEND_URL=https://tu-frontend.com
```

### 3. HTTPS y SSL

Asegúrate de que tu servidor esté configurado con SSL y actualiza las URLs en `.env`.

## Soporte

Si encuentras algún problema o tienes preguntas, puedes:

1. Revisar los logs en `storage/logs/laravel.log`
2. Verificar la configuración en los archivos `.env` y `config/`
3. Asegurarte de que las migraciones se ejecutaron correctamente

---

**¡Tu backend está listo para funcionar con el frontend de Next.js!** 🚀
