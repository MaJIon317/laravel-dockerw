@extends('layouts.admin')

@section('title', __('admin/email-constructors.titles'))

@section('buttons')
    <a href="{{ route('admin.email-constructor.create') }}" class="btn btn-primary">{{ __('admin/email-constructors.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($emailConstructors as $emailConstructor)
                <tr>
                    <td>{{ $emailConstructor->name }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.email-constructor.show', $emailConstructor) }}" target="_blank" class="btn btn-secondary">
                            <i class="fa-regular fa-eye"></i>
                        </a>

                        <a href="{{ route('admin.email-constructor.edit', $emailConstructor) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.email-constructor.destroy', $emailConstructor) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите удалить купон?')">
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

{{ $emailConstructors->links('vendor.pagination.bootstrap-5') }}

@endsection
