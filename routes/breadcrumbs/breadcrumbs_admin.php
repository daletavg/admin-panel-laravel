<?php


Breadcrumbs::macro('resource', function ($name, $title, $otherParent = null) {
    Breadcrumbs::for("$name.index", function ($trail) use ($name, $title, $otherParent) {
        $trail->parent($otherParent ?? 'admin.index');
        $trail->push($title, route("$name.index"));
    });
    Breadcrumbs::for("$name.create", function ($trail) use ($name) {
        $trail->parent("$name.index");

        $trail->push('Создание', route("$name.create"));
    });
    Breadcrumbs::for("$name.edit", function ($trail, $model) use ($name) {
        $trail->parent("$name.index");
        $trail->push('Редактирование', route("$name.edit", $model));
    });
});


Breadcrumbs::for('admin.index', function ($trail) {
    $trail->push('Главная', route('admin.index'));
});
//Breadcrumbs::resource('admin.banners', 'Банеры');
//Breadcrumbs::resource('admin.stocks', 'Акции');
//Breadcrumbs::resource('admin.staff', 'Сотрудники');
//Breadcrumbs::resource('admin.clients', 'Клиенты');

Breadcrumbs::resource('admin.feedback', 'Обратная связь');

Breadcrumbs::resource('admin.translate', 'Локализация');
Breadcrumbs::resource('admin.language-manager', 'Управление языками');
//Breadcrumbs::resource('admin.news', 'Нвости');
Breadcrumbs::resource('admin.settings', 'Настройки');
Breadcrumbs::for('admin.profile.index', function ($trail) {
    $trail->parent('admin.index');
    $trail->push('Профиль', route('admin.profile.index'));
});




/////////////SEO BREADCRUMBS
Breadcrumbs::for('admin.seo.index', function ($trail) {
    $trail->parent('admin.index');
    $trail->push('SEO', route('admin.seo.index'));
});
Breadcrumbs::for('admin.seo.global-seo.index', function ($trail) {
    $trail->parent('admin.seo.index');
    $trail->push('Глобальные настройки SEO', route('admin.seo.global-seo.index'));
});
Breadcrumbs::for('admin.seo.sitemap.index', function ($trail) {
    $trail->parent('admin.seo.index');
    $trail->push('Генерация sitemap', route('admin.seo.sitemap.index'));
});
Breadcrumbs::for('admin.seo.sitemap.edit', function ($trail) {
    $trail->parent('admin.seo.sitemap.index');
    $trail->push('Редактирование sitemap.xml', route('admin.seo.sitemap.edit'));
});
Breadcrumbs::for('admin.seo.robots.index', function ($trail) {
    $trail->parent('admin.seo.index');
    $trail->push('Редактирование robots.txt', route('admin.seo.robots.index'));
});
Breadcrumbs::resource('admin.seo.meta', 'Мета', 'admin.seo.index');
Breadcrumbs::resource('admin.seo.redirects', 'Перенаправления', 'admin.seo.index');


//////Service subservice bread
Breadcrumbs::for('admin.services.index', function ($trail) {
    $trail->parent('admin.index');
    $trail->push('Услуги', route('admin.services.index'));
});
Breadcrumbs::for('admin.services.edit', function ($trail, $id) {
    $trail->parent('admin.services.index');
    $service = \App\Models\Service\Service::find($id);
    $trail->push($service->getAttribute('title'), route('admin.services.edit', $service->getAttribute('id')));
});

Breadcrumbs::for('admin.subservices.create', function ($trail,$id) {
    $trail->parent('admin.services.edit',$id);
    $trail->push('Создание подуслуги', route('admin.subservices.create', ['service'=>$id]));
});
Breadcrumbs::for('admin.subservices.edit', function ($trail,$serviceId,$subsericeId) {
    $trail->parent('admin.services.edit',$serviceId);
    $data = \App\Models\Subservice\Subservice::find($subsericeId);
    $trail->push($data->getAttribute('title'), route('admin.subservices.edit', ['service'=>$serviceId,'subservice'=>$serviceId]));
});

Breadcrumbs::for('admin.stage.create', function ($trail,$serviceId,$subserviceId) {
    $trail->parent('admin.subservices.edit',$serviceId,$subserviceId);
    $trail->push('Создание этапа работ', route('admin.stage.create', ['service'=>$serviceId,'subservice'=>$subserviceId]));
});

Breadcrumbs::for('admin.stage.edit', function ($trail,$serviceId,$subserviceId,$stageId) {
    $trail->parent('admin.subservices.edit',$serviceId,$subserviceId);
    $data = \App\Models\Stage\Stage::find($stageId);
    $trail->push($data->getAttribute('title'), route('admin.stage.edit', ['service'=>$serviceId,'subservice'=>$serviceId,'stage'=>$stageId]));
});
