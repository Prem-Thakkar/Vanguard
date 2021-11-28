<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Courses extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('courses.page_name'))
            ->route('manage_courses.index')
            ->icon('fas fa-book')
            ->active("manage_courses*")
            ->permissions('manage.courses');
    }
}
