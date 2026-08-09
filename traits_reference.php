<?php
session_start();

$traits_guide = [
    ['trait' => 'Halfmoon Finnage (HM)', 'type' => 'Recessive / Selective', 'layer' => 'Fin Spread (180°)', 'desc' => 'Requires rigorous selective breeding over generations to achieve a true 180-degree spread without fin crowding.'],
    ['trait' => 'Plakat Finnage (PK)', 'type' => 'Dominant', 'layer' => 'Short Sturdy Fins', 'desc' => 'Traditional fighting-style short fins; highly hardy, active swimmers with minimal fin-rot susceptibility.'],
    ['trait' => 'Copper Metallic Layer', 'type' => 'Codominant', 'layer' => 'Iridescent Pigment', 'desc' => 'Reflective guanine crystal layer overlaying base colors, producing high-sheen metallic blues, golds, and coppers.'],
    ['trait' => 'Melano Black (Bl)', 'type' => 'Recessive', 'layer' => 'Black Dense Pigment', 'desc' => 'Deep opaque black coloration. Note: Melano females are almost universally sterile due to genetic linkage.'],
    ['trait' => 'Butterfly Pattern', 'type' => 'Polygenic', 'layer' => 'Color Banding', 'desc' => 'Characterized by concentric colored bands radiating outward along the outer edges of the finnage.']
];
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traits Reference | SpawnOS</title>
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

    <div>
        <?php include 'nav.php'; ?>

        <main class="max-w-6xl mx-auto px-6 py-12">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-black mb-2 text-white">Genetics & <span class="text-cyan-400">Traits Directory</span></h1>
                <p class="text-slate-300 text-sm">Comprehensive reference guide for betta coloration layers, finnage types, and inheritance models.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($traits_guide as $item): ?>
                <div class="glass-card p-6 rounded-3xl border-white/10 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/30 backdrop-blur-md">
                                <?php echo $item['type']; ?>
                            </span>
                            <span class="text-xs text-slate-400"><?php echo $item['layer']; ?></span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2"><?php echo $item['trait']; ?></h3>
                        <p class="text-xs text-slate-300 leading-relaxed"><?php echo $item['desc']; ?></p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/5 flex items-center justify-between text-xs text-slate-400">
                        <span>Inheritance Model</span>
                        <span class="text-cyan-400 font-semibold">Verified Lineage</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

    <footer class="max-w-7xl mx-auto px-6 py-8 border-t border-white/10 text-center text-xs text-slate-400 backdrop-blur-md">
        <p>© 2026 SpawnOS • Professional Betta Management Suite</p>
    </footer>
</body>
</html>