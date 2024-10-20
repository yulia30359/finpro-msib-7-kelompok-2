// Fungsi untuk toggle dropdown di elemen "courseDropdown"
// Mengubah tampilan dropdown menjadi "block" jika sebelumnya tersembunyi, dan menampilkan panah ke atas.
// Jika dropdown sudah terbuka, akan menyembunyikannya dan mengubah panah menjadi ke bawah.
function toggleDropdown() {
    var dropdown = document.getElementById("courseDropdown");
    var arrow = document.getElementById("dropdownArrow");

    if (dropdown.style.display === "none" || dropdown.style.display === "") {
        dropdown.style.display = "block";
        arrow.classList.remove("fa-chevron-down");
        arrow.classList.add("fa-chevron-up");
    } else {
        dropdown.style.display = "none";
        arrow.classList.remove("fa-chevron-up");
        arrow.classList.add("fa-chevron-down");
    }
}

// Fungsi untuk toggle filter "courseFilter"
// Jika filter sedang ditampilkan, akan disembunyikan dan panah akan diarahkan ke bawah.
// Sebaliknya, jika filter disembunyikan, filter akan ditampilkan dan panah akan diarahkan ke atas.
function toggleFilter() {
    var filter = document.getElementById("courseFilter");
    var arrow = document.getElementById("courseArrow");

    if (filter.style.display === "block") {
        filter.style.display = "none";
        arrow.classList.remove("fa-chevron-up");
        arrow.classList.add("fa-chevron-down");
    } else {
        filter.style.display = "block";
        arrow.classList.remove("fa-chevron-down");
        arrow.classList.add("fa-chevron-up");
    }
}

// Fungsi untuk toggle tampilan dropdown konten berdasarkan filterId dan arrowId
// Fungsi ini digunakan untuk menampilkan atau menyembunyikan konten dropdown
// serta mengubah arah panah sesuai dengan status dropdown.
function toggleTime(filterId, arrowId) {
    var filter = document.getElementById(filterId);
    var arrow = document.getElementById(arrowId);

    if (filter.style.display === "block") {
        filter.style.display = "none";
        arrow.classList.remove("fa-chevron-up");
        arrow.classList.add("fa-chevron-down");
    } else {
        filter.style.display = "block";
        arrow.classList.remove("fa-chevron-down");
        arrow.classList.add("fa-chevron-up");
    }
}

// Fungsi untuk memeriksa konten dropdown saat halaman dimuat
// Fungsi ini akan menyembunyikan dropdown yang tidak memiliki konten dan menampilkan
// tanda panah ke bawah. Sebaliknya, jika dropdown memiliki konten, dropdown akan ditampilkan
// dengan panah ke atas.
document.addEventListener("DOMContentLoaded", function() {
    const dropdowns = ['infiniteTime', 'thisWeekTime', 'nextWeekTime', 'laterTime'];
    
    dropdowns.forEach(function(dropdown) {
        const element = document.getElementById(dropdown);
        const arrow = document.getElementById(dropdown === 'infiniteTime' ? 'timeArrow1' :
                     dropdown === 'thisWeekTime' ? 'timeArrow2' :
                     dropdown === 'nextWeekTime' ? 'timeArrow3' :
                     'timeArrow4');

        if (element.innerHTML.trim() === "") {
            element.style.display = "none";
            arrow.classList.remove("fa-chevron-up");
            arrow.classList.add("fa-chevron-down");
        } else {
            element.style.display = "block";
            arrow.classList.remove("fa-chevron-down");
            arrow.classList.add("fa-chevron-up");
        }
    });
});

// Fungsi untuk toggle materi
// Fungsi ini digunakan untuk menampilkan atau menyembunyikan konten materi
// serta mengubah arah panah sesuai dengan status konten materi tersebut.
function toggleMateri(materiId, arrowId) {
    var materi = document.getElementById(materiId);
    var arrow = document.getElementById(arrowId);

    if (materi.style.display === "block") {
        materi.style.display = "none";
        arrow.classList.remove("fa-chevron-up");
        arrow.classList.add("fa-chevron-down");
    } else {
        materi.style.display = "block";
        arrow.classList.remove("fa-chevron-down");
        arrow.classList.add("fa-chevron-up");
    }
}

