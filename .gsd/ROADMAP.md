# ROADMAP.md

> **Current Phase**: Completed
> **Milestone**: v1.1

## Must-Haves (from SPEC)
- [x] Fluent API for registering locations and model sources
- [x] Drag & drop nested sorting using SortableJS
- [x] Button-based reordering controls (Up, Down, Indent, Outdent)
- [x] Eloquent Model integration trait & contract
- [x] Auto-save with custom debouncing
- [x] Multi-location configurations
- [x] Authentication restriction flag for plugin navigation and page access

## Phases

### Phase 1: Core Service & Schema
**Status**: 🟢 Completed
**Objective**: Base models, migrations, service provider, and config structure.

### Phase 2: Livewire Components
**Status**: 🟢 Completed
**Objective**: MenuBuilder and MenuPanel component setups with Tailwind/Vanilla CSS styling.

### Phase 3: Drag & Drop and Accessibility Reordering
**Status**: 🟢 Completed
**Objective**: Implement SortableJS integration, nested order updates, and button reordering.

### Phase 4: Eloquent Model Sources
**Status**: 🟢 Completed
**Objective**: HasMenuItems trait implementation, model source lists, and polymorphic database bindings.

### Phase 5: Package Distribution & Tests
**Status**: 🟢 Completed
**Objective**: Final polish, migrations installer command, and basic Pest tests suite.

### Phase 6: Page Authentication Guard
**Status**: 🟢 Completed
**Objective**: Implement authentication flag in plugin options, add authorization checks to MenuManagerPage, and write integration tests.
