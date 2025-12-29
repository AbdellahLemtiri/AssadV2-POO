<?php

require_once "../OOP/animaux.php";
require_once "../OOP/habitats.php";
require_once "../OOP/utilisateur.php";
require_once  "../connexion/authinification.php";
checkRole("visiteur");
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];
$searchTerm = $_POST['search'] ?? '';
$habitatId = $_POST['id_habitat'] ?? '';
$paysOrigin = $_POST['pays'] ?? '';
$animaux = Animal::getAnimaux($searchTerm, $habitatId, $paysOrigin);
$habitats = Habitat::getAllHabitats();
?>
<!DOCTYPE html>
<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Liste des Animaux - Zoo Virtuel ASSAD</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

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
        .status-badge-critical {
            background-color: #fef2f2;
            color: #ef4444;
            border: 1px solid #fecaca;
        }

        .status-badge-danger {
            background-color: #fefce8;
            color: #eab308;
            border: 1px solid #fde047;
        }

        .status-badge-vulnerable {
            background-color: #fffbeb;
            color: #f59e0b;
            border: 1px solid #fcd34d;
        }

        .status-badge-minor {
            background-color: #f0fdf4;
            color: #10b981;
            border: 1px solid #a7f3d0;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#1b140d] font-display min-h-screen flex flex-col">
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-[#f3ede7]">
        <div class="max-w-[1200px] mx-auto px-4 md:px-10 py-3">
            <div class="flex items-center justify-between whitespace-nowrap">
                <div class="flex items-center gap-4">
                    <div class="text-primary">
                        <span class="material-symbols-outlined text-4xl">pets</span>
                    </div>
                    <h2 class="text-[#1b140d] text-lg font-bold leading-tight tracking-[-0.015em]">
                        Zoo Virtuel ASSAD
                    </h2>
                </div>

                <div class="hidden lg:flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors" href="index.php">Accueil</a>
                        <a class="text-primary text-sm font-bold hover:text-primary transition-colors" href="animaux.php">Animaux</a>
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors" href="reservation.php">Réservation</a>
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors" href="#">CAN 2025</a>
                    </div>
                </div>

                <button class="lg:hidden text-[#1b140d]">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center">
        <div class="w-full max-w-[1200px] px-4 md:px-10 py-6">
            <div class="rounded-xl overflow-hidden relative min-h-[250px] flex flex-col justify-center items-center text-center p-8 bg-cover bg-center shadow-xl shadow-primary/10"
                style='background-image: linear-gradient(rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.7) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB7tV0MbXCZTrttbfuFt8CqKgYEiMryvuxkVWJ6WjvseE_KC2bRS8wOCXpRA4lgDfHgikgjgeCdHsMWdoTr4UFYTYVRoaXexOq-BoOXf5Yo4UcENg5bt1enOCEyrAifv40q_DFANZ1CKEoehRrYDWpLP4S40C7IO1NzrxJat8xe6LbEld6MWZxqsFZoxikvEa865GjFKpz8yY8X5kFjlAlJsm2eNUry4Us0zUZHNEz_wQNZStdhBmsEhv7mpEWzSrjunYXj4bxh4v0h");'>
                <h1 class="text-white text-4xl md:text-5xl font-black leading-tight tracking-tight mb-4 max-w-3xl drop-shadow-lg">
                    Découvrez tous nos Résidents Étoiles
                </h1>
                <p class="text-white/90 text-base md:text-lg font-medium max-w-2xl drop-shadow-md mb-8">
                    Explorez notre collection complète d'animaux, classés par habitat et statut de conservation.
                </p>
            </div>
        </div>

        <form action="animaux.php" method="POST"
            class="w-full max-w-[1200px] px-4 md:px-10 sticky top-[65px] z-40">

            <div class="bg-white/80 backdrop-blur-xl shadow-sm border border-[#f3ede7] rounded-xl p-4 mb-8">
                <div class="flex flex-col md:flex-row gap-4 justify-between items-center">


                    <div class="w-full md:w-1/3 relative group">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-gray-400 group-focus-within:text-primary transition-colors">
                                search
                            </span>
                        </span>
                        <input
                            name="search"
                            type="text"
                            placeholder="Rechercher (ex: Lion, Éléphant...)"
                            class="w-full pl-10 pr-4 py-2.5 bg-[#f8f7f6] border-none rounded-lg text-sm text-[#1b140d] placeholder-gray-500 focus:ring-2 focus:ring-primary focus:bg-white transition-all" />
                    </div>


                    <div class="flex gap-4 overflow-x-auto pb-2 md:pb-0 w-full md:w-2/3 scrollbar-hide">

                        <select name="id_habitat" class="px-4 py-2 bg-white border border-[#e5e5e5] hover:border-primary/50 hover:bg-primary/5 text-[#1b140d] rounded-lg text-sm font-medium whitespace-nowrap transition-all focus:ring-primary focus:border-primary w-full sm:w-1/3">
                            <option value="">Tous les habitats</option>
                            <?php

                            foreach ($habitats as $hab): ?>
                                <option value="<?= $hab->getIdHabitat() ?>"><?= $hab->getNomHabitat() ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select
                            name="pays"
                            class="px-4 py-2 bg-white border border-[#e5e5e5] hover:border-primary/50 hover:bg-primary/5 text-[#1b140d] rounded-lg text-sm font-medium whitespace-nowrap transition-all focus:ring-primary focus:border-primary w-full sm:w-1/3">
                            <option value="">Tous les pays </option>
                            <option value="Maroc">Maroc</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Afrique du Sud">Afrique du Sud</option>
                            <option value="Tanzanie">Tanzanie</option>
                            <option value="Égypte">Égypte</option>
                        </select>


                        <button
                            type="submit"
                            class="px-6 py-2.5 bg-primary text-white rounded-lg text-sm font-bold hover:bg-primary-dark transition-all shadow-sm hover:shadow-md whitespace-nowrap w-full sm:w-1/3">
                            Filtrer
                        </button>

                    </div>

                </div>
            </div>
        </form>



        <div class="w-full max-w-[1200px] px-4 md:px-10 mb-6 flex justify-between items-end">
            <div>
                <h2 class="text-[#1b140d] text-2xl font-bold leading-tight">Liste des Animaux</h2>
                <p class="text-gray-500 text-sm mt-1">Total: 12 animaux répertoriés</p>
            </div>
        </div>

        <div class="w-full max-w-[1200px] px-4 md:px-10 pb-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                <!-- Featured (index 0) -->
                <!-- <div class="group relative flex flex-col bg-white rounded-2xl border-2 border-primary overflow-hidden hover:shadow-xl transition-all duration-300 col-span-1 sm:col-span-2 lg:col-span-2">
                     <div class="absolute top-4 left-4 z-10">
                         <span class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-primary text-white text-xs font-bold shadow-lg">
                             <span class="material-symbols-outlined text-[16px]">stars</span>
                             Carnivore
                         </span>
                     </div>

                     <a href="animal_detail.php?id=1" class="h-64 md:h-full w-full overflow-hidden relative">
                         <img alt="Asaad - Lion de l'Atlas"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                             src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?auto=format&fit=crop&w=1200&q=80" />
                         <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                         <div class="absolute bottom-4 left-4 text-white">
                             <h3 class="text-2xl font-bold">Asaad</h3>
                             <p class="text-white/80 text-sm">Lion de l’Atlas</p>
                         </div>
                     </a>

                     <div class="p-4 flex justify-between items-center bg-primary/5 border-t border-primary/10">
                         <div class="flex items-center gap-2 text-sm font-medium text-[#1b140d]">
                             <span class="w-5 h-5 rounded-full overflow-hidden flex items-center justify-center bg-gray-200 text-xs">🇲🇦</span>
                             Maroc
                         </div>
                         <a href="animal_detail.php?id=1" class="text-primary text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                             En savoir plus
                             <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                         </a>
                     </div>
                 </div> -->

                <?php foreach ($animaux as $anm):
                ?>

                    <div class="group flex flex-col bg-white rounded-2xl border border-[#f3ede7] overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <a href="animal_detail.php?id=2" class="h-48 overflow-hidden relative">
                            <img alt="Éléphant d'Afrique"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                src="<?= $anm->getImageUrl() ?>" />

                        </a>
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="text-lg font-bold text-[#1b140d]"><?= $anm->getNomAnimal() ?></h3>
                                    <p class="text-xs text-gray-500 italic"><?= $anm->getEspeceAnimal() ?></p>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <span class="inline-flex items-center px-2 py-1 rounded bg-[#f8f7f6] text-xs font-medium text-gray-600">
                                    <?= $anm->getNomHabitat() ?>
                                </span>
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium status-badge-danger">
                                    <?= $anm->getTypeAlimentation() ?>
                                </span>
                            </div>
                            <div class="mt-auto pt-4 flex items-center justify-between border-t border-gray-100">
                                <div class="flex items-center gap-1.5 text-xs font-medium text-gray-600">
                                    <span class="material-symbols-outlined text-[16px] text-gray-400">location_on</span>
                                    <?= $anm->getPaysOrigine() ?>
                                </div>
                                <a href="animal_detail.php" class="text-primary text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Détails
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>


        </div>
    </main>

    <footer class="bg-[#1b140d] text-white pt-16 pb-8 mt-auto">
        <div class="max-w-[1200px] mx-auto px-4 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">

                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="text-primary">
                            <span class="material-symbols-outlined text-4xl">pets</span>
                        </div>
                        <span class="font-bold text-xl">ASSAD Zoo</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        Le premier zoo virtuel dédié à la faune africaine. Soutenez la conservation et célébrez la CAN 2025 avec nous.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-white">Explorer</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="animaux.php">Nos Animaux</a></li>
                        <li><a class="hover:text-primary transition-colors" href="reservation.php">Réservation Visites</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Programme Éducatif</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-white">CAN 2025</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a class="hover:text-primary transition-colors" href="#">Billetterie</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Fan Zone Virtuelle</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Partenaires</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-white">Newsletter</h4>
                    <p class="text-gray-400 text-sm mb-4">Restez informé des naissances et des matchs.</p>
                    <div class="flex gap-2">
                        <input
                            class="bg-white/10 border-none rounded-lg text-sm text-white px-3 py-2 w-full focus:ring-1 focus:ring-primary"
                            placeholder="Votre email" type="email" />
                        <button class="bg-primary hover:bg-orange-600 text-white rounded-lg px-3 py-2 transition-colors">
                            <span class="material-symbols-outlined text-sm">send</span>
                        </button>
                    </div>
                </div>

            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-xs">© 2025 Zoo Virtuel ASSAD. Tous droits réservés.</p>
                <div class="flex gap-6 text-gray-500 text-xs">
                    <a class="hover:text-white transition-colors" href="#">Confidentialité</a>
                    <a class="hover:text-white transition-colors" href="#">Conditions</a>
                    <a class="hover:text-white transition-colors" href="#">Cookies</a>
                </div>
            </div>

        </div>
    </footer>

</body>

</html>