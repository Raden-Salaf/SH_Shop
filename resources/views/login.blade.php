<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – Pencak Store</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Oswald', sans-serif;
            background: radial-gradient(circle, #111 0%, #000 100%);
            min-height: 100vh;
            overflow: hidden;
            position: relative;
            color: white;
        }

        .title-text {
            font-size: 32px;
            font-weight: 600;
            color: #c40000;
            text-shadow: 0 0 10px rgba(255, 0, 0, .7);
        }

        /* Lightning Flash */
        @keyframes lightning {
            0%, 20%, 100% {
                opacity: 0;
            }
            5% {
                opacity: .8;
            }
        }

        .lightning {
            position: absolute;
            top: -30px;
            right: 20px;
            width: 120px;
            animation: lightning 3.5s infinite;
            filter: drop-shadow(0 0 15px rgba(255,255,0,.8));
        }

        /* Kujang/Belati Falling */
        @keyframes fall {
            0% {
                transform: translateY(-150px) rotate(0deg);
                opacity: 0;
            }
            20% {
                opacity: 1;
            }
            100% {
                transform: translateY(110vh) rotate(360deg);
                opacity: 0.2;
            }
        }

        .weapon {
            position: absolute;
            top: -100px;
            width: 32px;
            animation: fall linear infinite;
            opacity: 0.8;
            filter: drop-shadow(0 0 5px gold);
        }
    </style>
</head>

<body>

    <!-- Lightning -->
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Lightning_icon.svg/240px-Lightning_icon.svg.png"
         class="lightning">

    <!-- Falling weapons (randomized) -->
    <script>
        for (let i = 0; i < 12; i++) {
            const img = document.createElement('img');
            img.src = "https://upload.wikimedia.org/wikipedia/commons/3/3c/Kujang_Bogor.png";
            img.className = "weapon";
            img.style.left = Math.random() * 100 + "vw";
            img.style.animationDuration = (3 + Math.random() * 4) + "s";
            img.style.animationDelay = (Math.random() * 3) + "s";
            document.body.appendChild(img);
        }
    </script>


    <div class="container flex items-center justify-center min-h-screen">
        <div class="col-md-4">
            <div class="bg-black bg-opacity-70 p-6 rounded-xl shadow-2xl border-2 border-red-800">
                <h2 class="text-center title-text">PENCAK STORE</h2>
                <p class="text-center text-gray-300 -mt-1 text-sm">Toko Pencak Terlengkap</p>
                <hr class="border-gray-700">

                @if (session('error'))
                    <div class="alert alert-danger text-black">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf

                    <label class="text-gray-300">Email</label>
                    <input type="email" name="email"
                        class="form-control mb-3 bg-gray-900 text-white border-red-800"
                        placeholder="Email" required>

                    <label class="text-gray-300">Password</label>
                    <input type="password" name="password"
                        class="form-control mb-4 bg-gray-900 text-white border-red-800"
                        placeholder="Password" required>

                    <button type="submit"
                        class="btn btn-danger btn-block text-lg font-semibold tracking-wider shadow-lg"
                        style="background:#a00000;border-color:#900000;">
                        Masuk
                    </button>

                    <hr class="border-gray-800">
                    <p class="text-center text-gray-400">Belum punya akun?
                        <a href="/register" class="text-red-500 hover:text-red-300">
                            Daftar Sekarang
                        </a></p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
