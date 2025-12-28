<?php

require_once "../../Fonctionalite_php/auth_check.php";

require_once "connect.php";
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if ($id) {
        $sql = "SELECT * FROM visites_guidees WHERE id = $id";
        $res = $connect->query($sql);
        if ($res && $res->num_rows > 0) {
            $visite = $res->fetch_assoc();
       
$sql_etapes = "SELECT * FROM etapes_visite WHERE id_visite = $id ORDER BY ordre_etape ASC";
$res_etapes = $connect->query($sql_etapes);
$etapes = [];
if ($res_etapes) {
    while($row = $res_etapes->fetch_assoc()) {
        $etapes[] = $row;
    }
}
        } else {
            die("Visite introuvable !");
        }

    } else {
        echo ("ID manquant !");
    }
}

?>
<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Éditer : <?= htmlspecialchars($tour['title']) ?> - ASSAD</title>
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
            <div></div>
            <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark shadow-sm">
                <div class="bg-center bg-cover rounded-full h-10 w-10 border-2 border-primary" data-alt="Portrait du guide" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB6SweDCChTHrnzUi3ijD-HqKt7FximPeaVPRuHptoZB3gCiNIREev191XH6lCU2g9dWO-0nb19loXauXqO29KxIYeVB8L_qXV7j_z9ew9PCkxmtTGzyhArcCoyjioHHD9oWPKFoA4SKfrqRSRlWptyCfastPtNkgSlFizXCwA60Izfk-CrC13bruBTAOjH610XOUvFB1RnfkoM-IeFW7fkvzAujenUwRWp02gjgWiOhb4zpbuGErPegntLM0188b1Dkbt6DnzndgR5");'></div>
                <div class="flex flex-col overflow-hidden">
                    <p class="text-sm font-bold truncate"><?= $nom_utilisateur ?></p>
                    <p class="text-text-sec-light dark:text-text-sec-dark text-xs truncate">Guide <?= htmlspecialchars($role_utilisateur) ?></p>
                </div>
            </div>
        </aside>
        <main class="flex-1 flex flex-col h-full overflow-y-auto overflow-x-hidden">
            <div class="lg:hidden flex items-center justify-between p-4 border-b border-border-light dark:border-border-dark bg-surface-light dark:bg-surface-dark sticky top-0 z-20">
                <span class="material-symbols-outlined text-primary">pets</span>
                <span class="material-symbols-outlined text-text-main-light dark:text-text-main-dark">menu</span>
            </div>

            <div class="p-6 md:p-10 max-w-5xl mx-auto w-full flex flex-col gap-8">





                <form method="POST" action="modifiervisite.php" enctype="multipart/form-data"
                    class="flex flex-col gap-8 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 shadow-xl p-6 md:p-8 max-w-4xl mx-auto mt-10">

                    <input type="hidden" name="id" value="<?= $visite['id'] ?>">

                    <div class="flex flex-col gap-5">
                        <h3 class="text-2xl font-bold text-blue-600 border-b border-gray-100 dark:border-gray-700 pb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined">edit_note</span>
                            Détails de la Modification
                        </h3>

                        <div>
                            <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Titre de la Visite <span class="text-red-500">*</span></label>
                            <input type="text" name="titre" value="<?= htmlspecialchars($visite['titre']) ?>" required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-transparent"
                                placeholder="Ex: Safari Lions">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Statut de la Visite <span class="text-red-500">*</span></label>
                                <select name="statut" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-transparent">
                                    <option value="ouverte" <?= $visite['statut'] == 'ouverte' ? 'selected' : '' ?>>Ouverte</option>
                                    <option value="annulee" <?= $visite['statut'] == 'annulee' ? 'selected' : '' ?>>Annulée</option>
                                    <option value="terminee" <?= $visite['statut'] == 'terminee' ? 'selected' : '' ?>>Terminée</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Prix (DH) <span class="text-red-500">*</span></label>
                                <input type="number" step="0.01" name="prix" value="<?= $visite['prix'] ?>" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-transparent">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5">
                        <h3 class="text-2xl font-bold text-blue-600 border-b border-gray-100 dark:border-gray-700 pb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined">schedule</span>
                            Planning et Logistique
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Date et Heure <span class="text-red-500">*</span></label>
                                <input type="datetime-local" name="date_heure"
                                    value="<?= date('Y-m-d\TH:i', strtotime($visite['date_heure'])) ?>" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Durée (min)</label>
                                <input type="number" name="duree" value="<?= $visite['duree'] ?>"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-transparent">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">Capacité Maximale <span class="text-red-500">*</span></label>
                            <input type="number" name="capacite_max" value="<?= $visite['capacite_max'] ?>" required
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-transparent">
                        </div>
                    </div>
<div class="flex flex-col gap-5 mt-6">
    <h3 class="text-2xl font-bold text-blue-600 border-b pb-2 flex items-center gap-2">
        <span class="material-symbols-outlined">route</span>
        Modifier les Étapes du Parcours
    </h3>
    
    <div id="etapes-container" class="flex flex-col gap-4">
        <?php foreach ($etapes as $index => $etape): ?>
        <div class="etape-item p-4 border rounded-xl bg-gray-50 dark:bg-gray-700/30 flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <span class="font-bold text-sm text-blue-600">Étape <?= $index + 1 ?></span>
                <input type="hidden" name="etape_id[]" value="<?= $etape['id_etape'] ?>">
            </div>
            <input type="text" name="etape_titre[]" value="<?= htmlspecialchars($etape['titre_etape']) ?>" class="w-full px-4 py-2 border rounded-lg bg-transparent">
            <textarea name="etape_desc[]" class="w-full px-4 py-2 border rounded-lg bg-transparent"><?= htmlspecialchars($etape['description_etape']) ?></textarea>
        </div>
        <?php endforeach; ?>
    </div>

    <button type="button" onclick="ajouterEtape()" class="flex items-center justify-center gap-2 py-2 border-2 border-dashed border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 transition">
        <span class="material-symbols-outlined">add</span>
        Ajouter 
    </button>
</div>


                    <div class="flex justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
                        <a href="mes_visites.php" class="px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg font-bold text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition flex items-center gap-2">
                            <span class="material-symbols-outlined text-[20px]">cancel</span>
                            Annuler
                        </a>
                        <button type="submit" name="update_visite"
                            class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-bold shadow-lg shadow-blue-200 dark:shadow-none transition-transform hover:scale-105">
                            <span class="material-symbols-outlined text-[20px]">save</span>
                            Mettre à jour
                        </button>
                    </div>
                </form>

            </div>
        </main>
    </div>
    <script>
function ajouterEtape() {
    const container = document.getElementById('etapes-container');
    const count = container.querySelectorAll('.etape-item').length + 1;
    const html = `
        <div class="etape-item p-4 border rounded-xl bg-blue-50/30 flex flex-col gap-3 animate-slide-up">
            <div class="flex justify-between items-center">
                <span class="font-bold text-sm text-blue-600">Nouvelle Étape</span>
                <input type="hidden" name="etape_id[]" value="new">
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500"><span class="material-symbols-outlined">delete</span></button>
            </div>
            <input type="text" name="etape_titre[]" placeholder="Titre" class="w-full px-4 py-2 border rounded-lg bg-transparent">
            <textarea name="etape_desc[]" placeholder="Description" class="w-full px-4 py-2 border rounded-lg bg-transparent"></textarea>
        </div>`;
    container.insertAdjacentHTML('beforeend', html);
}
</script>
</body>

</html>