<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\DestinationImage;
use App\Models\Image;
use App\Models\ImageGallery;
use App\Models\TourPackage;
use App\Models\TourPackageImage;
use App\Models\User;
use App\Models\VideoGallery;
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

        User::create([
            'username' => 'sandhikagalih',
            'password' => bcrypt('password')
        ]);

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

        VideoGallery::create([
            'title' => 'belajar tehnik motong jalan | stumble guys indonesa',
            'slug' => 'belajar-tehnik-motong-jalan-|-stumble-guys-indonesa',
            'body' => '<p>belajar tehnik motong jalan | stumble guys indonesa</p><p>Support the stream: https://streamlabs.com/ayogch</p><p>lanjut push mmr masha semoga ga turun | mobile legends bang bang indonesia</p><p>Support channel ini bisa lewat link saweria berikut : https://saweria.co/XbrogGame</p><p>My PC Spec :</p><ul><li>Mic Headphone</li><li>Core i3 10105F</li><li>16 GB</li><li>V GEN NVMe - 256G</li><li>GEFORCE GTX 1650 4GB DDR6</li><li>Webcam - hp</li></ul>',
            'video' => 'HffHkMDDRgw'
        ]);

        VideoGallery::create([
            'title' => 'Yoga Mobile Legend',
            'slug' => 'yoga-mobile-legend',
            'body' => '<p>Support the stream: https://streamlabs.com/ayogch</p><p>lanjut push mmr masha semoga ga turun | mobile legends bang bang indonesia</p><p>Support channel ini bisa lewat link saweria berikut : https://saweria.co/XbrogGame</p><p>My PC Spec :</p><ul><li>Mic Headphone</li><li>Core i3 10105F</li><li>16 GB</li><li>V GEN NVMe - 256G</li><li>GEFORCE GTX 1650 4GB DDR6</li><li>Webcam - hp</li></ul>',
            'video' => 'l7pk6_jFx_Y'
        ]);

        // Destinations
        Destination::create([
            'name' => 'Bukit Tiwingan',
            'slug' => 'bukit-tiwingan',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!',
        ]);

        DestinationImage::create([
            'destination_id' => 1,
            'image' => 'destination_images/bukit_tiwingan.webp'
        ]);

        DestinationImage::create([
            'destination_id' => 1,
            'image' => 'destination_images/bukit_tiwingan_2.webp'
        ]);

        Destination::create([
            'name' => 'Alimpung Park',
            'slug' => 'alimpung-park',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!',
        ]);

        DestinationImage::create([
            'destination_id' => 2,
            'image' => 'destination_images/alimpung_park.webp'
        ]);

        DestinationImage::create([
            'destination_id' => 2,
            'image' => 'destination_images/alimpung_park_2.webp'
        ]);

        Destination::create([
            'name' => 'Matang Kaladan',
            'slug' => 'matang-kaladan',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!',
        ]);

        DestinationImage::create([
            'destination_id' => 3,
            'image' => 'destination_images/matang_kaladan.webp'
        ]);

        Destination::create([
            'name' => 'Pancing Jungur',
            'slug' => 'pancing-jungur',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!',
        ]);

        DestinationImage::create([
            'destination_id' => 4,
            'image' => 'destination_images/pancing_jungur.webp'
        ]);

        // Tour Packages
        TourPackage::create([
            'name' => 'Ojek Sepeda Motor',
            'slug' => 'ojek-sepeda-motor',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!',
        ]);

        TourPackageImage::create([
            'tour_package_id' => 1,
            'image' => 'tour_package_images/ojek.webp'
        ]);

        TourPackage::create([
            'name' => 'Kapal',
            'slug' => 'kapal',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!',
        ]);

        TourPackageImage::create([
            'tour_package_id' => 2,
            'image' => 'tour_package_images/kapal.webp'
        ]);

        TourPackage::create([
            'name' => 'Home Stay',
            'slug' => 'home-stay',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil dolore quisquam voluptates eius ex, optio beatae repellat aut numquam explicabo earum minima laborum labore cumque architecto animi, possimus, rerum accusantium!',
        ]);

        TourPackageImage::create([
            'tour_package_id' => 3,
            'image' => 'tour_package_images/home_stay.webp'
        ]);
    }
}
