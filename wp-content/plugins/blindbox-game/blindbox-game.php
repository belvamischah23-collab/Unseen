<?php
/**
 * Plugin Name: Blind Box Game
 * Description: Pilih box misteri, dapatkan salah satu produk ASLI dari katalog kamu (narik otomatis dari WooCommerce). Setiap user hanya bisa main SEKALI. Gunakan shortcode [blindbox_game]
 * Version: 2.0
 * Author: Shey
 */

if (!defined('ABSPATH')) exit; // Keamanan: cegah akses langsung ke file

function bbg_register_shortcode() {
    add_shortcode('blindbox_game', 'bbg_render_game');
}
add_action('init', 'bbg_register_shortcode');

function bbg_render_game() {

    if ( ! class_exists( 'WooCommerce' ) ) {
        return '<p>WooCommerce belum aktif, produk tidak bisa dimuat.</p>';
    }

    // Ambil semua produk asli, diurutkan dari termurah ke termahal
    $products = wc_get_products( array(
        'status'  => 'publish',
        'limit'   => -1,
        'orderby' => 'price',
        'order'   => 'ASC',
    ) );

    if ( empty( $products ) ) {
        return '<p>Belum ada produk di katalog. Tambahkan produk dulu di WooCommerce &rarr; Products.</p>';
    }

    // Bagi rarity berdasarkan harga: 60% termurah = Common, 30% berikutnya = Rare, 10% termahal = Secret
    $total      = count( $products );
    $common_cut = (int) ceil( $total * 0.6 );
    $rare_cut   = (int) ceil( $total * 0.9 );

    $items = array();
    foreach ( $products as $i => $product ) {
        if ( $i < $common_cut ) {
            $rarity = 'common';
        } elseif ( $i < $rare_cut ) {
            $rarity = 'rare';
        } else {
            $rarity = 'secret';
        }

        $image_id  = $product->get_image_id();
        $image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : wc_placeholder_img_src();

        $items[] = array(
            'name'   => $product->get_name(),
            'image'  => $image_url,
            'price'  => html_entity_decode( wp_strip_all_tags( $product->get_price_html() ), ENT_QUOTES ),
            'url'    => get_permalink( $product->get_id() ),
            'rarity' => $rarity,
        );
    }

    $items_json = wp_json_encode( $items );

    ob_start();
    ?>

    <div class="bbg-wrapper">
        <h2 class="bbg-title">🎁 Blind Box Pick</h2>
        <p class="bbg-subtitle" id="bbg-subtitle">Setiap box berisi salah satu produk asli dari katalog kami. Pilih satu box — itu produk yang akan kamu beli. Kamu cuma punya 1 kesempatan!</p>

        <div class="bbg-grid" id="bbg-grid"></div>

        <div class="bbg-result" id="bbg-result" style="display:none;">
            <div class="bbg-result-card">
                <img class="bbg-result-img" id="bbg-result-img" src="" alt="">
                <div class="bbg-result-name" id="bbg-result-name"></div>
                <div class="bbg-result-price" id="bbg-result-price"></div>
                <div class="bbg-result-rarity" id="bbg-result-rarity"></div>
                <a href="#" id="bbg-result-buy" class="bbg-buy-btn" target="_blank">Beli Produk Ini</a>
            </div>
            <p class="bbg-locked-note">Ini produk yang kamu dapatkan dari Blind Box — klik tombol di atas buat lanjut checkout. 🎉</p>
        </div>
    </div>

    <style>
        .bbg-wrapper {
            max-width: 700px;
            margin: 40px auto;
            text-align: center;
            font-family: inherit;
        }
        .bbg-title { font-size: 28px; margin-bottom: 4px; }
        .bbg-subtitle { color: #888; margin-bottom: 24px; max-width: 520px; margin-left: auto; margin-right: auto; }

        .bbg-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            justify-items: center;
        }

        .bbg-box {
            width: 100px;
            height: 100px;
            background: linear-gradient(145deg, #ffd1e3, #ffe6ef);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            cursor: pointer;
            box-shadow: 0 6px 14px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
            user-select: none;
        }
        .bbg-box:hover { transform: translateY(-4px) scale(1.03); }
        .bbg-box.disabled { opacity: 0.4; pointer-events: none; }
        .bbg-box.shaking { animation: bbg-shake 0.5s ease; }
        @keyframes bbg-shake {
            0%, 100% { transform: rotate(0deg); }
            20% { transform: rotate(-8deg); }
            40% { transform: rotate(8deg); }
            60% { transform: rotate(-6deg); }
            80% { transform: rotate(6deg); }
        }

        .bbg-result { margin-top: 32px; }
        .bbg-result-card {
            display: inline-block;
            background: #fff;
            border-radius: 20px;
            padding: 28px 40px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
            animation: bbg-pop 0.4s ease;
            max-width: 320px;
        }
        @keyframes bbg-pop {
            0% { transform: scale(0.7); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        .bbg-result-img {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 14px;
            margin-bottom: 10px;
        }
        .bbg-result-name { font-size: 19px; font-weight: 700; }
        .bbg-result-price { color: #d0021b; font-weight: 700; margin-top: 4px; }
        .bbg-result-rarity {
            display: inline-block;
            margin-top: 8px;
            padding: 4px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }
        .rarity-common { background: #e0e0e0; color: #555; }
        .rarity-rare { background: #cfe8ff; color: #1565c0; }
        .rarity-secret { background: #ffe082; color: #8a5a00; }

        .bbg-buy-btn {
            display: block;
            margin-top: 18px;
            padding: 12px 20px;
            background: #000;
            color: #fff !important;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none !important;
            border-radius: 6px;
            letter-spacing: 0.5px;
        }
        .bbg-buy-btn:hover { background: #12265a; }

        .bbg-locked-note {
            margin-top: 16px;
            color: #888;
            font-size: 14px;
        }
    </style>

    <script>
    (function() {
        const STORAGE_KEY = 'bbg_result_v2';
        const items = <?php echo $items_json; ?>;

        const rarityLabel = { common: "Common", rare: "Rare", secret: "✨ SECRET ✨" };
        const rarityWeightTotal = { common: 60, rare: 30, secret: 10 };

        function countByRarity(r) {
            return items.filter(function(it) { return it.rarity === r; }).length;
        }

        function pickItem() {
            const commonCount = countByRarity('common');
            const rareCount = countByRarity('rare');
            const secretCount = countByRarity('secret');

            const weighted = items.map(function(it) {
                let groupCount = it.rarity === 'common' ? commonCount : (it.rarity === 'rare' ? rareCount : secretCount);
                if (groupCount === 0) groupCount = 1;
                return { item: it, weight: rarityWeightTotal[it.rarity] / groupCount };
            });

            const totalWeight = weighted.reduce(function(sum, w) { return sum + w.weight; }, 0);
            let rand = Math.random() * totalWeight;
            for (const w of weighted) {
                if (rand < w.weight) return w.item;
                rand -= w.weight;
            }
            return weighted[0].item;
        }

        function showResult(item) {
            const grid = document.getElementById('bbg-grid');
            const result = document.getElementById('bbg-result');
            const subtitle = document.getElementById('bbg-subtitle');

            grid.style.display = 'none';
            subtitle.style.display = 'none';

            document.getElementById('bbg-result-img').src = item.image;
            document.getElementById('bbg-result-img').alt = item.name;
            document.getElementById('bbg-result-name').textContent = item.name;
            document.getElementById('bbg-result-price').textContent = item.price;
            const rarityEl = document.getElementById('bbg-result-rarity');
            rarityEl.textContent = rarityLabel[item.rarity];
            rarityEl.className = 'bbg-result-rarity rarity-' + item.rarity;
            document.getElementById('bbg-result-buy').href = item.url;

            result.style.display = 'block';
        }

        function initGame() {
            if (!items || items.length === 0) return;

            const saved = localStorage.getItem(STORAGE_KEY);
            if (saved) {
                showResult(JSON.parse(saved));
                return;
            }

            const grid = document.getElementById('bbg-grid');
            grid.innerHTML = '';

            for (let i = 0; i < 6; i++) {
                const box = document.createElement('div');
                box.className = 'bbg-box';
                box.textContent = '🎁';
                box.addEventListener('click', function() {
                    document.querySelectorAll('.bbg-box').forEach(function(b) { b.classList.add('disabled'); });
                    box.classList.add('shaking');

                    setTimeout(function() {
                        const item = pickItem();
                        localStorage.setItem(STORAGE_KEY, JSON.stringify(item));
                        showResult(item);
                    }, 500);
                });
                grid.appendChild(box);
            }
        }

        document.addEventListener('DOMContentLoaded', initGame);
    })();
    </script>

    <?php
    return ob_get_clean();
}
