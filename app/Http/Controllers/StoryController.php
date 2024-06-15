<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use Exception;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();
        return view("welcome", ['stories' => $stories]);
    }

    public function create()
    {
        return view('story.create');
    }

    public function store(Request $request)
    {
        try {
            $story = new Story;
            $story->title = $request->title;
            $story->subtitle = $request->subtitle;
            $story->content = $request->content;
            $story->categories=$request->categories;
            $story->user_id = 2; // Ajuste para o ID do usuário autenticado, se necessário

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->file('image');
                $extension = $requestImage->extension();
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif']; // Extensões permitidas
                if (!in_array($extension, $allowedExtensions)) {
                    return redirect('/')->with('error', 'Apenas imagens JPG, JPEG, PNG ou GIF são permitidas.');
                }

                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('img/stories'), $imageName);

                $imagePath = public_path('img/stories') . '/' . $imageName;
                

                $story->image = $imageName;
            } else {
                return redirect('/')->with('error', 'Envie uma imagem válida.');
            }

            $story->save();

            return redirect('/')->with('success', 'História criada com sucesso!');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Erro ao criar história: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $story = Story::findOrFail($id);
            return view('story.show', ['story' => $story]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect('/')->with('error', 'História não encontrada.');
        }
    }
    
}
