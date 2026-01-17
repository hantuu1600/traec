# Struktur Folder Project TRAEC

Dokumentasi lengkap struktur folder Laravel project TRAEC.

## Root Directory

```
traec/
├── app/                          # Direktori aplikasi utama
├── bootstrap/                    # Bootstrap files
├── config/                       # File konfigurasi
├── database/                     # Database migrations dan seeders
├── node_modules/                 # NPM dependencies
├── public/                       # Public assets (web root)
├── resources/                    # Resources (views, CSS, JS)
├── routes/                       # Route definitions
├── storage/                      # Storage untuk file & cache
├── tests/                        # Unit dan Feature tests
├── vendor/                       # Composer dependencies
├── .editorconfig                 # Editor configuration
├── .env                          # Environment variables
├── .env.example                  # Environment template (jika ada)
├── .git/                         # Git repository
├── .gitattributes                # Git attributes
├── .gitignore                    # Git ignore rules
├── artisan                       # Laravel CLI
├── composer.json                 # PHP dependencies
├── composer.lock                 # Composer lock file
├── FOLDER_STRUCTURE.md           # Dokumentasi struktur folder (ini)
├── package.json                  # NPM dependencies
├── package-lock.json             # NPM lock file
├── phpunit.xml                   # PHPUnit configuration
├── README.md                     # Project documentation
└── vite.config.js               # Vite configuration
```

## App Directory (`/app`)

```
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php              # Authentication (login, register)
│       ├── Controller.php                  # Base controller
│       ├── DashboardController.php         # Dashboard logic
│       ├── DocumentController.php          # Document management
│       ├── LecturersController.php         # Lecturer management
│       ├── PeriodController.php            # Academic period
│       ├── ProfileController.php           # User profile management
│       ├── ResearchController.php          # Research/publikasi management
│       ├── SubmissionController.php        # Document submission
│       ├── TeachingController.php          # Teaching/course management
│       └── TeachingEditRequestController.php # Teaching request handling
├── Models/
│   └── User.php                            # User model
└── Providers/
    └── AppServiceProvider.php               # Service providers
```

## Bootstrap Directory (`/bootstrap`)

```
bootstrap/
├── app.php                       # Application bootstrap
├── providers.php                 # Service providers bootstrap
└── cache/
    ├── packages.php              # Composer packages cache
    └── services.php              # Services cache
```

## Config Directory (`/config`)

```
config/
├── app.php                       # Application configuration
├── auth.php                      # Authentication configuration
├── cache.php                     # Cache configuration
├── database.php                  # Database configuration
├── filesystems.php               # File systems configuration
├── logging.php                   # Logging configuration
├── mail.php                      # Mail configuration
├── queue.php                     # Queue configuration
├── services.php                  # Services configuration
└── session.php                   # Session configuration
```

## Database Directory (`/database`)

```
database/
├── factories/
│   └── UserFactory.php           # Model factories
├── migrations/
│   └── 0001_01_01_000000_create_users_table.php
└── seeders/
    └── DatabaseSeeder.php        # Database seeders
```

## Public Directory (`/public`)

```
public/
├── index.php                     # Application entry point
├── robots.txt                    # Search engine robots file
├── hot                           # Vite HMR file
├── images/
│   └── icons/                    # Icon assets
└── js/
    └── app.js                    # Compiled app JavaScript
```

## Resources Directory (`/resources`)

