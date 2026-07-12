<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donat-in azza | Donat Empuk Bikin Kangen</title>
    <meta name="description" content="Donat rumahan premium yang empuk banget. Bentuknya lucu-lucu, cocok buat nyenengin bocil atau sekadar ngemil bareng bestie.">
    <meta name="theme-color" content="#FF4D8D">

    <style>
        /* */
        /* ========================================================================== */
        /* VARIABEL TEMA & WARNA                                                      */
        /* ========================================================================== */
        :root {
            --pink-50: #FFF0F5;
            --pink-100: #FFE3EE;
            --pink-300: #FF9EBE;
            --pink-500: #FF4D8D;
            --pink-700: #D92B6B;
            --gold-light: #FBE7A1;
            --gold: #D4AF37;
            --dark: #2D2A2B;
            --dark-light: #5A5557;
            --light: #FFFFFF;

            --font-sans: 'Segoe UI', system-ui, -apple-system, sans-serif;
            --font-serif: 'Georgia', 'Times New Roman', serif;

            --container-width: 1200px;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 2rem;
            --spacing-xl: 4rem;

            --radius-sm: 12px;
            --radius-md: 24px;
            --radius-lg: 40px;
            --radius-pill: 100px;

            --shadow-sm: 0 4px 15px rgba(255, 77, 141, 0.05);
            --shadow-md: 0 10px 30px rgba(255, 77, 141, 0.12);
            --shadow-hover: 0 20px 40px rgba(255, 77, 141, 0.2);

            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ========================================================================== */
        /* RESET & PENGATURAN DASAR                                                   */
        /* ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-sans);
            color: var(--dark);
            background-color: var(--pink-50);
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4 {
            font-family: var(--font-serif);
            font-weight: 700;
            color: var(--dark);
            line-height: 1.2;
        }

        p {
            color: var(--dark-light);
            font-size: 1.05rem;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .container {
            width: 90%;
            max-width: var(--container-width);
            margin: 0 auto;
        }

        /* */
        /* ========================================================================== */
        /* KOMPONEN GLOBAL (TOMBOL & JUDUL)                                           */
        /* ========================================================================== */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 2.5rem;
            border-radius: var(--radius-pill);
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition-smooth);
            border: none;
            outline: none;
            text-align: center;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-primary {
            background-color: var(--pink-500);
            color: var(--light);
            box-shadow: var(--shadow-md);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: var(--transition-smooth);
            z-index: -1;
        }

        .btn-primary:hover {
            background-color: var(--pink-700);
            transform: translateY(-3px) scale(1.02);
            box-shadow: var(--shadow-hover);
        }

        .btn-primary:hover::before {
            left: 100%;
            transition: 0.6s;
        }

        .btn-outline {
            background-color: transparent;
            color: var(--pink-500);
            border: 2px solid var(--pink-500);
        }

        .btn-outline:hover {
            background-color: var(--pink-50);
            transform: translateY(-3px);
        }

        .section-header {
            text-align: center;
            margin-bottom: var(--spacing-xl);
        }

        .section-tag {
            display: inline-block;
            background-color: var(--pink-100);
            color: var(--pink-500);
            padding: 0.4rem 1.2rem;
            border-radius: var(--radius-pill);
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: var(--spacing-md);
        }

        .section-title {
            font-size: 2.5rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background-color: var(--gold);
            border-radius: 2px;
        }

        /* */
        /* ========================================================================== */
        /* NAVBAR / MENU ATAS                                                         */
        /* ========================================================================== */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1.2rem 0;
            background: rgba(255, 240, 245, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index: 1000;
            transition: var(--transition-smooth);
            border-bottom: 1px solid rgba(255, 77, 141, 0.1);
        }

        nav.scrolled {
            padding: 0.8rem 0;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: var(--shadow-sm);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: var(--font-serif);
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--pink-500);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo span {
            color: var(--gold);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-links a:not(.btn) {
            font-weight: 500;
            color: var(--dark);
            position: relative;
            transition: var(--transition-smooth);
        }

        .nav-links a:not(.btn)::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--pink-500);
            transition: var(--transition-smooth);
        }

        .nav-links a:not(.btn):hover {
            color: var(--pink-500);
        }

        .nav-links a:not(.btn):hover::after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--pink-500);
            cursor: pointer;
        }

        /* */
        /* ========================================================================== */
        /* HERO SECTION (BERANDA ATAS)                                                */
        /* ========================================================================== */
        .hero {
            padding: 180px 0 100px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--pink-100) 0%, transparent 70%);
            border-radius: 50%;
            z-index: -1;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content h1 {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }

        .hero-content h1 span {
            color: var(--pink-500);
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            max-width: 90%;
        }

        .hero-btns {
            display: flex;
            gap: 1rem;
        }

        .hero-image-wrapper {
            position: relative;
        }

        .hero-image {
            width: 100%;
            height: 500px;
            background: linear-gradient(135deg, var(--pink-100), var(--pink-300));
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: morph 8s ease-in-out infinite alternate;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-shadow: var(--shadow-md);
            border: 8px solid rgba(255,255,255,0.5);
            overflow: hidden;
        }

        .hero-image::after {
            content: '🍩';
            font-size: 12rem;
            animation: float 4s ease-in-out infinite;
        }

        .floating-badge {
            position: absolute;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
            padding: 1rem 1.5rem;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            z-index: 2;
        }

        .badge-1 {
            top: 10%;
            left: -20px;
            animation: float 5s ease-in-out infinite reverse;
        }

        .badge-2 {
            bottom: 10%;
            right: -20px;
            animation: float 6s ease-in-out infinite;
        }

        .star-icon {
            color: var(--gold);
            font-size: 1.2rem;
        }

        /* ========================================================================== */
        /* TENTANG KAMI                                                               */
        /* ========================================================================== */
        .about {
            padding: var(--spacing-xl) 0;
            background-color: var(--light);
            border-radius: var(--radius-lg);
            margin: 0 20px;
            box-shadow: var(--shadow-sm);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-image {
            position: relative;
            border-radius: var(--radius-lg);
            overflow: hidden;
            aspect-ratio: 4/3;
            background-color: var(--pink-100);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
        }

        .about-image::before {
            content: '✨';
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2rem;
        }

        .about-text h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .about-text p {
            margin-bottom: 1.5rem;
        }

        .stats-container {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--pink-100);
        }

        .stat-item h4 {
            font-size: 2rem;
            color: var(--pink-500);
            font-family: var(--font-sans);
        }

        .stat-item p {
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        /* */
        /* ========================================================================== */
        /* MENU & PRODUK                                                              */
        /* ========================================================================== */
        .products {
            padding: 100px 0;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background-color: var(--light);
            border-radius: var(--radius-md);
            padding: 2rem;
            text-align: center;
            transition: var(--transition-smooth);
            position: relative;
            border: 1px solid rgba(255, 77, 141, 0.05);
        }

        .product-card:hover {
            transform: translateY(-15px);
            box-shadow: var(--shadow-md);
            border-color: var(--pink-100);
        }

        .product-img-wrapper {
            width: 160px;
            height: 160px;
            margin: 0 auto 1.5rem;
            background: var(--pink-50);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            transition: var(--transition-smooth);
            overflow: hidden;
        }

        .product-card:hover .product-img-wrapper {
            transform: scale(1.1) rotate(5deg);
            background: var(--pink-100);
        }

        .product-card h3 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
        }

        .product-card p {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        .product-price {
            font-weight: 700;
            color: var(--gold);
            font-size: 1.2rem;
            margin-bottom: 0.2rem;
            display: block;
        }

        .product-size-info {
            font-size: 0.8rem;
            color: var(--pink-500);
            margin-bottom: 1rem;
            font-weight: 600;
            background: var(--pink-50);
            display: inline-block;
            padding: 2px 10px;
            border-radius: 10px;
        }

        /* ========================================================================== */
        /* KOTAK BANTUAN AI (CUSTOM RESEP, IDE PESTA, DSB)                            */
        /* ========================================================================== */
        .ai-creator {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--pink-50), var(--pink-100));
            margin: 40px 20px;
            border-radius: var(--radius-lg);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .ai-card {
            background: var(--light);
            padding: 2rem;
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-md);
            margin-top: 2rem;
            display: none;
            animation: float 4s ease-in-out infinite;
            border: 2px solid var(--pink-300);
        }

        .ai-card.active {
            display: block;
        }

        .ai-emoji {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .ai-name {
            font-size: 1.8rem;
            color: var(--pink-500);
            margin-bottom: 0.5rem;
            font-family: var(--font-serif);
            font-weight: bold;
        }

        .ai-desc {
            color: var(--dark-light);
        }

        .ai-pairing {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background: var(--pink-50);
            color: var(--pink-700);
            border-radius: var(--radius-sm);
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px dashed var(--pink-300);
        }

        #aiPartyContent h3 {
            color: var(--pink-500);
            font-family: var(--font-serif);
            font-size: 1.5rem;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        #aiPartyContent ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark-light);
        }

        #aiPartyContent p {
            margin-bottom: 1rem;
            color: var(--dark-light);
        }

        #aiPartyContent strong {
            color: var(--dark);
        }

        .ai-matchmaker {
            background: var(--light);
            border: 2px dashed var(--pink-300);
            border-radius: var(--radius-md);
            padding: 2rem;
            margin-bottom: 3rem;
            text-align: center;
            box-shadow: var(--shadow-sm);
        }

        .ai-match-header h3 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            color: var(--pink-500);
        }

        .ai-match-input-group {
            display: flex;
            gap: 10px;
            max-width: 600px;
            margin: 1.5rem auto;
            flex-wrap: wrap;
            justify-content: center;
        }

        .ai-match-result {
            background: var(--pink-50);
            border-radius: var(--radius-sm);
            padding: 1.5rem;
            margin-top: 1.5rem;
            border: 1px solid var(--pink-100);
            animation: float 4s ease-in-out infinite alternate;
        }

        .match-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            color: var(--pink-500);
            font-weight: 800;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* */
        /* ========================================================================== */
        /* TESTIMONI PELANGGAN                                                        */
        /* ========================================================================== */
        .testimonials {
            padding: 100px 0;
            background-color: var(--pink-500);
            color: var(--light);
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
            margin: 0 20px;
        }

        .testimonials .section-header * {
            color: var(--light);
        }

        .testimonials .section-tag {
            background-color: rgba(255,255,255,0.2);
        }

        .testimonials .section-title::after {
            background-color: var(--gold-light);
        }

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testi-card {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: var(--radius-md);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
        }

        .quote-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.2);
            font-family: var(--font-serif);
            line-height: 1;
        }

        .testi-text {
            font-size: 1.1rem;
            font-style: italic;
            margin-bottom: 1.5rem;
            color: var(--light);
        }

        .testi-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background-color: var(--gold-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--pink-700);
        }

        .author-info h4 {
            color: var(--light);
            font-family: var(--font-sans);
            font-size: 1rem;
            margin: 0;
        }

        .author-info span {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* ========================================================================== */
        /* PERTANYAAN UMUM (FAQ)                                                      */
        /* ========================================================================== */
        .faq {
            padding: 100px 0;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        details {
            background-color: var(--light);
            border-radius: var(--radius-sm);
            margin-bottom: 1rem;
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: var(--transition-smooth);
        }

        details[open] {
            box-shadow: var(--shadow-md);
        }

        summary {
            padding: 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            list-style: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        summary::-webkit-details-marker {
            display: none;
        }

        summary::after {
            content: '+';
            font-size: 1.5rem;
            color: var(--pink-500);
            transition: transform 0.3s ease;
        }

        details[open] summary::after {
            transform: rotate(45deg);
        }

        .faq-content {
            padding: 0 1.5rem 1.5rem;
            color: var(--dark-light);
        }

        /* */
        /* ========================================================================== */
        /* FORMULIR KONTAK                                                            */
        /* ========================================================================== */
        .contact {
            padding: 80px 0;
            background-color: var(--light);
            margin: 0 20px 40px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .contact-info p {
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background-color: var(--pink-100);
            color: var(--pink-500);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        /* Customisasi Form Control Standar */
        .form-control {
            width: 100%;
            padding: 1.2rem;
            border: 2px solid var(--pink-50);
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 1rem;
            background-color: var(--pink-50);
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--pink-300);
            background-color: var(--light);
            box-shadow: 0 0 0 4px rgba(255, 77, 141, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }

        /* --- Gaya Khusus Dropdown Select agar sesuai Tema --- */
        select.form-control {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23FF4D8D' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2em;
            padding-right: 2.5rem;
            cursor: pointer;
        }

        select.form-control:focus {
            border-color: var(--pink-500);
            box-shadow: 0 0 0 3px rgba(255, 77, 141, 0.2);
        }

        /* --- Desain Kolom Input + Tombol Menyatu (Input Group) --- */
        .input-group {
            display: flex;
            align-items: stretch;
            width: 100%;
        }

        .input-group .form-control {
            border: 2px solid var(--pink-100);
            border-right: none;
            border-radius: var(--radius-sm) 0 0 var(--radius-sm);
            background-color: var(--light);
            padding: 0.8rem 1rem;
        }

        .input-group .form-control:focus {
            border-color: var(--pink-300);
            box-shadow: none;
        }

        .input-group .btn {
            border: 2px solid var(--pink-300);
            background-color: var(--pink-50);
            color: var(--pink-500);
            border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
            font-weight: 700;
            margin: 0;
            padding: 0.8rem 1.2rem;
            font-size: 0.95rem;
            white-space: nowrap;
        }

        .input-group .btn:hover {
            background-color: var(--pink-100);
            transform: none;
        }

        /* ========================================================================== */
        /* FOOTER (BAGIAN PALING BAWAH)                                               */
        /* ========================================================================== */
        footer {
            background-color: var(--dark);
            color: var(--light);
            padding: 80px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .footer-brand .logo {
            color: var(--light);
            margin-bottom: 1.5rem;
        }

        .footer-brand p {
            color: #A09D9E;
            max-width: 300px;
        }

        .footer-heading {
            font-family: var(--font-sans);
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            color: var(--light);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: #A09D9E;
            transition: var(--transition-smooth);
        }

        .footer-links a:hover {
            color: var(--pink-300);
            padding-left: 5px;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition-smooth);
        }

        .social-icon:hover {
            background-color: var(--pink-500);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #A09D9E;
            font-size: 0.9rem;
        }

        /* ========================================================================== */
        /* JENDELA POP-UP (MODALS & TOAST)                                            */
        /* ========================================================================== */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(45, 42, 43, 0.6); /* Slightly darker backdrop */
            backdrop-filter: blur(8px);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition-smooth);
            padding: 20px;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background-color: var(--light);
            padding: 2.5rem;
            border-radius: var(--radius-md);
            width: 100%;
            max-width: 500px;
            position: relative;
            transform: translateY(30px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal.active .modal-content {
            transform: translateY(0) scale(1);
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 32px;
            height: 32px;
            background: var(--pink-50);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--pink-500);
            cursor: pointer;
            line-height: 1;
            transition: var(--transition-smooth);
            z-index: 10;
        }

        .close-modal:hover {
            background: var(--pink-100);
            color: var(--pink-700);
            transform: rotate(90deg);
        }

        .toast {
            position: fixed;
            bottom: -100px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--pink-500);
            color: var(--light);
            padding: 1rem 2rem;
            border-radius: var(--radius-pill);
            box-shadow: var(--shadow-hover);
            z-index: 3000;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            font-weight: 600;
            text-align: center;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toast.show {
            bottom: 30px;
        }

        /* */
        /* ========================================================================== */
        /* GAYA KHUSUS MODAL LOGIN & REGISTER                                         */
        /* ========================================================================== */

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-header .logo {
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .auth-tabs {
            display: flex;
            background: var(--pink-50);
            border-radius: var(--radius-pill);
            padding: 5px;
            margin-bottom: 2rem;
            position: relative;
        }

        .auth-tab-btn {
            flex: 1;
            padding: 0.8rem 1rem;
            border: none;
            background: transparent;
            font-weight: 600;
            font-size: 1rem;
            color: var(--dark-light);
            cursor: pointer;
            border-radius: var(--radius-pill);
            transition: var(--transition-smooth);
            position: relative;
            z-index: 2;
        }

        .auth-tab-btn.active {
            color: var(--pink-500);
            background: var(--light);
            box-shadow: var(--shadow-sm);
        }

        .auth-form-container {
            position: relative;
            overflow: hidden;
        }

        .auth-form {
            display: none;
            animation: fadeIn 0.4s ease forwards;
        }

        .auth-form.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .input-icon-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-icon-group .icon {
            position: absolute;
            left: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--pink-300);
            font-size: 1.2rem;
        }

        .input-icon-group .form-control {
            padding-left: 3rem;
            margin-bottom: 0;
        }

        .password-toggle {
            position: absolute;
            right: 1.2rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--dark-light);
            cursor: pointer;
            background: none;
            border: none;
            font-size: 1.1rem;
            padding: 0;
        }

        .password-toggle:hover {
            color: var(--pink-500);
        }

        .auth-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .auth-options a {
            color: var(--pink-500);
            font-weight: 600;
        }

        .auth-options a:hover {
            text-decoration: underline;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--dark-light);
            cursor: pointer;
        }

        .checkbox-container input {
            accent-color: var(--pink-500);
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--dark-light);
            font-size: 0.9rem;
            margin: 1.5rem 0;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--pink-100);
        }

        .divider:not(:empty)::before { margin-right: .5em; }
        .divider:not(:empty)::after { margin-left: .5em; }

        .btn-google {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            background-color: var(--light);
            color: var(--dark);
            border: 2px solid var(--pink-100);
            padding: 0.8rem;
            border-radius: var(--radius-pill);
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .btn-google:hover {
            background-color: var(--pink-50);
            border-color: var(--pink-300);
            transform: translateY(-2px);
        }

        .btn-google img {
            width: 20px;
            height: 20px;
        }

        /* */
        /* ========================================================================== */
        /* EFEK ANIMASI                                                               */
        /* ========================================================================== */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes morph {
            0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
            25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
            50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
            75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
            100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
        }

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========================================================================== */
        /* RESPONSIVE DESIGN (TAMPILAN HP DAN TABLET)                                 */
        /* ========================================================================== */
        @media (max-width: 992px) {
            .hero-container, .about-grid, .contact-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            .hero {
                padding-top: 120px;
                text-align: center;
            }
            .hero-content h1 {
                font-size: 3rem;
            }
            .hero-content p {
                max-width: 100%;
            }
            .hero-btns {
                justify-content: center;
            }
            .hero-image {
                height: 400px;
            }
            .about-image {
                order: -1;
            }
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background-color: var(--light);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 2rem;
                transition: var(--transition-smooth);
            }
            .nav-links.active {
                left: 0;
            }
            .mobile-menu-btn {
                display: block;
            }
            .section-title {
                font-size: 2rem;
            }
            .footer-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .social-icons {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <!-- -->
    <!-- Menu Atas -->
    <nav id="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">
                🍩 Donat-in<span> azza</span>
            </a>
            <ul class="nav-links" id="nav-links">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Awal Mula Kami</a></li>
                <li><a href="#menu">Menu Favorit</a></li>
                <li><a href="#testimonials">Kata Mereka</a></li>
                <li><a href="#contact">Tanya Admin</a></li>
                <!-- Tombol Login / Profil Tambahan -->
                @auth
                    @if(auth()->user()->role === 'admin')
                        <li><a href="{{ route('admin.dashboard') }}" class="btn btn-outline" style="padding: 0.6rem 1.5rem; font-size: 0.95rem; margin-left: 1rem;">Dashboard Admin</a></li>
                    @else
                        <li><a href="{{ route('customer.dashboard') }}" class="btn btn-outline" style="padding: 0.6rem 1.5rem; font-size: 0.95rem; margin-left: 1rem;">👤 Profil Saya</a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}" class="btn btn-primary" style="padding: 0.6rem 1.5rem; font-size: 0.95rem; margin-left: 1rem; box-shadow: none;">Masuk / Daftar</a></li>
                @endauth
            </ul>
            <button class="mobile-menu-btn" id="mobile-btn">☰</button>
        </div>
    </nav>

    <!-- Bagian Sambutan Utama -->
    <section id="home" class="hero">
        <div class="container hero-container">
            <div class="hero-content reveal">
                <span class="section-tag">Bikin Fresh Tiap Pagi ☀️</span>
                <h1>Manisnya Pas, <span>Empuknya</span> Bikin Kangen.</h1>
                <p>Bukan donat biasa. Kami bikin adonannya tiap subuh pakai bahan pilihan supaya teksturnya selembut awan. Bentuknya yang gemesin dijamin bikin si kecil (dan kamu juga!) senyum-senyum sendiri.</p>
                <div class="hero-btns">
                    <a href="#menu" class="btn btn-primary">Lihat Menu Dulu</a>
                    <a href="#about" class="btn btn-outline">Kenalan Yuk!</a>
                </div>
            </div>
            <div class="hero-image-wrapper reveal" style="transition-delay: 0.2s;">
                <div class="hero-image"></div>
                <div class="floating-badge badge-1">
                    <span class="star-icon">★</span> Pasti Halal
                </div>
                <div class="floating-badge badge-2">
                    <span class="star-icon">✨</span> Gak Bikin Serik
                </div>
            </div>
        </div>
    </section>

    <!-- Cerita Kami -->
    <section id="about" class="about">
        <div class="container about-grid">
            <div class="about-image reveal">
                🧑‍🍳
            </div>
            <div class="about-text reveal" style="transition-delay: 0.2s;">
                <span class="section-tag">Cerita di Balik Dapur</span>
                <h2>Awalnya Cuma Iseng Bikin Buat Bekal Anak...</h2>
                <p>Semuanya berawal dari dapur rumah. Dulu rasanya susah banget nyari donat yang teksturnya bener-bener empuk tapi bentuknya lucu buat narik perhatian anak-anak biar mau makan bekal.</p>
                <p>Setelah nyoba puluhan resep gagal (dan tepung berantakan di mana-mana!), akhirnya ketemu deh racikan pas yang sekarang kamu cobain ini. Dari yang awalnya cuma dibagiin ke tetangga, sekarang puji syukur bisa nemenin momen spesial banyak keluarga. ❤️</p>

                <div class="stats-container">
                    <div class="stat-item">
                        <h4>50+</h4>
                        <p>Ide Rasa</p>
                    </div>
                    <div class="stat-item">
                        <h4>10rb+</h4>
                        <p>Teman Donat-in</p>
                    </div>
                    <div class="stat-item">
                        <h4>100%</h4>
                        <p>Bahan Aman</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Menu Donat -->
    <section id="menu" class="products">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">Paling Laris</span>
                <h2 class="section-title">Menu Andalan Kami</h2>
                <p style="margin-top: 15px;">Dibuat terbatas setiap hari biar selalu fresh sampai ke tangan kamu.</p>
            </div>

            <div class="product-grid" style="margin-bottom: 4rem;">
                @forelse($menus as $menu)
                <div class="product-card reveal" style="transition-delay: 0.1s;">
                    <div class="product-img-wrapper">
                        @if(Str::length($menu->image_path) <= 4)
                            {{ $menu->image_path }}
                        @else
                            <img src="{{ $menu->image_path }}" alt="" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.style.display='none'; this.parentNode.innerHTML='🍩';">
                        @endif
                    </div>
                    <h3>{{ $menu->name }}</h3>
                    <p>{{ $menu->description }}</p>
                    <span class="product-price">Rp {{ number_format($menu->base_price, 0, ',', '.') }}</span>
                    <div class="product-size-info">Bisa pesen banyak (Extra: Rp {{ number_format($menu->extra_price, 0, ',', '.') }}/biji)</div>
                    @auth
                        <button class="btn btn-primary order-btn" data-id="{{ $menu->id }}" data-product="{{ $menu->name }}" data-base="{{ $menu->base_price }}" data-extra="{{ $menu->extra_price }}" style="padding: 0.6rem 1.5rem; width: 100%;">Mau yang ini</button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline order-btn" style="padding: 0.6rem 1.5rem; width: 100%;">Masuk untuk pesan</a>
                    @endauth
                </div>
                @empty
                <p style="text-align: center; width: 100%; padding: 2rem;">Belum ada menu nih kak...</p>
                @endforelse
            </div>

            <!-- Fitur Tambahan Admin: Buat Resep Custom -->
            <div id="ai-creator" class="ai-creator reveal" style="margin: 0 0 3rem 0; padding: 3rem 2rem; border: 2px dashed var(--pink-300);">
                <div style="max-width: 800px; margin: 0 auto;">
                    <span class="section-tag" style="background-color: var(--light);">✨ Request Spesial</span>
                    <h3 style="font-size: 2rem; margin-bottom: 1rem; color: var(--pink-500); font-family: var(--font-serif);">Bikin Menu Custom Kamu Sendiri!</h3>
                    <p style="margin-bottom: 0.5rem;">Bosan yang biasa? Ketik aja request idemu di bawah! Nanti admin coba buatin visual fotonya dan cek langsung ke dapur.</p>
                    <p style="margin-bottom: 2rem; font-size: 0.9rem; font-weight: bold; color: var(--pink-700);">⚠️ Catatan: Custom HANYA BISA untuk penambahan atau penggantian topping dari menu yang sudah ada ya kak!</p>

                    <div style="display: flex; gap: 10px; max-width: 600px; margin: 0 auto; flex-wrap: wrap; justify-content: center;">
                        <input type="text" id="aiDonutInput" class="form-control" placeholder="Contoh: Kak, pesen Tiramisu tapi tambahin sprinkle unicorn..." style="flex: 1; min-width: 250px;">
                        <button id="btnGenerateDonut" class="btn btn-primary">✨ Cek Ketersediaan & Foto</button>
                    </div>

                    <div id="aiDonutResult" class="ai-card">
                        <div id="aiDonutImageLoading" style="display:none; justify-content:center; align-items:center; width: 220px; height: 220px; margin: 0 auto 1.5rem; border-radius: var(--radius-md); background: var(--pink-50); color: var(--pink-500); font-weight: bold; border: 2px dashed var(--pink-300);">
                            <div style="text-align:center;">
                                <div style="font-size: 2rem; animation: float 2s infinite;">🍩</div>
                                <div>Lagi diracik fotonya...</div>
                            </div>
                        </div>

                        <div id="aiDonutImageWrapper" style="display:none; justify-content:center; margin-bottom: 1.5rem;">
                            <img id="aiDonutImage" src="" alt="Custom Donut" style="width: 220px; height: 220px; object-fit: cover; border-radius: var(--radius-md); box-shadow: var(--shadow-sm); border: 4px solid var(--pink-100);">
                        </div>

                        <div id="aiDonutEmoji" class="ai-emoji">🍩</div>
                        <div id="aiDonutName" class="ai-name">Memuat...</div>
                        <div id="aiDonutDesc" class="ai-desc">Tunggu bentar ya kak, admin cek bahan di dapur dulu...</div>

                        <div id="aiDonutPairing" class="ai-pairing" style="display:none;"></div>

                        <div style="margin-top: 1.5rem;">
                            <button class="btn btn-outline" id="aiCustomOrderBtn" style="padding: 0.5rem 1.5rem; border-radius: var(--radius-pill); display: none; margin: 0 auto;">Boleh Deh, Pesan Ini</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fitur Tambahan Admin: Saran Rasa -->
            <div class="ai-matchmaker reveal">
                <div class="ai-match-header">
                    <h3>✨ Bingung Pilih? Curhat Sini!</h3>
                    <p>Galau mau pesen yang mana? Kasih tau aja donatnya buat siapa atau lagi ngidam apa, nanti kami kasih contekan menu yang paling pas!</p>
                </div>
                <div class="ai-match-input-group">
                    <input type="text" id="aiMatchInput" class="form-control" placeholder="Tulis cerita kakak di sini ya...">
                    <button id="btnAiMatch" class="btn btn-primary">✨ Minta Saran</button>
                </div>
                <div id="aiMatchResult" class="ai-match-result" style="display: none;">
                    <div class="match-content">
                        <span class="match-label">Coba yang ini deh kak:</span>
                        <h4 id="aiMatchName" style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--dark);">Nama Donat</h4>
                        <p id="aiMatchReason" style="margin-bottom: 1rem; margin-top: 0.5rem; color: var(--dark-light);">Alasan kenapa donat ini cocok...</p>
                        <button class="btn btn-outline" id="aiMatchOrderBtn" style="padding: 0.5rem 1.5rem; border-radius: var(--radius-pill);">Boleh Deh, Pesen Ini</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Testimoni Pelanggan -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">Kata Mereka</span>
                <h2 class="section-title">Testimoni Jujur Pelanggan</h2>
            </div>

            <div class="testi-grid">
                <!-- Testimoni 1 -->
                <div class="testi-card reveal" style="transition-delay: 0.1s;">
                    <div class="quote-icon">"</div>
                    <p class="testi-text">Desainnya gemes pol, keponakan aku sampe sayang mau makannya! Tapi begitu digigit, eh abis 2 biji sendirian. Empuk banget, worth it sih!</p>
                    <div class="testi-author">
                        <div class="author-avatar">D</div>
                        <div class="author-info">
                            <h4>Dinda Kirana</h4>
                            <span>Langganan Tetap</span>
                        </div>
                    </div>
                </div>
                <!-- Sisanya dipersingkat demi menghemat baris, namun esensi tetap ada -->
                <div class="testi-card reveal" style="transition-delay: 0.2s;">
                    <div class="quote-icon">"</div>
                    <p class="testi-text">Pesen buat acara ultah anak di sekolah. Varian Unicorn langsung ludes direbutin temen-temennya. Box-nya juga proper banget, kelihatan mehong padahal harga aman.</p>
                    <div class="testi-author">
                        <div class="author-avatar">M</div>
                        <div class="author-info">
                            <h4>Mama Raffa</h4>
                            <span>Ibu Anak Dua</span>
                        </div>
                    </div>
                </div>
                <div class="testi-card reveal" style="transition-delay: 0.3s;">
                    <div class="quote-icon">"</div>
                    <p class="testi-text">Jarang-jarang nemu donat yang buat besok paginya masih empuk. Choco Goldbite-nya juara sih, cokelatnya kerasa banget bukan yang murahan rasanya.</p>
                    <div class="testi-author">
                        <div class="author-avatar">K</div>
                        <div class="author-info">
                            <h4>Kevin Santoso</h4>
                            <span>Tukang Ngemil</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Bantuan Acara Pesta -->
    <section id="ai-party" class="ai-creator reveal" style="background: linear-gradient(135deg, var(--gold-light), var(--pink-100));">
        <div class="container" style="max-width: 800px;">
            <span class="section-tag" style="background-color: var(--light);">✨ Fitur Bantuan</span>
            <h2 class="section-title" style="margin-bottom: 1rem;">Pusing Mikirin Tema Acara Anak?</h2>
            <p style="margin-bottom: 2rem;">Mau bikin kejutan buat si kecil tapi otak lagi mentok? Sini cerita, anaknya umur berapa & sukanya apa, nanti kami bantu bikinin ide seru-seruan buat acaranya!</p>

            <div style="display: flex; gap: 10px; max-width: 600px; margin: 0 auto; flex-wrap: wrap; justify-content: center;">
                <input type="text" id="aiPartyInput" class="form-control" placeholder="Tulis umur dan kesukaan anaknya di sini kak..." style="flex: 1; min-width: 250px;">
                <button id="btnGenerateParty" class="btn btn-primary" style="background-color: var(--pink-700);">✨ Cari Ide Yuk</button>
            </div>

            <div id="aiPartyResult" class="ai-card" style="text-align: left; line-height: 1.8;">
                <div id="aiPartyContent" class="ai-desc text-dark" style="color: var(--dark);">Sabar ya kak, lagi cari inspirasi sebentar...</div>
            </div>
        </div>
    </section>

    <!-- Bagian FAQ (Tanya Jawab) -->
    <section id="faq" class="faq">
        <div class="container faq-container reveal">
            <div class="section-header">
                <span class="section-tag">Biar Nggak Galau</span>
                <h2 class="section-title">Yang Sering Ditanyain</h2>
            </div>

            <details open>
                <summary>Kak, donatnya aman nggak kalau dimakan besok?</summary>
                <div class="faq-content">
                    Aman banget kak! Walaupun kami nggak pakai pengawet sama sekali, adonannya kami bikin pakai teknik khusus biar empuknya awet. Asal disimpen di suhu ruang dan kotaknya ditutup rapet ya. <strong>Jangan dimasukin kulkas</strong>, nanti malah jadi keras!
                </div>
            </details>
            <details>
                <summary>Ini halal nggak kak?</summary>
                <div class="faq-content">
                    InsyaAllah 100% Halal kak. Kami ini ibu-ibu yang juga bawel soal makanan buat keluarga, jadi mulai dari tepung, ragi, cokelat, sampai pewarna semuanya dipastikan aman dan berlogo halal.
                </div>
            </details>
        </div>
    </section>

    <!-- Hubungi Kami -->
    <section id="contact" class="contact">
        <div class="container contact-grid">
            <div class="contact-info reveal">
                <span class="section-tag">Yuk Ngobrol</span>
                <h2>Jangan Sungkan Tanya Admin!</h2>
                <p>Mau pesen banyak buat acara kantor? Atau mau tanya-tanya dulu soal rasa? Langsung aja chat kami, adminnya ramah-ramah kok.</p>
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div>
                        <h4>Dapur Kami</h4>
                        <p style="margin-bottom:0">Jl. Kedungmundu Raya (Depan Unimus)</p>
                    </div>
                </div>
            </div>

            <div class="contact-form reveal" style="transition-delay: 0.2s;">
                <form id="contactForm">
                    <div class="form-group">
                        <input type="text" id="contactName" class="form-control" placeholder="Panggilan kakak siapa?">
                    </div>
                    <div class="form-group">
                        <input type="email" id="contactEmail" class="form-control" placeholder="Email (buat kirim resi kalau butuh)">
                    </div>
                    <div class="form-group">
                        <select id="contactSubject" class="form-control">
                            <option value="" disabled selected>Mau bahas apa nih kak?</option>
                            <option value="pesanan">Mau Order Donat Biasa</option>
                            <option value="pertanyaan">Cuma Mau Tanya-tanya Dulu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea id="contactMessage" class="form-control" placeholder="Ketik aja pertanyaannya di sini kak..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim Pesan ke Admin</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer Paling Bawah -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="logo">🍩 Donat-in<span> azza</span></div>
                    <p>Dari dapur rumah yang hangat, kami bikin donat yang empuknya kelewatan buat nemenin hari-harimu biar makin manis.</p>
                </div>
                <div>
                    <h4 class="footer-heading">Ada Diskon Lho!</h4>
                    <p style="color: #A09D9E; margin-bottom: 1rem;">Masukin emailmu sini, kadang admin suka iseng bagi-bagi voucher.</p>
                    <div style="display: flex; gap: 10px;">
                        <input type="email" id="subscribeEmail" placeholder="Ketik email kakak..." style="padding: 0.8rem; border-radius: 8px; border: none; width: 100%; outline: none;">
                        <button id="btnSubscribe" class="btn btn-primary" style="padding: 0.8rem; border-radius: 8px;">Mau!</button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Donat-in azza. Dibuat dengan banyak cinta dan gula.</p>
            </div>
        </div>
    </footer>

    <!-- -->
    <!-- Modal Form Pemesanan Utama (Existing) -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" id="closeOrderModal">×</span>
            <h2 style="margin-bottom: 1rem; color: var(--pink-500);">Pesen Yuk! 🍩</h2>
            @auth
            <form id="orderForm" action="{{ route('customer.order.place') }}" method="POST">
                @csrf
                <input type="hidden" name="menu_id" id="orderMenuId">
                
                <div class="form-group">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Yang Kakak Pilih:</label>
                    <input type="text" id="orderProduct" class="form-control" readonly style="background-color: var(--pink-100); font-weight: bold; color: var(--pink-700);">
                </div>

                <div class="form-group" style="display: flex; gap: 1rem;">
                    <div style="flex: 1;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Isi Per Kotak?</label>
                        <input type="number" name="size" id="orderBoxSize" class="form-control" min="1" value="5" required>
                        <small id="extraPriceHelper" style="color: var(--pink-500); font-weight: bold; margin-top: 4px; display: inline-block;"></small>
                    </div>
                    <div style="flex: 1;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Jumlah Kotak?</label>
                        <input type="number" name="quantity" id="orderQty" class="form-control" min="1" value="1" required>
                    </div>
                </div>

                <!-- Pratinjau Harga -->
                <div id="pricePreview" style="margin-bottom: 1rem; padding: 10px; background: var(--pink-50); border-radius: 8px; font-weight: bold; color: var(--pink-700); text-align: center; font-size: 1.1rem;">
                    Total: Rp 0
                </div>

                <div class="form-group">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Nomor WA (Aktif ya kak)</label>
                    <input type="tel" name="phone_number" id="orderWa" class="form-control" value="{{ auth()->user()->phone_number }}" required placeholder="Contoh: 08123456789">
                </div>

                <div class="form-group">
                    <label style="display:block; margin-bottom:0.5rem; font-weight:600;">Metode Pesanan:</label>
                    <select name="service_type" id="orderMethod" class="form-control" required>
                        <option value="Take Away">Diambil Sendiri (Take Away) - Cepat & Tanpa Ongkir</option>
                        <option value="Delivery">Kirim ke Rumah (Delivery) - Lacak Lokasi Otomatis</option>
                    </select>
                </div>

                <div class="form-group">
                    <label style="display:flex; justify-content: space-between; align-items: center; margin-bottom:0.5rem; font-weight:600;">
                        Titip Pesan di Kartu? <span style="font-size: 0.8rem; font-weight: normal; color: var(--pink-500);">(Boleh Kosong)</span>
                    </label>
                    <textarea name="notes" id="orderGiftMessage" class="form-control" placeholder="Ketik pesannya di sini kak..." style="min-height: 80px;"></textarea>
                </div>

                <button type="submit" id="btnSubmitOrder" class="btn btn-primary" style="width: 100%;">Konfirmasi & Buat Pesanan</button>
            </form>
            @endauth
        </div>
    </div>

    <!-- Modal Konfirmasi Pesanan (Delivery) / QRIS -->
    <div id="confirmModal" class="modal">
        <div class="modal-content" style="max-width: 400px; padding: 2rem;">
            <span class="close-modal" id="closeConfirmModal">×</span>
            <h2 style="margin-bottom: 1rem; color: var(--pink-500); text-align: center;">Scan QRIS 🍩✨</h2>
            <div id="confirmContent" style="background: var(--pink-50); padding: 1.5rem; border-radius: var(--radius-sm); margin-bottom: 1.5rem; font-size: 0.95rem; text-align: center;">
                <p style="margin-bottom: 10px; font-weight: bold; color: var(--dark);">Total Tagihan: <span id="qrisTotalAmount">Rp 0</span></p>
                <div style="width: 200px; height: 200px; margin: 0 auto; background: white; padding: 10px; border-radius: 12px; border: 2px dashed var(--pink-300); display: flex; align-items: center; justify-content: center; font-size: 5rem;">
                    📱
                </div>
                <p style="margin-top: 10px; font-size: 0.85rem; color: var(--dark-light);">Silakan scan QR di atas menggunakan M-Banking atau E-Wallet kakak.</p>
            </div>
            <div style="display: flex; gap: 10px;">
                <button id="btnBackToOrder" class="btn btn-outline" style="flex: 1; padding: 0.8rem;">Batal</button>
                <button id="btnProceedToQR" class="btn btn-primary" style="flex: 2; padding: 0.8rem; background-color: #4CAF50; border-color: #4CAF50;">✅ Saya Sudah Bayar</button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Pesanan (Take Away) -->
    <div id="takeAwayModal" class="modal">
        <div class="modal-content" style="max-width: 400px; padding: 2rem; text-align: center;">
            <h2 style="margin-bottom: 1rem; color: var(--pink-500);">Pesanan Take Away 🛍️</h2>
            <div style="background: var(--pink-50); padding: 1.5rem; border-radius: var(--radius-sm); margin-bottom: 1.5rem;">
                <p style="margin-bottom: 10px; color: var(--dark-light);">Tunjukkan kode pesanan ini ke kasir toko kami untuk melakukan pembayaran dan mengambil donat:</p>
                <div style="font-size: 2.5rem; font-weight: bold; color: var(--pink-700); letter-spacing: 2px; border: 2px dashed var(--pink-300); padding: 10px; border-radius: 8px;">
                    TK-<span id="randomTakeAwayCode">000</span>
                </div>
            </div>
            <button id="btnConfirmTakeAway" class="btn btn-primary" style="width: 100%; padding: 1rem;">Oke, Selesaikan Pesanan</button>
        </div>
    </div>

    <!-- Modal Pilihan Pembayaran Delivery -->
    <div id="deliveryPaymentModal" class="modal">
        <div class="modal-content" style="max-width: 400px; padding: 2rem; text-align: center;">
            <h2 style="margin-bottom: 1rem; color: var(--pink-500);">Metode Pembayaran 🛵</h2>
            <p style="margin-bottom: 1.5rem; color: var(--dark-light);">Pilih cara pembayaran untuk pengiriman ke rumah kakak:</p>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <button id="btnChooseCOD" class="btn btn-outline" style="padding: 1rem; border-width: 2px; text-align: center;">💵 Bayar di Tempat (COD)</button>
                <button id="btnChooseQRIS" class="btn btn-outline" style="padding: 1rem; border-width: 2px; border-color: #4CAF50; color: #4CAF50; text-align: center;">📱 Bayar Pakai QRIS / Transfer</button>
            </div>
            <button id="btnBackToDeliveryForm" class="btn btn-outline" style="width: 100%; margin-top: 15px; padding: 0.8rem; border: none; color: var(--dark-light);">Kembali ke Form</button>
        </div>
    </div>

    <!-- Jendela Pop-up Kesalahan / Peringatan -->
    <div id="customAlertModal" class="modal" style="z-index: 4000;">
        <div class="modal-content" style="text-align: center; max-width: 400px; padding: 2rem;">
            <div style="font-size: 3.5rem; margin-bottom: 1rem; animation: float 3s ease-in-out infinite;">🍩</div>
            <h3 style="font-family: var(--font-serif); font-size: 1.5rem; color: var(--pink-500); margin-bottom: 0.5rem;">Perhatian Kak!</h3>
            <p id="customAlertMessage" style="font-size: 1.05rem; color: var(--dark-light); margin-bottom: 1.5rem;"></p>
            <button id="customAlertOkBtn" class="btn btn-primary" style="width: 100%; padding: 0.8rem;">Oke Kak!</button>
        </div>
    </div>

    <!-- -->
    <!-- Modal Autentikasi (Login & Register) -->
    <div id="authModal" class="modal">
        <div class="modal-content" style="max-width: 450px; padding: 2.5rem 2rem;">
            <span class="close-modal" id="closeAuthModal">×</span>

            <div class="auth-header">
                <div class="logo">🍩 <span>azza</span></div>
                <p style="font-size: 0.95rem;">Masuk yuk buat dapetin promo khusus member!</p>
            </div>

            <!-- Tab Switcher -->
            <div class="auth-tabs">
                <button class="auth-tab-btn active" id="tabLoginBtn">Masuk</button>
                <button class="auth-tab-btn" id="tabRegisterBtn">Daftar Baru</button>
            </div>

            <div class="auth-form-container">
                <!-- Form Login -->
                <form id="loginForm" class="auth-form active">
                    <div class="input-icon-group">
                        <span class="icon">✉️</span>
                        <input type="email" class="form-control" placeholder="Email Kakak" required>
                    </div>

                    <div class="input-icon-group">
                        <span class="icon">🔒</span>
                        <input type="password" class="form-control pwd-input" placeholder="Password rahasia..." required>
                        <button type="button" class="password-toggle">👁️</button>
                    </div>

                    <div class="auth-options">
                        <label class="checkbox-container">
                            <input type="checkbox" checked>
                            Ingat Saya
                        </label>
                        <a href="#" onclick="showCustomAlert('Tenang kak, fitur reset password lagi dimasak di dapur IT kami! 🧑‍💻'); return false;">Lupa Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1.2rem;">Masuk ke Akun</button>

                    <div class="divider">atau lebih cepet pakai</div>

                    <button type="button" class="btn-google" onclick="showCustomAlert('Google Login sedang dalam tahap verifikasi, kak. Tunggu bentar lagi ya! 🚀');">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                        Masuk dengan Google
                    </button>
                </form>

                <!-- Form Register -->
                <form id="registerForm" class="auth-form">
                    <div class="input-icon-group">
                        <span class="icon">👤</span>
                        <input type="text" class="form-control" placeholder="Nama Panggilan" required>
                    </div>

                    <div class="input-icon-group">
                        <span class="icon">✉️</span>
                        <input type="email" class="form-control" placeholder="Alamat Email" required>
                    </div>

                    <div class="input-icon-group">
                        <span class="icon">🔒</span>
                        <input type="password" class="form-control pwd-input" placeholder="Bikin Password (Min. 6 Karakter)" minlength="6" required>
                        <button type="button" class="password-toggle">👁️</button>
                    </div>

                    <div class="input-icon-group">
                        <span class="icon">🔑</span>
                        <input type="password" class="form-control pwd-input" placeholder="Ulangi Passwordnya ya" minlength="6" required>
                    </div>

                    <div class="auth-options" style="margin-bottom: 1.5rem;">
                        <label class="checkbox-container" style="font-size: 0.85rem; align-items: flex-start;">
                            <input type="checkbox" required style="margin-top: 4px;">
                            <span>Aku setuju dengan <a href="#">Syarat & Ketentuan</a> yang berlaku di dapur Donat-in azza.</span>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 1.2rem; background-color: var(--pink-700);">Daftar Sekarang 🎉</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Peringatan Mengambang Bawah -->
    <div id="toastNotification" class="toast">
        <span>✨</span> Bentar ya kak...
    </div>

    <!-- -->
    <!-- ========================================== -->
    <!-- BAGIAN JAVASCRIPT / LOGIKA WEB             -->
    <!-- ========================================== -->
    <script>
        // Data Produk Mockup
        const productData = {
            "Unicorn Sprinkle": { base: 25000, extra: 5000 },
            "Goldbite Choco": { base: 30000, extra: 6000 },
            "Berry Wonderland": { base: 25000, extra: 5000 },
            "Caramel Cloud": { base: 30000, extra: 6000 },
            "Matcha Magic": { base: 25000, extra: 5000 },
            "Red Velvet Royale": { base: 30000, extra: 6000 },
            "Tiramisu Dream": { base: 30000, extra: 6000 },
            "Milky Galaxy": { base: 25000, extra: 5000 }
        };

        let currentBasePrice = 25000;
        let currentExtraPrice = 5000;

        let currentOrderDetails = {
            pricePerBox: 0,
            subtotal: 0,
            discount: 0,
            totalProduct: 0,
            size: 5
        };

        // UI & INTERAKSI
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile Menu
            const mobileBtn = document.getElementById('mobile-btn');
            const navLinks = document.getElementById('nav-links');

            mobileBtn.addEventListener('click', function() {
                navLinks.classList.toggle('active');
                mobileBtn.innerHTML = navLinks.classList.contains('active') ? '✕' : '☰';
            });

            document.querySelectorAll('.nav-links a:not(.btn)').forEach(link => {
                link.addEventListener('click', () => {
                    navLinks.classList.remove('active');
                    mobileBtn.innerHTML = '☰';
                });
            });

            // Navbar Scroll Effect
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                navbar.classList.toggle('scrolled', window.scrollY > 50);
            });

            // Scroll Reveal Animation
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add('active');
                });
            }, { threshold: 0.15, rootMargin: "0px 0px -50px 0px" });
            document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

            // Custom Alert
            const customAlertModal = document.getElementById('customAlertModal');
            window.showCustomAlert = (message) => {
                document.getElementById('customAlertMessage').innerText = message;
                customAlertModal.classList.add('active');
            };
            document.getElementById('customAlertOkBtn').addEventListener('click', () => {
                customAlertModal.classList.remove('active');
            });

            //            // Order Modal Logic
            const orderModal = document.getElementById('orderModal');
            const orderBtns = document.querySelectorAll('.order-btn');

            window.updatePricePreview = () => {
                let qty = parseInt(document.getElementById('orderQty').value) || 1;
                let size = parseInt(document.getElementById('orderBoxSize').value) || 5;
                if (size < 5) size = 5;

                let extraPcs = size - 5;
                let pricePerBox = currentBasePrice + (extraPcs * currentExtraPrice);
                let subtotal = pricePerBox * qty;
                let discount = qty >= 2 ? 1000 * qty : 0;
                let total = subtotal - discount;

                currentOrderDetails = { pricePerBox, subtotal, discount, totalProduct: total, size };

                let previewHTML = `Total Harga: Rp ${total.toLocaleString('id-ID')}`;
                if (discount > 0) previewHTML += `<br><span style="font-size: 0.85rem; color: var(--dark-light); font-weight: normal;">(Diskon grosir Rp ${discount.toLocaleString('id-ID')})</span>`;
                document.getElementById('pricePreview').innerHTML = previewHTML;
            };

            document.getElementById('orderQty').addEventListener('input', updatePricePreview);
            document.getElementById('orderBoxSize').addEventListener('input', updatePricePreview);

            orderBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    if(document.getElementById('orderForm')) document.getElementById('orderForm').reset();
                    const productName = e.target.getAttribute('data-product');
                    const productId = e.target.getAttribute('data-id');
                    const basePrice = parseInt(e.target.getAttribute('data-base'));
                    const extraPrice = parseInt(e.target.getAttribute('data-extra'));

                    document.getElementById('orderProduct').value = productName;
                    document.getElementById('orderMenuId').value = productId;
                    
                    currentBasePrice = basePrice;
                    currentExtraPrice = extraPrice;

                    document.getElementById('extraPriceHelper').innerText = `(+ Rp ${currentExtraPrice.toLocaleString('id-ID')}/biji tambahan)`;
                    document.getElementById('orderBoxSize').value = 5;
                    updatePricePreview();
                    orderModal.classList.add('active');
                });
            });

            // Close Modals Logic
            const closeModals = () => {
                document.querySelectorAll('.modal').forEach(m => m.classList.remove('active'));
            };

            document.querySelectorAll('.close-modal').forEach(btn => {
                btn.addEventListener('click', closeModals);
            });

            window.addEventListener('click', (e) => {
                if (e.target.classList.contains('modal')) closeModals();
            });

            // Custom Auth Removed because we use Laravel routes directly

            // Logika simulasi form kontak & pesanan bawaan Anda
            document.getElementById('contactForm').addEventListener('submit', (e) => {
                e.preventDefault();
                showCustomAlert("Pesan terkirim (Simulasi)! Admin akan segera membalas WA kakak. 💌");
                e.target.reset();
            });

            const toast = document.getElementById('toastNotification');
            window.showToast = (msg) => {
                toast.innerHTML = `<span>✨</span> ${msg}`;
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 3000);
            };

            // Intercept form submit
            const orderForm = document.getElementById('orderForm');
            if (orderForm) {
                orderForm.addEventListener('submit', (e) => {
                    e.preventDefault(); 
                    const serviceType = document.getElementById('orderMethod').value;
                    document.getElementById('orderModal').classList.remove('active');

                    if (serviceType === 'Take Away') {
                        showToast("Pesanan Take Away sedang diproses...");
                        setTimeout(() => {
                            document.getElementById('randomTakeAwayCode').innerText = Math.floor(100 + Math.random() * 900);
                            document.getElementById('takeAwayModal').classList.add('active');
                        }, 1200);
                    } else {
                        // Delivery
                        document.getElementById('deliveryPaymentModal').classList.add('active');
                    }
                });
            }

            // Take Away Flow
            document.getElementById('btnConfirmTakeAway').addEventListener('click', () => {
                document.getElementById('takeAwayModal').classList.remove('active');
                HTMLFormElement.prototype.submit.call(orderForm);
            });

            // Delivery Flow (COD)
            document.getElementById('btnChooseCOD').addEventListener('click', () => {
                document.getElementById('deliveryPaymentModal').classList.remove('active');
                showToast("Pesanan COD diproses... Kurir akan segera meluncur!");
                const noteInput = document.getElementById('orderGiftMessage');
                if(!noteInput.value.includes("[COD]")) {
                    noteInput.value = "[Metode: COD] " + noteInput.value;
                }
                setTimeout(() => {
                    HTMLFormElement.prototype.submit.call(orderForm);
                }, 2000);
            });

            // Delivery Flow (QRIS)
            document.getElementById('btnChooseQRIS').addEventListener('click', () => {
                document.getElementById('deliveryPaymentModal').classList.remove('active');
                document.getElementById('qrisTotalAmount').innerText = 'Rp ' + currentOrderDetails.totalProduct.toLocaleString('id-ID');
                document.getElementById('confirmModal').classList.add('active');
                const noteInput = document.getElementById('orderGiftMessage');
                if(!noteInput.value.includes("[QRIS]")) {
                    noteInput.value = "[Metode: QRIS] " + noteInput.value;
                }
            });

            document.getElementById('btnBackToDeliveryForm').addEventListener('click', () => {
                document.getElementById('deliveryPaymentModal').classList.remove('active');
                document.getElementById('orderModal').classList.add('active');
            });

            document.getElementById('btnBackToOrder').addEventListener('click', () => {
                document.getElementById('confirmModal').classList.remove('active');
                document.getElementById('deliveryPaymentModal').classList.add('active');
            });

            document.getElementById('btnProceedToQR').addEventListener('click', () => {
                document.getElementById('confirmModal').classList.remove('active');
                HTMLFormElement.prototype.submit.call(orderForm);
            });

            // Feature: Request Spesial (Cek Ketersediaan & Foto)
            const btnGenerateDonut = document.getElementById('btnGenerateDonut');
            if (btnGenerateDonut) {
                btnGenerateDonut.addEventListener('click', () => {
                    const inputVal = document.getElementById('aiDonutInput').value;
                    if (!inputVal) {
                        showCustomAlert("Kak, masukin dulu idenya di kolom pencarian ya!");
                        return;
                    }
                    
                    // Show Result Card
                    document.getElementById('aiDonutResult').classList.add('active');
                    
                    // Show Loading
                    document.getElementById('aiDonutImageLoading').style.display = 'flex';
                    document.getElementById('aiDonutImageWrapper').style.display = 'none';
                    document.getElementById('aiDonutEmoji').style.display = 'block';
                    document.getElementById('aiDonutName').innerText = 'Memuat...';
                    document.getElementById('aiDonutDesc').innerText = 'Tunggu bentar ya kak, admin cek bahan di dapur dulu...';
                    document.getElementById('aiCustomOrderBtn').style.display = 'none';

                    setTimeout(() => {
                        // Show Result
                        document.getElementById('aiDonutImageLoading').style.display = 'none';
                        document.getElementById('aiDonutImageWrapper').style.display = 'flex';
                        // Using a dummy unsplash image for the donut
                        document.getElementById('aiDonutImage').src = 'https://images.unsplash.com/photo-1551024601-bec78aea704b?q=80&w=250&auto=format&fit=crop';
                        document.getElementById('aiDonutEmoji').style.display = 'none';
                        document.getElementById('aiDonutName').innerText = 'Donat Custom Kakak';
                        document.getElementById('aiDonutDesc').innerText = 'Wah ide bagus! Bahan-bahannya ready kok kak, bisa langsung kita buatkan.';
                        document.getElementById('aiCustomOrderBtn').style.display = 'block';
                    }, 2000);
                });
            }

            // Feature: Minta Saran
            const btnAiMatch = document.getElementById('btnAiMatch');
            if (btnAiMatch) {
                btnAiMatch.addEventListener('click', () => {
                    const inputVal = document.getElementById('aiMatchInput').value;
                    if (!inputVal) {
                        showCustomAlert("Tulis dulu curhatannya di kolom ya kak, biar admin bisa ngasih saran.");
                        return;
                    }
                    
                    const resultDiv = document.getElementById('aiMatchResult');
                    const nameEl = document.getElementById('aiMatchName');
                    const reasonEl = document.getElementById('aiMatchReason');
                    
                    // Show processing temporarily by updating the text
                    resultDiv.style.display = 'block';
                    nameEl.innerText = 'Memikirkan saran...';
                    reasonEl.innerText = 'Sebentar ya kak, lagi milih yang pas nih...';
                    
                    setTimeout(() => {
                        nameEl.innerText = 'Unicorn Sprinkle';
                        reasonEl.innerText = 'Berdasarkan cerita kakak, varian ini paling cocok banget buat nemenin momen spesialnya. Warnanya ceria dan rasanya pasti disukai!';
                    }, 1500);
                });
            }

            // Feature: Cari Ide Yuk (Pesta)
            const btnGenerateParty = document.getElementById('btnGenerateParty');
            if (btnGenerateParty) {
                btnGenerateParty.addEventListener('click', () => {
                    const inputVal = document.getElementById('aiPartyInput').value;
                    if (!inputVal) {
                        showCustomAlert("Kasih tau dulu umur dan kesukaan anaknya ya kak!");
                        return;
                    }
                    
                    const resultCard = document.getElementById('aiPartyResult');
                    resultCard.classList.add('active');
                    
                    const contentEl = document.getElementById('aiPartyContent');
                    contentEl.innerText = 'Sabar ya kak, lagi cari inspirasi sebentar...';
                    
                    setTimeout(() => {
                        contentEl.innerHTML = '<strong>Ide Pesta Seru! 🎉</strong><br><br><strong>Tema:</strong> Pesta Kebun Warna-warni<br><strong>Kegiatan:</strong> Lomba menghias donat sendiri<br><strong>Menu Wajib:</strong> Donat Unicorn & Susu Strawberry<br><br>Gimana kak? Kalau cocok bisa langsung pesan paket pestanya ya!';
                    }, 2000);
                });
            }

        });
    </script>
</body>
</html>
