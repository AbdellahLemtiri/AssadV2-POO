<?php


require_once "../Fonctionalite_php/connect.php";
$reservation = [];
$sql = "SELECT res.* , vg.titre,vg.id as idv,utl.nom ,vg.date_heure FROM  reservations res  inner join visites_guidees vg on res.id =  vg.id  inner join utilisateurs utl on res.id_utilisateur = utl.id ";
$res = $connect->query($sql);
$nbr = $res->num_rows;
if ($res) {
    $reservation = $res->fetch_all(MYSQLI_ASSOC);
} else {
    $reservation[0] = NULL;
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

          <main class="flex-1 flex flex-col h-full overflow-y-auto overflow-x-hidden">
            <div class="lg:hidden flex items-center justify-between p-4 border-b border-border-light dark:border-border-dark bg-surface-light dark:bg-surface-dark sticky top-0 z-20">
                <span class="material-symbols-outlined text-primary">pets</span>
                <span class="material-symbols-outlined text-text-main-light dark:text-text-main-dark">menu</span>
            </div>

            <div class="p-6 md:p-10 max-w-7xl mx-auto w-full flex flex-col gap-8">

                <div class="flex flex-wrap justify-between items-end gap-4">
                    <div class="flex flex-col gap-2">
                        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight">Liste des Réservations</h2>
                        <p class="text-text-sec-light dark:text-text-sec-dark text-lg">Suivi des inscriptions pour vos visites guidées virtuelles.</p>
                    </div>

                    <div class="bg-primary/10 border border-primary/20 p-4 rounded-2xl flex items-center gap-4">
                        <div class="bg-primary text-white p-2 rounded-lg">
                            <span class="material-symbols-outlined">groups</span>
                        </div>
                        <div>
                            <p class="text-xs uppercase font-bold text-primary">Total Participants</p>
                            <p class="text-xl font-black italic"><?= $nbr ?></p>
                        </div>
                    </div>
                </div>

                <div class="bg-surface-light dark:bg-surface-dark rounded-2xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-border-light dark:divide-border-dark">
                            <thead class="bg-gray-50/50 dark:bg-white/5">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-text-sec-light uppercase tracking-widest font-mono">Visiteur</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-text-sec-light uppercase tracking-widest font-mono">Visite Guideé</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-text-sec-light uppercase tracking-widest font-mono">Date de Réservation</th>
                                    <th class="px-6 py-4 text-center text-xs font-bold text-text-sec-light uppercase tracking-widest font-mono">Nb. Personnes</th>
                                    <th class="px-6 py-4 text-right text-xs font-bold text-text-sec-light uppercase tracking-widest font-mono">Actions</th>
                                </tr>
                            </thead>
                            <?php foreach ($reservation as $res): ?>
                                <tbody class="divide-y divide-border-light dark:divide-border-dark bg-white dark:bg-transparent">

                                    <tr class="hover:bg-primary/5 transition-colors group">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center text-primary font-black text-sm border-2 border-white dark:border-surface-dark">

                                                </div>
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-bold text-text-main-light dark:text-text-main-dark uppercase"><?= $res['nom'] ?></span>
                                                    <span class="text-[10px] text-text-sec-light"><?= $res['idv'] ?></span>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4">
                                            <div class="flex flex-col">
                                                <span class="text-sm font-medium text-text-main-light dark:text-text-main-dark line-clamp-1 italic"><?= $res['titre'] ?></span>
                                                <span class="text-[10px] text-primary font-bold uppercase tracking-tighter"></span>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-text-main-light dark:text-text-main-dark">
                                            <div class="flex items-center gap-2">
                                                <span class="material-symbols-outlined text-sm text-text-sec-light">calendar_today</span>
                                                <?= $res['date_heure'] ?>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-black border border-primary/20">
                                                <?= $res['nb_personnes'] ?>
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <button title="Contacter le visiteur" class="p-2 hover:bg-primary hover:text-white text-primary rounded-xl transition-all border border-primary/20">
                                                <span class="material-symbols-outlined text-sm">mail</span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </div>
            </div>
        </main>
    </div>
</body>

</html>