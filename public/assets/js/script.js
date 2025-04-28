// Existing scripts + Hamburger Menu Toggle
document.addEventListener("DOMContentLoaded", function () {
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const navbarLinks = document.querySelector(".navbar-links");

    hamburgerMenu.addEventListener("click", function () {
        // Toggle active class on hamburger menu and navbar links
        hamburgerMenu.classList.toggle("active");
        navbarLinks.classList.toggle("active");
    });

    // Close menu when a link is clicked
    document.querySelectorAll(".navbar-links a").forEach((link) => {
        link.addEventListener("click", function () {
            hamburgerMenu.classList.remove("active");
            navbarLinks.classList.remove("active");
        });
    });

    // Navbar scroll effect
    window.addEventListener("scroll", function () {
        const navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });

    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const navbarLinks = document.querySelectorAll(".navbar-links a");
    const sections = document.querySelectorAll("section");

    // Function to remove active class from all links
    function removeActiveLinks() {
        navbarLinks.forEach((link) => {
            link.classList.remove("active-link");
        });
    }

    // Scroll event listener to highlight active section
    function highlightNavbar() {
        let currentSection = "";

        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (
                window.scrollY >= sectionTop - 100 &&
                window.scrollY < sectionTop + sectionHeight - 100
            ) {
                currentSection = section.id;
            }
        });

        removeActiveLinks();

        const activeLink = document.querySelector(
            `.navbar-links a[href="#${currentSection}"]`
        );
        if (activeLink) {
            activeLink.classList.add("active-link");
        }
    }

    // Click event to set active link
    navbarLinks.forEach((link) => {
        link.addEventListener("click", function () {
            removeActiveLinks();
            this.classList.add("active-link");
        });
    });

    // Initial highlight
    highlightNavbar();

    // Add scroll event listener
    window.addEventListener("scroll", highlightNavbar);
});

// Gallery Function
document.addEventListener("DOMContentLoaded", function () {
    const galleryItems = document.querySelectorAll(".gallery-item");
    const modal = document.getElementById("gallery-modal");
    const modalImage = document.getElementById("modal-image");
    const closeModal = document.querySelector(".close-modal");

    // Open modal when zoom button is clicked
    galleryItems.forEach((item) => {
        const zoomBtn = item.querySelector(".gallery-zoom-btn");
        const image = item.querySelector("img");

        zoomBtn.addEventListener("click", () => {
            modal.style.display = "flex";
            modalImage.src = image.src;
        });
    });

    // Close modal
    closeModal.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Close modal when clicking outside the image
    modal.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
});

// Animasi Product
const productItems = document.querySelectorAll(".product-item");

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            }
        });
    },
    {
        threshold: 0.1, // Minimal 10% elemen terlihat
    }
);
productItems.forEach((item) => observer.observe(item));

// Fungsi Untuk Produk
document.addEventListener("DOMContentLoaded", function () {
    // Product filtering functionality
    const filterButtons = document.querySelectorAll(".filter-btn");
    const products = document.querySelectorAll(".product-card");

    filterButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            filterButtons.forEach((btn) => btn.classList.remove("active"));

            // Add active class to clicked button
            this.classList.add("active");

            // Get filter value
            const filterValue = this.getAttribute("data-filter");

            // Filter products
            if (filterValue === "all") {
                products.forEach((product) => {
                    product.style.display = "block";
                });
            } else {
                products.forEach((product) => {
                    if (product.getAttribute("data-category") === filterValue) {
                        product.style.display = "block";
                    } else {
                        product.style.display = "none";
                    }
                });
            }
        });
    });
});
