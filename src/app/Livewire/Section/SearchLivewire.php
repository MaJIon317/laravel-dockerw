<?php

namespace App\Livewire\Section;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchLivewire extends Component
{
    public $search = '';
    public $historys = [];
    public $results = [];
    public $showDropdown;

    public function keyup(Request $request): void
    {
        $this->results = array();
        $this->historys = $request->session()->get('search_history');

        if (!empty(trim($this->search))) {
            $results = Category::search($this->search)->limit(10)->get();

            foreach ($results as $result) {
     
                $md5 = md5(serialize([
                    'category',
                    $result->slug
                ]));

                $this->results[$md5] = [
                    'title' => $result->title,
                    'url' => route('category', $result->slug),
                    'text' => $result->products->count()
                ];
            }

            $results = Product::search($this->search)->status()->limit(10)->get();

            foreach ($results as $result) {
                $md5 = md5(serialize([
                    'product',
                    $result->slug
                ]));

                $this->results[$md5] = [
                    'title' => $result->title,
                    'url' => route('product', $result->slug),
                    'text' => 'Товар',
                ];
            }
        }


        // Save result to sesion
        $new_historys = array();

        if ($this->results) {
            $this->historys[md5($this->search)] = $this->search;
        }

        if ($this->historys) {
            foreach ($this->historys as $history) {
                $new_historys[md5($history)] = $history;
            }
        }

        $this->historys = array_unique($new_historys);

        $request->session()->put(['search_history' => $this->historys]);
    }

    public function searchBarcode(string $barcode)
    {
        $product = Product::where('barcode', $barcode)->status()->first();

        if ($product) {
            $this->redirectRoute('product', $product->slug);
        } else {
            $this->dispatch('toast', message: 'Не удалось найти товар с штрихкодом: ' . $barcode, type: 'error');
        }
    }

    public function deleteHistory(Request $request, string $key)
    {
        $this->historys = $request->session()->get('search_history');

        if (isset($this->historys[$key])) {
            unset($this->historys[$key]);
        }

        $request->session()->put(['search_history' => $this->historys]);
    }
  

    public function clearHistory(Request $request)
    {
        $request->session()->forget('search_history');

        $this->historys = $request->session()->get('search_history');
    }

    public function render()
    {
        return view('components.section.search');
    }
}
