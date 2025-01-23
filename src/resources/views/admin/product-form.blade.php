@php
    $marketplaces = array(
        'ozon' => 'Ozon',
        'wb' => 'Wildberries',
    );

@endphp

@extends('layouts.admin')

@section('title', __('admin/products.title'))

@section('buttons')
    <button type="submit" class="btn btn-primary" form="form-default">{{ __('admin/header.save') }}</button>
@endsection

@section('content')

<form method="post" enctype="multipart/form-data" action="{{ $action }}" id="form-default">
    @csrf

    @if(isset($product))
        @method('PUT')
    @endif
    
    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">Основные</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="meta-tab" data-bs-toggle="tab" data-bs-target="#meta" type="button" role="tab" aria-controls="meta" aria-selected="false">Meta данные</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="marketplace-tab" data-bs-toggle="tab" data-bs-target="#marketplace" type="button" role="tab" aria-controls="marketplace" aria-selected="false">Маркетплейсы</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="lable-tab" data-bs-toggle="tab" data-bs-target="#lable" type="button" role="tab" aria-controls="lable" aria-selected="false">Лейблы</button>
        </li>

    </ul>
    <div class="tab-content" id="defaultTabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            <x-input.admin.text 
                type="text"
                name="article" 
                :value="old('article') ?? $product->article ?? null" 
                label="Артикул" 
                placeholder="Артикул"
                :error="$errors->first('article')" />    

            @php

                $items = array();

                foreach($categories as $item) {
                    $items[$item->id] = $item->title;
                }

            @endphp

            <x-input.admin.select
                name="category_id" 
                :values="$items"
                :value="old('category_id') ?? $product->category_id ?? null" 
                default="Выбрать категорию товара"
                label="Категория"
                :error="$errors->first('category_id')" />

            @php

                $items = array();

                foreach($discount_groups as $item) {
                    $items[$item->id] = __('admin/products.discount_group', [
                        'title' => $item->title
                    ]);
                }

            @endphp

            <x-input.admin.select
                name="discount_group_id" 
                :values="$items"
                :value="old('discount_group_id') ?? $product->discount_group_id ?? null" 
                default="Выбрать группу скидок"
                label="Группа скидок"
                :error="$errors->first('discount_group_id')" />

            <x-input.admin.text 
                type="text"
                name="price" 
                :value="old('price') ?? $product->price ?? null" 
                label="Базовая цена" 
                placeholder="Базовая цена"
                :error="$errors->first('price')" /> 

            <x-input.admin.text 
                type="text"
                name="discount" 
                :value="old('discount') ?? $product->discount ?? null" 
                label="Цена со скидкой" 
                placeholder="Цена со скидкой"
                :error="$errors->first('discount')" /> 

            <x-input.admin.text 
                type="number"
                name="minimum" 
                :value="old('minimum') ?? $product->minimum ?? null" 
                label="Минимальная партия" 
                placeholder="Минимальная партия"
                :error="$errors->first('minimum')" /> 
            
            <x-input.admin.text 
                type="number"
                name="stock" 
                :value="old('stock') ?? $product->stock ?? null" 
                label="Остаток на складе" 
                placeholder="Остаток на складе"
                :error="$errors->first('stock')" /> 
                 
         
            <!-- Content tab -->

            <div class="mb-3">
                <labe class="form-label">Изображения</label>
                
                @php($images_row = 0)
                            
                <div class="row gap-3">
                    @if($product->images)
                        @foreach($product->images as $image)
                            <div class="col-auto position-relative" data-sort-item>
                                <div class="div">
                                    <x-input.admin.image 
                                        name="images[{{ $images_row }}]" 
                                        :value="$image" 
                                        path="products" />

                                    <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>
                                </div>
                            </div>
                            @php($images_row++)
                        @endforeach
                    @endif
                </div>
                <div class="col-100 text-end mt-3">
                    <button type="button" class="btn btn-primary" onclick="addImage(this)"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
             
            <x-input.admin.text 
                type="text"
                name="title" 
                :value="old('title') ?? $product->title ?? null" 
                label="Наименование" 
                placeholder="Наименование"
                :error="$errors->first('title')" />
            
            <x-input.admin.textarea 
                type="text" 
                name="description" 
                class="editor"
                :value="old('description') ?? $product->description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('description')" />
 
            <x-input.admin.checkbox 
                type="checkbox"
                name="status" 
                :value="1" 
                label="Статус" 
                placeholder="Статус" 
                :error="$errors->first('status')" 
                :checked="(old('status') || ($product->status ?? null))"
                />
 
            <!-- END Content tab -->

        </div>

        <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-tab">
            <!-- Content tab -->

            <x-input.admin.text 
                type="text" 
                name="meta_title" 
                :value="old('meta_title') ?? $product->meta_title ?? null" 
                label="Заголовок" 
                placeholder="Заголовок" 
                toltip="Если оставить пусты, тогда заголовок будет скопирован с наименования"
                :error="$errors->first('meta_title')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_description" 
                :value="old('meta_description') ?? $product->meta_description ?? null" 
                label="Описание" 
                placeholder="Описание" 
                :error="$errors->first('meta_description')" />
 
            <x-input.admin.textarea 
                type="text" 
                name="meta_keywords" 
                :value="old('meta_keywords') ?? $product->meta_keywords ?? null" 
                label="Ключевые слова" 
                placeholder="Ключевые слова" 
                :error="$errors->first('meta_keywords')" />

            <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="marketplace" role="tabpanel" aria-labelledby="marketplace-tab">
            <!-- Content tab -->

            @foreach($marketplaces as $marketplace_key => $marketplace)
                <x-input.admin.text 
                    type="text"
                    name="marketplace[{{ $marketplace_key }}]" 
                    :value="old('marketplace.' . $marketplace_key) ?? isset($product->marketplace[$marketplace_key]) ? $product->marketplace[$marketplace_key] : null" 
                    label="{{ $marketplace }}" 
                    placeholder="{{ $marketplace }}"
                    :error="$errors->first('marketplace')" />
            @endforeach

             <!-- END Content tab -->
        </div>

        <div class="tab-pane fade" id="lable" role="tabpanel" aria-labelledby="lable-tab">
            <!-- Content tab -->

            <x-input.admin.checkbox 
                type="checkbox"
                name="hit" 
                :value="1" 
                label="Хит продаж" 
                placeholder="Хит продаж" 
                :error="$errors->first('hit')" 
                :checked="(old('hit') || ($product->hit ?? null))"
                />

             <!-- END Content tab -->
        </div>
    </div>

