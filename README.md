# MS-Free-Responsive-Web-UI-Kit-Dashboard-Template-bootstrap

Starter kit Laravel com Bootstrap 4, jQuery, autenticação e permissões.

## Instalação

```bash
composer require miguelsapalo/ms-free-responsive-web-ui-kit-dashboard-template-bootstrap
php artisan vendor:publish --tag=starter-kit-assets
php artisan vendor:publish --tag=starter-kit-views
```

## Permissões

Use o seeder abaixo para criar permissões:

```php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$admin = Role::create(['name' => 'admin']);
$user = Role::create(['name' => 'user']);

$viewDashboard = Permission::create(['name' => 'view dashboard']);
$admin->givePermissionTo($viewDashboard);
$user->givePermissionTo($viewDashboard);
```
