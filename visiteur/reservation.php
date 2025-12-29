<?php
require_once "../OOP/visite.php";
require_once "../OOP/utilisateur.php";
require_once "../OOP/reservation.php";
require_once  "../connexion/authinification.php";
checkRole("visiteur");
if (isset($_GET['search'])) {
    $ser = $_GET['search'];
    $array_visites = Visite::getVisites($ser);
} 

else {
    $ser = "";
    $array_visites = Visite::getVisites($ser);
}

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $obj = new visite();
    $visite = $obj->getVisite($id);
}
$id_utilisateur = $_SESSION['id_utilisateur'];
$nom_utilisateur =  $_SESSION['nom_utilisateur'];
$role_utilisateur =  $_SESSION['role_utilisateur'];
$reser = (new Reservation);

?>
<!DOCTYPE html>

<html class="light" lang="fr">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Réservation Visites - Zoo Virtuel ASSAD</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
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
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
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
                    <h2 class="text-[#1b140d] text-lg font-bold leading-tight tracking-[-0.015em]">Zoo Virtuel ASSAD
                    </h2>
                </div>
                <div class="hidden lg:flex flex-1 justify-end gap-8">
                    <div class="flex items-center gap-9">
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors"
                            href="index.php">Accueil</a>
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors"
                            href="animaux.php">Animaux</a>
                        <a class="text-primary text-sm font-bold hover:text-primary transition-colors"
                            href="reservation.php">Réservation</a>
                        <a class="text-[#1b140d] text-sm font-medium hover:text-primary transition-colors"
                            href="#">CAN 2025</a>
                    </div>

                </div>
                <button class="lg:hidden text-[#1b140d]">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </header>
    <div class="max-w-xl mx-auto my-10 px-4">
        <form method="GET" action="" class="flex items-center gap-2">
            <div class="relative flex-grow">
                <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                    <span class="material-symbols-outlined text-[20px]">search</span>
                </span>
                <input type="text"
                    name="search"
                    placeholder="Trouver une visite..."
                    class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-transparent rounded-xl focus:bg-white focus:border-primary focus:ring-4 focus:ring-primary/5 transition-all outline-none text-gray-700 shadow-sm">
            </div>

            <button type="submit"
                class="bg-primary hover:bg-orange-600 text-white p-3 rounded-xl transition-all shadow-md active:scale-95 flex items-center justify-center">
                <span class="material-symbols-outlined">arrow_forward</span>
            </button>
        </form>
    </div>
    <?php foreach ($array_visites as $visit) :
        $date_visite = $visit->getDateheureViste()->getTimestamp();
        $maintenant = time();
        $places_restantes = (int)$visit->getCapaciteMaxVisite();
        $is_full = $places_restantes - (int)$reser->getNumbreVisiteur($visit->getIdVisite());

    ?>


        <div class="flex flex-col sm:flex-row gap-4 p-4 rounded-2xl bg-white border border-[#f3ede7] shadow-md hover:shadow-lg transition-all <?= $is_full ? 'opacity-75 grayscale' : '' ?>">

            <div class="h-48 sm:h-auto sm:w-48 rounded-xl bg-cover bg-center shrink-0 relative bg-primary/10 flex items-center justify-center">
                <span class="material-symbols-outlined text-4xl text-primary/30">map</span>

                <?php if ($date_visite <= $maintenant && $date_visite > ($maintenant - 3600)) : ?>
                    <div class="m-2 absolute top-0 left-0 inline-flex px-2 py-1 bg-green-500 text-white text-xs font-bold rounded-lg items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span> En direct
                    </div>
                <?php elseif ($date_visite > $maintenant) : ?>
                    <div class="m-2 absolute top-0 left-0 inline-flex px-2 py-1 bg-blue-600 text-white text-xs font-bold rounded-lg items-center gap-1">
                        <span class="material-symbols-outlined text-[14px]">schedule</span> Programmé
                    </div>
                <?php endif; ?>
            </div>

            <div class="flex flex-col justify-between flex-1 gap-4">
                <div>
                    <h4 class="text-xl font-bold mb-1 text-[#1b140d]">
                        <?= ($visit->getTitreVisite()) ?>
                    </h4>

                    <div class="flex flex-wrap items-center gap-4 mt-2 text-sm text-gray-500">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-primary text-[18px]">calendar_month</span>
                            <span><?= $visit->getDateheureViste()->format('d M Y, H:i') ?></span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-primary text-[18px]">group</span>
                            <span class="<?= $is_full ? 'text-red-500 font-bold' : '' ?>">
                                <?= $is_full ? 'Complet' : $places_restantes . ' places dispo.' ?>
                            </span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-primary text-[18px]">payments</span>
                            <span class="font-bold text-green-600">
                                <?= $visit->getPrixVisite() . '.00' ?> DH
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 mt-auto pt-2 border-t border-gray-100">
                    <a href="visite_details.php?id=<?= $visit->getIdVisite() ?>" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200 transition-colors">
                        <span class="material-symbols-outlined text-[18px]">visibility</span> Détails
                    </a>

                    <?php if ($date_visite < $maintenant) : ?>
                        <button onclick="openReviewModal(<?= $visit->getIdVisite() ?>, '<?= addslashes($visit->getTitreVisite()) ?>')"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-amber-500 text-white text-sm font-semibold hover:bg-amber-600 transition-colors">
                            <span class="material-symbols-outlined text-[18px]">chat</span> Donner avis
                        </button>
                    <?php else : ?>
                        <button onclick="openBookingModal(<?= $visit->getIdVisite() ?>, '<?= addslashes($visit->getTitreVisite()) ?>', <?= $places_restantes ?>)"
                            <?= $is_full ? 'disabled' : '' ?>
                            class="flex items-center gap-2 px-4 py-2 rounded-lg <?= $is_full ? 'bg-gray-300 cursor-not-allowed' : 'bg-primary hover:bg-orange-600' ?> text-white text-sm font-semibold transition-colors">
                            <span class="material-symbols-outlined text-[18px]">confirmation_number</span>
                            <?= $is_full ? 'Complet' : 'Réserver' ?>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div style="height: 10px;"></div>
    <?php endforeach; ?>
    <div id="bookingModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity duration-300">
        <div class="bg-white dark:bg-zinc-900 rounded-3xl max-w-md w-full p-8 shadow-2xl transform transition-all scale-95 opacity-0" id="modalContent">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 id="modalTitle" class="text-2xl font-bold text-gray-900 dark:text-white">Réserver</h3>
                    <p id="modalSubTitle" class="text-gray-500 text-sm mt-1"></p>
                </div>
                <button onclick="closeBookingModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="validation.php" method="POST" class="space-y-6">
                <input type="hidden" name="id_visite" id="modalVisiteId">
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700">Nombre de participants</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">group</span>
                        <input type="number" name="nb_personnes" min="1" value="1" id="modalInputNb" required
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary outline-none transition-all font-semibold text-lg">
                    </div>
                    <p id="placesInfo" class="text-xs text-primary font-medium italic"></p>
                </div>
                <div class="flex gap-3">
                    <button type="button" onclick="closeBookingModal()" class="flex-1 py-3.5 bg-gray-100 text-gray-600 font-bold rounded-xl hover:bg-gray-200">Annuler</button>
                    <button type="submit" class="flex-1 py-3.5 bg-primary text-white font-bold rounded-xl hover:bg-orange-600 shadow-lg">Confirmer</button>
                </div>
            </form>
        </div>
    </div>
    <div id="reviewModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl">
            <div class="flex justify-between items-start mb-6">
                <h3 id="reviewTitle" class="text-2xl font-bold text-gray-900">Donner votre avis</h3>
                <button onclick="closeReviewModal()" class="text-gray-400 hover:text-gray-600">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form action="save_review.php" method="POST" class="space-y-4">
                <input type="hidden" name="id_visite" id="reviewVisiteId">

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Note (sur 5)</label>
                    <select name="note" class="w-full p-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-amber-500">
                        <option value="5">⭐⭐⭐⭐⭐ (Excellent)</option>
                        <option value="4">⭐⭐⭐⭐ (Très bien)</option>
                        <option value="3">⭐⭐⭐ (Bien)</option>
                        <option value="2">⭐⭐ (Moyen)</option>
                        <option value="1">⭐ (Mauvais)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Votre commentaire</label>
                    <textarea name="commentaire" rows="4" required
                        class="w-full p-3 rounded-xl border border-gray-200 outline-none focus:ring-2 focus:ring-amber-500"
                        placeholder="Qu'avez-vous pensé de la visite ?"></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeReviewModal()" class="flex-1 py-3 bg-gray-100 text-gray-600 font-bold rounded-xl">Annuler</button>
                    <button type="submit" class="flex-1 py-3 bg-amber-500 text-white font-bold rounded-xl hover:bg-amber-600 shadow-lg">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
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

    <script>
        function openReviewModal(id, titre) {
            document.getElementById('reviewVisiteId').value = id;
            document.getElementById('reviewTitle').innerText = "Avis : " + titre;
            document.getElementById('reviewModal').classList.remove('hidden');
        }

        function closeReviewModal() {
            document.getElementById('reviewModal').classList.add('hidden');
        }

        function openBookingModal(id, titre, maxPlaces) {
            const modal = document.getElementById('bookingModal');
            const content = document.getElementById('modalContent');

            document.getElementById('modalVisiteId').value = id;
            document.getElementById('modalTitle').innerText = titre;
            document.getElementById('modalInputNb').max = maxPlaces;
            document.getElementById('placesInfo').innerText = `Il reste ${maxPlaces} places disponibles pour cette session.`;

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('opacity-100');
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeBookingModal() {
            const modal = document.getElementById('bookingModal');
            const content = document.getElementById('modalContent');

            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
        }

        window.onclick = function(event) {
            const modal = document.getElementById('bookingModal');
            if (event.target == modal) {
                closeBookingModal();
            }
        }

        function openReviewModal(id, titre) {
            const modal = document.getElementById('reviewModal');
            document.getElementById('reviewVisiteId').value = id;
            document.getElementById('reviewTitle').innerText = "Avis : " + titre;


            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeReviewModal() {
            const modal = document.getElementById('reviewModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>
</body>

</html>