</form>

@vite('resources/js/admin/editor.js')


<script>
    /* Banner menu */
    var images_row = {{ $images_row }};

    function addImage(_this)
    {
        html  = '<div class="col-auto position-relative" data-sort-item>';
        html += '   <div class="div">';
        html += '       <div class="mb-3">';
        html += '           <div class="d-flex flex-column" style="width: 100px;" data-image-upload>';
        html += '               <input type="hidden" name="images[' + images_row + ']" value="" data-path="products">';
        html += '               <img src="{{ resize('no-image.png', 100, 100) }}" data-placeholder="{{ resize('no-image.png', 100, 100) }}" alt="." class="img-thumbnail">';
        html += '               <div class="input-group flex-nowrap mt-1">';
        html += '                   <button type="button" class="btn btn-sm btn-primary w-100"><i class="fa-solid fa-upload"></i></button>';
        html += '                   <button type="button" class="btn btn-sm btn-danger"><i class="fa-regular fa-trash-can"></i></button>';
        html += '               </div>';
        html += '           </div>';
        html += '       </div>';
        html += '       <button type="button" class="btn btn-danger" onclick="this.parentNode.parentNode.remove()"><i class="fa-regular fa-trash-can"></i></button>';
        html += '   </div>';
        html += '</div>';

        _this.parentNode.previousElementSibling.insertAdjacentHTML('beforeend', html)

        images_row++;

        imageUpload()
    }

</script>
@endsection
