<?php
require_once "../OOP/visite.php";
require_once "../OOP/reservation.php";
require_once "../OOP/utilisateur.php";
require_once  "../connexion/authinification.php";
checkRole("visiteur");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $obj = new visite();
    $visite = $obj->getVisite($id);
}


?>
<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Détails : <?= ($tour['title']) ?> - ASSAD</title>
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

        
        <main class="flex-1 flex flex-col h-full overflow-y-auto overflow-x-hidden bg-background-light dark:bg-background-dark">
            <div class="p-6 md:p-10 max-w-7xl mx-auto w-full flex flex-col gap-8">

                <a href="reservation.php" class="text-sm text-text-sec-light dark:text-text-sec-dark hover:text-primary transition-colors flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Retour à les Visites
                </a>

                <div class="flex flex-wrap justify-between items-start gap-4 pb-4 border-b border-border-light dark:border-border-dark">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-text-light dark:text-text-dark"><?= $visite->getTitreVisite() ?></h2>
                        <p class="text-text-secondary-light dark:text-text-secondary-dark text-lg">Détails et gestion de la Visite id = <?= $visite->getIdVisite() ?></p>
                    </div>


                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <div class="lg:col-span-1 flex flex-col gap-6">
                        <div class="h-60 rounded-2xl bg-slate-200 dark:bg-surface-dark bg-cover bg-center relative shadow-md border border-border-light dark:border-border-dark overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="m-3 absolute top-0 left-0 inline-flex px-3 py-1 bg-primary text-white text-xs font-bold rounded-full items-center gap-1 shadow-lg">
                                <span class="material-symbols-outlined text-[14px]">stars</span>
                                <?= $visite->getStatutVisite() ? 1 : 'ouverte'  ?>
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
                                    <span class="text-sm font-semibold">
                                        <?= $visite->getDateheureViste()->format('d/m/Y H:i') ?>
                                    </span>
                                </li>
                                <li class="flex flex-col gap-1">
                                    <span class="text-xs text-text-secondary-light dark:text-text-secondary-dark font-bold uppercase tracking-wider">Durée & Langue</span>
                                    <span class="text-sm font-semibold">
                                        <?= $visite->getDureeVisite()->format('i') . " min | " . htmlspecialchars($visite->getLangueVisite()) ?>
                                    </span>
                                </li>
                                <li class="flex flex-col gap-1">
                                    <span class="text-xs text-text-secondary-light dark:text-text-secondary-dark font-bold uppercase tracking-wider">Prix de la séance</span>
                                    <span class="text-sm font-bold text-accent"><?= $visite->getPrixVisite() . " dh" ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="grid grid-cols-3 gap-4">

                            <div class="bg-surface-light dark:bg-surface-dark p-4 rounded-2xl border border-border-light dark:border-border-dark text-center">
                                <p class="text-2xl font-black text-accent"><?= $visite->getCapaciteMaxVisite() ?></p>
                                <p class="text-[10px] uppercase font-bold opacity-60">Capacité Max</p>
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
                                            <?php
                                            $resManager = new Reservation();
                                            $les_utl = $resManager->getallUtlisateurVisite($visite->getIdVisite());
                                            if (!is_array($les_utl)) {
                                                $les_utl = [];
                                            }
                                            ?>

                                            <?php if (!empty($les_utl)): ?>
                                                <?php foreach ($les_utl as $utl): ?>
                                        <tr class="hover:bg-primary/5 transition-colors">
                                            <td class="px-6 py-4">
                                                <div class="text-sm font-bold"><?= $utl->getNomUtilisateur() ?></div>
                                                <div class="text-xs opacity-60"></div><?= $utl->getEmail() ?>
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="bg-primary/10 text-primary px-2 py-1 rounded-md text-xs font-bold"><?= $utl->getNombrePersonnes() ?></span>
                                            </td>
                                            <td class="px-6 py-4 text-right">

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3" class="text-center p-4">Aucun participant pour cette visite.</td>
                                    </tr>
                                <?php endif; ?>
                                </tr>
                                    </thead>
                                    <tbody class="divide-y divide-border-light dark:divide-border-dark">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                                    <tbody class="divide-y divide-border-light dark:divide-border-dark">


                                        <div class="bg-surface-light dark:bg-surface-dark rounded-2xl border border-border-light dark:border-border-dark p-6">
                                            <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                                                <span class="material-symbols-outlined text-primary">format_list_numbered</span>
                                                Étapes de la Visite
                                            </h3>
                                            <?php
                                            require_once "../OOP/etape.php";
                                            $les_etapes = (new Etape())->getEtapesByViste($visite->getIdVisite());

                                            ?>
                                            <?php foreach ($les_etapes as $etp) : ?>
                                                <div class="space-y-4 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 before:to-transparent">
                                                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                                        <div class="flex items-center justify-center w-10 h-10 rounded-full border border-white bg-slate-100 dark:bg-surface-dark text-slate-500 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2">
                                                            <?= $etp->getOrdreEtape() ?>
                                                        </div>
                                                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-surface-dark shadow-sm">
                                                            <div class="font-bold text-primary"><?= $etp->getTitreEtape() ?></div>
                                                            <div class="text-xs opacity-70"><?= $etp->getDescriptionEtape() ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                            </div>
                        </div>


                    </div>
        </main>
    </div>

    <script>
        document.getElementById('copy-link-btn').addEventListener('click', function() {
            const link = this.getAttribute('data-link');
            navigator.clipboard.writeText(link).then(() => {
                alert('Lien copié dans le presse-papiers !');
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