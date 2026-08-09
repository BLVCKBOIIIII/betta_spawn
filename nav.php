<nav class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between border-b border-white/10 sticky top-0 bg-slate-950/60 backdrop-blur-xl z-50 shadow-2xl">
    <div class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg shadow-cyan-500/30">
            <i class="fa-solid fa-fish-fins text-slate-950 text-xl"></i>
        </div>
        <span class="text-xl font-extrabold tracking-tight text-white">Spawn<span class="text-cyan-400">OS</span></span>
    </div>

    <div class="hidden md:flex items-center gap-5 text-xs font-bold uppercase tracking-widest text-slate-300">
        <a href="index.php" class="hover:text-cyan-400 transition-colors">Dashboard</a>
        <a href="fish_library.php" class="hover:text-cyan-400 transition-colors">Library</a>
        <a href="matchmaker.php" class="hover:text-purple-400 transition-colors">Matchmaker</a>
        <a href="spawn_logs.php" class="hover:text-blue-400 transition-colors">Spawns</a>
        <a href="cultures.php" class="hover:text-emerald-400 transition-colors">Cultures</a>
        <a href="traits_reference.php" class="hover:text-cyan-400 transition-colors">Traits</a>
    </div>

    <a href="index.php?action=logout" class="px-4 py-2 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-xs font-bold hover:bg-red-500/20 transition-all">LOGOUT</a>
</nav>

<div class="md:hidden fixed bottom-0 left-0 right-0 bg-slate-950/80 backdrop-blur-2xl border-t border-white/10 p-2 flex justify-around z-50 shadow-2xl">
    <a href="index.php" class="text-cyan-400 flex flex-col items-center gap-1"><i class="fa-solid fa-chart-pie text-sm"></i><span class="text-[8px] font-bold">Home</span></a>
    <a href="fish_library.php" class="text-slate-400 flex flex-col items-center gap-1"><i class="fa-solid fa-fish text-sm"></i><span class="text-[8px] font-bold">Library</span></a>
    <a href="matchmaker.php" class="text-purple-400 flex flex-col items-center gap-1"><i class="fa-solid fa-dna text-sm"></i><span class="text-[8px] font-bold">Match</span></a>
    <a href="spawn_logs.php" class="text-slate-400 flex flex-col items-center gap-1"><i class="fa-solid fa-flask-vial text-sm"></i><span class="text-[8px] font-bold">Spawns</span></a>
    <a href="cultures.php" class="text-emerald-400 flex flex-col items-center gap-1"><i class="fa-solid fa-seedling text-sm"></i><span class="text-[8px] font-bold">Cultures</span></a>
    <a href="traits_reference.php" class="text-slate-400 flex flex-col items-center gap-1"><i class="fa-solid fa-book text-sm"></i><span class="text-[8px] font-bold">Traits</span></a>
</div>