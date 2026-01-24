<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register – Pencak Store</title>

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

        .arena {
            border: 2px solid rgba(255, 0, 0, 0.6);
            box-shadow: 0 0 20px rgba(255, 0, 0, .8), inset 0 0 15px rgba(255, 0, 0, .6);
            transition: 0.3s;
        }

        .arena:hover {
            box-shadow: 0 0 30px rgba(255, 50, 50, .9), inset 0 0 20px rgba(255, 0, 0, .7);
        }

        /* Petir */
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

        /* Weapon jatuh */
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
                opacity: 0;
            }

            40% {
                opacity: 1;
            }

            100% {
                transform: translateY(600px) rotate(260deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Weapon jatuh -->
    <script>
        const senjata = ["🗡️", "🔪", "⚔️", "🗡️", "🔪"];
        setInterval(() => {
            const el = document.createElement("div");
            el.className = "weapon";
            el.innerHTML = senjata[Math.floor(Math.random() * senjata.length)];
            el.style.left = Math.random() * window.innerWidth + "px";
            el.style.animationDuration = (3 + Math.random() * 2) + "s";
            document.body.appendChild(el);
            setTimeout(() => el.remove(), 5000);
        }, 900);
    </script>

    <!-- Petir -->
    <div class="petir" style="left:15%; animation-delay:0s"></div>
    <div class="petir" style="left:55%; animation-delay:.4s"></div>
    <div class="petir" style="left:80%; animation-delay:.9s"></div>

    <div class="container flex justify-center pt-28">
        <div class="arena bg-black/40 p-6 rounded-xl w-[420px] text-white backdrop-blur-sm">
            <h2 class="text-center text-3xl font-bold tracking-widest mb-2">REGISTER</h2>
            <p class="text-center text-sm text-red-300 mb-4">Buat akun untuk mulai bertanding!</p>
            <hr class="border-red-400">

            @if (session('message'))
                <div class="alert alert-success mt-3">{{ session('message') }}</div>
            @endif

            <form method="post" action="{{ route('actionregister') }}">
                @csrf

                <label class="mt-3">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>

                <label class="mt-3">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" required>

                <label class="mt-3">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>

                <label class="mt-3">Role</label>
                <input type="text" name="role" value="Guest" readonly class="form-control bg-black/40 text-red-200">

                <button type="submit"
                    class="btn btn-danger btn-block w-full mt-4 font-bold tracking-widest shadow-lg hover:bg-red-700 transition-all">
                    REGISTER
                </button>

                <p class="text-center mt-4 text-sm">Sudah punya akun?
                    <a href="/login" class="text-red-300">Login disini!</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>
