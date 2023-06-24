
<mail::message>
    Name: {{$lead->name}} <br> 
    Email: {{$lead->email}} <br>
    Message: <br>
    {{$lead->message}}

    Thanks,<br>
    {{ config('app.name') }}

</mail::message>