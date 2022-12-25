<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>

</head>

<body>
    <div class="container_pdf">
        <table>
            <tr>
                <td>
                    <h2>
                        Dear {{ $name ? ucfirst($name) : 'no' }}
                    </h2>
                    <p>
                        Congrats your account has been Successfully registered.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Your Account Details:</p>
                    <p>
                        User Name: {{ $username ? $username : '' }}
                    </p>
                    <p>
                        Password: {{ $password ? $password : '' }}
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Do not Share your Password to anyone
                    </p>
                    <p>
                        Please upgrade your account level in the next 24 hours, Otherwise your account will be suspended.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Click here to login your account.
                    </p>
                    <p>
                        https://smartuniqueint.com/login
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Career development is the support that our organization provides to employee professional growth
                    </p>
                    <p>
                        Regards: Admin ( SmartUnique international )
                    </p>
                </td>
            </tr>
        </table>
</div>
</body>

</html>
