---
phase: 6
plan: 1
wave: 1
---

# Plan 6.1: Page Authentication Guard

## Objective
Implement authentication configuration options, a fluent API on the plugin class, access checks on the `MenuManagerPage`, and test coverage.

## Context
- .gsd/SPEC.md
- .gsd/ARCHITECTURE.md
- config/filament-menu-manager.php
- src/FilamentMenuManagerPlugin.php
- src/Pages/MenuManagerPage.php

## Tasks

<task type="auto">
  <name>Implement configuration and fluent API</name>
  <files>config/filament-menu-manager.php,src/FilamentMenuManagerPlugin.php</files>
  <action>
    - Add `'authentication' => true,` to `config/filament-menu-manager.php`.
    - In `src/FilamentMenuManagerPlugin.php`, add a protected property `$shouldAuthenticate = true;`.
    - In `boot()`, merge the default config: `$this->shouldAuthenticate = config('filament-menu-manager.authentication', true);`.
    - Add `authentication(bool $condition): static` fluent API method to change the property.
    - Add `shouldAuthenticate(): bool` getter method.
  </action>
  <verify>Check plugin class contains authentication methods and property</verify>
  <done>The config and fluent methods are implemented and boot merges them correctly.</done>
</task>

<task type="auto">
  <name>Enforce access check on page and write tests</name>
  <files>src/Pages/MenuManagerPage.php,tests/Feature/AuthenticationTest.php</files>
  <action>
    - In `src/Pages/MenuManagerPage.php`, implement the `canAccess()` method returning true/false using `filament()->auth()->check()` if `shouldAuthenticate()` is enabled.
    - Create `tests/Feature/AuthenticationTest.php` and write tests verifying access under authentication true/false.
  </action>
  <verify>Run `./vendor/bin/pest` to verify authentication protection works and other tests pass.</verify>
  <done>`MenuManagerPage::canAccess()` protects the page route and Pest tests prove correct authorization status behavior.</done>
</task>

## Success Criteria
- [ ] Direct accesses to menu manager routes verify authentication when enabled.
- [ ] Users can toggle the authentication restriction using `FilamentMenuManagerPlugin::make()->authentication(false)`.
- [ ] Tests verify both conditions.
