<?php
require_once "../Fonctionalite_php/connect.php"

?>
<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Détails : <?= htmlspecialchars($tour['title']) ?> - ASSAD</title>
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
                        primary: "#0d9488", // Teal واعر مودرن
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
                        "accent": "#f59e0b" // لمسة ذهبية
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
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-main-light dark:text-text-sec-dark hover:bg-border-light dark:hover:bg-surface-dark transition-colors font-medium" href="tableau_de_bord.php">
                        <span class="material-symbols-outlined text-text-sec-light dark:text-text-sec-dark">dashboard</span>
                        <span>Tableau de bord</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-primary/10 text-primary dark:text-primary font-bold" href="mes_visites.php">
                        <span class="material-symbols-outlined">map</span>
                        <span>Mes Visites</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-main-light dark:text-text-sec-dark hover:bg-border-light dark:hover:bg-surface-dark transition-colors font-medium" href="reservations.php">
                        <span class="material-symbols-outlined text-text-sec-light dark:text-text-sec-dark">groups</span>
                        <span>Réservations</span>
                    </a>
                    <a class="flex items-center gap-3 px-4 py-3 rounded-xl text-text-main-light dark:text-text-sec-dark hover:bg-border-light dark:hover:bg-surface-dark transition-colors font-medium" href="parametres.php">
                        <span class="material-symbols-outlined text-text-sec-light dark:text-text-sec-dark">settings</span>
                        <span>Paramètres</span>
                    </a>
                </nav>
            </div>
            <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark shadow-sm">
                <div class="bg-center bg-cover rounded-full h-10 w-10 border-2 border-primary" data-alt="Portrait du guide" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB6SweDCChTHrnzUi3ijD-HqKt7FximPeaVPRuHptoZB3gCiNIREev191XH6lCU2g9dWO-0nb19loXauXqO29KxIYeVB8L_qXV7j_z9ew9PCkxmtTGzyhArcCoyjioHHD9oWPKFoA4SKfrqRSRlWptyCfastPtNkgSlFizXCwA60Izfk-CrC13bruBTAOjH610XOUvFB1RnfkoM-IeFW7fkvzAujenUwRWp02gjgWiOhb4zpbuGErPegntLM0188b1Dkbt6DnzndgR5");'></div>
                <div class="flex flex-col overflow-hidden">
                    <p class="text-sm font-bold truncate"><?= $nom_utilisateur ?></p>
                    <p class="text-text-sec-light dark:text-text-sec-dark text-xs truncate">Guide <?= htmlspecialchars($role_utilisateur) ?></p>
                </div>
            </div>
        </aside>
        <main class="flex-1 flex flex-col h-full overflow-y-auto overflow-x-hidden bg-background-light dark:bg-background-dark">
            <div class="p-6 md:p-10 max-w-7xl mx-auto w-full flex flex-col gap-8">

                <a href="mes_visites.php" class="text-sm text-text-sec-light dark:text-text-sec-dark hover:text-primary transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Retour à Mes Visites
                </a>

                <div class="flex flex-wrap justify-between items-start gap-4 pb-4 border-b border-border-light dark:border-border-dark">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-text-light dark:text-text-dark">Titre de la Visite</h2>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-lg">Détails et gestion de la Visite #ID_HERE</p>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button class="flex items-center gap-2 bg-primary hover:bg-primary-dark text-white px-5 py-2.5 rounded-lg font-bold shadow-lg transition-all transform hover:scale-105">
                            <span class="material-symbols-outlined text-[20px]">videocam</span>
                            <span>Démarrer la Visite</span>
                        </button>
                        <button class="flex items-center gap-2 px-5 py-2.5 rounded-lg border border-primary text-primary font-semibold hover:bg-primary/10 transition-colors">
                            <span class="material-symbols-outlined text-[20px]">edit</span>
                            <span>Modifier</span>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-1 flex flex-col gap-6">
                        <div class="h-60 rounded-2xl bg-slate-200 dark:bg-surface-dark bg-cover bg-center relative shadow-md border border-border-light dark:border-border-dark overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="m-3 absolute top-0 left-0 inline-flex px-3 py-1 bg-primary text-white text-xs font-bold rounded-full items-center gap-1 shadow-lg">
                                <span class="material-symbols-outlined text-[14px]">stars</span>
                                STATUT_ICI
                            </div>
                        </div>

                        <div class="bg-surface-light dark:bg-surface-dark rounded-2xl border border-border-light dark:border-border-dark shadow-sm p-6">
                            <h3 class="text-lg font-bold mb-4 flex items-center gap-2 text-primary border-b border-primary/10 pb-2">
                                <span class="material-symbols-outlined">analytics</span>
                                Détails Techniques
                            </h3>
                            <ul class="space-y-4">
                                <li class="flex flex-col gap-1">
                                    <span class="text-xs text-text-secondary-light dark:text-text-secondary-dark font-bold uppercase tracking-wider">Date & Heure</span>
                                    <span class="text-sm font-semibold">01 Janvier 2024 à 10:00</span>
                                </li>
                                <li class="flex flex-col gap-1">
                                    <span class="text-xs text-text-secondary-light dark:text-text-secondary-dark font-bold uppercase tracking-wider">Durée & Langue</span>
                                    <span class="text-sm font-semibold">60 min | Français</span>
                                </li>
                                <li class="flex flex-col gap-1">
                                    <span class="text-xs text-text-secondary-light dark:text-text-secondary-dark font-bold uppercase tracking-wider">Prix de la séance</span>
                                    <span class="text-sm font-bold text-accent">00.00 DH</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="grid grid-cols-3 gap-4">
                            <div class="bg-surface-light dark:bg-surface-dark p-4 rounded-2xl border border-border-light dark:border-border-dark text-center">
                                <p class="text-2xl font-black text-primary">00</p>
                                <p class="text-[10px] uppercase font-bold opacity-60">Confirmés</p>
                            </div>
                            <div class="bg-surface-light dark:bg-surface-dark p-4 rounded-2xl border border-border-light dark:border-border-dark text-center">
                                <p class="text-2xl font-black text-accent">00</p>
                                <p class="text-[10px] uppercase font-bold opacity-60">Capacité Max</p>
                            </div>
                            <div class="bg-surface-light dark:bg-surface-dark p-4 rounded-2xl border border-border-light dark:border-border-dark text-center">
                                <p class="text-2xl font-black text-blue-500">00</p>
                                <p class="text-[10px] uppercase font-bold opacity-60">Restants</p>
                            </div>
                        </div>

                        <div class="bg-surface-light dark:bg-surface-dark rounded-2xl border border-border-light dark:border-border-dark shadow-sm overflow-hidden">
                            <div class="p-5 bg-slate-50 dark:bg-black/10 border-b border-border-light dark:border-border-dark flex justify-between items-center">
                                <h3 class="font-bold flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">group</span>
                                    Liste des Participants
                                </h3>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left">
                                    <thead>
                                        <tr class="text-[11px] uppercase tracking-wider text-text-secondary-light dark:text-text-secondary-dark border-b border-border-light dark:border-border-dark">
                                            <th class="px-6 py-4 font-bold">Visiteur</th>
                                            <th class="px-6 py-4 font-bold text-center">Places</th>
                                            <th class="px-6 py-4 font-bold text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-border-light dark:divide-border-dark">
                                        <tr class="hover:bg-primary/5 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-bold">Nom du Participant</div>
                                                <div class="text-xs opacity-60">email@exemple.com</div>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="bg-primary/10 text-primary px-2 py-1 rounded-md text-xs font-bold">2</span>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <button class="text-red-500 hover:bg-red-50 p-2 rounded-full transition-colors">
                                                    <span class="material-symbols-outlined text-sm">cancel</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="bg-surface-light dark:bg-surface-dark rounded-2xl border border-border-light dark:border-border-dark p-6">
                            <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                                <span class="material-symbols-outlined text-primary">format_list_numbered</span>
                                Étapes de la Visite
                            </h3>
                            <div class="space-y-4 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-100 dark:bg-surface-dark text-slate-500 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                                        1
                                    </div>
                                    <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-surface-dark shadow-sm">
                                        <div class="font-bold text-primary">Introduction</div>
                                        <div class="text-xs opacity-70">Description de l'étape...</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="bg-primary/10 dark:bg-primary/5 border-2 border-dashed border-primary/30 rounded-2xl p-6 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-primary text-white rounded-xl shadow-lg shadow-primary/20">
                            <span class="material-symbols-outlined">link</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Lien de la visioconférence</h4>
                            <p class="text-xs font-mono opacity-60">https://votre-lien-zoom-ou-teams.com/xyz</p>
                        </div>
                    </div>
                    <button class="bg-primary text-white px-6 py-3 rounded-xl font-bold hover:bg-primary-dark transition-all shadow-lg">
                        Copier le lien
                    </button>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.getElementById('copy-link-btn').addEventListener('click', function() {
            const link = this.getAttribute('data-link');
            navigator.clipboard.writeText(link).then(() => {
                alert('Lien copié dans le presse-papiers !');
                // Optionnellement, changer le texte du bouton brièvement
                this.innerHTML = '<span class="material-symbols-outlined text-[20px]">check</span> Copié !';
                setTimeout(() => {
                    this.innerHTML = '<span class="material-symbols-outlined text-[20px]">content_copy</span> Copier le Lien';
                }, 1500);
            }).catch(err => {
                console.error('Erreur lors de la copie: ', err);
            });
        });
    </script>
</body>

</html>