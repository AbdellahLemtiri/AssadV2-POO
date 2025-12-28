<?php

require_once "../OOP/visite.php";
require_once "../OOP/etape.php";
require_once  "../connexion/authinification.php";
checkRole("guide");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];
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
                    <button onclick="toggleAddModal(true)"
                        class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-2xl font-bold shadow-xl shadow-blue-200 transition-all transform hover:scale-105 active:scale-95">
                        <span class="material-symbols-outlined text-[24px]">add_circle</span>
                        <span>Créer une nouvelle visite</span>
                    </button>
                </div>

                <div class="flex flex-col gap-6">


                    <div class="grid grid-cols-1 gap-6">
                        <?php

                        $les_visites = Visite::getVisites();

                        if (count($les_visites) > 0) :
                            foreach ($les_visites as $visite) :

                                $statut = $visite->getStatutVisite();
                        ?>
                                <div class="group flex flex-col lg:flex-row gap-6 p-5 rounded-3xl bg-surface-light dark:bg-surface-dark border border-border-light dark:border-border-dark shadow-sm hover:shadow-xl transition-all duration-300 relative overflow-hidden">

                                    <?php if ($statut == 1): ?>
                                        <div class="h-56 lg:h-48 lg:w-64 rounded-2xl bg-slate-200 dark:bg-slate-800 bg-cover bg-center shrink-0 relative overflow-hidden">
                                            <div class="absolute top-3 left-3 flex items-center gap-1.5 px-3 py-1.5 bg-emerald-500 text-white text-[11px] font-black uppercase rounded-lg shadow-lg">
                                                <span class="material-symbols-outlined text-[14px]">check_circle</span> OUVERTE
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($statut == 0): ?>
                                        <div class="h-56 lg:h-48 lg:w-64 rounded-2xl bg-red-100 dark:bg-red-900/20 shrink-0 relative overflow-hidden flex items-center justify-center border border-red-200">
                                            <div class="absolute top-3 left-3 flex items-center gap-1.5 px-3 py-1.5 bg-red-600 text-white text-[11px] font-black uppercase rounded-lg shadow-lg">
                                                <span class="material-symbols-outlined text-[14px]">cancel</span> ANNULÉE
                                            </div>
                                            <span class="material-symbols-outlined text-red-300 text-5xl opacity-50">block</span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex flex-col justify-between flex-1 py-1">
                                        <div>
                                            <div class="flex justify-between items-start">
                                                <h4 class="text-2xl font-extrabold text-text-light dark:text-text-dark group-hover:text-primary transition-colors">
                                                    <?= ($visite->getTitreVisite()) ?>
                                                </h4>
                                                <span class="text-lg font-black text-primary"><?= number_format($visite->getPrixVisite(), 2) ?> DH</span>
                                            </div>

                                            <div class="flex flex-wrap items-center gap-x-6 gap-y-2 mt-4 text-sm font-medium text-slate-500">
                                                <div class="flex items-center gap-2">
                                                    <span class="material-symbols-outlined text-primary/70 text-[20px]">calendar_today</span>
                                                    <span><?= $visite->getDateheureViste()->format('d/m/Y H:i') ?></span>
                                                </div>
                                                <div class="flex items-center gap-2 border-l pl-6">
                                                    <span class="material-symbols-outlined text-primary/70 text-[20px]">schedule</span>
                                                    <span><?= $visite->getDureeVisite()->format('H:i') ?></span>
                                                </div>
                                                <div class="flex items-center gap-2 border-l pl-6">
                                                    <span class="material-symbols-outlined text-primary/70 text-[20px]">group</span>
                                                    <span><?= $visite->getCapaciteMaxVisite() ?> Pers. max</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap items-center justify-between gap-4 mt-6 pt-4 border-t border-border-light">
                                            <div class="flex gap-2">
                                                <a href="visite_details.php?id=<?= $visite->getIdVisite() ?>" class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-primary text-white text-xs font-bold hover:bg-primary-dark shadow-lg transition-all">
                                                    <span class="material-symbols-outlined text-[18px]">visibility</span> Détails
                                                </a>
                                                <?php

                                                $etapesObj = Etape::getEtapesByViste($visite->getIdVisite());


                                                $etapesFormatted = [];
                                                if ($etapesObj) {
                                                    foreach ($etapesObj as $e) {
                                                        $etapesFormatted[] = [
                                                            'id_etape' => $e->getIdEtape(),
                                                            'titre_etape' => $e->getTitreEtape(),
                                                            'description_etape' => $e->getDescriptionEtape()
                                                        ];
                                                    }
                                                }


                                                $etapesJson = htmlspecialchars(json_encode($etapesFormatted), ENT_QUOTES, 'UTF-8');
                                                ?>

                                                <button
                                                    onclick="openEditModal(this)"

                                                    data-id="<?= $visite->getIdVisite() ?>"
                                                    data-titre="<?= ($visite->getTitreVisite()) ?>"
                                                    data-prix="<?= $visite->getPrixVisite() ?>"
                                                    data-statut="<?= $visite->getStatutVisite() ?>"
                                                    data-date="<?= $visite->getDateheureViste()->format('Y-m-d\TH:i') ?>"
                                                    data-duree="<?= $visite->getDureeVisite()->format('i') ?>"
                                                    data-capacite="<?= $visite->getCapaciteMaxVisite() ?>"
                                                    data-langue="<?= ($visite->getLangueVisite()) ?>"
                                                    data-etapes='<?= $etapesJson ?>'
                                                    class="flex items-center gap-2 px-4 py-2.5 rounded-xl border text-xs font-bold hover:bg-slate-100 transition-colors">
                                                    <span class="material-symbols-outlined text-[18px]">edit</span> Modifier
                                                </button>
                                            </div>

                                            <a href="fx/delete.php?id=<?= $visite->getIdVisite() ?>" onclick="return confirm('Voulez-vous supprimer cette visite ?')" class="flex items-center gap-2 px-4 py-2.5 rounded-xl text-red-500 hover:bg-red-50 text-xs font-bold transition-colors">
                                                <span class="material-symbols-outlined text-[18px]">delete_sweep</span> Supprimer
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <div class="flex flex-col items-center justify-center p-20 bg-white rounded-[2rem] border-2 border-dashed border-slate-200 mt-4">
                                <div class="w-24 h-24 bg-primary/10 rounded-full flex items-center justify-center mb-6">
                                    <span class="material-symbols-outlined text-primary text-5xl">explore_off</span>
                                </div>
                                <h4 class="text-2xl font-bold mb-2">Aucune visite pour le moment</h4>
                                <p class="text-slate-500 text-center max-w-sm mb-8">Vous n'avez pas encore créé de visites guidées.</p>
                                <button onclick="openAddModal()" class="text-primary font-bold hover:underline flex items-center gap-2">
                                    Créer votre première session <span class="material-symbols-outlined">arrow_forward</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>
            <div id="updateModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm items-center justify-center z-50 p-4">
                <form method="POST" action="fx/update.php" class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">

                    <div class="p-6 border-b flex justify-between items-center bg-blue-600 text-white rounded-t-2xl">
                        <h3 class="text-xl font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined">edit_square</span> Modifier la Visite
                        </h3>
                        <button type="button" onclick="closeModal()" class="hover:rotate-90 transition-transform">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <div class="p-8 flex flex-col gap-8">
                        <input type="hidden" name="id" id="edit_id">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-1">
                                <label class="block text-sm font-bold mb-2">Titre de la Visite</label>
                                <input type="text" name="titre" id="edit_titre" class="w-full px-4 py-3 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50">
                            </div>
                            <div class="md:col-span-1">
                                <label class="block text-sm font-bold mb-2">Langue de la Visite</label>
                                <select name="langue" id="edit_langue" class="w-full px-4 py-3 border rounded-xl bg-gray-50">
                                    <option value="Français">Français</option>
                                    <option value="Arabe">Arabe</option>
                                    <option value="Anglais">Anglais</option>
                                    <option value="Espagnol">Espagnol</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Statut</label>
                                <select name="statut" id="edit_statut" class="w-full px-4 py-3 border rounded-xl bg-gray-50">
                                    <option value="1">Ouverte</option>
                                    <option value="0">Annulée</option>
                                    <option value="2">Terminée</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Prix (DH)</label>
                                <input type="number" step="0.01" name="prix" id="edit_prix" class="w-full px-4 py-3 border rounded-xl bg-gray-50">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold mb-2">Date et Heure</label>
                                <input type="datetime-local" name="date_heure" id="edit_date" class="w-full px-4 py-3 border rounded-xl bg-gray-50">
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Capacité Max</label>
                                <input type="number" name="capacite_max" id="edit_capacite" class="w-full px-4 py-3 border rounded-xl bg-gray-50">
                            </div>
                        </div>

                        <div class="border-t pt-6">
                            <h4 class="text-lg font-bold text-blue-600 mb-4 flex items-center gap-2">
                                <span class="material-symbols-outlined">route</span> Étapes du parcours
                            </h4>
                            <div id="edit-etapes-container" class="flex flex-col gap-4 mb-4">
                            </div>
                            <button type="button" onclick="ajouterEtapeRow()" class="w-full py-3 border-2 border-dashed border-blue-400 text-blue-600 rounded-xl font-bold hover:bg-blue-50 transition">
                                + Ajouter une étape
                            </button>
                        </div>
                    </div>

                    <div class="p-6 border-t bg-gray-50 flex justify-end gap-3 rounded-b-2xl">
                        <button type="button" onclick="closeModal()" class="px-8 py-3 font-bold text-gray-500">Annuler</button>
                        <button type="submit" name="update_visite" class="px-8 py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg hover:bg-blue-700 transition">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>

            </div>
            <div id="addVisiteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
                <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden flex flex-col">

                    <div class="p-6 border-b flex justify-between items-center bg-blue-600 text-white">
                        <h3 class="text-xl font-bold flex items-center gap-2">
                            <span class="material-symbols-outlined">add_location_alt</span> Nouvelle Visite
                        </h3>
                        <button onclick="toggleAddModal(false)" class="hover:rotate-90 transition-transform">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>

                    <form action="fx/add_visite.php" method="POST" class="p-8 overflow-y-auto flex-1">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold mb-2">Titre de la Visite</label>
                                <input type="text" name="titre" required class="w-full px-4 py-3 rounded-xl border bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Langue</label>
                                <select name="langue" class="w-full px-4 py-3 rounded-xl border bg-gray-50">
                                    <option value="Français">Français</option>
                                    <option value="Arabe">Arabe</option>
                                    <option value="Anglais">Anglais</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Prix (DH)</label>
                                <input type="number" name="prix" step="0.01" required class="w-full px-4 py-3 rounded-xl border bg-gray-50">
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Date et Heure</label>
                                <input type="datetime-local" name="date_heure" required class="w-full px-4 py-3 rounded-xl border bg-gray-50">
                            </div>
                            <div>
                                <label class="block text-sm font-bold mb-2">Capacité Max</label>
                                <input type="number" name="capacite_max" required class="w-full px-4 py-3 rounded-xl border bg-gray-50">
                            </div>
                        </div>

                        <div class="border-t pt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="font-bold text-blue-600 flex items-center gap-2">
                                    <span class="material-symbols-outlined">route</span> Étapes du parcours
                                </h4>
                                <button type="button" onclick="addNewEtapeInAdd()" class="text-sm bg-blue-50 text-blue-600 px-3 py-1 rounded-lg font-bold hover:bg-blue-100">+ Ajouter</button>
                            </div>
                            <div id="add-etapes-container" class="space-y-4">
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t flex justify-end gap-3">
                            <button type="button" onclick="toggleAddModal(false)" class="px-6 py-3 font-bold text-gray-400">Annuler</button>
                            <button type="submit" name="ajouter_visite" class="px-10 py-3 bg-blue-600 text-white rounded-xl font-bold shadow-lg hover:bg-blue-700 transition-all">
                                Enregistrer la Visite
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script>
        function openEditModal(btn) {
            // 1. جلب البيانات من الـ data attributes
            const id = btn.getAttribute('data-id');
            const titre = btn.getAttribute('data-titre');
            const prix = btn.getAttribute('data-prix');
            const statut = btn.getAttribute('data-statut');
            const date = btn.getAttribute('data-date');
            const capacite = btn.getAttribute('data-capacite');
            const etapes = JSON.parse(btn.getAttribute('data-etapes'));
            const langue = btn.getAttribute('data-langue');
            // 2. تعمير الخانات الأساسية
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_titre').value = titre;
            document.getElementById('edit_prix').value = prix;
            document.getElementById('edit_statut').value = statut;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_capacite').value = capacite;
            document.getElementById('edit_langue').value = langue;
            // 3. تعمير المراحل
            const container = document.getElementById('edit-etapes-container');
            container.innerHTML = ''; // تنظيف الحاوية

            etapes.forEach((etape, index) => {
                renderEtapeRow(etape.id, etape.titre, etape.desc, index + 1);
            });

            // إظهار الـ Modal
            const modal = document.getElementById('updateModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function renderEtapeRow(id, titre, desc, index) {
            const container = document.getElementById('edit-etapes-container');
            const html = `
        <div class="etape-item p-4 border rounded-xl bg-white shadow-sm flex flex-col gap-2">
            <div class="flex justify-between items-center">
                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-bold">Étape ${index}</span>
                <input type="hidden" name="etape_id[]" value="${id}">
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-500 hover:scale-110 transition">
                    <span class="material-symbols-outlined">delete</span>
                </button>
            </div>
            <input type="text" name="etape_titre[]" value="${titre}" placeholder="Titre" class="w-full px-3 py-2 border rounded-lg text-sm">
            <textarea name="etape_desc[]" placeholder="Description" class="w-full px-3 py-2 border rounded-lg text-sm h-20">${desc}</textarea>
        </div>
    `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function ajouterEtapeRow() {
            const count = document.querySelectorAll('.etape-item').length + 1;
            renderEtapeRow('new', '', '', count);
        }

        function closeModal() {
            document.getElementById('updateModal').classList.add('hidden');
            document.getElementById('updateModal').classList.remove('flex');
        }

        function toggleAddModal(show) {
            const modal = document.getElementById('addVisiteModal');
            if (show) {
                modal.classList.remove('hidden');
                // زيد مرحلة أولى أوتوماتيكيا فاش يفتح المودال
                if (document.getElementById('add-etapes-container').innerHTML.trim() === "") {
                    addNewEtapeInAdd();
                }
            } else {
                modal.classList.add('hidden');
            }
        }

        function addNewEtapeInAdd() {
            const container = document.getElementById('add-etapes-container');
            const count = container.children.length + 1;
            const html = `
        <div class="p-4 border rounded-xl bg-gray-50 relative animate-fade-in">
            <button type="button" onclick="this.parentElement.remove()" class="absolute top-2 right-2 text-red-400 hover:text-red-600">
                <span class="material-symbols-outlined text-sm">delete</span>
            </button>
            <p class="text-[10px] font-bold text-gray-400 mb-2 uppercase">Étape ${count}</p>
            <input type="text" name="etape_titre[]" placeholder="Titre de l'étape" class="w-full mb-2 p-2 border-b bg-transparent outline-none focus:border-blue-500 text-sm">
            <textarea name="etape_desc[]" placeholder="Description..." class="w-full p-2 bg-white rounded-lg border text-sm h-16"></textarea>
        </div>
    `;
            container.insertAdjacentHTML('beforeend', html);
        }
    </script>
</body>

</html>