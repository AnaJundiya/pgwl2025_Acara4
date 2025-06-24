@extends('layout.template')

@section('content')
    <style>
        html {
            scroll-behavior: smooth;
        }

        .hero-section {
            position: relative;
            background-image: url('{{ asset('images/LandingPage.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            color: #FEBA17;
            font-family: 'Lora', serif;
        }

        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }

        .hero-section p {
            font-size: 1.5rem;
            font-family: 'Lora', serif;
        }

        .info-section {
            padding: 4rem 2rem;
            background-color: #f5f5f5;
            font-family: 'Lora', serif;
            margin-top: 50px;
        }

        .info-section h2 {
            color: #FEBA17;
            border-bottom: 2px solid #FEBA17;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-family: 'Playfair Display', serif;
        }

        .info-card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
            animation: floatCard 3s ease-in-out infinite;
        }

        .info-card.fade-in {
            opacity: 1;
            transform: translateY(0);
        }

        .info-card:hover {
            transform: translateY(-10px) scale(1.02);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        @keyframes floatCard {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .footer {
            background-color: #FEBA17;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-family: 'Lora', serif;
            margin-top: 60px;
        }


        .footer .footer-title {
            font-size: 1.8rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .footer a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer small {
            font-size: 0.9rem;
        }

        .section-title {
            color: #FEBA17;
            border-bottom: 2px solid #FEBA17;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
            font-family: 'Playfair Display', serif;
        }


        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-section p {
                font-size: 1.2rem;
            }
        }

        .section-title {
            color: #FEBA17;
        }
    </style>

    <!-- Hero -->
    <div class="hero-section">
        <h1>Welcome to RANUMI</h1>
        <p>Jelajahi Banyuwangi, Rasakan Kesegaran Alamnya bersama RANUMI</p>
    </div>

    <!-- Tentang -->
    <div class="info-section container">
        <h2>Tentang RANUMI</h2>
        <p>
            <strong>RANUMI (Ragam Nuansa Wisata Alam Banyuwangi)</strong> adalah platform WebGIS interaktif yang dirancang
            untuk membantu Anda mengeksplorasi keindahan alam dan budaya di Kabupaten Banyuwangi. Melalui pemetaan berbasis
            analisis buffer hotel terdekat dari destinasi wisata, RANUMI memberikan informasi yang akurat dan menarik bagi
            wisatawan, pelaku usaha, serta pemerintah daerah.
            Temukan lokasi penginapan yang strategis, rencanakan perjalanan dengan lebih mudah, dan nikmati pengalaman
            wisata yang tak terlupakan di Bumi Blambangan.
        </p>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="info-card">
                    <h4>🌍 Tujuan</h4>
                    <ul>
                        <li>Memetakan dan mempromosikan destinasi wisata unggulan</li>
                        <li>Memetakan hubungan spasial antara hotel dan destinasi wisata di Banyuwangi</li>
                        <li>Menyajikan informasi lokasi penginapan terdekat dari titik-titik wisata unggulan</li>
                        <li>Memberikan pengalaman eksplorasi peta interaktif bagi pengguna</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <h4>⚙️ Metodologi</h4>
                    <ul>
                        <li>Pemetaan berbasis GIS dan analisis buffer</li>
                        <li>Penyajian informasi melalui WebGIS interaktif</li>
                        <li>Pemanfaatan teknologi peta dinamis untuk mendukung perencanaan wisata yang efektif</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card">
                    <h4>🎯 Manfaat</h4>
                    <ul>
                        <li>Bagi wisatawan: informasi akurat tentang hotel terdekat dari destinasi wisata</li>
                        <li>Bagi pemerintah: dukungan data spasial untuk pengembangan pariwisata daerah</li>
                        <li>Bagi pelaku usaha: peluang promosi dan pengembangan bisnis berbasis spasial</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Buffer Section -->
    <div class="container mt-5 mb-5">
        <h2 class="mb-3 section-title">Analisis Buffer Hotel Terdekat</h2>
        <div id="map"
            style="height: 500px; border-radius: 10px; overflow: hidden; box-shadow: 0 8px 16px rgb(254, 186, 23);"></div>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-title">🌻RANUMI</div>
            <div>
                <a href="https://github.com/AnaJundiya" target="_blank"><i class="fab fa-github"></i> GitHub</a>
                <a href="mailto:jundyaana@gmail.com"><i class="fas fa-envelope"></i> Kontak</a>
            </div>
            <small>© 2025 RANUMI - Ragam Nuansa Wisata Alam Banyuwangi</small>
        </div>
    </footer>

    <!-- Fade In Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.info-card');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            }, {
                threshold: 0.2
            });

            cards.forEach(card => observer.observe(card));
        });
    </script>


    <!-- Leaflet JS + Map Buffer + Lokasi Wisata + Layer Control -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([-8.2192, 114.3691], 11); // Koordinat Banyuwangi

        // Basemap
        var baseMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var wisataLayer = L.geoJSON(null, {
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng).bindPopup('<strong>' + feature.properties.nama + '</strong>');
            }
        });

        var hotelBufferLayer = L.geoJSON(null, {
            style: {
                color: '#D17D98',
                weight: 2,
                fillColor: '#F4CCE9',
                fillOpacity: 0.5
            }
        });

        var multiRingBufferLayer = L.geoJSON(null, {
            style: function(feature) {
                let warna;
                let kategori = feature.properties.kategori || feature.properties.keterangan || feature
                    .properties.buffer || "";

                if (kategori.includes("0") || kategori.includes("1000")) {
                    warna = '#ABEBC6'; // Hijau muda
                } else if (kategori.includes("2000")) {
                    warna = '#F9E79F'; // Kuning
                } else if (kategori.includes("3000")) {
                    warna = '#F5B7B1'; // Merah muda
                } else {
                    warna = '#D7DBDD'; // Default abu-abu
                }

                return {
                    color: '#AF3E3E',
                    weight: 1.5,
                    fillColor: '#EAEBD0',
                    fillOpacity: 0.7
                };
            }
        });

        var jalanLayer = L.geoJSON(null, {
            style: {
                color: '#7D3C98',
                weight: 1.5
            }
        });

        // --- Deklarasi layer ---
        var adminLayer = L.geoJSON(null, {
            style: {
                color: '#898AC4',
                weight: 2,
                fillColor: '#C0C9EE',
                fillOpacity: 1
            }
        });

        // --- Load data GeoJSON ---
        fetch('/geojson/Wisata_BWI.geojson')
            .then(res => res.json())
            .then(data => wisataLayer.addData(data));

        fetch('/geojson/hotel_buffer.geojson')
            .then(res => res.json())
            .then(data => hotelBufferLayer.addData(data));

        fetch('/geojson/MultiBuffer_Hotel.geojson')
            .then(res => res.json())
            .then(data => multiRingBufferLayer.addData(data));

        fetch('/geojson/Jalan_BWI.geojson')
            .then(res => res.json())
            .then(data => jalanLayer.addData(data));

        fetch('/geojson/Admin_BWI.geojson')
            .then(res => res.json())
            .then(data => adminLayer.addData(data));

        // --- Layer Control (urut dari bawah ke atas) ---
        var overlayMaps = {
            "📍 Lokasi Wisata": wisataLayer,
            "🏨 Buffer Hotel": hotelBufferLayer,
            "🌀 Multi-Ring Buffer Hotel": multiRingBufferLayer,
            "🚧 Data Jalan": jalanLayer,
            "🗺️ Data Administrasi": adminLayer
        };

        L.control.layers(null, overlayMaps, {
            collapsed: false
        }).addTo(map);

        // --- Tambahkan semua layer sebagai default (aktif saat awal) ---
        wisataLayer.addTo(map);
        hotelBufferLayer.addTo(map);
        multiRingBufferLayer.addTo(map);
        jalanLayer.addTo(map);
        adminLayer.addTo(map);
    </script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
