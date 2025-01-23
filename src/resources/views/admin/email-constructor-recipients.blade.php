<div>

    <div class="position-relative">
        <div class="row mb-5">
            <div class="col col-sm-3">
                <div class="position-relative mb-4">
                    <textarea class="form-control" rows="13" wire:model.change="list" placeholder="{{ __('List of E-mail addresses') }}"></textarea>
                    <span class="position-absolute top-0 end-0 badge rounded-pill bg-secondary">{{ $list_count }}</span>
                </div>
                @if ($excluded_emails)
                    <div class="mb-3">
                        <h6>{{ __('Excluded') }}</h6>
                        <div class="card mt-2">
                            <div class="card-body" style="max-height: 220px;overflow: auto;">
                                @foreach ($excluded_emails as $email => $error)
                                    <div style="font-size: 12px;" class="mb-2">
                                        <code>{{ $email }}</code> - 
                                        <i class="text-muted">{{ $error }}</i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col col-sm-5">
                @if (count($emails) > 0)
                    <div class="progress">
                        @php
                            $count_email = count($emails);
                            $progress = $count_email != $limit_emails ? ((($count_email - $limit_emails) * 100) / $count_email) : 100;
                        @endphp
                        <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ count($emails) }}/{{ $limit_emails }}</div>
                    </div>
                    <ul class="list-group mt-2 mb-3" style="max-height: 600px;overflow: auto;">
                        @foreach ($emails as $email => $email_info)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <span class="text-decoration-underline">{{ $email }}</span>
                                        <span>
                                            <span class="badge {{ $email_info['type'] == 'client' ? 'bg-success' : ($email_info['type'] == 'subscriber' ? 'bg-secondary' : 'bg-light text-dark') }}">
                                                {{ __(ucfirst($email_info['type'])) }}
                                            </span>
                                        </span>
                                        @if ($email_info['type'] == 'client')
                                            <a href="{{ route('admin.users.edit', $email_info['model']) }}" target="_blank" class="btn btn-light btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @endif
                                    </div>
                                    
                                    <div>
                                        <button type="button" class="btn btn-danger btn-sm me-4" wire:click="deleteEmail('{{ $email }}')">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>

                                        <button type="button" class="btn btn-primary btn-sm" wire:click="viewHtmlEmail('{{ $email }}')">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <button type="button" class="btn btn-primary" wire:click="send()">{{ __('Submit for processing') }}</button>
                @else
                    <div class="alert alert-info">{{ __('Added Email addresses') }}
                        <div class="mt-2">
                            <button type="button" class="btn btn-primary btn-sm" wire:click="addClient()">Добавить клиентов</button>
                            <button type="button" class="btn btn-secondary btn-sm" wire:click="addSubscriber()">Добавить подпищиков</button>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col col-sm-4">
        
                <div class="card" style="overflow: hidden;width: 100%;height: 600px">
                    <iframe style="width: 100%;height: 600px" srcdoc="{{ $emailConstructor->html }}">
                        <p>Your browser does not support iframes, or there was an error loading the content.</p>
                    </iframe>
                </div>

            </div>

        </div>

        <div class="position-absolute" style="left: 0;top: 0;width: 100%;height: 100%;" wire:loading>
            <div class="position-absolute" style="left: 0;top: 0;width: 100%;height: 100%;background: #ffffff85;"></div>
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="spinner-grow text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
