<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        Hi {{ $user->name }},<br />
        Welcome To Out Of Office Board<br /><br />

        <div>
            Thanks for creating an account with the Out Of Office Board.
            Please follow the link below to verify your email address
            {{ URL::to('register/verify/' . $user->confirmation_code) }}.<br/>
        </div>

        Let me know if you have any questions.<br /><br />

        Thank You,<br />
        Jason Michels<br />
        CEO Out Of Office Board<br />

    </body>
</html>