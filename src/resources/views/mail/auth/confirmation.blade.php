<x-mail::message :id="$id">
 
<img src="." alt="" style="display: none;">

# Introduction

The body of your message.

<x-mail::button :url=".">
Button Text
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
