<?php

// Admin Components

\Component::register('admin', function($title) {
    return \Theme::view('admin.app', compact('title'));
});

\Component::register('adminHeader', function($title) {
    return \Theme::view('admin.partials.header', compact('title'));
});

\Component::register('adminFooter', function($data) {
    return \Theme::view('admin.partials.footer', compact('data'));
});

\Component::register('adminTopbar', function($data) {
    return \Theme::view('admin.partials.topbar', compact('data'));
});

\Component::register('adminSidebar', function($data) {
    return \Theme::view('admin.partials.sidebar', compact('data'));
});

\Component::register('adminQuickbar', function($data) {
    return \Theme::view('admin.partials.quickbar', compact('data'));
});

\Component::register('adminStyleCustomizer', function($data) {
    return \Theme::view('admin.partials.stylecustomizer', compact('data'));
});


// Frontend Components

\Component::register('app', function($title) {
    return \Theme::view('frontend.app', compact('title'));
});

\Component::register('header', function($title) {
    return \Theme::view('frontend.partials.header', compact('title'));
});

\Component::register('topbar', function($data) {
    return \Theme::view('frontend.partials.topbar', compact('data'));
});

\Component::register('footer', function($data) {
    return \Theme::view('frontend.partials.footer', compact('data'));
});

// Store Components

\Component::register('shop', function($title) {
    return \Theme::view('frontend.shop', compact('title'));
});

\Component::register('shopHeader', function($title) {
    return \Theme::view('frontend.partials.shop-header', compact('title'));
});

\Component::register('shopTopbar', function($data) {
    return \Theme::view('frontend.partials.shop-topbar', compact('data'));
});

\Component::register('shopFooter', function($data) {
    return \Theme::view('frontend.partials.shop-footer', compact('data'));
});