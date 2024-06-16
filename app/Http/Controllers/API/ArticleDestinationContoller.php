<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ResponseFormatter;
use App\Models\ArticleDestination;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleDestinationContoller extends Controller
{
    public function index()
    {
        try {
            $ArticleDestination = ArticleDestination::with(['UserRateDestination'])->get();

            if (!$ArticleDestination) {
                return response()->json([
                    'code' => 404,
                    'status' => "error",
                    'message' => 'ArticleDestination not found',
                ], 404);
            }

            return response()->json([
                'code' => 200,
                'status' => 'success',
                'message' => 'ArticleDestination Found',
                'data' => [
                    'ArticleDestination' => $ArticleDestination,
                ],
            ], 200);

        } catch (Exception $e) {

            return response()->json([
                'code' => 500,
                'status' => "error",
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($slug) 
    {
        try {
            $article = ArticleDestination::with(['UserRateDestination'])->where('slug', $slug)->firstOrFail();


            if (!$article) {
                throw new Exception("Article Destination Not Found", 1);
            }

            return ResponseFormatter::success($article, 'Article Destination Found', 200);

        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }


    public function create(Request $request)
    {
        try {
            $path = null;
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/article/image');
            }

            $ArticleDestination = ArticleDestination::create([
                'judul_article' => $request->judul_article,
                'image' => $path,
                'body' => $request->body,
                'ratting_article_acc' => $request->ratting_article_acc
            ]);

            if (!$ArticleDestination) {
                throw new Exception("Article Destination Not Found", 1);
            }

            return ResponseFormatter::success($ArticleDestination, 'Article Destination Created', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $ArticleDestination = ArticleDestination::findOrFail($id);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/article/image');
            } else {
                $path = $ArticleDestination->image;
            }

            $ArticleDestination->update([
                'judul_article' => $request->judul_article,
                'image' => $path,
                'body' => $request->body,
                'ratting_article_acc' => $request->ratting_article_acc
            ]);

            if (!$ArticleDestination) {
                throw new Exception("Article Destination Not Found", 1);
            }

            return ResponseFormatter::success($ArticleDestination, 'Article Destination Updated', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $ArticleDestination = ArticleDestination::findOrFail($id);


            if ($ArticleDestination->image) {
                Storage::disk('local')->delete('public/' . $ArticleDestination->image);
            }
            $ArticleDestination->delete();

            return ResponseFormatter::success($ArticleDestination, 'Article Destination Deleted', 200);
        } catch (Exception $e) {
            return ResponseFormatter::error($e->getMessage(), 500);
        }
    }
}
