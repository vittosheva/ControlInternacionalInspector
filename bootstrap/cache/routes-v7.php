<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => true,
    1 => 
    array (
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.auth.login',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.auth.login',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password-reset/request' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.auth.password-reset.request',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password-reset/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.auth.password-reset.reset',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.auth.logout',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.auth.logout',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email-verification/prompt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.auth.email-verification.prompt',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.pages.dashboard',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.pages.dashboard',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/bathroom-compliance-observations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.bathroom-compliance-observations.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/complementary-services' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.complementary-services.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/environmental-observations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.environmental-observations.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/gas-station-observations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.gas-station-observations.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inspections' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.inspections.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inspections/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.inspections.create',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inspection-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.inspection-settings.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/inspectors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.inspectors.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/observations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.observations.index',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/backups' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.pages.backups',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jobs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.jobs.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jobs-waitings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.jobs-waitings.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/jobs-faileds' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.jobs-faileds.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/job-batches' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.job-batches.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/authentication-logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.authentication-logs.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.permissions.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/permissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.permissions.create',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.roles.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.roles.create',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.users.index',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.users.create',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::21GRZqXUsI9Z0pFa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.min.js.map' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mMNKX78cXiZtWSK6',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/upload-file' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.upload-file',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/screen/lock' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lockscreen.main.page',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'lockscreen.superAdmin.page',
          ),
          1 => 'admin.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/optimize-clear' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VPf3ccaG9uZ3gWPW',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/optimize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::z0XX9zKEKZ0190UP',
          ),
          1 => 'insp.controlinternacional.test',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|(?:(?:[^./]*+\\.)++)(?|/_debugbar/c(?|lockwork/([^/]++)(*:61)|ache/([^/]++)(?:/([^/]++))?(*:95))|/filament/(?|exports/([^/]++)/download(*:141)|imports/([^/]++)/failed\\-rows/download(*:187)))|(?i:insp\\.controlinternacional\\.test)\\.(?|/email\\-verification/verify/([^/]++)/([^/]++)(*:284)|/inspections/([^/]++)(?|(*:316)|/edit(*:329)))|(?i:admin\\.controlinternacional\\.test)\\.(?|/permissions/([^/]++)/edit(*:408)|/roles/([^/]++)/edit(*:436)|/users/([^/]++)/edit(*:464))|(?:(?:[^./]*+\\.)++)(?|/livewire/preview\\-file/([^/]++)(*:527))|(?i:insp\\.controlinternacional\\.test)\\.(?|/pdf/(?|generate/([^/]++)(?:/([^/]++))?(*:617)|view/([^/]++)(*:638))))/?$}sDu',
    ),
    3 => 
    array (
      61 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      95 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.exports.download',
          ),
          1 => 
          array (
            0 => 'export',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      187 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.imports.failed-rows.download',
          ),
          1 => 
          array (
            0 => 'import',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.auth.email-verification.verify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      316 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.inspections.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      329 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.main.resources.inspections.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      408 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.permissions.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.roles.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      464 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'filament.superAdmin.resources.users.edit',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'livewire.preview-file',
          ),
          1 => 
          array (
            0 => 'filename',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      617 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pdf.generate',
            'document' => NULL,
          ),
          1 => 
          array (
            0 => 'record',
            1 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      638 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pdf.view',
          ),
          1 => 
          array (
            0 => 'record',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.exports.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filament/exports/{export}/download',
      'action' => 
      array (
        'uses' => 'Filament\\Actions\\Exports\\Http\\Controllers\\DownloadExport@__invoke',
        'controller' => 'Filament\\Actions\\Exports\\Http\\Controllers\\DownloadExport',
        'as' => 'filament.exports.download',
        'middleware' => 
        array (
          0 => 'filament.actions',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.imports.failed-rows.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'filament/imports/{import}/failed-rows/download',
      'action' => 
      array (
        'uses' => 'Filament\\Actions\\Imports\\Http\\Controllers\\DownloadImportFailureCsv@__invoke',
        'controller' => 'Filament\\Actions\\Imports\\Http\\Controllers\\DownloadImportFailureCsv',
        'as' => 'filament.imports.failed-rows.download',
        'middleware' => 
        array (
          0 => 'filament.actions',
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
        ),
        'uses' => 'App\\Filament\\Main\\Pages\\Auth\\Login@__invoke',
        'controller' => 'App\\Filament\\Main\\Pages\\Auth\\Login',
        'as' => 'filament.main.auth.login',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.auth.password-reset.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password-reset/request',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
        ),
        'uses' => 'Filament\\Pages\\Auth\\PasswordReset\\RequestPasswordReset@__invoke',
        'controller' => 'Filament\\Pages\\Auth\\PasswordReset\\RequestPasswordReset',
        'as' => 'filament.main.auth.password-reset.request',
        'namespace' => NULL,
        'prefix' => '/password-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.auth.password-reset.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password-reset/reset',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'signed',
        ),
        'uses' => 'Filament\\Pages\\Auth\\PasswordReset\\ResetPassword@__invoke',
        'controller' => 'Filament\\Pages\\Auth\\PasswordReset\\ResetPassword',
        'as' => 'filament.main.auth.password-reset.reset',
        'namespace' => NULL,
        'prefix' => '/password-reset',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
        ),
        'uses' => 'Filament\\Http\\Controllers\\Auth\\LogoutController@__invoke',
        'controller' => 'Filament\\Http\\Controllers\\Auth\\LogoutController',
        'as' => 'filament.main.auth.logout',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.auth.email-verification.prompt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email-verification/prompt',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
        ),
        'uses' => 'Filament\\Pages\\Auth\\EmailVerification\\EmailVerificationPrompt@__invoke',
        'controller' => 'Filament\\Pages\\Auth\\EmailVerification\\EmailVerificationPrompt',
        'as' => 'filament.main.auth.email-verification.prompt',
        'namespace' => NULL,
        'prefix' => '/email-verification',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.auth.email-verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email-verification/verify/{id}/{hash}',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'signed',
          15 => 'throttle:6,1',
        ),
        'uses' => 'Filament\\Http\\Controllers\\Auth\\EmailVerificationController@__invoke',
        'controller' => 'Filament\\Http\\Controllers\\Auth\\EmailVerificationController',
        'as' => 'filament.main.auth.email-verification.verify',
        'namespace' => NULL,
        'prefix' => '/email-verification',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.pages.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'uses' => 'App\\Filament\\Main\\Pages\\Dashboard@__invoke',
        'controller' => 'App\\Filament\\Main\\Pages\\Dashboard',
        'as' => 'filament.main.pages.dashboard',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.bathroom-compliance-observations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'bathroom-compliance-observations',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\BathroomComplianceObservationResource\\Pages\\ManageBathroomComplianceObservations@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\BathroomComplianceObservationResource\\Pages\\ManageBathroomComplianceObservations',
        'as' => 'filament.main.resources.bathroom-compliance-observations.index',
        'namespace' => NULL,
        'prefix' => '/bathroom-compliance-observations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.complementary-services.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'complementary-services',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\ComplementaryServiceResource\\Pages\\ManageComplementaryServices@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\ComplementaryServiceResource\\Pages\\ManageComplementaryServices',
        'as' => 'filament.main.resources.complementary-services.index',
        'namespace' => NULL,
        'prefix' => '/complementary-services',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.environmental-observations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'environmental-observations',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\EnvironmentalObservationResource\\Pages\\ManageEnvironmentalObservations@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\EnvironmentalObservationResource\\Pages\\ManageEnvironmentalObservations',
        'as' => 'filament.main.resources.environmental-observations.index',
        'namespace' => NULL,
        'prefix' => '/environmental-observations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.gas-station-observations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'gas-station-observations',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\GasStationObservationResource\\Pages\\ManageGasStationObservations@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\GasStationObservationResource\\Pages\\ManageGasStationObservations',
        'as' => 'filament.main.resources.gas-station-observations.index',
        'namespace' => NULL,
        'prefix' => '/gas-station-observations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.inspections.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inspections',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\ListInspections@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\ListInspections',
        'as' => 'filament.main.resources.inspections.index',
        'namespace' => NULL,
        'prefix' => '/inspections',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.inspections.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inspections/create',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\CreateInspection@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\CreateInspection',
        'as' => 'filament.main.resources.inspections.create',
        'namespace' => NULL,
        'prefix' => '/inspections',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.inspections.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inspections/{record}',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\ViewInspection@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\ViewInspection',
        'as' => 'filament.main.resources.inspections.view',
        'namespace' => NULL,
        'prefix' => '/inspections',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.inspections.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inspections/{record}/edit',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\EditInspection@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\InspectionResource\\Pages\\EditInspection',
        'as' => 'filament.main.resources.inspections.edit',
        'namespace' => NULL,
        'prefix' => '/inspections',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.inspection-settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inspection-settings',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\InspectionSettingResource\\Pages\\ManageInspectionSettings@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\InspectionSettingResource\\Pages\\ManageInspectionSettings',
        'as' => 'filament.main.resources.inspection-settings.index',
        'namespace' => NULL,
        'prefix' => '/inspection-settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.inspectors.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'inspectors',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\InspectorResource\\Pages\\ManageInspectors@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\InspectorResource\\Pages\\ManageInspectors',
        'as' => 'filament.main.resources.inspectors.index',
        'namespace' => NULL,
        'prefix' => '/inspectors',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.main.resources.observations.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'observations',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'Filament\\Http\\Middleware\\Authenticate',
          13 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          14 => 'verified:filament.main.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\Main\\Resources\\ObservationResource\\Pages\\ManageObservations@__invoke',
        'controller' => 'App\\Filament\\Main\\Resources\\ObservationResource\\Pages\\ManageObservations',
        'as' => 'filament.main.resources.observations.index',
        'namespace' => NULL,
        'prefix' => '/observations',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Pages\\Auth\\Login@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Pages\\Auth\\Login',
        'as' => 'filament.superAdmin.auth.login',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
        ),
        'uses' => 'Filament\\Http\\Controllers\\Auth\\LogoutController@__invoke',
        'controller' => 'Filament\\Http\\Controllers\\Auth\\LogoutController',
        'as' => 'filament.superAdmin.auth.logout',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.pages.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Pages\\Dashboard@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Pages\\Dashboard',
        'as' => 'filament.superAdmin.pages.dashboard',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.pages.backups' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'backups',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Pages\\Backups@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Pages\\Backups',
        'as' => 'filament.superAdmin.pages.backups',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
        'excluded_middleware' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.jobs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobs',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'Moox\\Jobs\\Resources\\JobsResource\\Pages\\ListJobs@__invoke',
        'controller' => 'Moox\\Jobs\\Resources\\JobsResource\\Pages\\ListJobs',
        'as' => 'filament.superAdmin.resources.jobs.index',
        'namespace' => NULL,
        'prefix' => '/jobs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.jobs-waitings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobs-waitings',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'Moox\\Jobs\\Resources\\JobsWaitingResource\\Pages\\ListJobsWaiting@__invoke',
        'controller' => 'Moox\\Jobs\\Resources\\JobsWaitingResource\\Pages\\ListJobsWaiting',
        'as' => 'filament.superAdmin.resources.jobs-waitings.index',
        'namespace' => NULL,
        'prefix' => '/jobs-waitings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.jobs-faileds.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'jobs-faileds',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'Moox\\Jobs\\Resources\\JobsFailedResource\\Pages\\ListFailedJobs@__invoke',
        'controller' => 'Moox\\Jobs\\Resources\\JobsFailedResource\\Pages\\ListFailedJobs',
        'as' => 'filament.superAdmin.resources.jobs-faileds.index',
        'namespace' => NULL,
        'prefix' => '/jobs-faileds',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.job-batches.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'job-batches',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'Moox\\Jobs\\Resources\\JobBatchesResource\\Pages\\ListJobBatches@__invoke',
        'controller' => 'Moox\\Jobs\\Resources\\JobBatchesResource\\Pages\\ListJobBatches',
        'as' => 'filament.superAdmin.resources.job-batches.index',
        'namespace' => NULL,
        'prefix' => '/job-batches',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.authentication-logs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'authentication-logs',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\AuthenticationLogResource\\Pages\\ListAuthenticationLogs@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\AuthenticationLogResource\\Pages\\ListAuthenticationLogs',
        'as' => 'filament.superAdmin.resources.authentication-logs.index',
        'namespace' => NULL,
        'prefix' => '/authentication-logs',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'permissions',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\PermissionResource\\Pages\\ListPermissions@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\PermissionResource\\Pages\\ListPermissions',
        'as' => 'filament.superAdmin.resources.permissions.index',
        'namespace' => NULL,
        'prefix' => '/permissions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.permissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'permissions/create',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\PermissionResource\\Pages\\CreatePermission@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\PermissionResource\\Pages\\CreatePermission',
        'as' => 'filament.superAdmin.resources.permissions.create',
        'namespace' => NULL,
        'prefix' => '/permissions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.permissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'permissions/{record}/edit',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\PermissionResource\\Pages\\EditPermission@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\PermissionResource\\Pages\\EditPermission',
        'as' => 'filament.superAdmin.resources.permissions.edit',
        'namespace' => NULL,
        'prefix' => '/permissions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'roles',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\RoleResource\\Pages\\ListRoles@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\RoleResource\\Pages\\ListRoles',
        'as' => 'filament.superAdmin.resources.roles.index',
        'namespace' => NULL,
        'prefix' => '/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.roles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'roles/create',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\RoleResource\\Pages\\CreateRole@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\RoleResource\\Pages\\CreateRole',
        'as' => 'filament.superAdmin.resources.roles.create',
        'namespace' => NULL,
        'prefix' => '/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'roles/{record}/edit',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\RoleResource\\Pages\\EditRole@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\RoleResource\\Pages\\EditRole',
        'as' => 'filament.superAdmin.resources.roles.edit',
        'namespace' => NULL,
        'prefix' => '/roles',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\UserResource\\Pages\\ListUsers@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\UserResource\\Pages\\ListUsers',
        'as' => 'filament.superAdmin.resources.users.index',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/create',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\UserResource\\Pages\\CreateUser@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\UserResource\\Pages\\CreateUser',
        'as' => 'filament.superAdmin.resources.users.create',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'filament.superAdmin.resources.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/{record}/edit',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'Filament\\Http\\Middleware\\Authenticate',
          12 => 'lockscreen\\FilamentLockscreen\\Http\\Middleware\\Locker',
          13 => 'verified:filament.superAdmin.auth.email-verification.prompt',
        ),
        'excluded_middleware' => 
        array (
        ),
        'uses' => 'App\\Filament\\SuperAdmin\\Resources\\UserResource\\Pages\\EditUser@__invoke',
        'controller' => 'App\\Filament\\SuperAdmin\\Resources\\UserResource\\Pages\\EditUser',
        'as' => 'filament.superAdmin.resources.users.edit',
        'namespace' => NULL,
        'prefix' => '/users',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/update',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'controller' => 'Livewire\\Mechanisms\\HandleRequests\\HandleRequests@handleUpdate',
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'livewire.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::21GRZqXUsI9Z0pFa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@returnJavaScriptAsFile',
        'as' => 'generated::21GRZqXUsI9Z0pFa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::mMNKX78cXiZtWSK6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.min.js.map',
      'action' => 
      array (
        'uses' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'controller' => 'Livewire\\Mechanisms\\FrontendAssets\\FrontendAssets@maps',
        'as' => 'generated::mMNKX78cXiZtWSK6',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.upload-file' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/upload-file',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FileUploadController@handle',
        'as' => 'livewire.upload-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'livewire.preview-file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/preview-file/{filename}',
      'action' => 
      array (
        'uses' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'controller' => 'Livewire\\Features\\SupportFileUploads\\FilePreviewController@handle',
        'as' => 'livewire.preview-file',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lockscreen.main.page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'screen/lock',
      'action' => 
      array (
        'domain' => 'https://insp.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:main',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'App\\Http\\Middleware\\HtmlMinifier',
          12 => 'auth',
        ),
        'uses' => 'lockscreen\\FilamentLockscreen\\Http\\Livewire\\LockerScreen@__invoke',
        'controller' => 'lockscreen\\FilamentLockscreen\\Http\\Livewire\\LockerScreen',
        'as' => 'lockscreen.main.page',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lockscreen.superAdmin.page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'screen/lock',
      'action' => 
      array (
        'domain' => 'https://admin.controlinternacional.test',
        'middleware' => 
        array (
          0 => 'panel:superAdmin',
          1 => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
          2 => 'Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse',
          3 => 'Illuminate\\Session\\Middleware\\StartSession',
          4 => 'Illuminate\\Session\\Middleware\\AuthenticateSession',
          5 => 'Illuminate\\View\\Middleware\\ShareErrorsFromSession',
          6 => 'Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken',
          7 => 'JulioMotol\\AuthTimeout\\Middlewares\\CheckAuthTimeout',
          8 => 'Illuminate\\Routing\\Middleware\\SubstituteBindings',
          9 => 'Filament\\Http\\Middleware\\DisableBladeIconComponents',
          10 => 'Filament\\Http\\Middleware\\DispatchServingFilamentEvent',
          11 => 'auth',
        ),
        'uses' => 'lockscreen\\FilamentLockscreen\\Http\\Livewire\\LockerScreen@__invoke',
        'controller' => 'lockscreen\\FilamentLockscreen\\Http\\Livewire\\LockerScreen',
        'as' => 'lockscreen.superAdmin.page',
        'namespace' => NULL,
        'prefix' => '/',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf.generate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pdf/generate/{record}/{document?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:web',
        ),
        'domain' => 'https://insp.controlinternacional.test',
        'uses' => 'App\\Http\\Controllers\\Pdf\\GenerateController@handle',
        'controller' => 'App\\Http\\Controllers\\Pdf\\GenerateController@handle',
        'as' => 'pdf.generate',
        'namespace' => NULL,
        'prefix' => '/pdf',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pdf.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pdf/view/{record}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'https://insp.controlinternacional.test',
        'uses' => 'App\\Http\\Controllers\\Pdf\\ViewController@handle',
        'controller' => 'App\\Http\\Controllers\\Pdf\\ViewController@handle',
        'as' => 'pdf.view',
        'namespace' => NULL,
        'prefix' => '/pdf',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VPf3ccaG9uZ3gWPW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'optimize-clear',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'https://insp.controlinternacional.test',
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:121:"function () {
        \\Artisan::call(\'optimize:clear\');
        \\Artisan::call(\'filament:clear-cached-components\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000014550000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::VPf3ccaG9uZ3gWPW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::z0XX9zKEKZ0190UP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'optimize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'https://insp.controlinternacional.test',
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:185:"function () {
        \\Artisan::call(\'optimize\');
        \\Artisan::call(\'view:cache\');
        \\Artisan::call(\'event:cache\');
        \\Artisan::call(\'filament:cache-components\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000014590000000000000000";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::z0XX9zKEKZ0190UP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
