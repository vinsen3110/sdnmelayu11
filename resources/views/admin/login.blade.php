<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
             margin: 0;
             padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #357194; /* Biru tua */
        }

       
        .login-container {
            position: relative;
            z-index: 1;
            background: white;
            padding: 30px 35px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            
        }
        .button-link {
            display: inline-block;
            width: 100%;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background: #357194;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            text-decoration: none;
            font-family: inherit;
            box-sizing: border-box;
        }

        .button-link:hover {
         background: #5ba3cd;
        }


        .login-container img {
            width: 90px;
            margin-bottom: 10px;
        }

        h2 {
            margin-bottom: 20px;
            color: #003366;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            text-align: left;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background: #f7f9fc;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background: #357194;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #5ba3cd;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: left;
        }

        a.back-link {
            display: block;
            margin-top: 15px;
            color: #003366;
            text-decoration: none;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('logo_sekolah.png') }}" alt="Logo Sekolah" style="width: 70px;">
        <h2 style="margin-top: 5px;">Login</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

       <a href="{{ url('/') }}" class="button-link">&larr; Kembali ke Beranda</a>

    </div>
</body>
</html>
