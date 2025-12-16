<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Animal Details - Asaad</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#36e27b",
                        "background-light": "#f6f8f7",
                        "background-dark": "#112117",
                        "surface-dark": "#1c3024", 
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px"},
                },
            },
        }
    </script>
<style>
        /* Hide scrollbar for clean UI */
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
<body class="bg-[#111] font-display antialiased selection:bg-primary selection:text-background-dark flex justify-center min-h-screen">
<!-- Phone Container Simulator -->
<div class="relative mx-auto flex h-auto min-h-screen w-full max-w-[480px] flex-col bg-background-light dark:bg-background-dark overflow-hidden shadow-2xl ring-1 ring-white/10">
<!-- Header Image Section -->
<div class="relative h-[48vh] w-full shrink-0 group">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Close up portrait of Asaad the Atlas Lion with a magnificent dark mane against a natural background" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD0WCJRBMbZF-ytb6B5UyS7dSgGsZspuHTy1wOe2ThWc_L1xoh4RueXTmPrq-V5vCxDd-vbBiHRwt7LcDwXRN5IF0KWrMnjLb4NdQQgxE0QLMgJnpVdneTgIwz0eeBTF4FqOij3xd6UkRbyQtZoDy0PD2uiGYJHE_e9UY1Hs3UysjEtEcPvsMJeHRWohM40Mpz-24fDC6xklBUKKT8DXf1yBnfL81iKYUc7Y4ZmKEKy2r4_cjNJbvvfHntb0j257BYfim7kGcKeYcU");'>
</div>
<!-- Gradient Overlay for Text Readability at top and blend at bottom -->
<div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-background-dark/90"></div>
<!-- Navigation Overlay -->
<div class="absolute top-0 left-0 right-0 p-5 pt-8 flex justify-between items-center z-20">
<button class="flex items-center justify-center w-10 h-10 rounded-full bg-black/20 backdrop-blur-md border border-white/10 hover:bg-white/20 transition-all active:scale-90">
<span class="material-symbols-outlined text-white" style="font-size: 20px;">arrow_back_ios_new</span>
</button>
<button class="flex items-center justify-center w-10 h-10 rounded-full bg-black/20 backdrop-blur-md border border-white/10 hover:bg-white/20 transition-all active:scale-90 active:text-red-500">
<span class="material-symbols-outlined text-white" style="font-size: 24px;">favorite</span>
</button>
</div>
</div>
<!-- Main Content (Card sliding up) -->
<div class="relative -mt-12 flex flex-col gap-6 rounded-t-[2.5rem] bg-background-light dark:bg-background-dark px-6 pb-32 pt-8 shadow-[0_-10px_40px_rgba(0,0,0,0.5)] z-10 border-t border-white/5">
<!-- Drag Handle Visual -->
<div class="self-center w-12 h-1.5 rounded-full bg-gray-300 dark:bg-gray-600/40 mb-1"></div>
<!-- Header Info -->
<div class="flex flex-col gap-2">
<div class="flex items-start justify-between">
<div>
<h2 class="text-primary dark:text-primary/90 text-sm font-bold tracking-widest uppercase mb-1">The Atlas Lion</h2>
<h1 class="text-gray-900 dark:text-white text-[2.5rem] font-bold tracking-tight leading-none">Asaad</h1>
</div>
<!-- Sound Button -->
<button class="group flex items-center justify-center w-12 h-12 rounded-full bg-[#29382f] dark:bg-surface-dark border border-primary/20 text-primary hover:bg-primary hover:text-background-dark transition-all duration-300 shadow-lg shadow-black/20">
<span class="material-symbols-outlined group-hover:animate-pulse" style="font-size: 26px;">volume_up</span>
</button>
</div>
<!-- Status Badge -->
<div class="mt-2 inline-flex self-start items-center gap-2 rounded-full bg-red-500/10 dark:bg-red-900/20 px-4 py-1.5 border border-red-500/20">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
</span>
<span class="text-red-600 dark:text-red-400 text-xs font-bold uppercase tracking-wide">Extinct in the Wild</span>
</div>
</div>
<!-- Info Chips (Horizontal Scroll) -->
<div class="w-full overflow-x-auto no-scrollbar -mx-6 px-6 py-1">
<div class="flex gap-3 w-max">
<!-- Chip 1 -->
<div class="group flex h-10 items-center gap-2 rounded-full bg-white dark:bg-surface-dark border border-gray-200 dark:border-white/5 pl-3 pr-4 shadow-sm transition-transform active:scale-95">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">location_on</span>
<p class="text-gray-700 dark:text-gray-200 text-sm font-medium">Morocco</p>
</div>
<!-- Chip 2 -->
<div class="group flex h-10 items-center gap-2 rounded-full bg-white dark:bg-surface-dark border border-gray-200 dark:border-white/5 pl-3 pr-4 shadow-sm transition-transform active:scale-95">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">landscape</span>
<p class="text-gray-700 dark:text-gray-200 text-sm font-medium">Atlas Mtns.</p>
</div>
<!-- Chip 3 -->
<div class="group flex h-10 items-center gap-2 rounded-full bg-white dark:bg-surface-dark border border-gray-200 dark:border-white/5 pl-3 pr-4 shadow-sm transition-transform active:scale-95">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">lunch_dining</span>
<p class="text-gray-700 dark:text-gray-200 text-sm font-medium">Carnivore</p>
</div>
<!-- Chip 4 -->
<div class="group flex h-10 items-center gap-2 rounded-full bg-white dark:bg-surface-dark border border-gray-200 dark:border-white/5 pl-3 pr-4 shadow-sm transition-transform active:scale-95">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">weight</span>
<p class="text-gray-700 dark:text-gray-200 text-sm font-medium">250kg</p>
</div>
</div>
</div>
<!-- Body Text -->
<div class="flex flex-col gap-3">
<h3 class="text-gray-900 dark:text-white text-xl font-bold">About Asaad</h3>
<p class="text-gray-600 dark:text-gray-300 text-[15px] font-normal leading-relaxed">
                    Meet Asaad, the King of the Atlas Mountains. The Atlas Lion, also known as the Barbary Lion, was once native to North Africa. Known for their magnificent dark manes and immense size, they hold a legendary status in history.
                </p>
