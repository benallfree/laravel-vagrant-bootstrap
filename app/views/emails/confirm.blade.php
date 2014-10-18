<h1>Confirm your account.</h1>

<p>Hello {{$user['username'] }},</p>

<p>You're almost ready to join iVerify. Just confirm the link below to get started.</p>
<a href='{{{ URL::to("users/confirm/{$user['confirmation_code']}") }}}'>
    {{{ URL::to("users/confirm/{$user['confirmation_code']}") }}}
</a>

<p>Thank you very much!</p>
<p>-The iVerify Team</p>
