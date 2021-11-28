<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class ListCourses extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('courses.page_name'))
            ->route('courses.list')
            ->icon('fas fa-book')
            ->active("courses*")
            ->permissions('courses.list');
    }
}
