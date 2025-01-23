@extends('layouts.admin')

@section('title', __('admin/news.titles'))

@section('buttons')
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">{{ __('admin/news.add') }}</a>
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
            @foreach($news as $new)
                <tr>
                    <th scope="row">{{ $new->id }}</th>
                    <td><img src="{{ resize($new->image, 50, 50) }}" alt="."></td>
                    <td>{{ $new->title }}</td>
                    <td>{!! $new->publish_date ?? 'сразу' !!}</td>
                    <td class="text-center">{{ __('admin/news.status.' . $new->status) }}</td>
                    <td class="text-end">
                        <a href="{{ route('news', $new->slug) }}" title="Детали" class="btn btn-secondary" target="_blank"><i class="fa-regular fa-eye"></i></a>

                        <a href="{{ route('admin.news.edit', $new) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.news.destroy', $new) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить новость?')">
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

{{ $news->links('vendor.pagination.bootstrap-5') }}

@endsection
