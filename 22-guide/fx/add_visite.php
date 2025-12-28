
    <!DOCTYPE html>

    <html class="light" lang="fr">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Ajouter une Visite - ASSAD</title>
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
            } 
            else {
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

                <div class="p-6 md:p-10 max-w-5xl mx-auto w-full flex flex-col gap-8">

                    <a href="../index.php" class="text-sm text-text-sec-light dark:text-text-sec-dark hover:text-primary transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        Retour à Mes Visites
                    </a>

                    <div class="flex flex-col gap-1 pb-4 border-b border-border-light dark:border-border-dark">
                        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight">Créer une Nouvelle Visite</h2>
                        <p class="text-text-sec-light dark:text-text-sec-dark text-lg">Planifiez et publiez une nouvelle expérience virtuelle pour les visiteurs.</p>
                    </div>


                    <form method="POST" action="add.php" enctype="multipart/form-data" class="flex flex-col gap-8 bg-white dark:bg-gray-800 rounded-xl border p-6 shadow-xl">

                        <div class="flex flex-col gap-5">
                            <h3 class="text-2xl font-bold text-green-600 border-b pb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined">description</span>
                                Détails de la Nouvelle Visite
                            </h3>

                            <div>
                                <label class="block text-sm font-medium mb-1">Titre de la Visite <span class="text-red-500">*</span></label>
                                <input type="text" name="titre" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 outline-none" placeholder="Ex: Safari Lions">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Langue <span class="text-red-500">*</span></label>
                                    <select name="langue" class="w-full px-4 py-2 border rounded-lg">
                                        <option value="Français">Français</option>
                                        <option value="Arabe">Arabe</option>
                                        <option value="Anglais">Anglais</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Prix (DH) <span class="text-red-500">*</span></label>
                                    <input type="number" step="0.01" name="prix" required class="w-full px-4 py-2 border rounded-lg" placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-5">
                            <h3 class="text-2xl font-bold text-green-600 border-b pb-2 flex items-center gap-2">
                                <span class="material-symbols-outlined">schedule</span>
                                Planning
                            </h3>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium mb-1">Date et Heure <span class="text-red-500">*</span></label>
                                    <input type="datetime-local" name="date_heure" required class="w-full px-4 py-2 border rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Durée (min)</label>
                                    <input type="number" name="duree" value="60" class="w-full px-4 py-2 border rounded-lg">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium mb-1">Capacité Maximale <span class="text-red-500">*</span></label>
                                <input type="number" name="capacite_max" value="20" required class="w-full px-4 py-2 border rounded-lg">
                            </div>
                        </div>
<div class="flex flex-col gap-5 mt-4">
    <h3 class="text-2xl font-bold text-teal-600 border-b pb-2 flex items-center gap-2">
        <span class="material-symbols-outlined">route</span>
        Étapes du Parcours 
    </h3>
    
    <div id="etapes-container" class="flex flex-col gap-4">
        <div class="etape-item p-4 border rounded-xl bg-gray-50 dark:bg-gray-700/30 flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <span class="font-bold text-sm text-teal-600">Étape 1</span>
            </div>
            <input type="text" name="etape_titre[]" placeholder="Titre de l'étape (ex: Enclos des Girafes)" class="w-full px-4 py-2 border rounded-lg">
            <textarea name="etape_desc[]" placeholder="Description de l'étape..." class="w-full px-4 py-2 border rounded-lg rows-2"></textarea>
        </div>
    </div>

    <button type="button" onclick="ajouterEtape()" class="flex items-center justify-center gap-2 py-2 border-2 border-dashed border-teal-500 text-teal-600 rounded-xl hover:bg-teal-50 transition">
        <span class="material-symbols-outlined">add</span>
        Ajouter une autre étape
    </button>
</div>


                        <div class="flex justify-end gap-4 pt-6 border-t">
                            <button type="button" data-bs-dismiss="modal" class="px-6 py-2 border rounded-lg font-bold hover:bg-gray-100 transition">Annuler</button>
                            <button type="submit" name="save_visite" class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-bold shadow-lg transition-transform hover:scale-105">
                                <span class="material-symbols-outlined text-[20px]">add_circle</span>
                                Créer la Visite
                            </button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
        <script>
let etapeCount = 1;
function ajouterEtape() {
    etapeCount++;
    const container = document.getElementById('etapes-container');
    const html = `
        <div class="etape-item p-4 border rounded-xl bg-gray-50 dark:bg-gray-700/30 flex flex-col gap-3 animate-slide-up">
            <div class="flex justify-between items-center">
                <span class="font-bold text-sm text-teal-600">Étape ${etapeCount}</span>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:text-red-700">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </div>
            <input type="text" name="etape_titre[]" placeholder="Titre de l'étape" class="w-full px-4 py-2 border rounded-lg">
            <textarea name="etape_desc[]" placeholder="Description de l'étape..." class="w-full px-4 py-2 border rounded-lg rows-2"></textarea>
        </div>`;
    container.insertAdjacentHTML('beforeend', html);
}
</script>
    </body>

    </html>