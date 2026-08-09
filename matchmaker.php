<?php
session_start();

$simulation_result = [
    'sire' => 'Candy Koi Sire (Multicolor Marble)',
    'dam' => 'Candy Koi Dam (Calico Translucent)',
    'outcomes' => [
        [
            'percentage' => '38%',
            'title' => 'True Candy Koi Phenotype',
            'description' => 'Calico flesh-base overlay with striking patches of neon orange, deep red, and blue/violet masking.',
            'traits' => ['Calico Base', 'Tri-Color Blends', 'High Grade']
        ],
        [
            'percentage' => '30%',
            'title' => 'Multicolor Marble Variant',
            'description' => 'Unstable pigment distribution driven by the active marble gene ($Mb$). Colors shift significantly through month 6.',
            'traits' => ['Active Marble ($Mb$)', 'Shifting Pigment', 'Vibrant Contrast']
        ],
        [
            'percentage' => '22%',
            'title' => 'Translucent / Pastel Cellophane',
            'description' => 'Recessive expression yielding a flesh-toned, clear body with soft pastel orange highlights on the fin tips.',
            'traits' => ['Clear Skin Layer', 'Soft Fin Highlights', 'Low Opaque Mask']
        ],
        [
            'percentage' => '10%',
            'title' => 'Solid / Dark Revert Throwback',
            'description' => 'Ancestral recessive throwback displaying heavy dark body coverage or intense copper scales that mask the koi pattern.',
            'traits' => ['Dark Revert', 'Dense Copper Scale', 'Solid Fin Margins']
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candy Koi Matrix | SpawnOS</title>
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

    </div>
    <div class="video-overlay"></div>

    <div>
        <?php include 'nav.php'; ?>

        <main class="max-w-6xl mx-auto px-6 py-12">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-black mb-2 text-white">Candy Koi <span class="text-cyan-400">Cross-Analysis</span></h1>
                <p class="text-slate-300 text-sm">Polygenic trait breakdown and phenotypic probability modeling for F1 fry.</p>
            </div>

            <div class="mb-8 p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/30 flex items-center gap-3 text-xs text-emerald-400 max-w-xl mx-auto backdrop-blur-md">
                <i class="fa-solid fa-shield-check text-base"></i>
                <span><strong>Inbreeding Guard Active:</strong> Selected Sire and Dam share no immediate sibling co-ancestry markers within 3 generations.</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach ($simulation_result['outcomes'] as $outcome): ?>
                <div class="glass-card rounded-3xl p-6 border-white/10 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-black backdrop-blur-md">
                                <?php echo $outcome['percentage']; ?> Yield Ratio
                            </span>
                            <i class="fa-solid fa-fish text-cyan-400 text-xl"></i>
                        </div>
                        <h4 class="font-bold text-base text-cyan-300 mb-2"><?php echo $outcome['title']; ?></h4>
                        <p class="text-xs text-slate-300 leading-relaxed mb-4"><?php echo $outcome['description']; ?></p>
                    </div>
                    <div class="flex flex-wrap gap-2 pt-4 border-t border-white/5">
                        <?php foreach ($outcome['traits'] as $trait): ?>
                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-lg bg-white/5 border border-white/10 text-slate-200"><?php echo $trait; ?></span>
                        <?php endforeach; ?>
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