<?php

// Home
Breadcrumbs::register('cms.index', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('cms.index'));
});

// Home > Media
Breadcrumbs::register('cms.media.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('Media', route('cms.media.index'));
});

// Home > Media > Add New
Breadcrumbs::register('cms.media.create', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.media.index');
    $breadcrumbs->push('Add New', route('cms.media.create'));
});

// Home > Media > Edit
Breadcrumbs::register('cms.media.show', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.media.index');
    $breadcrumbs->push('Edit', route('cms.media.show'));
});

// Home > News 

Breadcrumbs::register('cms.news.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('News', route('cms.news.index'));
});

// Home > News > Add New

Breadcrumbs::register('cms.news.create', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.news.index');
    $breadcrumbs->push('Add New', route('cms.news.create'));
});

// Home > News > Edit
Breadcrumbs::register('cms.news.show', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.news.index');
    $breadcrumbs->push('Edit', route('cms.news.show'));
});

// Home > General Settings
Breadcrumbs::register('cms.general_settings.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('General Settings', route('cms.general_settings.index'));
});