<p class="text-gray-600 dark:text-gray-300 text-[15px] font-normal leading-relaxed">
                    Unlike other lions, the Atlas lion lived in the mountains and had a thicker coat to protect against the cold. While they no longer roam free, Asaad acts as an ambassador for his species here.
                </p>
</div>
<!-- Did You Know Feature -->
<div class="group relative overflow-hidden rounded-2xl bg-[#E8F5E9] dark:bg-[#15231c] border border-dashed border-primary/40 p-5 transition-colors hover:border-primary">
<!-- Decorative Icon Background -->
<div class="absolute -right-6 -bottom-6 text-primary/5 dark:text-primary/5 rotate-12 transition-transform group-hover:rotate-0">
<span class="material-symbols-outlined" style="font-size: 140px;">school</span>
</div>
<div class="relative z-10 flex flex-col gap-2">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined fill-current" style="font-variation-settings: 'FILL' 1;">lightbulb</span>
<h4 class="text-base font-bold uppercase tracking-wider">Did You Know?</h4>
</div>
<p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed pr-4">
                        Atlas Lions were once the largest lion subspecies in the world and were kept by royal families. They were even used in the gladiator arenas of Rome!
                    </p>
</div>
</div>
<!-- Habitat Map Preview -->
<div class="flex flex-col gap-3 mt-2">
<h3 class="text-gray-900 dark:text-white text-xl font-bold">Native Habitat</h3>
<div 
  class="relative h-44 w-full overflow-hidden rounded-2xl bg-surface-dark shadow-inner" 
  data-location="Atlas Mountains" 
  style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBpQ267OHMwTaKM_kB3Hy2SEpUYTYr-bFpHDYtf7XmXFbwm7Cl6ct0Ub0dwafhS4mgFS-W_dqbKdNBbB691DrLFFCGKMYrjZJhjmxyYHyDgCokh9m02oVXGKOln207SVe47Oht4LAuTvFndqBTfRUigRTYMTmeUEt7fkZbq44EILRgU5Y_2r3Y4D4To5PBe2HAqmI9d5JtQIFBpSDc8odSqOhBTLlTh2nREHTuUDc806ISlZ3swrsNNAVQ5akprmrmjELgVrj9-RgI'); background-size: cover; background-position: center;"
>
  </div>
<div class="absolute inset-0 bg-cover bg-center opacity-80" data-alt="Scenic view of the Atlas Mountains in Morocco with rugged peaks" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCrEr7rjbWdErrJuq307quA9Sk4Ysx4Y0iIVsGZOKxSVrpEUPF3pXUlZwQEO4xTa9qUCwbXi1pbEx4ZHoaNsdDgmxfJFA6zCfN7uazkjSfvw57Y_maWI_oJ4Ihsl_Tsttyb9je0w-hmwPKse7cFlLMklt7yEUo-8b8LtBcfEJ4V5MDYdQxjburDAwIcybKT0nNos1Plo0OFc3UrucnPEIcrJsoIsaqZsZYV4u0qapyn-biJH8wz1LU30zoyPaYcCperkbeuxstzBtk");'>
</div>
<div class="absolute inset-0 bg-black/20"></div>
<!-- Map Pin Animation -->
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
<span class="relative flex h-3 w-3 mb-1">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
<span class="relative inline-flex rounded-full h-3 w-3 bg-primary border-2 border-white dark:border-background-dark"></span>
</span>
<button class="mt-2 flex items-center gap-2 rounded-full bg-white/10 backdrop-blur-md border border-white/30 px-4 py-2 text-white hover:bg-white/20 transition active:scale-95 shadow-lg">
<span class="material-symbols-outlined text-[18px]">map</span>
<span class="text-xs font-bold uppercase tracking-wide">View Map</span>
</button>
</div>
</div>
</div>
</div>
<!-- Sticky Footer CTA -->
<div class="fixed bottom-0 z-50 w-full max-w-[480px] p-5 pb-8 bg-gradient-to-t from-background-light via-background-light/95 to-transparent dark:from-background-dark dark:via-background-dark/95 pointer-events-none">
<button class="pointer-events-auto w-full flex items-center justify-between rounded-full bg-primary p-2 pl-6 pr-2 shadow-[0_4px_20px_rgba(54,226,123,0.4)] hover:shadow-[0_6px_25px_rgba(54,226,123,0.6)] transition-all group active:scale-[0.98]">
<div class="flex flex-col items-start">
<span class="text-background-dark text-[10px] font-extrabold uppercase tracking-widest opacity-60">Book a visit</span>
<span class="text-background-dark text-lg font-bold leading-tight">Meet Asaad</span>
</div>
<div class="flex h-11 w-11 items-center justify-center rounded-full bg-background-dark/10 group-hover:bg-background-dark/20 transition-colors">
<span class="material-symbols-outlined text-background-dark" style="font-weight: 600;">arrow_forward</span>
</div>
</button>
</div>
</div>
</body></html>