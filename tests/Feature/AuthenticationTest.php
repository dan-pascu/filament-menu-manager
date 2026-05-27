<?php

use Filament\Facades\Filament;
use Filament\Panel;
use NoteBrainsLab\FilamentMenuManager\FilamentMenuManagerPlugin;
use NoteBrainsLab\FilamentMenuManager\Pages\MenuManagerPage;
use NoteBrainsLab\FilamentMenuManager\Tests\TestCase;
use Illuminate\Support\Facades\Auth;

uses(TestCase::class);

beforeEach(function () {
    config(['filament-menu-manager.authentication' => true]);
    FilamentMenuManagerPlugin::get()->authentication(true);
});

it('denies access to guest users when authentication is enabled', function () {
    // By default, authentication is enabled
    $plugin = FilamentMenuManagerPlugin::get();
    expect($plugin->shouldAuthenticate())->toBeTrue();

    // Ensure we are not logged in
    Auth::logout();

    expect(MenuManagerPage::canAccess())->toBeFalse();
});

it('allows access to authenticated users when authentication is enabled', function () {
    $plugin = FilamentMenuManagerPlugin::get();
    expect($plugin->shouldAuthenticate())->toBeTrue();

    // Mock logged in user using standard User model instance
    $user = new \Illuminate\Foundation\Auth\User();
    $this->actingAs($user);

    expect(MenuManagerPage::canAccess())->toBeTrue();
});

it('allows access to guest users when authentication is disabled', function () {
    // Disable authentication programmatically
    $plugin = FilamentMenuManagerPlugin::get();
    $plugin->authentication(false);
    expect($plugin->shouldAuthenticate())->toBeFalse();

    // Ensure we are not logged in
    Auth::logout();

    expect(MenuManagerPage::canAccess())->toBeTrue();
});

it('denies access when a custom closure returns false', function () {
    $plugin = FilamentMenuManagerPlugin::get();
    
    // Configure custom authentication closure that returns false
    $plugin->authentication(fn () => false);

    expect(MenuManagerPage::canAccess())->toBeFalse();
});

it('allows access when a custom closure returns true', function () {
    $plugin = FilamentMenuManagerPlugin::get();

    // Configure custom authentication closure that returns true
    $plugin->authentication(fn () => true);

    expect(MenuManagerPage::canAccess())->toBeTrue();
});