```
resources/
├── css/
│   └── app.css                   # Main stylesheet
├── js/
│   ├── app.js                    # Main application JS
│   └── bootstrap.js              # Bootstrap JS
└── views/
    ├── welcome.blade.php         # Welcome page
    ├── components/               # Reusable Blade components
    │   ├── activity-stats.blade.php
    │   ├── activity-table-admin.blade.php
    │   ├── activity-table-lecturer.blade.php
    │   ├── admin-sidebar.blade.php
    │   ├── footer.blade.php
    │   ├── header-dashboard.blade.php
    │   ├── hero-dashboard.blade.php
    │   ├── lecturer-page-header.blade.php
    │   ├── lecturer-profile-card.blade.php
    │   ├── lecturer-profile.blade.php
    │   ├── lecturer-sidebar.blade.php
    │   ├── login-form.blade.php
    │   ├── preloader.blade.php
    │   ├── register-form.blade.php
    │   ├── request-activity-table.blade.php
    │   ├── research-form.blade.php
    │   ├── research-row.blade.php
    │   ├── research-table.blade.php
    │   ├── search-dashboard.blade.php
    │   ├── status-badge.blade.php
    │   ├── table-lecturers.blade.php
    │   ├── teaching-field.blade.php
    │   ├── teaching-form.blade.php
    │   ├── teaching-row.blade.php
    │   └── teaching-table.blade.php
    ├── layouts/                  # Layout templates
    │   ├── auth-layout.blade.php
    │   ├── dashboard-admin-layout.blade.php
    │   └── dashboard-lecturer-layout.blade.php
    └── pages/
        ├── login.blade.php       # Login page
        ├── register.blade.php    # Register page
        ├── admin/                # Admin pages
        │   ├── dashboard.blade.php
        │   ├── document-request.blade.php
        │   └── lecturers.blade.php
        └── lecturer/             # Lecturer pages
            ├── dashboard.blade.php
            ├── profile.blade.php
            ├── teaching.blade.php
            ├── teaching-edit.blade.php
            ├── research.blade.php
            ├── research-create.blade.php
            └── research-edit.blade.php
```

## Routes Directory (`/routes`)

```
routes/
├── console.php                   # Console commands routing
└── web.php                       # Web routes
```

## Storage Directory (`/storage`)

```
storage/
├── app/
│   ├── private/                  # Private file storage
│   └── public/                   # Public file storage
├── framework/
│   ├── cache/                    # Framework cache
│   ├── sessions/                 # Session storage
│   ├── testing/                  # Testing storage
│   └── views/                    # Compiled views
└── logs/                         # Application logs
```

## Tests Directory (`/tests`)

```
tests/
├── TestCase.php                  # Base test case
├── Feature/
│   └── ExampleTest.php           # Feature tests
└── Unit/
    └── ExampleTest.php           # Unit tests
```

## Vendor Directory (`/vendor`)

```
vendor/
├── autoload.php                  # Composer autoloader
├── _laravel_ide/                 # Laravel IDE helpers
├── bin/                          # Executable binaries
├── brick/                        # Dependencies
├── composer/
├── laravel/                      # Laravel framework
├── league/
├── monolog/
├── phpunit/                      # PHPUnit testing
├── symfony/
└── [other dependencies...]       # Composer packages
```

## Penjelasan Detail Direktori

### `/app` - Direktori Aplikasi Utama
Berisi semua kode custom aplikasi yang ditulis.

