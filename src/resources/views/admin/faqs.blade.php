@extends('layouts.admin')

@section('title', __('admin/faqs.titles'))

@section('buttons')
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">{{ __('admin/faqs.add') }}</a>
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Вопрос</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
                <tr>
                    <th scope="row">{{ $faq->id }}</th>
                    <td>{{ $faq->question }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.faqs.edit', $faq) }}" title="Редактировать" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                    
                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Вы точно хотите выполнить удаление?')">
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

{{ $faqs->links('vendor.pagination.bootstrap-5') }}

@endsection
