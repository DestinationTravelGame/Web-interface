<?php  

use App\Route;

require 'app/Route.php';

Route::View('', 'welcome');
Route::View('add_checkpoints', 'add_checkpoints');
Route::View('add_question', 'add_questions');
Route::View('missions', 'missions');
