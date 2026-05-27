<?php

namespace NoteBrainsLab\FilamentMenuManager\Tests;

use Filament\Panel;
use Filament\PanelProvider;
use NoteBrainsLab\FilamentMenuManager\FilamentMenuManagerPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->default()
            ->plugin(FilamentMenuManagerPlugin::make());
    }
}
