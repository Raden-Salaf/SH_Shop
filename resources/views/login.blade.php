<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – Pencak Store</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: radial-gradient(circle at center, #3b0000, #140000, #000);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Glow arena merah */
        .arena {
            border: 2px solid rgba(255, 0, 0, 0.6);
            box-shadow: 0 0 20px rgba(255, 0, 0, .8), inset 0 0 15px rgba(255, 0, 0, .6);
            transition: 0.3s;
        }

        .arena:hover {
            box-shadow: 0 0 30px rgba(255, 50, 50, .9), inset 0 0 20px rgba(255, 0, 0, .7);
        }

        /* petir */
        .petir {
            width: 50px;
            height: 80px;
            background: linear-gradient(to bottom, yellow, white, transparent);
            clip-path: polygon(50% 0%, 60% 25%, 40% 25%, 65% 60%, 55% 60%, 75% 100%, 30% 70%, 45% 70%, 30% 35%, 50% 35%);
            position: absolute;
            opacity: 0;
            animation: strike 1.2s infinite linear;
        }

        @keyframes strike {
            0% {
                opacity: 0;
                transform: translateY(-40px) rotate(10deg);
            }

            40% {
                opacity: 1;
                transform: translateY(20px);
            }

            100% {
                opacity: 0;
                transform: translateY(120px) rotate(-10deg);
            }
        }

        /* Kujang + belati ASCII jatuh */
        .weapon {
            position: absolute;
            font-size: 22px;
            color: #e6e6e6;
            opacity: .8;
            animation: jatuh 4s linear infinite;
        }

        @keyframes jatuh {
            0% {
                transform: translateY(-40px) rotate(0deg);
                opacity: .0;
            }

            30% {
                opacity: 1;
            }

            100% {
                transform: translateY(600px) rotate(270deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <!-- ICON jatuh -->
    <script>
        const senjata = ["🗡️", "⚔️", "🔪", "🗡️", "⚔️"];
        setInterval(() => {
            const el = document.createElement("div");
            el.className = "weapon";
            el.innerHTML = senjata[Math.floor(Math.random() * senjata.length)];
            el.style.left = Math.random() * window.innerWidth + "px";
            el.style.animationDuration = (3 + Math.random() * 2) + "s";
            document.body.appendChild(el);
            setTimeout(() => el.remove(), 5000);
        }, 800);
    </script>

    <!-- 3 Petir -->
    <div class="petir" style="left:10%; animation-delay:0s"></div>
    <div class="petir" style="left:50%; animation-delay:.4s"></div>
    <div class="petir" style="left:80%; animation-delay:.8s"></div>

    <div class="container flex justify-center pt-32">
        <div class="arena bg-black/40 p-6 rounded-xl w-[350px] text-white backdrop-blur-sm">
            <h2 class="text-center text-3xl font-bold tracking-widest mb-2">Pencak Store</h2>
            <p class="text-center text-sm text-red-300 mb-4">Toko Pencak Terlengkap</p>
            <hr class="border-red-400">

            @if (session('error'))
                <div class="alert alert-danger mt-3"> <b>Opps!</b> {{ session('error') }} </div>
            @endif

            <form action="{{ route('actionlogin') }}" method="post" id="loginForm">
                @csrf
                <label class="mt-3">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>

                <label class="mt-3">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <button type="submit"
                    class="btn btn-danger btn-block w-full mt-4 font-bold tracking-widest shadow-lg hover:bg-red-700 transition-all"
                    id="loginBtn">
                    LOGIN
                </button>

                <p class="text-center mt-4">Belum punya akun? <a href="/register" class="text-red-300">Register</a></p>
            </form>
        </div>
    </div>

    <!-- Sound Tebasan -->
    <audio id="tebasSound">
        <source src="https://www.myinstants.com/media/sounds/sword-slash.mp3" type="audio/mpeg">
    </audio>

    <script>
        document.getElementById("loginBtn").addEventListener("click", function () {
            const s = document.getElementById("tebasSound");
            s.volume = 0.4;
            s.play();
        });
    </script>

</body>
</html>