// Fungsi untuk menambahkan class "active" pada item sidebar
// Berdasarkan URL yang saat ini diakses, fungsi ini akan menambahkan class "active" pada item sidebar yang sesuai,
// menandai bahwa halaman tersebut sedang aktif.
function setActiveSidebarItem() {
    var path = window.location.pathname;
    
    if (path.includes("homeworklist.html")) {
        document.getElementById("homework-list").classList.add("active");
    } else if (path.includes("chat.html")) {
        document.getElementById("chat").classList.add("active");
    } else if (path.includes("index.html")) {
        document.getElementById("home").classList.add("active");
    } else {
        if (path.includes("course1.html")) {
            document.getElementById("course1").classList.add("active");
        } else if (path.includes("course2.html")) {
            document.getElementById("course2").classList.add("active");
        } else if (path.includes("course3.html")) {
            document.getElementById("course3").classList.add("active");
        }
    }
}

// Memanggil fungsi setActiveSidebarItem ketika halaman selesai dimuat
window.onload = setActiveSidebarItem;


// Template konten chat default
const defaultChatContent = `
    <div class="chat-placeholder">
        <h3>Pilih seseorang untuk dihubungi</h3>
    </div>
`;

// Daftar chat yang telah disimpan untuk setiap kontak
const chats = {
    'mentor': `
        <div class="chat-messages">
            <div class="message-send">Selamat Pagi, ada yang mau ditanyakan?<i class="fa-solid fa-check" style="margin-left: 15px;"></i></div>
            <div class="message-receive">Selamat Pagi, kak Ahmad<i class="fa-solid fa-check" style="margin-left: 15px;"></i></div>
        </div>
    `,
    'student1': `
        <div class="chat-messages">
            <div class="message-send">Wes Boloo..<i class="fa-solid fa-check" style="margin-left: 15px;"></i></div>
            <div class="message-receive">P, Tugasmu wes mari ta?<i class="fa-solid fa-check" style="margin-left: 15px;"></i></div>
        </div>
    `,
    'student2': `
        <div class="chat-messages">
            <div class="message-send">Haii..!<i class="fa-solid fa-check" style="margin-left: 15px;"></i></div>
            <div class="message-receive">Haloo<i class="fa-solid fa-check" style="margin-left: 15px;"></i></div>
        </div>
    `
};

// Fungsi untuk membuka chat berdasarkan kontak yang dipilih
// Fungsi ini akan mengganti konten chat dengan pesan dari kontak yang dipilih,
// serta memperbarui header dengan nama kontak.
function openChat(contact) {
    const contactCard = document.querySelector(`.card-contact[data-contact="${contact}"]`);
    const contactName = contactCard.querySelector('.contact-name').textContent;

    document.querySelector('.body-chat').innerHTML = `
        <div class="header-chat">
            <i class="fa-solid fa-chevron-left" style="margin-left: 20px;" onclick="goBack()"></i>
            <div class="circle" style="margin-left: 20px;">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="name-status">
                <div class="header-contact-name">${contactName}</div>
                <div class="header-contact-status">Online</div>
            </div>
        </div>
        ${chats[contact]}
        <div class="footer-chat">
            <i class="fa-regular fa-face-smile" style="margin: 20px; cursor: pointer;"></i>
            <input type="text" class="input-chat" placeholder="Ketik pesan">
            <i class="fa-solid fa-paper-plane" style="margin: 20px; cursor: pointer;"></i>
        </div>
    `;
}

// Fungsi untuk kembali ke halaman daftar kontak
// Fungsi ini akan mengembalikan tampilan chat ke konten default
// yang berisi placeholder 'Pilih seseorang untuk dihubungi'.
function goBack() {
    document.querySelector('.body-chat').innerHTML = defaultChatContent;
}

// Set tampilan default pada body chat saat halaman pertama kali dimuat
document.querySelector('.body-chat').innerHTML = defaultChatContent;