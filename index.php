<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: index.php");
    exit;
}

$login_error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    if (!empty($email)) {
        $_SESSION['user_email'] = $email;
        header("Location: index.php");
        exit;
    } else {
        $login_error = "Please enter a valid email address.";
    }
}

$is_logged_in = isset($_SESSION['user_email']);
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpawnOS • Betta Command Center</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="text-slate-100 min-h-screen flex flex-col justify-between pb-24 md:pb-0 bg-transparent">

    <div class="video-background-container">
        <video autoplay muted loop playsinline>
            <source src="https://assets.mixkit.co/videos/preview/mixkit-colorful-betta-fish-swimming-in-an-aquarium-41584-large.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>
    <div class="video-overlay"></div>

    <div class="relative z-10">
        <?php if (!$is_logged_in): ?>
            <nav class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between border-b border-white/10 sticky top-0 bg-slate-950/60 backdrop-blur-xl z-50 shadow-2xl">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg shadow-cyan-500/30">
                        <i class="fa-solid fa-fish-fins text-slate-950 text-xl"></i>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight text-white">Spawn<span class="text-cyan-400">OS</span></span>
                </div>
                <button onclick="toggleAuthModal(true)" class="px-4 py-2 rounded-xl text-xs font-bold neon-button">Sign In</button>
            </nav>

            <section class="max-w-5xl mx-auto px-6 pt-24 pb-16 text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-bold mb-6 backdrop-blur-md">
                    <i class="fa-solid fa-water"></i> Liquid Glass UI • Live Habitat Mode
                </div>
                <h1 class="text-4xl md:text-6xl font-black tracking-tight max-w-3xl mx-auto leading-tight mb-6 text-white">
                    Immersive Betta <span class="bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Breeding Suite</span>
                </h1>
                <p class="text-slate-300 max-w-xl mx-auto mb-10 text-sm md:text-base leading-relaxed">Track your candy koi genetics, live food cultures, and spawn logs inside a high-refractive fluid interface.</p>
                <button onclick="toggleAuthModal(true)" class="px-8 py-4 rounded-2xl neon-button text-xs uppercase tracking-wider">
                    Launch Fish Room <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </section>

            <div id="authModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
                <div class="glass-card rounded-3xl p-8 max-w-md w-full relative border-cyan-500/30">
                    <button onclick="toggleAuthModal(false)" class="absolute top-5 right-5 text-slate-400 hover:text-white"><i class="fa-solid fa-xmark text-lg"></i></button>
                    <h3 class="text-lg font-bold mb-1 text-white">Sign In to SpawnOS</h3>
                    <p class="text-xs text-slate-400 mb-6">Access your secure fish room local session.</p>
                    <?php if (!empty($login_error)): ?>
                        <div class="mb-4 p-3 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-xs"><?php echo htmlspecialchars($login_error); ?></div>
                    <?php endif; ?>
                    <form method="POST" class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Breeder Email</label>
                            <input type="email" name="email" required placeholder="manager@bettaroom.com" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                        </div>
                        <button type="submit" name="login" class="w-full py-3.5 rounded-xl neon-button text-xs uppercase tracking-wider">Access Command Center</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <?php include 'nav.php'; ?>
            <main class="max-w-7xl mx-auto px-6 py-12">
                <div class="glass-card rounded-3xl p-8 md:p-12 mb-10 border-white/10 shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="max-w-2xl">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-bold mb-6 backdrop-blur-md">
                            <i class="fa-solid fa-sparkles"></i> System Online
                        </div>
                        <h1 class="text-3xl md:text-5xl font-black tracking-tight mb-4 text-white">
                            Welcome Back, <span class="bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent"><?php echo htmlspecialchars($_SESSION['user_email']); ?></span>
                        </h1>
                        <p class="text-slate-300 text-sm md:text-base leading-relaxed mb-8">Your automated candy koi breeding matrices, jar inventories, and live-food culture tracking loops are fully active.</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="matchmaker.php" class="px-6 py-3.5 rounded-2xl neon-button text-xs uppercase tracking-wider flex items-center gap-2">
                                <i class="fa-solid fa-dna"></i> Run Matchmaker
                            </a>
                            <a href="spawn_logs.php" class="px-6 py-3.5 rounded-2xl bg-slate-900/80 border border-slate-700 hover:border-cyan-500 text-slate-200 text-xs font-bold uppercase tracking-wider transition-all backdrop-blur-md">
                                <i class="fa-solid fa-flask-vial mr-2 text-cyan-400"></i> View Spawns
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="glass-card p-6 rounded-3xl border-l-4 border-l-cyan-400">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 block mb-1">Active Genetics</span>
                        <div class="text-3xl font-black text-white">Candy Koi F1</div>
                        <p class="text-xs text-slate-400 mt-1">Multicolor Calico Stable</p>
                    </div>
                    <div class="glass-card p-6 rounded-3xl border-l-4 border-l-purple-400">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 block mb-1">Inbreeding Guard</span>
                        <div class="text-3xl font-black text-emerald-400">Protected</div>
                        <p class="text-xs text-slate-400 mt-1">Zero co-ancestry overlap</p>
                    </div>
                    <div class="glass-card p-6 rounded-3xl border-l-4 border-l-blue-400">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400 block mb-1">Live Food Cultures</span>
                        <div class="text-3xl font-black text-white">94.2%</div>
                        <p class="text-xs text-slate-400 mt-1">Artemia hatch efficiency</p>
                    </div>
                </div>
            </main>
        <?php endif; ?>
    </div>

    <footer class="max-w-7xl mx-auto px-6 py-8 border-t border-white/10 text-center text-xs text-slate-400 backdrop-blur-md relative z-10">
        <p>© 2026 SpawnOS • Professional Betta Management Suite</p>
    </footer>

    <script>
        function toggleAuthModal(show) {
            const modal = document.getElementById('authModal');
            if (show) modal.classList.remove('hidden');
            else modal.classList.add('hidden');
        }
    </script>
</body>
</html>