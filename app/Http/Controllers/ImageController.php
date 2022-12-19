<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Vinkla\Hashids\Facades\Hashids;

class ImageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('image.create');
    }

    /**
     * @param ImageRequest $request
     * @return RedirectResponse
     */
    public function store(ImageRequest $request)
    {
        $image = Image::factory()
            ->create([
                'filename' => Storage::disk('public')->putFile('images', $request->image),
                'original' => $request->image->getClientOriginalName(),
                'expires' => now()->toImmutable()->addSeconds($request->lifetime),
            ]);

        return to_route('imagebin.show', [
            'hash' => Hashids::connection('image')->encode($image->id),
        ]);
    }

    /**
     * @param string $hash
     * @return Application|Factory|View
     */
    public function show(string $hash)
    {
        $hash = str_replace(['i', 'l', 'o'], ['1', '1', '0'], strtolower($hash));

        $id = Hashids::connection('image')->decode($hash);
        if (count($id) !== 1) {
            abort(404);
        }

        return view('image.show', [
            'image' => Image::query()
                ->where('id', $id[0])
                ->where('expires', '>', now())
                ->firstOrFail()
        ]);
    }
}
