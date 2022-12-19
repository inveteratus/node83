<?php

namespace App\Http\Livewire;

use App\Models\Snippet;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $term;

    /**
     * @return Application|Factory|View
     */
    public function render(): Application|Factory|View
    {
        $query = Snippet::query();
        if (!auth()->user()) {
            $query->where('public', true);
        }

        $term = trim(preg_replace('`\s+`', ' ', $this->term ?? ''));
        if ($term) {
            $query->where('name', 'like', '%' . $this->like($term) . '%');
        }

        return view('livewire.search', [
            'snippets' => $query
                ->orderByDesc('created_at')
                ->paginate(),
            'sql' => $query->toSql(),
        ]);
    }

    /**
     * @param string $value
     * @return string
     */
    private function like(string $value): string
    {
        return str_replace(['%', '_', '\\'], ['\%','\_', '\\\\'], $value);
    }
}
