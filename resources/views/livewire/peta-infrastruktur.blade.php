<div>
    <x-shared-header activeMenu="peta" />
    <section class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 mb-4 gap-4">
                <h1 class="text-2xl text-center font-bold text-gray-800 dark:text-white">Peta Infrastruktur</h1>
            </div>
            <div
                class="overflow-x-auto rounded-lg shadow-lg bg-white dark:bg-gray-800 p-6 border border-gray-200 dark:border-gray-700 mb-6">
                <div class="mb-4">
                    <h2 class="text-xl font-semibold text-primary mb-2">Peta Sebaran BTS Kabupaten Sijunjung</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-2">Total BTS: {{ $totalBts }}</p>
                </div>
                <div id="bts-map" style="width:100%;height:500px;border-radius:8px;overflow:hidden;"></div>
            </div>
        </div>
    </section>

    <!-- LeafletJS CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta
            var map = L.map('bts-map').setView([-0.693, 100.987], 10); // Default center Sijunjung
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // Ambil data marker dari endpoint Laravel
            fetch('/bts-map-data')
                .then(res => res.json())
                .then(data => {
                    // Custom icon tower
                    var towerIcon = L.icon({
                        iconUrl: "{{ asset('images/tower-marker.png') }}", // Ganti ke SVG jika ada
                        iconSize: [32, 40],
                        iconAnchor: [16, 40],
                        popupAnchor: [0, -36]
                    });
                    data.forEach(function(bts) {
                        if (bts.lat && bts.lng) {
                            var marker = L.marker([bts.lat, bts.lng], {
                                icon: towerIcon
                            }).addTo(map);
                            var popup = `<b>${bts.pemilik || '-'}</b><br>${bts.alamat || '-'}<br>` +
                                `Teknologi: <b>${bts.teknologi}</b><br>Status: <b>${bts.status}</b><br>` +
                                `Tahun Bangun: <b>${bts.tahun_bangun}</b>`;
                            marker.bindPopup(popup);
                        }
                    });
                });
        });
    </script>

    <!-- Map Styles -->
    <style>
        /* Map container */
        .leaflet-container {
            z-index: 1;
            height: 500px;
            width: 100%;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }

        /* BTS Map title background */
        .bts-map-title-bg {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</div>
