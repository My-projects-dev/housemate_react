<h1>Salam, {{ $user_name ?? ''}} ! Sizin {{config('app.name')}} saytından gələn bir mesajınız var.</h1>

Tam ad : {{ $request['full_name'] ?? '' }} <br>
Email :     {{ $request['email'] ?? '' }} <br>
Mövzu : {{ $request['subject'] ?? '' }}  <br><br>

Mesaj :<br>
{{ $request['message'] ?? '' }}
