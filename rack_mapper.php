<?php
/**
 * SpawnOS - Rack & Jar Inventory System
 */
session_start();

if (!isset($_SESSION['rack_inventory'])) {
    $_SESSION['rack_inventory'] = [
        ['jar_id' => 'R1-S1-01', 'batch' => 'Candy Koi F1 #4', 'grade' => 'High Grade', 'status' => 'Available', 'sex' => 'Male'],
        ['jar_id' => 'R1-S1-02', 'batch' => 'Candy Koi F1 #4', 'grade' => 'Grow-Out', 'status' => 'Feeding', 'sex' => 'Female'],
        ['jar_id' => 'R1-S2-01', 'batch' => 'Copper Halfmoon #2', 'grade' => 'Cull', 'status' => 'Culled', 'sex' => 'Male'],
        ['jar_id' => 'R2-S1-01', 'batch' => 'Nemo Galaxy #1', 'grade' => 'Breeder Stock', 'status' => 'Active Pair', 'sex' => 'Male']
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_jar'])) {
    $target_id = $_POST['jar_id'];
    foreach ($_SESSION['rack_inventory'] as &$item) {
        if ($item['jar_id'] === $target_id) {
            $item['grade'] = $_POST['grade'];
            $item['status'] = $_POST['status'];
        }
    }
    header("Location: rack_mapper.php");
    exit;
}

$racks = $_SESSION['rack_inventory'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rack Mapper | SpawnOS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="pb-24 bg-slate-950 text-slate-100">
    <?php include 'nav.php'; ?>
    <div class="video-background-container">
    <video autoplay muted loop playsinline>
        <source src="https://assets.mixkit.co/videos/preview/mixkit-colorful-betta-fish-swimming-in-an-aquarium-41584-large.mp4" type="video/mp4">
    </video>
</div>
<div class="video-overlay"></div>

    <main class="max-w-6xl mx-auto px-6 py-12">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-black mb-1">Rack & Jar <span class="text-cyan-400">Mapper</span></h1>
                <p class="text-xs text-slate-400">Visual mapping system for individual grow-out jars and breeder containers.</p>
            </div>
            <div class="flex gap-2">
                <span class="px-3 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold">180 Active Jars</span>
                <span class="px-3 py-1.5 rounded-xl bg-purple-500/10 border border-purple-500/20 text-purple-400 text-xs font-bold">2 Racks Online</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($racks as $jar): ?>
            <div class="glass-card p-5 rounded-2xl flex flex-col justify-between border-t-2 <?php echo $jar['grade'] == 'High Grade' ? 'border-t-cyan-400' : ($jar['grade'] == 'Cull' ? 'border-t-red-500' : 'border-t-blue-500'); ?>">
                <div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-xs font-black text-white bg-white/5 px-2.5 py-1 rounded-lg border border-white/10"><?php echo $jar['jar_id']; ?></span>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400"><?php echo $jar['sex']; ?></span>
                    </div>
                    <h4 class="font-bold text-sm text-cyan-300 mb-1"><?php echo $jar['batch']; ?></h4>
                    <p class="text-[11px] text-slate-400 mb-4">Grade: <span class="text-white font-semibold"><?php echo $jar['grade']; ?></span></p>
                </div>

                <form method="POST" class="pt-3 border-t border-white/5 space-y-2">
                    <input type="hidden" name="jar_id" value="<?php echo $jar['jar_id']; ?>">
                    <div class="grid grid-cols-2 gap-2">
                        <select name="grade" class="px-2 py-1.5 rounded-lg bg-slate-900 border border-slate-800 text-[10px] text-slate-200">
                            <option value="High Grade" <?php if($jar['grade']=='High Grade') echo 'selected'; ?>>High Grade</option>
                            <option value="Grow-Out" <?php if($jar['grade']=='Grow-Out') echo 'selected'; ?>>Grow-Out</option>
                            <option value="Cull" <?php if($jar['grade']=='Cull') echo 'selected'; ?>>Cull</option>
                        </select>
                        <select name="status" class="px-2 py-1.5 rounded-lg bg-slate-900 border border-slate-800 text-[10px] text-slate-200">
                            <option value="Available" <?php if($jar['status']=='Available') echo 'selected'; ?>>Available</option>
                            <option value="Feeding" <?php if($jar['status']=='Feeding') echo 'selected'; ?>>Feeding</option>
                            <option value="Culled" <?php if($jar['status']=='Culled') echo 'selected'; ?>>Culled</option>
                        </select>
                    </div>
                    <button type="submit" name="update_jar" class="w-full py-1.5 rounded-lg bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold text-[10px] uppercase tracking-wider">Update Jar</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>