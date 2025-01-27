@extends('layouts.admin')

@section('title', 'Вход в административную панель')
@section('header_hidden', true)
@section('footer_hidden', true)

@section('content')

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Авторизация</h3></div>
                            <div class="card-body">
                                <form action="{{ route('admin.login.execute') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input name="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com" />
                                        <label for="inputEmail">Email</label>
                                        @if($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="password" value="{{ old('password') }}" class="form-control @if($errors->has('password')) is-invalid @enderror" id="inputPassword" type="password" placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                        @if($errors->has('password'))
                                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                      <button class="btn btn-primary px-4" type="submit">Войти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Webdement.ru {{ date('Y') }}</div>
                    <div>
                        <a href="https://webdement.ru/" target="_blank">Developer's website</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
