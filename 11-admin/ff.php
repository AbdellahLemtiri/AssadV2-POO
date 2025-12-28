<?php

require_once '../OOP/admin.php';
require_once  "../conexion/authinification.php";
checkRole("admin");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];


?>

<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tableau de Bord Admin - ASSAD Zoo Virtuel</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#0d9488",
                        "primary-dark": "#0f766e",
                        "primary-light": "#2dd4bf",
                        "background-light": "#f0fdfa",
                        "background-dark": "#042f2e",
                        "surface-light": "#ffffff",
                        "surface-dark": "#134e4a",
                        "text-light": "#164e63",
                        "text-dark": "#a7f3d0",
                        "text-secondary-light": "#0891b2",
                        "text-secondary-dark": "#5eead4",
                        "accent": "#f59e0b"
                    },
                    fontFamily: {
                        sans: ["Plus Jakarta Sans", "sans-serif"]
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.7s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                        'pulse-glow': 'pulseGlow 2s infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            }
                        },
                        slideUp: {
                            '0%': {
                                transform: 'translateY(60px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            }
                        },
                        pulseGlow: {
                            '0%, 100%': {
                                boxShadow: '0 0 20px rgba(13,148,136,0.3)'
                            },
                            '50%': {
                                boxShadow: '0 0 40px rgba(13,148,136,0.6)'
                            }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark font-sans antialiased min-h-screen flex overflow-hidden">
    <?php

    $current_page = basename($_SERVER['PHP_SELF']);

    function nav_item($href, $icon, $label, $current_page)
    {
        $is_active = ($current_page == $href);


        if ($is_active) {
            return "flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-500 text-white shadow-lg shadow-emerald-200 dark:shadow-none transition-all duration-300";
        } else {
            return "flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-400 transition-all duration-200 group";
        }
    }
    ?>

    <aside class="w-72 bg-white dark:bg-slate-900 border-r border-slate-100 dark:border-slate-800 flex-col hidden md:flex h-screen sticky top-0 shrink-0">
        <div class="h-full flex flex-col justify-between p-6">

            <div class="flex flex-col gap-8">
                <div class="flex items-center gap-4 px-2">
                    <div class="h-11 w-11 rounded-xl bg-gradient-to-br from-emerald-400 to-green-600 flex items-center justify-center shadow-md">
                        <span class="material-symbols-outlined text-white text-2xl">eco</span>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-slate-800 dark:text-white text-xl font-extrabold tracking-tight leading-none">ASSAD Admin</h1>
                        <p class="text-emerald-500 text-[10px] font-bold uppercase tracking-widest mt-1">Zoo Virtuel</p>
                    </div>
                </div>

                <nav class="flex flex-col gap-2">

                    <a href="index.php" class="<?= nav_item('index.php', 'dashboard', 'Vue d\'ensemble', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">dashboard</span>
                        <span class="text-sm font-semibold">Vue d'ensemble</span>
                    </a>

                    <a href="admin_animaux.php" class="<?= nav_item('admin_animaux.php', 'pets', 'Gestion Animaux', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">pets</span>
                        <span class="text-sm font-semibold">Gestion Animaux</span>
                    </a>

                    <a href="admin_habitats.php" class="<?= nav_item('admin_habitats.php', 'forest', 'Habitats', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">forest</span>
                        <span class="text-sm font-semibold">Habitats</span>
                    </a>

                    <a href="admin_users.php" class="<?= nav_item('admin_users.php', 'group', 'Utilisateurs', $current_page) ?>">
                        <span class="material-symbols-outlined text-[22px]">group</span>
                        <span class="text-sm font-semibold">Utilisateurs</span>
                    </a>



                </nav>
            </div>

            <div class="flex flex-col gap-4 border-t border-slate-100 dark:border-slate-800 pt-6">
                <div class="flex items-center justify-between bg-slate-50 dark:bg-slate-800/50 p-3 rounded-2xl">
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <img class="h-10 w-10 rounded-full object-cover ring-2 ring-white dark:ring-slate-700"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDLpsL4U45kNe2pJTEnRso6tfRPA6aLzfj3_19OQE6427LVmJ5aiOc1ZRWmvboLsjGaNmK64pZi1jhhiR-v87OvRhal9yHiSxQvTiX-eipY5OBy7UKmVoRy-c_ZXvLyH0-CLxF8G1ng-sBh2jhO4Yf-eaj5B3UE6mv0ggcUeAMOn8OYOLPj8EBGQKb-92AiJo5VHKJHGnSSRxJMnzp3emTjiTzC3qYd_2iEed3MQVluydYS0yi194Z_ztMxCH_6roaeCDAm0hQHwnIW" alt="Admin">
                            <span class="absolute bottom-0 right-0 h-3 w-3 bg-emerald-500 border-2 border-white dark:border-slate-800 rounded-full"></span>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-sm font-bold text-slate-700 dark:text-slate-200">ADMIN ASSAD</p>
                            <p class="text-[11px] text-slate-400 font-medium italic">Super Admin</p>
                        </div>
                    </div>
                    <a href="logout.php" title="Déconnexion" class="text-slate-400 hover:text-red-500 transition-colors">
                        <span class="material-symbols-outlined text-xl">logout</span>
                    </a>
                </div>
            </div>

        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden">
        <header class="bg-surface-light dark:bg-surface-dark border-b border-gray-200 dark:border-gray-700">
            <div class="px-6 py-5 max-w-7xl mx-auto w-full flex justify-between items-end">
                <div>
                    <h1 class="text-3xl font-black tracking-tight">Tableau de Bord Admin</h1>
                    <p class="text-text-secondary-light dark:text-text-secondary-dark text-sm mt-1">
                        Zoo Virtuel ASSAD <span class="text-primary">•</span>
                        <span class="bg-primary/10 text-primary px-2 py-0.5 rounded-full text-xs uppercase">CAN 2025 Maroc</span>
                    </p>
                </div>
                <div class="flex gap-3">
                    <button class="px-5 py-2.5 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg font-medium text-sm flex items-center gap-2 transition">
                        <span class="material-symbols-outlined">download</span>
                        Exporter Rapport
                    </button>
                    <button onclick="window.location.href='admin_animaux_ajouter.php'" class="px-5 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-lg font-bold text-sm flex items-center gap-2 shadow-lg transition">
                        <span class="material-symbols-outlined">add</span>
                        Nouvel Animal
                    </button>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto bg-background-light dark:bg-background-dark">
            <div class="max-w-7xl mx-auto w-full px-6 py-8 space-y-8">

                <!-- Cartes de statistiques -->
                <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 my-10 animate-fade-in">
                    <!-- Card 1: Total Animaux -->
                    <div class="relative overflow-hidden rounded-3xl bg-surface-light/70 dark:bg-surface-dark/80 backdrop-blur-2xl border border-primary-light/30 dark:border-primary/40 
         shadow-2xl shadow-primary/20 transition-all duration-700 hover:shadow-primary-light/50 hover:shadow-4xl hover:scale-105 hover:-translate-y-3 group">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-primary-light/5 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-700"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-light/20 rounded-full blur-3xl group-hover:blur-4xl transition-all"></div>


                        <!-- Card 2: Animaux en Savane -->
                        <div class="relative overflow-hidden rounded-3xl bg-surface-light/70 dark:bg-surface-dark/80 backdrop-blur-2xl border border-primary-light/30 dark:border-primary/40 
         shadow-2xl shadow-primary/20 transition-all duration-700 hover:shadow-primary-light/50 hover:shadow-4xl hover:scale-105 hover:-translate-y-3 group">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-primary-light/5 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-700"></div>
                            <div class="absolute top-0 left-0 w-40 h-40 bg-primary/20 rounded-full blur-3xl group-hover:blur-4xl transition-all"></div>

                            <div class="relative z-10 p-8 flex flex-col items-start">
                                <span class="material-symbols-outlined text-6xl text-primary-light mb-6 group-hover:text-primary group-hover:scale-110 transition-all duration-500">landscape</span>
                                <h3 class="text-5xl font-extrabold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                                    <?= 2 ?>
                                </h3>
                                <p class="text-xl font-semibold text-text-secondary-light dark:text-text-secondary-dark mt-4 group-hover:text-primary-light transition-colors">
                                    Animaux en Savane Africaine
                                </p>
                            </div>

                            <div class="absolute bottom-0 left-0 right-0 h-1.5 bg-gradient-to-r from-primary to-primary-light scale-x-0 group-hover:scale-x-100 transition-transform duration-1000 origin-left"></div>
                        </div>

                        <!-- Card 3: Animaux en Jungle -->
                        <div class="relative overflow-hidden rounded-3xl bg-surface-light/70 dark:bg-surface-dark/80 backdrop-blur-2xl border border-primary-light/30 dark:border-primary/40 
         shadow-2xl shadow-primary/20 transition-all duration-700 hover:shadow-primary-light/50 hover:shadow-4xl hover:scale-105 hover:-translate-y-3 group">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-primary-light/5 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-700"></div>
                            <div class="absolute bottom-0 right-0 w-36 h-36 bg-primary-light/30 rounded-full blur-3xl group-hover:blur-4xl transition-all"></div>

                            <div class="relative z-10 p-8 flex flex-col items-start">
                                <span class="material-symbols-outlined text-6xl text-primary-light mb-6 group-hover:text-primary group-hover:scale-110 transition-all duration-500">forest</span>
                                <h3 class="text-5xl font-extrabold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                                    <?= 22 ?>
                                </h3>
                                <p class="text-xl font-semibold text-text-secondary-light dark:text-text-secondary-dark mt-4 group-hover:text-primary-light transition-colors">
                                    Animaux en Jungle
                                </p>
                            </div>

                            <div class="absolute bottom-0 left-0 right-0 h-1.5 bg-gradient-to-r from-primary to-primary-light scale-x-0 group-hover:scale-x-100 transition-transform duration-1000 origin-left"></div>
                        </div>

                        <!-- Card 4: Animaux en Soins -->
                        <div class="relative overflow-hidden rounded-3xl bg-surface-light/70 dark:bg-surface-dark/80 backdrop-blur-2xl border border-primary-light/30 dark:border-primary/40 
         shadow-2xl shadow-primary/20 transition-all duration-700 hover:shadow-primary-light/50 hover:shadow-4xl hover:scale-105 hover:-translate-y-3 group">
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/10 via-primary-light/5 to-transparent opacity-70 group-hover:opacity-90 transition-opacity duration-700"></div>
                            <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary/25 rounded-full blur-3xl group-hover:blur-4xl transition-all"></div>

                            <div class="relative z-10 p-8 flex flex-col items-start">
                                <span class="material-symbols-outlined text-6xl text-primary-light mb-6 group-hover:text-primary group-hover:scale-110 transition-all duration-500">water_drop</span>
                                <h3 class="text-5xl font-extrabold bg-gradient-to-r from-primary to-primary-light bg-clip-text text-transparent">
                                    <?= 22 ?>
                                </h3>
                                <p class="text-xl font-semibold text-text-secondary-light dark:text-text-secondary-dark mt-4 group-hover:text-primary-light transition-colors">
                                    Animaux Herbivore
                                </p>
                            </div>

                            <div class="absolute bottom-0 left-0 right-0 h-1.5 bg-gradient-to-r from-primary to-primary-light scale-x-0 group-hover:scale-x-100 transition-transform duration-1000 origin-left"></div>
                        </div>
                </section>

                <!-- Autres sections (animaux, habitats, utilisateurs récents) -->
                <!-- Tu peux copier-coller les sections que tu avais déjà, elles sont très bien ! -->
                <!-- Je les garde telles quelles pour ne pas alourdir, mais elles sont compatibles -->

            </div>

            <footer class="text-center py-6 text-xs text-gray-400 uppercase tracking-widest">
                Inspiré par la force et la majesté des Lions de l'Atlas 🦁 • CAN 2025 Maroc
            </footer>
        </div>
    </main>

</body>

</html>