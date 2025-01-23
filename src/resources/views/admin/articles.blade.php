@extends('layouts.admin')

@section('title', __('admin/articles.titles'))

@section('buttons')
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">{{ __('admin/articles.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Изображение</th>
                <th scope="col">Наименование</th>
                <th scope="col">Опубликовать</th>
                <th scope="col" class="text-center">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <th scope="row">{{ $article->id }}</th>
                    <td><img src="{{ resize($article->image, 50, 50) }}" alt="."></td>
                    <td>{{ $article->title }}</td>
                    <td>{!! $article->publish_date ?? 'сразу' !!}</td>
                    <td class="text-center">{{ __('admin/articles.status.' . $article->status) }}</td>
                    <td class="text-end">
                        <a href="{{ route('article', $article->slug) }}" title="Детали" class="btn btn-secondary" target="_blank"><i class="fa-regular fa-eye"></i></a>

                        <a href="{{ route('admin.articles.edit', $article) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить статью?')">
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

{{ $articles->links('vendor.pagination.bootstrap-5') }}

@endsection
