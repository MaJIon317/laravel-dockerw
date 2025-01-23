@extends('layouts.admin')

@section('title', __('admin/categories.titles'))

@section('buttons')
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">{{ __('admin/categories.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->title }}</td>
                    <td class="text-end">
                        <a href="{{ route('category', $category->slug) }}" title="Детали" class="btn btn-secondary" target="_blank"><i class="fa-regular fa-eye"></i></a>

                        <a href="{{ route('admin.categories.edit', $category) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить статью?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $categories->links('vendor.pagination.bootstrap-5') }}

@endsection
