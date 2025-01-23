@props(['url', 'id'])
<tr>
    <td class="header">
        <a href="." style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                <img src="{{ $url }}/storage/image/logos/logo.png" class="logo" alt="{{ $slot }}">
            @endif
        </a>
    </td>
</tr>