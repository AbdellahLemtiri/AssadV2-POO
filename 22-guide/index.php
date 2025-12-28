
<?php

require_once "../Fonctionalite_php/connect.php";

$les_visite = [];


$sql = "SELECT vg.*, vg.id as idvg, SUM(res.nb_personnes) as total_reserved 
        FROM visites_guidees vg 
        LEFT JOIN reservations res ON res.id_visite = vg.id 
        GROUP BY vg.id 
        ORDER BY vg.date_heure ASC";
$res = $connect->query($sql);

if ($res) {
    $les_visite = $res->fetch_all(MYSQLI_ASSOC);
}



?>

<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Mes Visites - ASSAD</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
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
    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 1,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24
        }

        body {
            font-family: "Plus Jakarta Sans", sans-serif;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen text-text-main-light dark:text-text-main-dark transition-colors duration-200">
    <div class="flex h-screen w-full overflow-hidden">
          <?php

            $current_page = basename($_SERVER['PHP_SELF']);
            ?>

        <?php

        function nav_item($href, $label, $current_page)
        {
            $is_active = ($current_page == $href);


            if ($is_active) {
                return "flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-500 text-white shadow-lg shadow-emerald-200 dark:shadow-none transition-all duration-300";
            } else {
                return "flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 dark:text-slate-400 hover:bg-emerald-50 hover:text-emerald-600 dark:hover:bg-emerald-500/10 dark:hover:text-emerald-400 transition-all duration-200 group";
            }
        }
        ?>
        <aside class="hidden lg:flex flex-col w-72 border-r border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark p-6 h-full justify-between">
            <div class="flex flex-col gap-8">
                <div class="flex items-center gap-3 px-2">
                    <div class="bg-primary/20 p-2 rounded-lg">
                        <span class="material-symbols-outlined text-primary text-3xl">pets</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight">ASSAD</h1>
                        <p class="text-text-sec-light dark:text-text-sec-dark text-xs uppercase tracking-wider font-semibold">Guide Space</p>
                    </div>
                </div>
                <nav class="flex flex-col gap-2">
                    <a class="<?= nav_item('index.php', 'Mes Visites', $current_page) ?>" href="index.php">
                        <span class="material-symbols-outlined text-text-sec-light dark:text-text-sec-dark">map</span>
                        <span>Mes Visites</span>
                    </a>
                    <a class="<?= nav_item('reservations.php', 'Réservations', $current_page) ?>" href="reservations.php">
                        <span class="material-symbols-outlined text-text-sec-light dark:text-text-sec-dark">groups</span>
                        <span>Réservations</span>
                    </a>
                </nav>
            </div>
            <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark shadow-sm">
                <div class="bg-center bg-cover rounded-full h-10 w-10 border-2 border-primary" data-alt="Portrait du guide" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB6SweDCChTHrnzUi3ijD-HqKt7FximPeaVPRuHptoZB3gCiNIREev191XH6lCU2g9dWO-0nb19loXauXqO29KxIYeVB8L_qXV7j_z9ew9PCkxmtTGzyhArcCoyjioHHD9oWPKFoA4SKfrqRSRlWptyCfastPtNkgSlFizXCwA60Izfk-CrC13bruBTAOjH610XOUvFB1RnfkoM-IeFW7fkvzAujenUwRWp02gjgWiOhb4zpbuGErPegntLM0188b1Dkbt6DnzndgR5");'></div>
                <div class="flex flex-col overflow-hidden">
                    <p class="text-sm font-bold truncate"><?= $nom_utilisateur ?></p>
                    <p class="text-text-sec-light dark:text-text-sec-dark text-xs truncate">Guide <?= $role_utilisateur ?></p>
                </div>
            </div>
        </aside>
        <main class="flex-1 flex flex-col h-full overflow-y-auto overflow-x-hidden bg-background-light dark:bg-background-dark">
            <div class="p-6 md:p-10 max-w-7xl mx-auto w-full flex flex-col gap-8">

                <div class="flex flex-wrap justify-between items-end gap-6 border-b border-border-light dark:border-border-dark pb-8">
                    <div class="flex flex-col gap-2">
                        <h2 class="text-3xl md:text-5xl font-black tracking-tight text-text-light dark:text-text-dark">Mes Visites</h2>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-lg max-w-2xl">Liste complète et gestion de toutes vos visites virtuelles.</p>
                    </div>
                    <a href="fx/add_visite.php"
                        class="flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-primary/20 transition-all transform hover:scale-105 active:scale-95">
                        <span class="material-symbols-outlined text-[24px]">add_circle</span>
                        <span>Créer une nouvelle visite</span>
                    </a>
                </div>

                <div class="flex flex-col gap-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <h3 class="text-xl font-bold flex items-center gap-2">
                            <span class="w-2 h-8 bg-primary rounded-full"></span>
                            Vos Sessions
                        </h3>
                        <div class="flex flex-wrap gap-2 text-sm bg-surface-light dark:bg-surface-dark p-1 rounded-xl border border-border-light dark:border-border-dark shadow-sm">
                            <span class="px-5 py-2 bg-primary text-white rounded-lg font-bold cursor-pointer shadow-md">Tous</span>
                            <span class="px-5 py-2 hover:bg-primary/10 text-text-sec-light dark:text-text-sec-dark rounded-lg font-semibold transition-colors cursor-pointer">À venir (2)</span>
                            <span class="px-5 py-2 hover:bg-primary/10 text-text-sec-light dark:text-text-sec-dark rounded-lg font-semibold transition-colors cursor-pointer">Brouillons (1)</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        <?php foreach ($les_visite as $visite) : ?>
                            <?php echo $visite['id']; ?>
                            <div class="group flex flex-col lg:flex-row gap-6 p-5 rounded-3xl bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark shadow-sm hover:shadow-xl hover:border-primary/30 transition-all duration-300 relative overflow-hidden">
                                <?php
                                if ($visite['statut'] === "ouverte"): ?>
                                    <div class="h-56 lg:h-48 lg:w-64 rounded-2xl bg-slate-200 dark:bg-slate-800 bg-cover bg-center shrink-0 relative overflow-hidden">
                                        <div class="absolute top-3 left-3 flex items-center gap-1.5 px-3 py-1.5 bg-emerald-500 text-white text-[11px] font-black uppercase tracking-wider rounded-lg shadow-lg">
                                            <span class="material-symbols-outlined text-[14px]">check_circle</span>
                                            OUVERTE
                                        </div>
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($visite['statut'] === "annulee"): ?>
                                    <div class="h-56 lg:h-48 lg:w-64 rounded-2xl bg-red-100 dark:bg-red-900/20 shrink-0 relative overflow-hidden flex items-center justify-center border border-red-200">
                                        <div class="absolute top-3 left-3 flex items-center gap-1.5 px-3 py-1.5 bg-red-600 text-white text-[11px] font-black uppercase tracking-wider rounded-lg shadow-lg">
                                            <span class="material-symbols-outlined text-[14px]">cancel</span>
                                            <?=  ($visite['statut']) ?>
                                        </div>

                                        <span class="material-symbols-outlined text-red-300 text-5xl opacity-50">block</span>

                                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($visite['statut'] === "terminee"): ?>
                                    <div class="h-56 lg:h-48 lg:w-64 rounded-2xl bg-emerald-500 dark:bg-red-900/20 shrink-0 relative overflow-hidden flex items-center justify-center border border-red-200">
                                        <div class="absolute top-3 left-3 flex items-center gap-1.5 px-3 py-1.5 bg-red-600 text-white text-[11px] font-black uppercase tracking-wider rounded-lg shadow-lg">
                                            <span class="material-symbols-outlined text-[14px]">cancel</span>
                                            <?=  ($visite['statut']) ?>
                                        </div>

                                        <span class="material-symbols-outlined text-red-300 text-5xl opacity-50">block</span>

                                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                    </div>
                                <?php endif; ?>



                                <div class="flex flex-col justify-between flex-1 py-1">
                                    <div>
                                        <div class="flex justify-between items-start">
                                            <h4 class="text-2xl font-extrabold text-text-light dark:text-text-dark group-hover:text-primary transition-colors leading-tight">

                                            </h4>
                                            <span class="text-lg font-black text-primary"><?= $visite['prix'] ?></span>
                                        </div>

                                        <div class="flex flex-wrap items-center gap-x-6 gap-y-2 mt-4 text-sm font-medium text-text-secondary-light dark:text-text-secondary-dark">
                                            <div class="flex items-center gap-2">
                                                <span class="material-symbols-outlined text-primary/70 text-[20px]">calendar_today</span>
                                                <span><?= $visite['date_heure'] ?></span>
                                            </div>
                                            <div class="flex items-center gap-2 border-l border-border-light dark:border-border-dark pl-6">
                                                <span class="material-symbols-outlined text-primary/70 text-[20px]">schedule</span>
                                                <span><?= $visite['duree'] ?></span>
                                            </div>
                                            <div class="flex items-center gap-2 border-l border-border-light dark:border-border-dark pl-6">
                                                <span class="material-symbols-outlined text-primary/70 text-[20px]">group</span>
                                                <span><?= ($visite['total_reserved'] ?: 0) . "/" . $visite['capacite_max'] ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap items-center justify-between gap-4 mt-6 pt-4 border-t border-border-light dark:border-border-dark/50">
                                        <div class="flex gap-2">
                                            <a href="visite_details.php?id=<?= $visite['idvg'] ?>" class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-primary text-white text-xs font-bold hover:bg-primary-dark shadow-lg shadow-primary/20 transition-all">
                                                <span class="material-symbols-outlined text-[18px]">visibility</span>
                                               details de la visite
                                            </a>
                                            <a href="fx/modifier.php?id=<?= $visite['idvg'] ?>" class="flex items-center gap-2 px-4 py-2.5 rounded-xl border border-border-light dark:border-border-dark text-xs font-bold hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                                                <span class="material-symbols-outlined text-[18px]">edit</span>
                                                Modifier
                                            </a>
                                        </div>

                                        <a  href="fx/delet.php?id=<?=  $visite['idvg'] ?>" return confirm() class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10 text-xs font-bold transition-colors">
                                            <span class="material-symbols-outlined text-[18px]">delete_sweep</span>
                                            Supprimer
                                </a>
                                    </div>
                                </div>
                                <?php if (count($les_visite) === 0) : ?>
                                    <div class="flex flex-col items-center justify-center p-20 bg-surface-light dark:bg-surface-dark rounded-[2rem] border-2 border-dashed border-border-light dark:border-border-dark mt-4">
                                        <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                                            <span class="material-symbols-outlined text-primary text-5xl">explore_off</span>
                                        </div>
                                        <h4 class="text-2xl font-bold mb-2">Aucune visite pour le moment</h4>
                                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-center max-w-sm mb-8">Vous n'avez pas encore créé de visites guidées. Commencez par en créer une nouvelle !</p>
                                        <button class="text-primary font-bold hover:underline flex items-center gap-2">
                                            Créer votre première session <span class="material-symbols-outlined">arrow_forward</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </main>
    </div>
</body>

</html>