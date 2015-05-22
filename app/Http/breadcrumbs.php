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

//Home > Banner
Breadcrumbs::register('cms.banners.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('Banner', route('cms.banners.index'));
});

//Home > Banner > Add New
Breadcrumbs::register('cms.Banners.add', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('Add New', route('cms.Banners.add'));
});

//Home > Pages
Breadcrumbs::register('cms.pages.index', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.index');
    $breadcrumbs->push('Pages', route('cms.pages.index'));
});

//Home > Pages > Add New
Breadcrumbs::register('cms.pages.addPage', function($breadcrumbs)
{
    $breadcrumbs->parent('cms.pages.index');
    $breadcrumbs->push('Add New', route('cms.pages.addPage'));
});