<?php
session_start();

if (!isset($_SESSION['fish_stock'])) {
    $_SESSION['fish_stock'] = [
        ['name' => 'Titanium Alpha', 'sex' => 'Male', 'tail' => 'Halfmoon', 'color' => 'Copper Dragon', 'status' => 'Active'],
        ['name' => 'Ruby Queen', 'sex' => 'Female', 'tail' => 'Plakat', 'color' => 'Super Red', 'status' => 'Active'],
        ['name' => 'Candy Star', 'sex' => 'Male', 'tail' => 'Halfmoon', 'color' => 'Candy Koi Calico', 'status' => 'Active']
    ];
}

$stock_list = $_SESSION['fish_stock'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_fish'])) {
    $fish_name = trim($_POST['fish_name'] ?? '');
    $sex = $_POST['sex'] ?? 'Male';
    $tail_type = $_POST['tail_type'] ?? 'Halfmoon';
    $color = $_POST['color'] ?? 'Copper';

    if (!empty($fish_name)) {
        $_SESSION['fish_stock'][] = [
            'name' => htmlspecialchars($fish_name),
            'sex' => htmlspecialchars($sex),
            'tail' => htmlspecialchars($tail_type),
            'color' => htmlspecialchars($color),
            'status' => 'Active'
        ];
    }
    header("Location: fish_library.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Library | SpawnOS</title>
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
                    <h1 class="text-3xl font-black mb-1 text-white">Fish <span class="text-cyan-400">Library</span></h1>
                    <p class="text-xs text-slate-300">Manage individual line records, finnage traits, and color coats.</p>
                </div>
                <button onclick="toggleModal(true)" class="px-6 py-3 rounded-xl neon-button text-xs uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i> Add Betta Profile
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($stock_list as $fish): ?>
                <div class="glass-card p-6 rounded-2xl border-l-4 <?php echo $fish['sex'] == 'Male' ? 'border-l-cyan-400' : 'border-l-purple-400'; ?>">
                    <div class="flex justify-between items-start mb-4">
                        <i class="fa-solid fa-fish-fins text-2xl <?php echo $fish['sex'] == 'Male' ? 'text-cyan-400' : 'text-purple-400'; ?>"></i>
                        <span class="text-[10px] font-bold text-slate-400 uppercase"><?php echo $fish['status']; ?></span>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-1"><?php echo $fish['name']; ?></h3>
                    <p class="text-xs text-slate-300 mb-4"><?php echo $fish['color']; ?> · <?php echo $fish['tail']; ?></p>
                    <div class="flex gap-4 pt-4 border-t border-white/5">
                        <span class="text-[10px] font-bold text-cyan-400 uppercase tracking-widest"><?php echo $fish['sex']; ?> Lineage</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <div id="addModal" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="glass-card rounded-3xl p-8 max-w-md w-full relative border-cyan-500/30">
            <button onclick="toggleModal(false)" class="absolute top-5 right-5 text-slate-400 hover:text-white"><i class="fa-solid fa-xmark text-lg"></i></button>
            <h3 class="text-lg font-bold mb-1 text-white">Add Betta Profile</h3>
            <p class="text-xs text-slate-400 mb-6">Log physical traits and genetic bloodline markers.</p>
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Fish Name / ID Code</label>
                    <input type="text" name="fish_name" required placeholder="e.g. Candy Apex" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Sex</label>
                        <select name="sex" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                            <option value="Male">Male (Sire)</option>
                            <option value="Female">Female (Dam)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Tail Type</label>
                        <select name="tail_type" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                            <option value="Halfmoon">Halfmoon</option>
                            <option value="Plakat">Plakat</option>
                            <option value="Crowntail">Crowntail</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-2">Base Color / Layer</label>
                    <input type="text" name="color" required placeholder="e.g. Candy Koi Calico" class="w-full px-4 py-3 rounded-xl input-field text-sm">
                </div>
                <button type="submit" name="add_fish" class="w-full py-3.5 rounded-xl neon-button text-sm uppercase tracking-wider">Save to Fish Room</button>
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