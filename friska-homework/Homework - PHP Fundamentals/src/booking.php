<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema - Book your ticket</title>

    <link rel="icon" href="../public/cinema-logo.png" type="image/png">
    <link rel="stylesheet" href="../styles/input.css">
    <link rel="stylesheet" href="../styles/custom.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

</head>

<body class="bg-gray-900 text-white font-sans">

    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="absolute top-0 left-0 right-0 z-10 p-6 flex justify-between items-center">
            <a class="text-xl font-bold" href="index.html">Cinema</a>
            <button class="flex px-4 py-2 justify-between items-center font-medium border rounded-full">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                </svg>
                <p>Ciputra World Surabaya</p>
            </button>
        </nav>
    </header>

    <main class="mt-16">
        <div class="grid grid-cols-8 px-10 pb-5 gap-10">
            <div class="col-span-2 flex flex-col px-5 gap-6 py-5 h-fit rounded-xl">

                <!-- movie card -->
                <!-- img -->
                <div class="row-span-4">
                    <img class="w-full h-full rounded-xl object-cover shadow-lg" src="../public/interstellar-poster.jpg"
                        alt="thumbnail">
                </div>

                <!-- description -->
                <div class="row-span-1">
                    <div class="items-start flex flex-row justify-between">
                        <div class="text-lg font-semibold">Interstellar</div>
                        <div class="flex text-md  items-center">
                            <svg class="w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p>106 Minutes</p>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-center justify-center text-lg font-bold mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" class="w-4 h-4 mr-2"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 .587l3.668 7.571 8.332 1.151-6.064 5.854 1.516 8.277-7.452-4.04-7.452 4.04 1.516-8.277-6.064-5.854 8.332-1.151z" />
                            </svg>
                            <span>8.7</span><span class="text-gray-400">/10</span>
                        </div>
                        <div class="">
                            <p class="text-white px-2">Sci-Fi</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="mb-3">
                            <div class="text-gray-400 font-medium text-md">Director</div>
                            <div class="text-gray-300 text-sm">Christopher Nolan</div>
                        </div>
                        <div class="">
                            <div class="text-gray-400 font-medium text-md">Starring</div>
                            <div class="text-gray-300 text-sm">Matthew, Anne Hathaway</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ticket booking -->
            <div class="relative col-span-6 h-full p-6">
                <div class="flex justify-between items-center">
                    <p class="text-3xl font-bold">Interstellar</p>
                    <div class="flex gap-4">
                        <div class="flex">
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <p>169 Minutes</p>
                        </div>
                        <span class="px-3 rounded-full text-white bg-green-600">PG-13</span>
                    </div>
                </div>

                <!-- ticket form -->
                <form action="ticket.php" method="POST" class="mt-4 relative flex flex-col" id="form-ticket">
                    <div class="">
                        <p class="font-semibold text-xl">Tickets</p>

                        <!-- ticket form -->
                        <div class="flex mt-2 gap-3">

                            <!-- adult ticket input -->
                            <div>
                                <label for="adult-input" class="block mb-2 text-sm font-medium"></label>
                                <span class="font-semibold text-lg mb-2 block">Adult</span>
                                <div class="relative flex items-center">

                                    <!-- button untuk mengurangi tiket -->
                                    <button type="button" onclick="changeValue('adult-input', -1)"
                                        class="border border-white peer-checked:text-white hover:bg-white hover:text-gray-900 rounded-s-lg p-3 h-11 focus:ring-white focus:ring-1">
                                        <svg class="w-3 h-3 fill-current hover:text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>

                                    <!-- tiket input field-->
                                    <input type="text" id="adult-input" name="adult" data-input-counter
                                        data-input-counter-min="0" aria-describedby="helper-text-explanation"
                                        class="border border-white h-11 font-medium text-center items-start text-sm focus:ring-white focus:border-white block w-full bg-gray-900 text-white"
                                        placeholder="" value="0" required />

                                    <!-- button untuk menambah tiket -->
                                    <button type="button" onclick="changeValue('adult-input', 1)"
                                        class="border border-white peer-checked:text-white hover:bg-white hover:text-gray-900 rounded-e-lg p-3 h-11 focus:ring-white focus:ring-1">
                                        <svg class="w-3 h-3 fill-current hover:text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                                <p id="helper-text-explanation"
                                    class="mt-2 text-sm text-gray-500 dark:text-gray-400 italic">**Adult: Rp 50,000</p>
                            </div>

                            <!-- child ticket input -->
                            <div>
                                <label for="child-input" class="block mb-2 text-sm font-medium"></label>
                                <span class="font-semibold text-lg mb-2 block">Child</span>
                                <div class="relative flex items-center max-w-[11rem]">

                                    <!-- button untuk mengurangi tiket -->
                                    <button type="button" onclick="changeValue('child-input', -1)"
                                        class="border border-white peer-checked:text-white hover:bg-white hover:text-gray-900 rounded-s-lg p-3 h-11 focus:ring-white focus:ring-1">
                                        <svg class="w-3 h-3 fill-current hover:text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>

                                    <!-- tiket input field -->
                                    <input type="text" id="child-input" name="child" data-input-counter
                                        data-input-counter-min="0" aria-describedby="helper-text-explanation"
                                        class="border border-white h-11 font-medium text-center items-start text-sm focus:ring-white focus:border-white block w-auto bg-gray-900 text-white"
                                        placeholder="" value="0" required onchange="updateTotal()" />

                                    <!-- button untuk menambah tiket -->
                                    <button type="button" onclick="changeValue('child-input', 1)"
                                        class="border border-white peer-checked:text-white hover:bg-white hover:text-gray-900 rounded-e-lg p-3 h-11 focus:ring-white focus:ring-1">
                                        <svg class="w-3 h-3 fill-current hover:text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                                <p id="helper-text-explanation"
                                    class="mt-2 text-sm text-gray-500 dark:text-gray-400 italic">**Child: Rp 30,000</p>
                            </div>
                        </div>
                    </div>

                    <!-- show date & show time -->
                    <div class="flex mt-4 justify-between gap-10 ">

                        <!-- show dates -->
                        <div>
                            <p id="date-header" class="font-semibold text-xl">Show Date</p>
                            <hr class="border mb-4 mt-2 border-gray-400">
                            <ul class="flex gap-3 flex-row">
                                <?php
                                $startDate = new \DateTime(date('Y-m-d'));
                                $endDate = new \DateTime(date('Y-m-d', strtotime('+6 day')));
                                $index = 1;
                                for ($date = $startDate; $date <= $endDate; $date->modify('+1 day')) { ?>
                                <li>
                                    <input type="radio" id=<?= 'date' . $index ?> name="date-opt"
                                        value=<?= $date->format('Y-m-d') ?> class="hidden peer" required />
                                    <label for=<?= 'date' . $index ?>
                                        class="flex flex-col items-center justify-center w-[58px] h-[58px] p-1 text-white border border-white rounded-lg cursor-pointer peer-checked:text-gray-900 peer-checked:bg-white hover:bg-white hover:text-gray-900">
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

                        <!-- show time section -->
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
                                    <input type="radio" id=<?= "time" . $index ?> name="time" value=<?= $value ?>
                                        class="hidden peer" required />
                                    <label for=<?= "time" . $index ?>
                                        class="px-3 inline-fle items-center justify-center w-full p-1 text-white border border-white rounded-full cursor-pointer peer-checked:text-gray-900 peer-checked:bg-white hover:bg-white hover:text-gray-900">
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

                    <!-- button checkout -->
                    <button type="button" id="order-button" class=" mt-6 px-6 py-3 border rounded-lg text-white font-semibold hover:bg-red-600
                        hover:border-red-600">
                        Order
                    </button>

                    <!-- confirmation modal -->
                    <div id="confirm-modal" tabindex="-1"
                        class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto backdrop-blur-sm">
                        <div class="absolute inset-0 bg-black opacity-40"></div>
                        <div class="relative p-4 w-full max-w-xl h-auto md:h-auto">
                            <div class="relative p-4 rounded-lg shadow bg-gray-800 sm:p-5">
                                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                                    <div class="text-lg md:text-xl text-white">
                                        <h3 class="font-semibold">Order Confirmation</h3>
                                    </div>
                                </div>
                                <div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="mb-4">
                                            <img class="w-full h-full rounded-xl object-cover shadow-lg"
                                                src="../public/interstellar-poster.jpg" alt="thumbnail">
                                        </div>
                                        <div class="col-span-2">
                                            <p class="text-lg text-white font-medium mb-4">Order Detail</p>
                                            <table class="table-auto">
                                                <tbody>
                                                    <tr class="text-xs text-white">
                                                        <td>Film</td>
                                                        <td> : </td>
                                                        <td>Interstellar</td>
                                                    </tr>
                                                    <tr class="text-xs text-white">
                                                        <td>Duration</td>
                                                        <td> : </td>
                                                        <td>169 Minutes</td>
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
                                                </tbody>
                                            </table>

                                            <table class="my-3 text-left text-gray-400">
                                                <thead
                                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-3 py-3 rounded-s-lg">Ticket Type</th>
                                                        <th scope="col" class="px-3 py-3">Qty</th>
                                                        <th scope="col" class="px-3 py-3 rounded-e-lg">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-gray-800">
                                                        <th scope="row"
                                                            class="px-3 py-2 font-medium text-xs whitespace-nowrap text-white w-full">
                                                            Ticket (Adult)</th>
                                                        <td class="px-3 text-xs py-2">
                                                            <p id="total-adult"></p>
                                                        </td>
                                                        <td class="px-3 text-xs py-2">
                                                            <p id="adult-price"></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-800">
                                                        <th scope="row"
                                                            class="px-3 py-1 font-medium text-xs whitespace-nowrap text-white">
                                                            Ticket (Child)</th>
                                                        <td class="px-3 py-1 text-xs">
                                                            <p id="total-child"></p>
                                                        </td>
                                                        <td class="px-3 py-1 text-xs">
                                                            <p id="child-price"></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-800 border-b-2">
                                                        <th scope="row"
                                                            class="px-3 pb-2 py-1 font-medium text-xs whitespace-nowrap text-white">
                                                            Discount</th>
                                                        <td class="px-3 py-1 pb-2 text-xs"></td>
                                                        <td class="px-3 py-1 pb-2 text-xs">
                                                            <p id="total-discount"></p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="font-semibold text-white">
                                                        <th scope="row" class="px-3 py-3 text-base">Total</th>
                                                        <td class="px-3 py-3">
                                                            <p id="total-adult-child"></p>
                                                        </td>
                                                        <td class="px-3 py-3">
                                                            <p id="total-price"></p>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end gap-5 items-center">
                                    <button type="button" id="cancel-button">Cancel</button>
                                    <button type="submit" name="submit" onclick="submitBooking()">Order</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- warning modal -->
                    <div id="warning-modal"
                        class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
                        <div class="absolute inset-0 bg-black opacity-40"></div>
                        <div class="bg-gray-800 rounded-lg shadow-lg max-w-md w-full p-6 relative">

                            <div class="flex flex-col items-center text-center">
                                <i class="bx bxs-error-circle text-red-600 text-6xl mb-4"></i>
                                <h2 id="warning-message" class="text-xl font-semibold text-white mb-2"></h2>
                            </div>
                            <div class="mt-6 flex justify-center">
                                <button id="close-warning-modal"
                                    class="px-5 py-2 border border-white text-white rounded-md hover:bg-red-600 hover:border-red-600">
                                    OK
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="script.js"></script>
</body>

</html>