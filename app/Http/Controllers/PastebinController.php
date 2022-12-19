<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasteRequest;
use App\Models\Paste;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Vinkla\Hashids\Facades\Hashids;

class PastebinController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pastebin.create');
    }

    /**
     * @param PasteRequest $request
     * @return RedirectResponse
     */
    public function store(PasteRequest $request)
    {
        $paste = Paste::factory()
            ->create([
                'content' => $request->content,
                'expires' => now()->toImmutable()->addSeconds($request->lifetime),
            ]);

        return to_route('pastebin.show', [
            'hash' => Hashids::connection('paste')->encode($paste->id),
        ]);
    }

    /**
     * @param string $hash
     * @return Application|Factory|View
     */
    public function show(string $hash)
    {
        $hash = str_replace(['i', 'l', 'o'], ['1', '1', '0'], strtolower($hash));

        $id = Hashids::connection('paste')->decode($hash);
        if (count($id) !== 1) {
            abort(404);
        }

        return view('paste.show', [
            'paste' => Paste::query()
                ->where('id', $id[0])
                ->where('expires', '>', now())
                ->firstOrFail()
        ]);
    }
}
