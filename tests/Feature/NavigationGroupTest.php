<?php

namespace NoteBrainsLab\FilamentMenuManager\Tests\Feature;

use NoteBrainsLab\FilamentMenuManager\FilamentMenuManagerPlugin;
use NoteBrainsLab\FilamentMenuManager\Pages\MenuManagerPage;
use NoteBrainsLab\FilamentMenuManager\Tests\TestCase;

class NavigationGroupTest extends TestCase
{
    /** @test */
    public function it_falls_back_to_default_settings_group_when_not_configured(): void
    {
        $this->assertSame('Settings', MenuManagerPage::getNavigationGroup());
    }

    /** @test */
    public function it_returns_null_when_explicitly_set_to_no_group(): void
    {
        FilamentMenuManagerPlugin::get()->navigationGroup(null);

        $this->assertNull(MenuManagerPage::getNavigationGroup());
    }

    /** @test */
    public function it_returns_configured_group_when_set(): void
    {
        FilamentMenuManagerPlugin::get()->navigationGroup('Custom Group');

        $this->assertSame('Custom Group', MenuManagerPage::getNavigationGroup());
    }

    /** @test */
    public function it_registers_navigation_by_default(): void
    {
        $this->assertTrue(MenuManagerPage::shouldRegisterNavigation());
    }

    /** @test */
    public function it_can_hide_navigation(): void
    {
        FilamentMenuManagerPlugin::get()->shouldRegisterNavigation(false);

        $this->assertFalse(MenuManagerPage::shouldRegisterNavigation());
    }
}