- **Http/Controllers/**: Mengontrol request dari user, memproses logika, dan mengembalikan response
  - AuthController.php - Menangani authentication (login, register, logout)
  - Controller.php - Base controller class
  - DashboardController.php - Logika dashboard
  - DocumentController.php - Manajemen document/dokumen
  - LecturersController.php - Manajemen data lecturer
  - PeriodController.php - Manajemen academic period/periode akademik
  - ProfileController.php - Manajemen user profile
  - ResearchController.php - Manajemen research/publikasi
  - SubmissionController.php - Menangani submission/pengajuan dokumen
  - TeachingController.php - Manajemen teaching/course
  - TeachingEditRequestController.php - Menangani request perubahan teaching
  
- **Models/**: Representasi data dalam bentuk class
  - User.php - Interaksi dengan tabel users di database
  - Menggunakan Eloquent ORM untuk query database
  
- **Providers/**: Service container untuk registrasi services
  - AppServiceProvider.php - Provider utama aplikasi
  
- **Subdirektori lainnya yang dapat ditambahkan**:
  - Events/ - Event handling
  - Exceptions/ - Custom exception classes
  - Listeners/ - Event listeners
  - Middleware/ - HTTP middleware
  - Mail/ - Mailable classes
  - Notifications/ - Notification classes
  - Requests/ - Form request validation
  - Resources/ - API resource classes
  - Rules/ - Custom validation rules
  - Services/ - Business logic services

### `/bootstrap` - Bootstrap Aplikasi
File untuk memulai aplikasi Laravel.

- **app.php**: Membuat instance aplikasi Laravel, registrasi service providers
- **providers.php**: Daftar semua service providers yang akan di-load
- **cache/**: Cache hasil bootstrapping untuk performance
  - packages.php - Cache composer packages
  - services.php - Cache services

**Penting**: Jangan edit file di sini kecuali ada instruksi khusus.

### `/config` - File Konfigurasi
Semua file konfigurasi aplikasi dalam format PHP array.

- **app.php**: 
  - APP_NAME, APP_ENV, APP_DEBUG, APP_KEY
  - Timezone aplikasi
  - Provider list
  
- **auth.php**: Konfigurasi authentication
  - Guards (session, token)
  - Providers (users, custom)
  
- **cache.php**: Konfigurasi cache driver
  - Default cache driver (file, redis, memcached)
  - Cache store configuration
  
- **database.php**: Konfigurasi database
  - Default connection (mysql, sqlite, pgsql)
  - Credentials dan host
  
- **filesystems.php**: Konfigurasi penyimpanan file
  - Default disk (local, public, s3)
  - Path configurations
  
- **logging.php**: Konfigurasi logging
  - Log channels (single, daily, stack)
  - Log level
  
- **mail.php**: Konfigurasi email
  - SMTP settings
  - From address
  
- **queue.php**: Konfigurasi queue jobs
  - Default queue driver
  - Connection settings
  
- **services.php**: Third-party service credentials
  - API keys
  - Service endpoints
  
- **session.php**: Konfigurasi session
  - Session driver (file, cookie, database)
  - Timeout settings

**Akses Konfigurasi**: `config('app.name')` atau `env('APP_NAME')`

### `/database` - Database Schema & Data
Mengelola structure dan data database.

- **migrations/**: 
  - File untuk membuat, mengubah, atau menghapus tabel
  - Format: timestamp_deskripsi.php
  - Contoh: 0001_01_01_000000_create_users_table.php
  - Perintah: `php artisan migrate`, `php artisan migrate:rollback`
  
- **seeders/**: 
  - Mengisi database dengan data awal/testing
  - DatabaseSeeder.php - Seeder utama
  - Contoh: UserSeeder.php, CategorySeeder.php
  - Perintah: `php artisan db:seed`
  
- **factories/**: 
  - Factory untuk membuat dummy data dalam testing
  - UserFactory.php - Factory untuk User model
  - Contoh dalam tests: `User::factory()->count(10)->create()`

### `/public` - Web Root (Document Root)
Satu-satunya folder yang bisa diakses langsung dari browser.

- **index.php**: Entry point aplikasi (harus ada)
  - Meload composer autoloader
  - Bootstrap aplikasi
  - Handle request
  
- **robots.txt**: Instruksi untuk search engine bots
  
- **hot**: File untuk Vite HMR (Hot Module Replacement)
  
- **images/icons/**: Assets gambar
  - Logo, icon, favicon
  - Dapat diakses via `/images/icons/logo.png`
  
- **js/app.js**: JavaScript yang sudah di-compile
  - Hasil dari Vite bundler
  - Import dari `/resources/js/`
  
- **css/app.css**: Stylesheet yang sudah di-compile

**Catatan**: `.htaccess` mungkin juga ada untuk URL rewriting

### `/resources` - Source Assets
Folder untuk source files sebelum di-compile.

- **css/app.css**: 
  - Main stylesheet
  - Import Tailwind, Bootstrap, atau custom CSS
  - Di-compile oleh Vite
  
- **js/app.js**:
  - Entry point JavaScript
  - Import Vue components, plugins, dll
  - Di-compile ke `/public/js/app.js`
  
- **js/bootstrap.js**:
  - Bootstrap JavaScript utilities
  - Import axios, dll
  
- **views/welcome.blade.php**:
  - Template halaman welcome (home page)
  - Menggunakan Blade templating engine
  
- **views/components/**: Reusable Blade components
  - UI Components: admin-sidebar, lecturer-sidebar, footer
  - Form Components: login-form, register-form, teaching-form, research-form
  - Table Components: activity-table-admin, activity-table-lecturer, table-lecturers, research-table, teaching-table
  - Card Components: lecturer-profile-card, lecturer-profile
  - Dashboard Components: header-dashboard, hero-dashboard, search-dashboard, activity-stats
  - Other Components: preloader, status-badge, lecturer-page-header, teaching-field, research-row, teaching-row, request-activity-table
  - Diakses via `<x-component-name />`
  
- **views/layouts/**: Layout template
  - auth-layout.blade.php - Layout untuk halaman auth (login, register)
  - dashboard-admin-layout.blade.php - Layout dashboard untuk admin
  - dashboard-lecturer-layout.blade.php - Layout dashboard untuk lecturer
  - Berisi header, footer, sidebar, navigation
  
- **views/pages/**: Page-specific templates
  - login.blade.php - Halaman login user
  - register.blade.php - Halaman register/signup
  - **admin/**: Dashboard dan pages untuk admin
    - dashboard.blade.php - Admin dashboard
    - document-request.blade.php - Manajemen document requests
    - lecturers.blade.php - Daftar dan manajemen lecturer
  - **lecturer/**: Dashboard dan pages untuk lecturer
    - dashboard.blade.php - Lecturer dashboard
    - profile.blade.php - Profile page lecturer
    - teaching.blade.php - Daftar courses/teaching
    - teaching-edit.blade.php - Edit course/teaching
    - research.blade.php - Daftar research/publikasi
    - research-create.blade.php - Buat research baru
    - research-edit.blade.php - Edit research

### `/routes` - URL Routing
Mendefinisikan URL routes dan handler-nya.

- **web.php**: 
  - Routes untuk web application
  - Menggunakan session authentication
  - Contoh: `Route::get('/', HomeController::class)`
  
- **console.php**: 
  - Routes untuk console commands
  - Custom artisan commands
  - Contoh: `Artisan::command('greet', function () { ... })`
  
- **Subdirektori yang dapat ditambahkan**:
  - api.php - API routes (menggunakan token auth)

### `/storage` - File & Data Persistence
Tempat menyimpan file dinamis aplikasi.

- **app/**: File yang di-upload atau dibuat aplikasi
  - private/ - File private (tidak public)
  - public/ - File public yang bisa di-download
  
- **framework/**: Internal framework files
  - cache/ - Cache aplikasi (query, view, route)
  - sessions/ - Session files
  - testing/ - Testing temporary files
  - views/ - Compiled Blade views
  
- **logs/**: Application logs
  - laravel.log - Main log file
  - Error dan debug messages
  - Rotasi harian atau per ukuran

**Permission**: Folder harus writable oleh web server (chmod 775)

### `/tests` - Automated Testing
Unit dan functional tests.

- **TestCase.php**: Base test class
  - Setup & teardown methods
  - Helper functions
  
- **Feature/**: End-to-end testing
  - Test routes dan requests
  - Contoh: ExampleTest.php
  - Perintah: `php artisan test --filter Feature`
  
- **Unit/**: Unit testing
  - Test individual classes
  - Contoh: ExampleTest.php
  - Perintah: `php artisan test --filter Unit`

**Jalankan Test**: `php artisan test` atau `./vendor/bin/phpunit`

### `/vendor` - Composer Dependencies
Library dan package yang di-install via Composer.

- **autoload.php**: Composer autoloader
  - Automatic class loading
  
- **_laravel_ide/**: IDE helper files
  - Autocomplete dan type hinting
  - facade.php, model_helpers.php, dll
  
- **laravel/**: Framework Laravel
  - Core framework files
  
- **phpunit/**: Testing framework
  - Unit testing library
  
- **Packages lainnya**: Third-party packages
  - Monolog, Symfony, Carbon, dll

**Catatan**: Jangan edit files di sini, hanya update via `composer update`

## File Penting di Root

### `artisan`
- Laravel command-line interface
- Perintah: `php artisan list`
- Contoh: `php artisan migrate`, `php artisan tinker`

### `composer.json`
- Manage PHP dependencies
- Berisi require dan require-dev packages
- Update dengan: `composer update`, `composer require package/name`

### `package.json`
- Manage JavaScript dependencies
- NPM scripts untuk build
- Contoh: `npm run dev`, `npm run build`

### `package-lock.json`
- Lock file untuk npm
- Ensures sama dependencies di semua environment

### `vite.config.js`
- Konfigurasi Vite bundler
- Input/output configuration
- Plugin settings

### `phpunit.xml`
- PHPUnit test configuration
- Test suite definition
- Environment variables untuk testing

### `.env`
- Environment variables (LOCAL)
- Database credentials
- API keys
- **JANGAN commit ke git** - tambah ke .gitignore
- Copy dari `.env.example` untuk development

### `.gitignore`
- File dan folder yang tidak di-track git
- Berisi: vendor/, node_modules/, .env, storage/logs/

### `.editorconfig`
- Konfigurasi editor (indentation, line ending, dll)
- Shared across team untuk consistency

### `README.md`
- Project documentation
- Setup instructions

## Diagram Alur Request

```
Browser Request
    ↓
/public/index.php (entry point)
    ↓
Bootstrap aplikasi (/bootstrap)
    ↓
Load config (/config)
    ↓
Resolve route (/routes/web.php)
    ↓
Call Controller (/app/Http/Controllers)
    ↓
Model interaction (/app/Models)
    ↓
Return View (/resources/views)
    ↓
Render HTML ke Browser
```

## Best Practices

1. **Jangan commit ke Git**:
   - `/vendor` - update via composer
   - `/node_modules` - update via npm
   - `/storage/logs` - application logs
   - `.env` - local configuration
   - `/public/hot` - Vite temp file
   - `composer.lock` dan `package-lock.json` - HARUS di-commit

2. **Folder yang harus writable (775)**:
   - `/node_modules` - update via npm
   - `/storage/logs` - application logs
   - `.env` - local configuration
   - `/public/hot` - Vite temp file

2. **Folder yang harus writable (775)**:
   - `/storage`
   - `/bootstrap/cache`

3. **Environment-specific**:
   - Gunakan `.env` untuk local config
   - Gunakan `config()` untuk app-wide config
   - Gunakan `env()` untuk environment variables

4. **Struktur Naming Convention**:
   - Classes: PascalCase (UserController, User)
   - Files: PascalCase.php (UserController.php)
   - Routes: kebab-case (/user-profile)
   - Variables: camelCase ($userName)

## Workflow Development

```
1. Create migration:      php artisan make:migration create_table
2. Create model:          php artisan make:model ModelName
3. Create controller:     php artisan make:controller ControllerName
4. Define routes:         routes/web.php
5. Create views:          resources/views/
6. Run migration:         php artisan migrate
7. Test:                  php artisan test
8. Build assets:          npm run build
```

---

**Last Updated**: January 16, 2026  
**Version**: 3.0 - Complete Structure  
**Framework**: Laravel 11+  
**Dokumentasi**: Mencakup semua folder dan file actual project TRAEC
