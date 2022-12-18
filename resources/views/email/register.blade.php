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
                        Congrats your account has been successfully registered.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        Thank you
                    </p>
                    <p>
                        SmartUnique
                    </p>
                </td>
            </tr>
        </table>
</div>
</body>

</html>
