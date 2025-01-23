<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\SessionManager;

class WishlistService {
    const DEFAULT_INSTANCE = 'wishlist';

    protected $user;
    protected $session;

    /**
     * Constructs a new wishlist object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->user = Auth::guard('web');
        $this->session = $session;
    }
     
    /**
     * Adds a new item to the wishlist.
     *
     * @param int $product_id
     * @return void
     */
    public function add(int $product_id): void
    {
        $content = $this->getContent();

        if (!$content->has($product_id) && $this->getProduct($product_id)) {
            if ($this->user->check()) {
                Wishlist::create([
                    'user_id' => $this->user->id(),
                    'product_id' => $product_id,
                ]);
            } else {
                $content->put($product_id, $product_id);
        
                $this->session->put(self::DEFAULT_INSTANCE, $content);
            }
        }
    }

    /**
     * Add or remove item to the wishlist.
     *
     * @param int $product_id
     * @return void
     */
    public function update(int $product_id): void
    {
        $content = $this->getContent();

        if ($content->has($product_id)) {
            $this->remove($product_id);
        } else {
            $this->add($product_id);
        }
    }

    /**
     * Removes an item from the wishlist.
     *
     * @param int $product_id
     * @return void
     */
    public function remove(int $product_id): void
    {
        $content = $this->getContent();

        if ($content->has($product_id)) {
            if ($this->user->check()) {
                Wishlist::where([
                    ['user_id', $this->user->id()],
                    ['product_id', $product_id]
                ])->delete();
            } elseif ($content->has($product_id)) {
                $this->session->put(self::DEFAULT_INSTANCE, $content->except($product_id));
            }
        }
    }

    /**
     * Clears the wishlist.
     *
     * @return void
     */
    public function clear(): void
    {
        if ($this->user->check()) {
            Wishlist::where('user_id', $this->user->id())->delete();
        } else {
            $this->session->forget(self::DEFAULT_INSTANCE);
        }
    }

    /**
     * Returns the content of the wishlist.
     *
     * @return Illuminate\Support\Collection
     */
    public function content(): Collection
    {
        return $this->getContent();
    }

    /**
     * Returns total items in the wishlist.
     *
     * @return int
     */
    public function total(): int
    {
        $content = $this->getContent();

        return count($content);
    }

   /**
     * Returns the content of the wishlist.
     *
     * @return Illuminate\Support\Collection
     */
    protected function getContent(): Collection
    {
        $wishlists = array();

        if ($this->user->check()) {
            $items = Wishlist::where('user_id', $this->user->id())->get();

            foreach ($items as $item) {
                $wishlists[$item->product_id] = $item->product_id;
            }
        } else {
            $wishlists = $this->session->get(self::DEFAULT_INSTANCE, []);
        }

        return collect($wishlists);
    }

    public function getProducts(): array
    {
        $products = array();

        $items = $this->getContent();

        foreach ($items as $item) {
            $product_info = $this->getProduct($item);

            if ($product_info) {
                $products[] = $product_info;
            }
        }

        return $products;
    }

    /**
     * Get product details
     *
     * @param int $product_id
     * @return void
     */
    private function getProduct(int $product_id)
    {
        return Product::where('id', $product_id)->first();
    }

    /**
     * Copying products to favorites during authorization
     *
     * @return void
     */
    public function auth(): void
    {
        if ($this->user->check()) {
            $wishlists = $this->session->get(self::DEFAULT_INSTANCE, []);

            $items = Wishlist::select('product_id')->where('user_id', $this->user->id())->get();
     
            $userWishlists = array();

            foreach ($items as $item) {
                $userWishlists[$item->product_id] = $item->product_id;
            }

            foreach ($wishlists as $product_id) {
                if (!isset($userWishlists[$product_id])) {
                    $this->add($product_id);
                }
            }

            $this->session->forget(self::DEFAULT_INSTANCE);
        }
    }
}