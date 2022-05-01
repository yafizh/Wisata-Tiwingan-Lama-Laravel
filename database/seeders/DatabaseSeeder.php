<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\ImageGallery;
use Database\Factories\ImageGalleriesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        ImageGallery::create([
            'title' => "Tiwingan Lama Desa Wisata Dengan Pesona Raja Ampat",
            'slug' => "tiwingan-lama-desa-wisata-dengan-pesona-raja-ampat",
            'body' => '<p>JIKA di Papua Barat ada Raja Ampat,  gugusan pulau yang menjadi obyek wisata dunia, maka di Kalimantan Selatan ada Matang Keladan wisata alam dengan pesona menyerupai Raja Ampat. Matang Keladan adalah salah satu dari sekian banyak spot wisata alam yang ada di kawasan Taman Hutan Raya (Tahura) Sultan Adam Kabupaten Banjar, Kalimantan Selatan. Obyek wisata berupa wisata alam perbukitan ini berada di Desa Tiwingan Lama, Kecamatan Aranio yang merupakan bagian dari waduk Riam Kanan.<p>'
        ]);

        Image::create([
            'image_gallery_id' => 1,
            'image' => 'post-images/1.jpg'
        ]);

        ImageGallery::create([
            'title' => "Desa Wisata Tiwingan Lama",
            'slug' => "desa-wisata-tiwingan-lama",
            'body' => '<p>Peraih penghargaan juara 4 ditingkat nasional tahun 2019, bertempat di wilayah yang strategis hanya 45 menit dari Bandara, dan memiliki keberagaman destinasi wisata, paket wisata, dan atraksi budaya. Sehingga selalu menjadi magnet tersendiri untuk para wisatawan lokal maupun asing, terbukti dengan jumlah ribuan pengunjung setiap weekend ya.<p>'
        ]);

        Image::create([
            'image_gallery_id' => 2,
            'image' => 'post-images/2.jpg'
        ]);

        ImageGallery::create([
            'title' => "Desa Tiwingan Lama Desa Wisata dengan Pesona Raja Ampat",
            'slug' => "desa-tiwingan-lama-desa-wisata-dengan-pesona-raja-ampat",
            'body' => '<p>Desa Tiwingan Lama Desa Wisata dengan Pesona Raja Ampat adalah salah satu desa di Kecamatan Aranio, Kabupaten Banjar, Provinsi Kalimantan Selatan, Indonesia. Desa ini memiliki potensi yang luar biasa, salah satu potensi yang menarik perhatian publik belakangan ini adalah potensi alam yang dijadikan sebagai objek atau destinasi wisata.<p><p>Oleh sebab itu, pemerintah Desa Tiwingan Lama berkomitmen dalam upaya mengembangkan destinasi Wisata yang ada di desanya yaitu Puncak Matang Kaladan sebagai destinasi wisata Andalan di provinsi Kalimantan Selatan.</p><p>Keberadaan objek wisata Puncak Matang Kaladan saat ini menjadi motor penggerak perkembangan sosial dan ekonomi Desa Tiwingan Lama, jika sebelumnya desa ini disebut sebagai desa tertinggal maka kini desa Tiwingan Lama telah menjelma menjadi desa berkembang dan maju.</p><p>Keberhasilan mengembangkan Puncak Matang Kaladan menjadi destinasi wisata yang layak dikunjungi dengan berbagai atraksi wisata tentu bukan persoalan mudah, namun berkat komitmen dan kerja keras, kini objek wisata di Desa Tiwingan Lama telah berhasil menjadi motor perekonomian bagi masyarakat desa, dengan tumbuhnya berbagai lini atau unit ekonomi yang berkaitan dengan upaya pengembangan objek wisata desa.</p>'
        ]);

        Image::create([
            'image_gallery_id' => 3,
            'image' => 'post-images/3.webp'
        ]);

        ImageGallery::create([
            'title' => "Mengunjungi Desa Wisata Tiwingan Lama, Melihat Langsung 'Raja Empat' Kalsel",
            'slug' => "dmengunjungi-desa-wisata-tiwingan-lama-melihat-langsung-raja-empat-kalsel",
            'body' => '<p>Desa Tiwingan Lama menurut sejarah dari penuturan dan cerita turun temurun para tetuha kampung berdiri dan ada sejak tahun 1922 dengan nama awal “Utuh Haluy”, artinya orang pertama yang tinggal di desa.<p><p>Pada tahun 1940 diganti menjadi Tiwingan artinya miring. Kemudian pada tahun 1970 penduduk kampung Tiwingan pindah tempat dan terpecah menjadi tiga desa yaitu Alimpung, Liang Toman dan Bukit Batas karena adanya pembuatan Waduk Riam Kanan.</p>'
        ]);

        Image::create([
            'image_gallery_id' => 4,
            'image' => 'post-images/4.webp'
        ]);

        Image::create([
            'image_gallery_id' => 4,
            'image' => 'post-images/4.webp'
        ]);

        // ImageGallery::factory(50)->create();
    }
}
