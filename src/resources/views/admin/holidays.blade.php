@extends('layouts.admin')

@section('title', __('admin/holidays.titles'))

@section('buttons')
    <a href="{{ route('admin.holidays.create') }}" class="btn btn-primary">{{ __('admin/holidays.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Категория</th>
                <th scope="col" class="text-center">Месяц</th>
                <th scope="col" class="text-center">Число</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $holiday)
                <tr>
                    <th scope="row">{{ $holiday->id }}</th>
                    <td>{{ $holiday->title }}</td>
                    <td>
                        @if($holiday->category)
                            <a href="{{ route('category', $holiday->category->slug) }}" target="_blank">{{ $holiday->category->title }}</a>
                        @else
                        -
                        @endif
                    </td>
                    <td class="text-center">{{ $holiday->month }}</td>
                    <td class="text-center">{{ $holiday->day }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.holidays.edit', $holiday) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.holidays.destroy', $holiday) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите выполнить удаление?')">
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

{{ $holidays->links('vendor.pagination.bootstrap-5') }}

@endsection
