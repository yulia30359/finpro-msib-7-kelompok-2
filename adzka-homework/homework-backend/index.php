<?php
$seats_row = ['A', 'B', 'C', 'D', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
date_default_timezone_set('Asia/Jakarta');

$today = date('Y-m-d');

?>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Movie Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="relative bg-violet-200">
    <nav class="flex justify-between items-center p-10">
        <svg width="180" viewBox="0 0 673 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_1113_4336)">
                <path d="M92.8398 151.7C82.3898 147.59 67.2298 98.31 75.8398 92.14C84.4398 86 135 100 138.21 109.16C142.15 120.33 103.29 155.81 92.8398 151.7Z" fill="#742BFF" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M164.07 55.19C180 65.34 189.7 85.32 191.28 111.44C192.54 132.27 188.26 154 180.12 168.12C179.93 168.48 179.73 168.8 179.53 169.12C172.18 180.46 159.24 188.87 141.06 194.12C124.2 199 107 200 95.5396 200C76.8596 200 59.6696 197.33 47.1496 192.49L46.9996 192.43C25.7496 184 13.0796 164 9.27963 132.93C9.22963 132.79 9.22963 132.65 9.22963 132.51C7.64963 116.9 7.14963 87.58 21.6496 66.69L21.8896 66.35C32.3296 51.94 49.0496 44.89 65.8896 41.71L38.2896 20.32C35.9106 18.4781 34.3608 15.7665 33.981 12.7819C33.793 11.3041 33.8979 9.80365 34.2897 8.36634C34.6815 6.92903 35.3526 5.58297 36.2646 4.40501C38.1066 2.02602 40.8181 0.476168 43.8027 0.0964068C45.2806 -0.0916318 46.781 0.0132539 48.2183 0.405075C49.6556 0.796897 51.0017 1.46798 52.1796 2.38001C52.3596 2.52001 52.5596 2.68001 52.7296 2.83001L91.7996 37.25L122.36 11.56C124.899 9.42767 128.182 8.39146 131.485 8.67933C134.788 8.96719 137.842 10.5556 139.975 13.095C142.107 15.6345 143.143 18.917 142.855 22.2204C142.567 25.5239 140.979 28.5777 138.44 30.71C138.04 31.04 137.57 31.38 137.16 31.66L121.6 41.66C138.15 44.26 153.37 48.89 163.37 54.76L164.07 55.19ZM95.5396 177.92C122.65 177.92 151.71 171.47 161 157.11C173.07 136.16 173.87 87.58 152.24 73.85C140.33 66.89 116.06 61.47 92.6596 61.47C70.5396 61.47 50.3696 66.3 40.9996 79.3C32.4396 91.63 29.3396 111.77 31.2296 130.3C33.4696 148.83 39.4996 165.75 55.1096 171.92C65.2596 175.83 80.0796 177.92 95.5396 177.92Z" fill="#742BFF" />
                <path d="M508 108.289C508 116.279 506.918 123.368 504.755 129.558C502.592 135.747 499.457 140.951 495.353 145.171C491.248 149.391 486.283 152.598 480.458 154.793C474.634 156.931 468.061 158 460.738 158C453.915 158 447.647 156.931 441.933 154.793C436.275 152.598 431.338 149.391 427.123 145.171C422.907 140.951 419.634 135.747 417.304 129.558C415.03 123.368 413.893 116.279 413.893 108.289C413.893 97.711 415.779 88.7647 419.551 81.4501C423.378 74.1355 428.814 68.5652 435.859 64.7391C442.96 60.913 451.419 59 461.238 59C470.279 59 478.323 60.913 485.368 64.7391C492.413 68.5652 497.932 74.1355 501.926 81.4501C505.975 88.7647 508 97.711 508 108.289ZM446.926 108.289C446.926 113.747 447.397 118.361 448.34 122.13C449.283 125.844 450.781 128.685 452.834 130.655C454.942 132.568 457.687 133.524 461.071 133.524C464.455 133.524 467.145 132.568 469.142 130.655C471.139 128.685 472.581 125.844 473.469 122.13C474.412 118.361 474.884 113.747 474.884 108.289C474.884 102.831 474.412 98.2737 473.469 94.6164C472.581 90.9591 471.111 88.202 469.059 86.3453C467.062 84.4885 464.344 83.5601 460.905 83.5601C455.968 83.5601 452.39 85.6419 450.171 89.8056C448.008 93.9693 446.926 100.13 446.926 108.289Z" fill="#742BFF" />
                <path d="M404.443 108.289C404.443 116.279 403.362 123.368 401.198 129.558C399.035 135.747 395.901 140.951 391.796 145.171C387.691 149.391 382.726 152.598 376.902 154.793C371.077 156.931 364.504 158 357.182 158C350.359 158 344.09 156.931 338.377 154.793C332.719 152.598 327.782 149.391 323.566 145.171C319.35 140.951 316.077 135.747 313.747 129.558C311.473 123.368 310.336 116.279 310.336 108.289C310.336 97.711 312.222 88.7647 315.994 81.4501C319.822 74.1355 325.258 68.5652 332.303 64.7391C339.403 60.913 347.862 59 357.681 59C366.723 59 374.766 60.913 381.811 64.7391C388.856 68.5652 394.375 74.1355 398.369 81.4501C402.419 88.7647 404.443 97.711 404.443 108.289ZM343.369 108.289C343.369 113.747 343.841 118.361 344.784 122.13C345.727 125.844 347.224 128.685 349.277 130.655C351.385 132.568 354.131 133.524 357.514 133.524C360.898 133.524 363.589 132.568 365.585 130.655C367.582 128.685 369.025 125.844 369.912 122.13C370.855 118.361 371.327 113.747 371.327 108.289C371.327 102.831 370.855 98.2737 369.912 94.6164C369.025 90.9591 367.555 88.202 365.502 86.3453C363.505 84.4885 360.787 83.5601 357.348 83.5601C352.411 83.5601 348.833 85.6419 346.614 89.8056C344.451 93.9693 343.369 100.13 343.369 108.289Z" fill="#742BFF" />
                <path d="M304.048 156.312H226V137.491L265.024 85.9233H228.247V60.688H302.218V81.1125L264.858 131.077H304.048V156.312Z" fill="#742BFF" />
            </g>
            <defs>
                <clipPath id="clip0_1113_4336">
                    <rect width="673" height="200" fill="white" />
                </clipPath>
            </defs>
        </svg>
        <div class="flex flex-row px-4 py-2 rounded-full border-2 border-[#742BFF] text-[#742BFF] font-medium">
            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
            </svg>

            <p>CGV Palembang Indah Mall</p>
        </div>
    </nav>
    <div class="grid grid-cols-8 px-10 pb-5 gap-10 ">
        <div class="col-span-2 shadow-lg shadow-violet-300 flex flex-col px-5 gap-6 py-5  h-fit bg-violet-100 rounded-xl">
            <div class="row-span-4">
                <img class="w-full h-full rounded-xl object-cover shadow-lg" src="images/film.png" alt="thumbnail">
            </div>
            <div class="row-span-1">
                <div class="items-start flex flex-row justify-between">
                    <div>
                        <div class="text-lg  font-semibold">Ghost In The Shell</div>
                        <div class="text-[#FFCD29] text-lg font-bold"><i class="fa-solid fa-star pr-2"></i>9.9</div>
                    </div>
                    <div>
                        <div class="flex text-md  items-center">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p>106 Minutes</p>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="mb-3">
                        <div class="text-gray-400 font-medium text-md">Director</div>
                        <div class="text-gray-300 text-sm">Rupert Sanders</div>
                    </div>
                    <div class="mb-3">
                        <div class="text-gray-400 font-medium text-md">Starring</div>
                        <div class="text-gray-300 text-sm">Scarlet Johansson, Takeshi Kitano</div>
                    </div>
                    <div class="mb-3">
                        <div class="text-gray-400 font-medium text-md">Genre</div>
                        <div class="text-gray-300 text-sm">Action, Crime, Sci-Fi</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative col-span-6 h-full shadow-lg shadow-violet-300  p-6 bg-violet-100 rounded-xl">
            <div class="flex justify-between items-center">
                <p class="text-3xl font-bold">Ghost In The Shell</p>
                <div class="flex gap-4">
                    <div class="flex">
                        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <p>106 Minutes</p>
                    </div>
                    <span class="px-3 rounded-full text-white bg-[#742BFF]">PG-13</span>
                </div>
            </div>
            <form action="tiket.php" method="POST" class="mt-10 relative flex flex-col" id="form-ticket">
                <div class="">
                    <p class="font-semibold text-xl">Ticket For</p>
                    <div class="flex mt-2 gap-3">
                        <div>
                            <label for="adult-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                            <div class="relative flex items-center max-w-[11rem]">
                                <button type="button" onclick="changeValue('adult-input', -1)" class="bg-violet-100 dark:bg-violet-700 dark:hover:bg-violet-600 dark:border-violet-600 hover:bg-violet-200 border border-violet-300 rounded-s-lg p-3 h-11 focus:ring-violet-700 focus:ring-2">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="adult-input" name="adult" data-input-counter data-input-counter-min="0" aria-describedby="helper-text-explanation" class="bg-violet-50 border-x-0 border-violet-300 h-11 font-medium text-center text-violet-900 text-sm focus:ring-violet-500 focus:border-violet-500 block w-full pb-6 dark:bg-violet-700 dark:border-violet-600 dark:placeholder-violet-400 dark:text-white dark:focus:ring-violet-500 dark:focus:border-violet-500" placeholder="" value="0" required />
                                <div class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                    <span>Adult</span>
                                </div>
                                <button type="button" onclick="changeValue('adult-input', 1)" class="bg-violet-100 dark:bg-violet-700 dark:hover:bg-violet-600 dark:border-violet-600 hover:bg-violet-200 border border-violet-300 rounded-e-lg p-3 h-11 focus:ring-violet-700 focus:ring-2">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400 italic">**Adult: Rp 50,000</p>
                        </div>
                        <div>
                            <label for="child-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                            <div class="relative flex items-center max-w-[11rem]">
                                <button type="button" onclick="changeValue('child-input', -1)" class="bg-violet-100 dark:bg-violet-700 dark:hover:bg-violet-600 dark:border-violet-600 hover:bg-violet-200 border border-violet-300 rounded-s-lg p-3 h-11 focus:ring-violet-700 focus:ring-2">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="child-input" name="child" data-input-counter data-input-counter-min="0" aria-describedby="helper-text-explanation" class="bg-violet-50 border-x-0 border-violet-300 h-11 font-medium text-center text-violet-900 text-sm focus:ring-violet-500 focus:border-violet-500 block w-full pb-6 dark:bg-violet-700 dark:border-violet-600 dark:placeholder-violet-400 dark:text-white dark:focus:ring-violet-500 dark:focus:border-violet-500" placeholder="" value="0" required />
                                <div class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                                    <span>Child</span>
                                </div>
                                <button type="button" onclick="changeValue('child-input', 1)" class="bg-violet-100 dark:bg-violet-700 dark:hover:bg-violet-600 dark:border-violet-600 hover:bg-violet-200 border border-violet-300 rounded-e-lg p-3 h-11 focus:ring-violet-700 focus:ring-2">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400 italic">**Child: Rp 30,000</p>
                        </div>
                    </div>
                </div>
                <div class="flex mt-4 justify-between gap-10 ">
                    <div>
                        <p id="date-header" class="font-semibold text-xl"></p>
                        <hr class="border mb-4 mt-2 border-gray-400">
                        <ul class="flex gap-3 flex-row">
                            <?php
                            $startDate = new \DateTime(date('Y-m-d'));
                            $endDate = new \DateTime(date('Y-m-d', strtotime('+6 day')));
                            $index = 1;
                            for ($date = $startDate; $date <= $endDate; $date->modify('+1 day')) { ?>
                                <li>
                                    <input type="radio" id=<?= 'date' . $index ?> name="date-opt" value=<?= $date->format('Y-m-d') ?> class="hidden peer" required />
                                    <label for=<?= 'date' . $index ?> class="flex flex-col items-center justify-center w-[58px] h-[58px]  text-violet-600  border border-violet-500 peer-checked:border-violet-200 rounded-lg cursor-pointer hover:text-gray-300
                                    peer-checked:border-violet-600
                                    peer-checked:bg-violet-800
                                    peer-checked:text-white
                                    hover:bg-violet-700">
                                        <p class="text-sm font-semibold">
                                            <?= $date->format('D') ?>
                                        </p>
                                        <p class="text-xs">
                                            <?= $date->format('d') ?>
                                        </p>
                                    </label>
                                </li>

                            <?php $index++;
                            } ?>

                        </ul>

                    </div>
                    <div>
                        <p class="font-semibold text-xl">Show Time</p>
                        <hr class="border mb-4 mt-2 border-gray-400">
                        <ul class="flex gap-3 flex-wrap">
                            <?php
                            $show_times = ['08:30', '10:00', '13:00', '16:00', '17:30', '19:00', '20:30'];
                            $index = 1;
                            foreach ($show_times as $time_list => $value) {
                            ?>
                                <li>
                                    <input type="radio" id=<?= "time" . $index ?> name="time" value=<?= $value ?> class="hidden peer" required />
                                    <label for=<?= "time" . $index ?> class=" px-3 inline-flex
                                    peer-disabled:bg-violet-300 peer-disabled:border-violet-200
                                    peer-disabled:cursor-not-allowed
                                    peer-disabled:text-violet-400 items-center justify-center w-full p-2  text-violet-500  border border-violet-500 peer-checked:border-violet-200 rounded-full cursor-pointer hover:text-violet-300
                                    peer-checked:border-violet-600
                                    peer-checked:bg-violet-800
                                    peer-checked:text-white
                                    hover:bg-violet-700">
                                        <time class="">
                                            <?= $value ?>
                                        </time>
                                    </label>
                                </li>
                            <?php
                                $index++;
                            }

                            ?>
                        </ul>
                    </div>
                </div>
                <div class="mb-12 mt-16 relative">
                    <div class="curved after:border-rose-500"></div>
                    <p class="absolute inset-0 tracking-widest flex justify-center top-0 font-mono text-gray-300">Screen</p>
                </div>
                <div>
                    <div
                        class="grid grid-cols-10 gap-24">
                        <div class="grid grid-cols-3 col-span-3 gap-2 ">
                            <?php for ($i = 0; $i < count($seats_row); $i++) {
                            ?>
                                <?php
                                for ($j = 1; $j < 4; $j++) {
                                ?>
                                    <div>
                                        <input class="hidden" id=<?php echo $seats_row[$i] . $j ?> type="checkbox" name="seats[]" value=<?php echo $seats_row[$i] . $j ?> />
                                        <label class="seat select-none" for=<?php echo $seats_row[$i] . $j ?>><?php echo $seats_row[$i] . $j ?></label>
                                    </div>
                                <?php } ?>
                            <?php
                            } ?>
                        </div>
                        <div class="grid grid-cols-5 col-span-4 gap-2">
                            <?php for ($i = 0; $i < count($seats_row); $i++) {
                                for ($j = 4; $j < 9; $j++) {
                            ?>
                                    <div>
                                        <input class="w-8 h-8 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600 " id=<?php echo $seats_row[$i] . $j ?> type="checkbox" name="seats[]" value=<?php echo $seats_row[$i] . $j ?> />
                                        <label class="seat select-none" for=<?php echo $seats_row[$i] . $j ?>><?php echo $seats_row[$i] . $j ?></label>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                        <div class="grid grid-cols-3 col-span-3 gap-2">
                            <?php for ($i = 0; $i < count($seats_row); $i++) {
                                for ($j = 9; $j < 12; $j++) {
                            ?>
                                    <div>
                                        <input class="w-8 h-8 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600" id=<?php echo $seats_row[$i] . $j ?> type="checkbox" name="seats[]" value=<?php echo $seats_row[$i] . $j ?> />
                                        <label class="seat select-none" for=<?php echo $seats_row[$i] . $j ?>><?php echo $seats_row[$i] . $j ?></label>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <div class="flex justify-between gap-10 mt-4">
                        <div class="flex items-center">
                            <div class="">
                                <input id="seatSelected" type="checkbox" disabled />
                                <label class="seat bg-violet-500" for="seatSelected"></label>
                            </div>
                            <span class="ml-2"> Selected </span>
                        </div>
                        <div class="flex items-center">
                            <div class="">
                                <input id="seatAvailable" type="checkbox" disabled />
                                <label class="seat" for="seatAvailable"> </label>
                            </div>
                            <span class="ml-2"> Available </span>
                        </div>
                        <div class="flex items-center">
                            <div class="">
                                <input id="seatTaken" type="checkbox" disabled />
                                <label class="seat booked" for="seatTaken"> </label>
                            </div>
                            <span class="ml-2"> Taken </span>
                        </div>
                        <div class="flex justify-end mt-6">
                            <button id="trigger-button" name="next" type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="px-4 py-2 text-white bg-violet-700 rounded-full flex">
                                Checkout
                                <svg class="w-6 h-6 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm">
                        <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                                        <h3 class="font-semibold ">
                                            Booking Confirmation
                                        </h3>
                                    </div>
                                    <div>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="popup-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="mb-4"><img class="w-full h-full rounded-xl object-cover shadow-lg" src="images/film.png" alt="thumbnail"></div>
                                        <div class="col-span-2">
                                            <p class="text-lg text-white font-medium mb-4">Book Detail</p>
                                            <table class="table-auto">
                                                <tbody>
                                                    <tr class="text-xs text-white">
                                                        <td>Film</td>
                                                        <td> : </td>
                                                        <td>Ghost In The Shell</td>
                                                    </tr>
                                                    <tr class="text-xs text-white">
                                                        <td>Duration</td>
                                                        <td> : </td>
                                                        <td>106 Minutes</td>
                                                    </tr>
                                                    <tr class="text-xs text-white">
                                                        <td>Date</td>
                                                        <td> : </td>
                                                        <td>
                                                            <p id="checked-date"></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-xs text-white">
                                                        <td>Time</td>
                                                        <td> : </td>
                                                        <td>
                                                            <p id="checked-time"></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-xs text-white">
                                                        <td>Seats</td>
                                                        <td> : </td>
                                                        <td>
                                                            <p id="total-seat"></p>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <table class="my-3 text-left text-gray-400">
                                                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 ">
                                                    <tr>
                                                        <th scope="col" class="px-3 py-3 rounded-s-lg">
                                                            Ticket Type
                                                        </th>
                                                        <th scope="col" class="px-3 py-3">
                                                            Qty
                                                        </th>
                                                        <th scope="col" class="px-3 py-3 rounded-e-lg">
                                                            Price
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-gray-800">
                                                        <th scope="row" class="px-3 py-2 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white w-full">
                                                            Ticket (Adult)
                                                        </th>
                                                        <td class="px-3 text-xs py-2">
                                                            <p id="total-adult"></p>
                                                        </td>
                                                        <td class="px-3 text-xs py-2">
                                                            <p id="adult-price"></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-800">
                                                        <th scope="row" class="px-3 py-1 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                                            Ticket (Child)
                                                        </th>
                                                        <td class="px-3 py-1 text-xs ">
                                                            <p id="total-child"></p>
                                                        </td>
                                                        <td class="px-3 py-1 text-xs ">
                                                            <p id="child-price"></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-800 border-b-2">
                                                        <th scope="row" class="px-3 pb-2 py-1  font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                                            Discount
                                                        </th>
                                                        <td class="px-3 py-1 pb-2 text-xs ">
                                                        </td>
                                                        <td class="px-3 py-1 pb-2  text-xs ">
                                                            <p id="total-discount"></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="font-semibold text-white">
                                                        <th scope="row" class="px-3 py-3 text-base">Total</th>
                                                        <td class="px-3 py-3">
                                                            <p id="total-adult-child">
                                                            </p>
                                                        </td>
                                                        <td class="px-3 py-3">
                                                            <p id="total-price">
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end gap-5 items-center">
                                    <button type="button" data-modal-toggle="popup-modal" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Cancel
                                    </button>
                                    <button type="submit" name="submit" class="inline-flex items-center text-white bg-violet-600 hover:bg-violet-700 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-violet-500 dark:hover:bg-violet-600 dark:focus:ring-violet-900">
                                        Book Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
