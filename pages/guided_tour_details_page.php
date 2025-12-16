<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Guided Tour Details</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#36e27b",
                        "background-light": "#f6f8f7",
                        "background-dark": "#112117",
                        "surface-light": "#ffffff",
                        "surface-dark": "#1a2c22",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "full": "9999px"},
                },
            },
        }
    </script>
<style>
        /* Custom scrollbar hiding for horizontal scrolls */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background-light dark:bg-background-dark text-[#111714] dark:text-white font-display transition-colors duration-200">
<div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden max-w-md mx-auto shadow-2xl bg-background-light dark:bg-background-dark">
<!-- Hero Section with Overlay Nav -->
<div class="relative h-[360px] w-full shrink-0 group/design-root">
<!-- Navigation Overlay -->
<div class="absolute top-0 left-0 z-20 flex w-full items-center justify-between p-4 pt-8 bg-gradient-to-b from-black/60 to-transparent">
<button class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white/20 backdrop-blur-md text-white hover:bg-white/30 transition-colors">
<span class="material-symbols-outlined">arrow_back</span>
</button>
<div class="flex gap-3">
<button class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white/20 backdrop-blur-md text-white hover:bg-white/30 transition-colors">
<span class="material-symbols-outlined">share</span>
</button>
<button class="flex size-10 shrink-0 items-center justify-center rounded-full bg-white/20 backdrop-blur-md text-white hover:bg-white/30 transition-colors">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
</div>
<!-- Header Image -->
<div class="h-full w-full bg-cover bg-center" data-alt="Majestic lion resting in the African savanna at sunrise" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuC_S89Erkt574a1n4y_lU39rtGkKkdniRghBg5Lgc5Rfg2q_OXUBz4lqBWWfMaJWzwKphRsfHsHRc-abZ_mm3425KkkLO15sRU30afi2NPRtDC6Pcxdsh0KXJH5u_VN26gRyb-kx89uatj9NLpdAzBBnuYdjYwo6pOBGQ9ZmGue1YRyYi8J-prp0MfH78b_BD4YZ4bPqf-gpw933TsK3IOvOMB-5vO30gWtVXT37ntfhUYGt_1FIP6BhUr5p9QfQr_0DOkvieKtApU');">
</div>
<!-- Curve Overlay at bottom to blend into content -->
<div class="absolute -bottom-1 left-0 w-full h-8 bg-background-light dark:bg-background-dark rounded-t-3xl z-10"></div>
</div>
<!-- Main Content Scroll Area -->
<div class="flex-1 px-5 pb-32 -mt-4 relative z-10">
<!-- Headline & Compact Rating -->
<div class="flex flex-col gap-2 mb-6">
<div class="flex justify-between items-start">
<h1 class="text-3xl font-bold leading-tight tracking-tight text-[#111714] dark:text-white">The Great Lion Expedition</h1>
</div>
<div class="flex items-center gap-2 text-sm">
<span class="material-symbols-outlined text-primary text-[20px] filled">star</span>
<span class="font-bold text-[#111714] dark:text-white text-lg">4.8</span>
<span class="text-gray-500 dark:text-gray-400 font-medium">(124 reviews)</span>
<span class="text-gray-400 dark:text-gray-600">•</span>
<span class="text-primary font-medium">Serengeti Park</span>
</div>
</div>
<!-- Chips -->
<div class="flex gap-2 overflow-x-auto no-scrollbar pb-2 mb-6">
<div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-primary/10 dark:bg-primary/20 pl-4 pr-4 border border-primary/20">
<p class="text-primary text-xs font-bold uppercase tracking-wide">Family Friendly</p>
</div>
<div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-surface-light dark:bg-surface-dark pl-4 pr-4 border border-gray-200 dark:border-gray-700 shadow-sm">
<p class="text-[#111714] dark:text-gray-200 text-sm font-medium">Big 5</p>
</div>
<div class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-full bg-surface-light dark:bg-surface-dark pl-4 pr-4 border border-gray-200 dark:border-gray-700 shadow-sm">
<p class="text-[#111714] dark:text-gray-200 text-sm font-medium">Educational</p>
</div>
</div>
<!-- Quick Info Grid -->
<div class="grid grid-cols-2 gap-3 mb-8">
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-light dark:bg-surface-dark border border-gray-100 dark:border-gray-800 shadow-sm">
<div class="flex items-center justify-center size-10 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400">
<span class="material-symbols-outlined text-[20px]">calendar_month</span>
</div>
<div>
<p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Date</p>
<p class="text-sm font-bold text-[#111714] dark:text-white">Oct 24</p>
</div>
</div>
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-light dark:bg-surface-dark border border-gray-100 dark:border-gray-800 shadow-sm">
<div class="flex items-center justify-center size-10 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
<span class="material-symbols-outlined text-[20px]">schedule</span>
</div>
<div>
<p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Time</p>
<p class="text-sm font-bold text-[#111714] dark:text-white">09:00 AM</p>
</div>
</div>
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-light dark:bg-surface-dark border border-gray-100 dark:border-gray-800 shadow-sm">
<div class="flex items-center justify-center size-10 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400">
<span class="material-symbols-outlined text-[20px]">timelapse</span>
</div>
<div>
<p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Duration</p>
<p class="text-sm font-bold text-[#111714] dark:text-white">2.5 Hours</p>
</div>
</div>
<div class="flex items-center gap-3 p-3 rounded-xl bg-surface-light dark:bg-surface-dark border border-gray-100 dark:border-gray-800 shadow-sm">
<div class="flex items-center justify-center size-10 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400">
<span class="material-symbols-outlined text-[20px]">translate</span>
</div>
<div>
<p class="text-xs text-gray-500 dark:text-gray-400 font-medium">Language</p>
<p class="text-sm font-bold text-[#111714] dark:text-white">En / Fr</p>
</div>
</div>
</div>
<!-- About Section -->
<div class="mb-8">
<h3 class="text-lg font-bold text-[#111714] dark:text-white mb-3">About the Tour</h3>
<p class="text-gray-600 dark:text-gray-300 leading-relaxed text-[15px]">
                    Join our expert rangers for a morning adventure. Learn about the pride dynamics, hunting habits, and conservation efforts while seeing these majestic cats up close in their natural habitat. Perfect for families looking to learn while exploring.
                </p>
</div>
<!-- Itinerary / Route -->
<div class="mb-8">
<h3 class="text-lg font-bold text-[#111714] dark:text-white mb-4">Tour Route</h3>
<div class="relative pl-2">
<!-- Vertical Line -->
<div class="absolute left-[19px] top-2 bottom-4 w-[2px] bg-gray-200 dark:bg-gray-700"></div>
<!-- Step 1 -->
<div class="relative flex gap-4 mb-6 group">
<div class="relative z-10 flex size-10 shrink-0 items-center justify-center rounded-full bg-primary text-black font-bold shadow-lg shadow-primary/30">
                            1
                        </div>
<div class="pt-1">
<p class="text-sm font-bold text-[#111714] dark:text-white">Base Camp Briefing</p>
<p class="text-xs text-gray-500 dark:text-gray-400 mt-1">09:00 AM • Safety gear check</p>
</div>
</div>
<!-- Step 2 -->
<div class="relative flex gap-4 mb-6">
<div class="relative z-10 flex size-10 shrink-0 items-center justify-center rounded-full bg-surface-light dark:bg-surface-dark border-2 border-primary text-[#111714] dark:text-white font-bold">
                            2
                        </div>
<div class="pt-1">
<p class="text-sm font-bold text-[#111714] dark:text-white">Jeep Ride to Savanna</p>
<p class="text-xs text-gray-500 dark:text-gray-400 mt-1">09:30 AM • Wildlife spotting en route</p>
</div>
</div>
<!-- Step 3 -->
<div class="relative flex gap-4 mb-6">
<div class="relative z-10 flex size-10 shrink-0 items-center justify-center rounded-full bg-surface-light dark:bg-surface-dark border-2 border-gray-200 dark:border-gray-700 text-gray-400 font-bold">
                            3
                        </div>
<div class="pt-1">
<p class="text-sm font-bold text-gray-600 dark:text-gray-300">Lion Feeding Observation</p>
<p class="text-xs text-gray-500 dark:text-gray-500 mt-1">10:30 AM • Respectful distance</p>
</div>
</div>
<!-- Step 4 -->
<div class="relative flex gap-4">
<div class="relative z-10 flex size-10 shrink-0 items-center justify-center rounded-full bg-surface-light dark:bg-surface-dark border-2 border-gray-200 dark:border-gray-700 text-gray-400 font-bold">
                            4
                        </div>
<div class="pt-1">
<p class="text-sm font-bold text-gray-600 dark:text-gray-300">Q&amp;A with Ranger</p>
<p class="text-xs text-gray-500 dark:text-gray-500 mt-1">11:30 AM • Refreshments served</p>
</div>
</div>
</div>
</div>
<!-- Detailed Rating Summary -->
<div class="bg-surface-light dark:bg-surface-dark rounded-2xl p-5 border border-gray-100 dark:border-gray-800 mb-6">
<h3 class="text-lg font-bold text-[#111714] dark:text-white mb-4">Guest Reviews</h3>
<div class="flex flex-col gap-4">
<div class="grid grid-cols-[30px_1fr_40px] items-center gap-y-3">
<div class="flex items-center gap-1">
<p class="text-sm font-medium">5</p>
<span class="material-symbols-outlined text-[12px] text-gray-400">star</span>
</div>
<div class="flex h-2 flex-1 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-700">
<div class="rounded-full bg-primary" style="width: 78%;"></div>
</div>
<p class="text-sm text-gray-500 text-right">78%</p>
<div class="flex items-center gap-1">
<p class="text-sm font-medium">4</p>
<span class="material-symbols-outlined text-[12px] text-gray-400">star</span>
</div>
<div class="flex h-2 flex-1 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-700">
<div class="rounded-full bg-primary" style="width: 15%;"></div>
</div>
<p class="text-sm text-gray-500 text-right">15%</p>
<div class="flex items-center gap-1">
<p class="text-sm font-medium">3</p>
<span class="material-symbols-outlined text-[12px] text-gray-400">star</span>
</div>
<div class="flex h-2 flex-1 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-700">
<div class="rounded-full bg-primary" style="width: 5%;"></div>
</div>
<p class="text-sm text-gray-500 text-right">5%</p>
</div>
</div>
</div>
</div>
<!-- Sticky Booking Bar -->
<div class="fixed bottom-0 left-0 right-0 z-50 w-full max-w-md mx-auto">
<!-- Blur gradient overlay -->
<div class="absolute -top-12 left-0 w-full h-12 bg-gradient-to-t from-background-light dark:from-background-dark to-transparent pointer-events-none"></div>
<div class="bg-surface-light dark:bg-surface-dark border-t border-gray-100 dark:border-gray-800 p-4 pb-6 shadow-[0_-5px_20px_rgba(0,0,0,0.05)] rounded-t-2xl">
<div class="flex flex-col gap-4">
<!-- Guest Selector -->
<div class="flex justify-between items-center mb-1">
<div>
<p class="text-sm font-bold text-[#111714] dark:text-white">Guests</p>
<p class="text-xs text-gray-500">$45 per adult</p>
</div>
<div class="flex items-center gap-3 bg-background-light dark:bg-background-dark rounded-lg p-1">
<button class="size-8 flex items-center justify-center rounded bg-white dark:bg-surface-dark shadow-sm text-[#111714] dark:text-white hover:bg-gray-50 dark:hover:bg-gray-700">
<span class="material-symbols-outlined text-[18px]">remove</span>
</button>
<span class="font-bold w-4 text-center text-[#111714] dark:text-white">2</span>
<button class="size-8 flex items-center justify-center rounded bg-primary text-black shadow-sm hover:bg-primary/90">
<span class="material-symbols-outlined text-[18px]">add</span>
</button>
</div>
</div>
<!-- Main CTA -->
<button class="flex w-full cursor-pointer items-center justify-between rounded-xl bg-primary px-5 py-4 text-black shadow-lg shadow-primary/20 hover:bg-primary/90 transition-all active:scale-[0.98]">
<span class="text-lg font-extrabold tracking-tight">Reserve Now</span>
<div class="flex items-center gap-2">
<span class="text-sm font-semibold opacity-80">Total</span>
<span class="text-xl font-black">$130</span>
<span class="material-symbols-outlined">arrow_forward</span>
</div>
</button>
</div>
</div>
</div>
</div>
</body></html>