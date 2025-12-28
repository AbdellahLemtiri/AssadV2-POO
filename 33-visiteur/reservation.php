 <?php

//  v.statut = 'ouverte'

include "../Fonctionalite_php/connect.php";
$sql_guides = "SELECT id, nom FROM utilisateurs WHERE role = 'guide' AND approuve = 1";
$res_guides = $connect->query($sql_guides);
$array_guides = $res_guides->fetch_all(MYSQLI_ASSOC);

$where_clause = "WHERE 1=1"; 

$sql_visites = "SELECT v.*, 
                (v.capacite_max - COALESCE(SUM(r.nb_personnes), 0)) AS places_restantes
                FROM visites_guidees v
                LEFT JOIN reservations r ON v.id = r.id_visite
                $where_clause
                GROUP BY v.id
                ORDER BY v.date_heure DESC";

$res_visites = $connect->query($sql_visites);
$array_visites = $res_visites->fetch_all(MYSQLI_ASSOC);
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

 <?php foreach ($array_visites as $visit) : 
    $date_visite = strtotime($visit['date_heure']); 
    $maintenant = time();
    $places_restantes = $visit['places_restantes'];
    $is_full = $places_restantes <= 0;
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
                <h4 class="text-xl font-bold mb-1 text-[#1b140d]"><?=  ($visit['titre']) ?></h4>
                <div class="flex flex-wrap items-center gap-4 mt-2 text-sm text-gray-500">
                    <div class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-primary text-[18px]">calendar_month</span>
                        <span><?= date('d M Y, H:i', $date_visite) ?></span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-primary text-[18px]">group</span>
                        <span class="<?= $is_full ? 'text-red-500' : '' ?>">
                            <?= $is_full ? 'Complet' : $places_restantes . ' places dispo.' ?>
                        </span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="material-symbols-outlined text-primary text-[18px]">payments</span>
                        <span class="font-bold text-green-600"><?= number_format($visit['prix'], 2) ?> DH</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap gap-3 mt-auto pt-2 border-t border-gray-100">
                <a href="visite_details.php?id=<?= $visit['id'] ?>" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200 transition-colors">
                    <span class="material-symbols-outlined text-[18px]">visibility</span> Détails
                </a>

           
        <div class="flex flex-wrap gap-3 mt-auto pt-2 border-t border-gray-100">
    <a href="visite_details.php?id=<?= $visit['id'] ?>" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-semibold hover:bg-gray-200 transition-colors">
        <span class="material-symbols-outlined text-[18px]">visibility</span> Détails
    </a>

    <?php if ($date_visite < $maintenant) :?>
        <button onclick="openReviewModal(<?= $visit['id'] ?>, '<?= addslashes($visit['titre']) ?>')" 
                class="flex items-center gap-2 px-4 py-2 rounded-lg bg-amber-500 text-white text-sm font-semibold hover:bg-amber-600 transition-colors">
            <span class="material-symbols-outlined text-[18px]">chat</span> Donner avis
        </button>
    <?php else : ?>
        <button onclick="openBookingModal(<?= $visit['id'] ?>, '<?= addslashes($visit['titre']) ?>', <?= $places_restantes ?>)" 
                class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-semibold hover:bg-orange-600 transition-colors">
            <span class="material-symbols-outlined text-[18px]">confirmation_number</span> Réserver
        </button>
    <?php endif; ?>
</div>
             
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div id="bookingModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4 transition-opacity duration-300">
    
    <div class="bg-white dark:bg-zinc-900 rounded-3xl max-w-md w-full p-8 shadow-2xl transform transition-all scale-95 opacity-0" id="modalContent">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h3 id="modalTitle" class="text-2xl font-bold text-gray-900 dark:text-white">Réserver votre place</h3>
                <p id="modalSubTitle" class="text-gray-500 text-sm mt-1"></p>
            </div>
            <button onclick="closeBookingModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-white transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <form action="validation.php" method="POST" class="space-y-6">
            <input type="hidden" name="id_visite" id="modalVisiteId">
            
            <div class="space-y-2">
                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                    Nombre de participants
                </label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">group</span>
                    <input type="number" name="nb_personnes" min="1" value="1" id="modalInputNb"
                           class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 dark:border-zinc-700 dark:bg-zinc-800 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all font-semibold text-lg">
                </div>
                <p id="placesInfo" class="text-xs text-primary font-medium italic"></p>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" onclick="closeBookingModal()" 
                        class="flex-1 py-3.5 bg-gray-100 dark:bg-zinc-800 text-gray-600 dark:text-gray-300 font-bold rounded-xl hover:bg-gray-200 dark:hover:bg-zinc-700 transition-colors">
                    Annuler
                </button>
                <button type="submit" 
                        class="flex-1 py-3.5 bg-primary text-white font-bold rounded-xl hover:bg-orange-600 shadow-lg shadow-primary/30 transition-all active:scale-95">
                    Confirmer
                </button>
            </div>
        </form>
    </div>
</div>
<div id="reviewModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-md w-full p-8 shadow-2xl">
        <div class="flex justify-between items-start mb-6">
            <h3 id="reviewTitle" class="text-2xl font-bold text-gray-900">Donner votre avis</h3>
            <button onclick="closeReviewModal()" class="text-gray-400 hover:text-gray-600"><span class="material-symbols-outlined">close</span></button>
        </div>
        <form action="save_review.php" method="POST" class="space-y-4">
            <input type="hidden" name="id_visite" id="reviewVisiteId">
            <div>
                <label class="block text-sm font-bold mb-2">Note (sur 5)</label>
                <input type="number" name="note" min="1" max="5" value="5" class="w-full rounded-xl border-gray-200 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-bold mb-2">Commentaire</label>
                <textarea name="commentaire" rows="3" class="w-full rounded-xl border-gray-200 focus:ring-primary" placeholder="Qu'avez-vous pensé de cette visite ?"></textarea>
            </div>
            <button type="submit" class="w-full py-3.5 bg-amber-500 text-white font-bold rounded-xl hover:bg-amber-600">Envoyer l'avis</button>
        </form>
    </div>
</div>
<div style="height: 200px;"></div>

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
</script>
 </body>

 </html>