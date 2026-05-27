# SPEC.md — Project Specification

> **Status**: `FINALIZED`

## Vision
Filament Menu Manager is a powerful and elegant menu manager plugin for Filament PHP v4 & v5 that allows administrators to easily build location-based menus using drag-and-drop hierarchy, custom links, and Eloquent model sources, complete with dark theme support and auto-save capabilities.

## Goals
1. Provide a fluent API for registering menu locations and Eloquent model sources inside Filament panels.
2. Enable interactive drag-and-drop menu building with SortableJS, including nested item reordering, and alternative button controls for accessibility (up, down, indent, outdent).
3. Integrate custom URLs and polymorphic Eloquent model links (like Posts, Pages) to act as dynamic menu items with auto-resolving URLs.
4. Support automated schema management through configuration options and auto-saving/debouncing changes back to the database.
5. Support optional page-level authentication checks, allowing navigation items and routes to be restricted to authenticated users.

## Non-Goals (Out of Scope)
- Built-in multi-lingual translation layer (delegated to standard Laravel translation mechanisms or spatie translatable).
- Full front-end navigation components/renders (only raw structures/trees are provided, custom frontend HTML generation is left to the user).

## Users
Developers building sites with Laravel/Filament who need to give content editors an easy way to configure header, footer, sidebar, or other nested navigation menus.

## Constraints
- PHP version `^8.2`
- Laravel version `^12.0 | ^13.0`
- Filament version `^4.0 | ^5.0`
- Livewire version `^3.0 | ^4.0`

## Success Criteria
- [x] Successful registration and execution under Filament v4/v5 panels.
- [x] Interactive menu reordering works cleanly and persists to DB.
- [x] Model sources (via HasMenuItems trait) load, display, and resolve URLs.
- [x] Auto-save registers correctly and is configurable via configuration.
- [x] Authentication option restricts navigation and page route access when enabled (returns 403 when unauthenticated/unauthorized).
