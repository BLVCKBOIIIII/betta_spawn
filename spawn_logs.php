<?php
session_start();

if (!isset($_SESSION['spawn_logs'])) {
    $_SESSION['spawn_logs'] = [
        ['pair' => 'Candy Apex × Ruby Queen', 'date' => '2026-07-20', 'eggs' => 130, 'surviving' => 115, 'stage' => 'Free-Swimming (Day 21)'],
        ['pair' => 'Titanium Alpha × Blue Velvet', 'date' => '2026-08-01', 'eggs' => 160, 'surviving' => 150, 'stage' => 'Bubble Nest / Wrigglers']
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log_spawn'])) {
    $pair_name = trim($_POST['pair_name'] ?? '');
    $spawn_date = $_POST['spawn_date'] ?? date('Y-m-d');
    $estimated_eggs = intval($_POST['estimated_eggs'] ?? 100);

    if (!empty($pair_name)) {
        $_SESSION['spawn_logs'][] = [
            'pair' => htmlspecialchars($pair_name),
            'date' => htmlspecialchars($spawn_date),
            'eggs' => $estimated_eggs,
            'surviving' => $estimated_eggs,
            'stage' => 'Initial Spawning / Nest'
        ];
    }
    header("Location: spawn_logs.php");
    exit;
}

$spawn_logs = $_SESSION['spawn_logs'];
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spawn Logs | SpawnOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="text-slate-100 min-h-screen flex flex-col justify-between pb-24 md:pb-0">
<div class="video-background-container">
    <video autoplay muted loop playsinline>
        <source src="https://assets.mixkit.co/videos/preview/mixkit-colorful-betta-fish-swimming-in-an-aquarium-41584-large.mp4" type="video/mp4">
    </video>
</div>
<div class="video-overlay"></div>
    <div class="video-background-container">
        <video autoplay muted loop playsinline>
            <source src="https://assets.mixkit.co/videos/preview/mixkit-colorful-betta-fish-swimming-in-an-aquarium-41584-large.mp4" type="video/mp4">
        </video>
    </div>
    <div class="video-overlay"></div>

    <div>
        <?php include 'nav.php'; ?>

        <main class="max-w-6xl mx-auto px-6 py-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-3xl font-black mb-1 text-white">Active Spawns & <span class="text-cyan-400">Fry Growth</span></h1>
                    <p class="text-xs text-slate-300">Track egg counts, hatching milestones, and feeding transition stages.</p>
                </div>
                <button onclick="toggleModal(true)" class="px-6 py-3 rounded-xl neon-button text-xs uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> New Spawn Record
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($spawn_logs as $spawn): ?>
                <div class="glass-card p-6 rounded-3xl flex flex-col justify-between border-white/10">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/30 backdrop-blur-md">
                                <?php echo $spawn['stage']; ?>
                            </span>
                            <span class="text-xs text-slate-400">Date: <?php echo $spawn['date']; ?></span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-4"><?php echo $spawn['pair']; ?></h3>
                        <div class="grid grid-cols-2 gap-4 bg-slate-900/80 backdrop-blur-md p-4 rounded-2xl border border-white/5 text-xs">
                            <div>
                                <span class="text-slate-400 block mb-1">Estimated Eggs</span>
                                <strong class="text-slate-100 text-sm"><?php echo $spawn['eggs']; ?></strong>
                            </div>
                            <div>
                                <span class="text-slate-400 block mb-1">Surviving Fry</span>
                                <strong class="text-cyan-400 text-sm"><?php echo $spawn['surviving']; ?></strong>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/5 flex items-center justify-between text-xs">
                        <span class="text-slate-300 font-medium flex items-center gap-1.5">
                            <i class="fa-solid fa-flask-vial text-cyan-400"></i> Artemia Feeding Stage Active
                        </span>
                        <span class="text-cyan-400 font-semibold hover:underline cursor-pointer">Update Log</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <div id="addModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="glass-card rounded-3xl p-8 max-w-md w-full relative border-cyan-500/30">
            <button onclick="toggleModal(false)" class="absolute top-5 right-5 text-slate-400 hover:text-white"><i class="fa-solid fa-xmark text-lg"></i></button>
            <h3 class="text-lg font-bold mb-1 text-white">Log New Breeding Spawn</h3>
            <p class="text-xs text-slate-400 mb-6">Record pair details and initial egg counts.</p>
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Breeding Pair Names</label>
                    <input type="text" name="pair_name" required placeholder="e.g. Sire Alpha × Dam Beta" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Spawn Date</label>
                    <input type="date" name="spawn_date" value="<?php echo date('Y-m-d'); ?>" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Estimated Initial Egg Count</label>
                    <input type="number" name="estimated_eggs" value="120" min="10" max="500" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                </div>
                <button type="submit" name="log_spawn" class="w-full py-3.5 rounded-xl neon-button text-sm uppercase tracking-wider">Initialize Spawn Record</button>
            </form>
        </div>
    </div>

    <footer class="max-w-7xl mx-auto px-6 py-8 border-t border-white/10 text-center text-xs text-slate-400 backdrop-blur-md">
        <p>© 2026 SpawnOS • Professional Betta Management Suite</p>
    </footer>

    <script>
        function toggleModal(show) {
            const modal = document.getElementById('addModal');
            if (show) modal.classList.remove('hidden');
            else modal.classList.add('hidden');
        }
    </script>
</body>
</html>