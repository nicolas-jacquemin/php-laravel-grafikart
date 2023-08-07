<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TaskController extends Controller
{
    public function index(): Paginator {
        return Task::paginate();
    }
}
