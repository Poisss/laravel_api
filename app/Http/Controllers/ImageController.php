<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return ['Изображение 1','Изображение 2'];
    }

    public function store(Request $request)
    {
        return 'Изображение создано';
    }

    public function show(string $id)
    {
        return 'Изображение '.$id;
    }

    public function update(Request $request, string $id)
    {
        return 'Изображение '.$id.' обновлено';
    }

    public function destroy(string $id)
    {
        return 'Изображение '.$id.' удалено';
    }
}
