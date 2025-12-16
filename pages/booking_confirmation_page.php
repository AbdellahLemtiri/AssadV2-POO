<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Booking Confirmation</title>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
                        "surface-dark": "#1c2e23", 
                        "surface-light": "#ffffff",
                    },
                    fontFamily: {
                        "display": ["Spline Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "1rem",
                        "lg": "1.5rem",
                        "xl": "2rem",
                        "2xl": "2.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }
        
        /* Dashed border utility */
        .border-dashed-custom {
            background-image: linear-gradient(to right, #334b3d 50%, rgba(255,255,255,0) 0%);
            background-position: bottom;
            background-size: 10px 1px;
            background-repeat: repeat-x;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background-light dark:bg-background-dark font-display text-gray-900 dark:text-white transition-colors duration-200">
<div class="relative flex min-h-screen w-full flex-col overflow-hidden max-w-md mx-auto shadow-2xl">
<!-- TopAppBar -->
<div class="flex items-center p-4 justify-between z-10 sticky top-0 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md">
<button class="flex size-10 shrink-0 items-center justify-center rounded-full bg-transparent hover:bg-black/5 dark:hover:bg-white/10 transition-colors">
<span class="material-symbols-outlined text-gray-900 dark:text-white" style="font-size: 24px;">arrow_back</span>
</button>
<h2 class="text-gray-900 dark:text-white text-lg font-bold leading-tight tracking-[-0.015em] flex-1 text-center pr-10">Confirmation</h2>
</div>
<!-- Scrollable Content -->
<div class="flex-1 flex flex-col items-center w-full px-5 pb-8 overflow-y-auto">
<!-- Success Icon -->
<div class="mt-4 mb-2 flex items-center justify-center">
<div class="relative flex items-center justify-center size-24 rounded-full bg-primary/20">
<div class="absolute inset-0 rounded-full animate-ping opacity-20 bg-primary"></div>
<div class="flex items-center justify-center size-16 rounded-full bg-primary text-background-dark shadow-lg shadow-primary/40">
<span class="material-symbols-outlined" style="font-size: 36px; font-weight: 700;">check</span>
</div>
</div>
</div>
<!-- HeadlineText -->
<h1 class="text-gray-900 dark:text-white tracking-tight text-[28px] font-bold leading-tight px-4 text-center mt-4">You're going on an adventure!</h1>
<!-- BodyText -->
<p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal mt-2 px-6 text-center">
                We've sent the booking details to <span class="text-gray-900 dark:text-gray-200 font-medium">alex@example.com</span>.
            </p>
<!-- Booking Card -->
<div class="w-full mt-8 @container">
<div class="flex flex-col items-stretch justify-start rounded-2xl overflow-hidden shadow-xl bg-surface-light dark:bg-surface-dark border border-gray-100 dark:border-white/5">
<!-- Image -->
<div class="w-full h-48 bg-center bg-no-repeat bg-cover relative" data-alt="Golden savanna landscape with acacia trees at sunset" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBBvIWl-aqMltgFeapwtvTTylbMMUm-eH7YwXzIpgv91F5Uh4AhWDF891kTPsmuzqOUtubQQJsLQHVXQSOsaEzAddyhTTHhGn-kqqb9UJsoBi8BogixRN22_pdM85gONAyn8_xdmNUnaGI6TyH8g2BAKnnUT8xoOH60QlBNHtjrP7hOliC-SGQ_J3tVOpPP4Wn_sl_XrOVmh1nU-rt_bxzCmkxSUxhKZhdIKagIj9fv_LuvrpJJW0IA2BGWkOaK2A-2pGz1eYHffQI");'>
<div class="absolute inset-0 bg-gradient-to-t from-surface-light dark:from-surface-dark to-transparent opacity-80"></div>
<div class="absolute bottom-4 left-4 right-4 flex justify-between items-end">
<div>
<span class="inline-block px-3 py-1 rounded-full bg-primary text-background-dark text-xs font-bold uppercase tracking-wide mb-2">Confirmed</span>
<h3 class="text-gray-900 dark:text-white text-2xl font-bold leading-none tracking-tight">Junior Ranger Safari</h3>
</div>
</div>
</div>
<!-- Details -->
<div class="flex flex-col w-full p-5 gap-4">
<!-- Info Grid -->
<div class="grid grid-cols-2 gap-4">
<div class="flex flex-col gap-1">
<span class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold tracking-wider">Date</span>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">calendar_month</span>
<span class="text-gray-900 dark:text-white font-medium">Sat, 12 Aug</span>
</div>
</div>
<div class="flex flex-col gap-1">
<span class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold tracking-wider">Time</span>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">schedule</span>
<span class="text-gray-900 dark:text-white font-medium">08:00 AM</span>
</div>
</div>
<div class="flex flex-col gap-1">
<span class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold tracking-wider">Guests</span>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">group</span>
<span class="text-gray-900 dark:text-white font-medium">2 Adults, 2 Kids</span>
</div>
</div>
<div class="flex flex-col gap-1">
<span class="text-xs text-gray-500 dark:text-gray-400 uppercase font-semibold tracking-wider">Duration</span>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary" style="font-size: 18px;">timelapse</span>
<span class="text-gray-900 dark:text-white font-medium">4 Hours</span>
</div>
</div>
</div>
<!-- Divider -->
<div class="h-px w-full bg-gray-200 dark:bg-white/10 my-1 border-dashed-custom"></div>
<!-- Price -->
<div class="flex items-end justify-between">
<div class="flex flex-col">
<span class="text-sm text-gray-500 dark:text-gray-400">Total Price</span>
<span class="text-xs text-gray-400 dark:text-gray-500">Taxes included</span>
</div>
<span class="text-2xl font-bold text-gray-900 dark:text-white">$450.00</span>
</div>
</div>
</div>
</div>
<!-- Action Buttons -->
<div class="w-full flex flex-col gap-3 mt-8">
<button class="group w-full h-14 bg-primary rounded-full flex items-center justify-center gap-2 shadow-[0_0_20px_rgba(54,226,123,0.3)] hover:shadow-[0_0_25px_rgba(54,226,123,0.5)] transition-all active:scale-[0.98]">
<span class="text-background-dark text-base font-bold">Download Ticket</span>
<span class="material-symbols-outlined text-background-dark group-hover:translate-y-0.5 transition-transform" style="font-size: 20px;">download</span>
</button>
<button class="w-full h-14 bg-[#1e1e1e] border border-[#333] rounded-full flex items-center justify-center gap-3 active:scale-[0.98] transition-transform">
<img alt="Wallet" class="w-6 h-6" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvh88P3EcAFMKEaaXIrYqOynKQ_C6Ee6coAVvuOiOsfIrX_mmbhpHxdw8HKUhwESqlgRWhZEbxhuklqaJ_YsKFltbjXP_WVvpzpR7L0cfuQK1J7gAD0mONBMSqg0ZHZu1splbuA967NGvBNcb6uYIAnoAgPvdO9qKCYdUw7RLxQwfz4s2aM1GMjYQxcTZanHeQWWe_ecFRxl5XZBiSNPWbabB7bR9ckC5r1FX6F62R0bBbCzKt3ydtdfbIhv5Aw7cVhfzuROSsCO4"/>
<span class="text-white text-base font-medium">Add to Apple Wallet</span>
</button>
<button class="w-full h-12 bg-transparent text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded-full flex items-center justify-center gap-2 transition-colors mt-2">
<span class="material-symbols-outlined" style="font-size: 20px;">print</span>
<span class="text-sm font-medium">Print Invoice</span>
</button>
</div>
<!-- Explore More Section (ImageGrid adapted) -->
<div class="w-full mt-10">
<h3 class="text-gray-900 dark:text-white text-lg font-bold mb-4 px-1">While you're there</h3>
<div class="grid grid-cols-2 gap-3">
<div class="group relative rounded-2xl overflow-hidden aspect-square cursor-pointer active:opacity-90">
<div class="w-full h-full bg-center bg-no-repeat bg-cover transition-transform duration-500 group-hover:scale-110" data-alt="Two zebras standing close together in the wild" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAyjAvBz_w7B3hg2NDsWSuI1quNSRrqBj-QClxS0Cj83A4CVYeuQOimX8Dw3zJDkAc3H7FLbsBqJMoUwL2u5-WT1INKb4skYCoyIB4BfY9u6NY22HLuo_Gu9e_3cNLvRjuz0lybsoz4xwLsU7PMybXHTngheM7_RewYQy6iUltdC7xjmvjnQtOOv_2_LkdewN3Lo32y3I25-fDf4JWZWP3rDhl-_PCOWpSrp9ZCGB2i9N-1FDM7jDoyv1lVreDvk2MnOr5rjEE1Mo8");'></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
<div class="absolute bottom-3 left-3 text-white text-sm font-bold">Zebra spotting</div>
</div>
<div class="group relative rounded-2xl overflow-hidden aspect-square cursor-pointer active:opacity-90">
<div class="w-full h-full bg-center bg-no-repeat bg-cover transition-transform duration-500 group-hover:scale-110" data-alt="A tall giraffe eating leaves from a high tree branch" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBsftrtAP8b9TraknDZ8sDBv6NRQljC7Z9QHqCfoBDq1c1tcEaMG-KkOXXZNOzhZP4n2lDVlzVoqeNDcMLbD4yHYOXELM8EH8ZP-8qm-VGGfWVUpbVtanSgiDxUKxfzewNmcn_r2ijPCSu3TXVubx1QA_9K4R_bhdZ5s-JEj7WB6zPSCLtwtTwP4eSaNgWRHmGM9NQUno_r5iMqwLvHQ7Vp2h60teJiEOlNLzMjaeO8ghIKljtCziMRG0s0C97GQK_MsJfNcFF8SqI");'></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
<div class="absolute bottom-3 left-3 text-white text-sm font-bold">Giraffe feeding</div>
</div>
</div>
</div>
</div>
</div>
</body></html>