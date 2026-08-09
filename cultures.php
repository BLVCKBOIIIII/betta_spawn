<?php
session_start();

if (!isset($_SESSION['cultures'])) {
    $_SESSION['cultures'] = [
        ['name' => 'Newly Hatched Artemia (Brine Shrimp)', 'status' => 'Harvest Ready', 'tank' => 'Hatchery Station 1', 'countdown' => '24h Batch Cycle'],
        ['name' => 'Vinegar Eels (Micro-feed)', 'status' => 'Stable / Thriving', 'tank' => 'Culture Jar B-3', 'countdown' => 'Continuous Harvest'],
        ['name' => 'Microworm Culture', 'status' => 'Peak Production', 'tank' => 'Culture Jar A-1', 'countdown' => 'Subculture in 5 Days']
    ];
}
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cultures & Feed | SpawnOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="text-slate-100 min-h-screen flex flex-col justify-between pb-24 md:pb-0 bg-transparent">

    <div class="video-background-container">
        <video autoplay muted loop playsinline>
            <source src="https://assets.mixkit.co/videos/preview/mixkit-colorful-betta-fish-swimming-in-an-aquarium-41584-large.mp4" type="video/mp4">
        </video>
    </div>
    <div class="video-overlay"></div>

    <div class="relative z-10">
        <?php include 'nav.php'; ?>

        <main class="max-w-6xl mx-auto px-6 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black mb-1 text-white">Live Food <span class="text-emerald-400">Cultures</span></h1>
                    <p class="text-xs text-slate-300">Track Artemia hatch cycles and micro-worm cultures to maximize early fry survival.</p>
                </div>
                <span class="px-4 py-2 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold backdrop-blur-md">Survival Rate Optimization Active</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($_SESSION['cultures'] as $culture): ?>
                <div class="glass-card p-6 rounded-3xl border-l-4 border-l-emerald-400 flex flex-col justify-between border-white/10">
                    <div>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-lg border border-emerald-500/20 backdrop-blur-md"><?php echo $culture['status']; ?></span>
                            <i class="fa-solid fa-seedling text-emerald-400"></i>
                        </div>
                        <h3 class="font-bold text-base text-white mb-1"><?php echo $culture['name']; ?></h3>
                        <p class="text-xs text-slate-300 mb-4"><?php echo $culture['tank']; ?></p>
                    </div>
                    <div class="pt-4 border-t border-white/5 flex justify-between items-center text-xs">
                        <span class="text-slate-400">Cycle Status</span>
                        <span class="text-slate-200 font-semibold"><?php echo $culture['countdown']; ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <footer class="max-w-7xl mx-auto px-6 py-8 border-t border-white/10 text-center text-xs text-slate-400 backdrop-blur-md relative z-10">
        <p>© 2026 SpawnOS • Professional Betta Management Suite</p>
    </footer>
</body>
</html>