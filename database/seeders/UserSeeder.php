<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'firstname' => 'David',
            'lastname' => 'Apricio Turpyn',
            'email' => 'david@role.test',
            'url_foto_profile' => 'https://pbs.twimg.com/profile_images/874834013512499201/7Q5HhU3P_400x400.jpg',
            'password' => bcrypt('david1234'),
            'telepon' => '082264913600',
        ]);
        $admin->assignRole('admin');

        $pencari_kerja = User::create([
            'firstname' => 'Welson',
            'lastname' => 'Oktario Gunawan',
            'email' => 'welson@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('welson1234'),
            'telepon' => '082264913601',
        ]);
        $pencari_kerja->assignRole('pencari kerja');

        $pemberi_kerja = User::create([
            'firstname' => 'Gatum',
            'lastname' => 'Erlangga',
            'email' => 'gatum@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('gatum1234'),
            'telepon' => '082264913602',
        ]);
        $pemberi_kerja->assignRole('pemberi kerja');

        $pencari_kerja1 = User::create([
            'firstname' => 'Bernad',
            'lastname' => 'Boli',
            'email' => 'bernad@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('bernad1234'),
            'telepon' => '082264913603',
        ]);
        $pencari_kerja1->assignRole('pencari kerja');

        $pemberi_kerja1 = User::create([
            'firstname' => 'Rifqi',
            'lastname' => 'Dwi',
            'email' => 'rifqi@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('rifqi1234'),
            'telepon' => '082264913604',
        ]);
        $pemberi_kerja1->assignRole('pemberi kerja');

        $pencari_kerja2 = User::create([
            'firstname' => 'Made',
            'lastname' => 'Bayu',
            'email' => 'made@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('made1234'),
            'telepon' => '082264913606',
        ]);
        $pencari_kerja2->assignRole('pencari kerja');

        $pemberi_kerja2 = User::create([
            'firstname' => 'Bayu',
            'lastname' => 'Eka',
            'email' => 'bayu@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('bayu1234'),
            'telepon' => '082264913607',
        ]);
        $pemberi_kerja2->assignRole('pemberi kerja');

        $pencari_kerja3 = User::create([
            'firstname' => 'Wiliiam',
            'lastname' => 'Oktario Gunawan',
            'email' => 'william@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('william1234'),
            'telepon' => '082264913601',
        ]);
        $pencari_kerja3->assignRole('pencari kerja');

        $pemberi_kerja3 = User::create([
            'firstname' => 'Ananta',
            'lastname' => 'Erlangga',
            'email' => 'ananta@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('ananta1234'),
            'telepon' => '082264913602',
        ]);
        $pemberi_kerja3->assignRole('pemberi kerja');

        $pencari_kerja4 = User::create([
            'firstname' => 'Ineke',
            'lastname' => 'Yulia Gunawan',
            'email' => 'ineke@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('ineke1234'),
            'telepon' => '082264913606',
        ]);
        $pencari_kerja4->assignRole('pencari kerja');

        $pemberi_kerja4 = User::create([
            'firstname' => 'Fika',
            'lastname' => 'Indrawati',
            'email' => 'fika@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('fika1234'),
            'telepon' => '082264913610',
        ]);
        $pemberi_kerja4->assignRole('pemberi kerja');

        $pencari_kerja5 = User::create([
            'firstname' => 'Ririn',
            'lastname' => 'Oktario Gunawan',
            'email' => 'ririn@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('ririn1234'),
            'telepon' => '082264913620',
        ]);
        $pencari_kerja5->assignRole('pencari kerja');

        $pemberi_kerja5 = User::create([
            'firstname' => 'Cherry',
            'lastname' => 'Erlangga',
            'email' => 'cherry@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('cherry1234'),
            'telepon' => '082264913602',
        ]);
        $pemberi_kerja5->assignRole('pemberi kerja');

        $pencari_kerja6 = User::create([
            'firstname' => 'Millen',
            'lastname' => 'Oktario Gunawan',
            'email' => 'millen@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('millen1234'),
            'telepon' => '082264913601',
        ]);
        $pencari_kerja6->assignRole('pencari kerja');

        $pemberi_kerja6 = User::create([
            'firstname' => 'Lala',
            'lastname' => 'Erlangga',
            'email' => 'lala@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('lala1234'),
            'telepon' => '082264913602',
        ]);
        $pemberi_kerja6->assignRole('pemberi kerja');

        $pencari_kerja7 = User::create([
            'firstname' => 'Ayu',
            'lastname' => 'Sri Lestari',
            'email' => 'ayu@role.test',
            'url_foto_profile' => 'https://1000marcas.net/wp-content/uploads/2021/06/Gojek-Logo-2048x1280.png',
            'password' => bcrypt('ayu'),
            'telepon' => '082264913601',
        ]);
        $pencari_kerja7->assignRole('pencari kerja');

        $pemberi_kerja7 = User::create([
            'firstname' => 'Desi',
            'lastname' => 'Islami',
            'email' => 'desi@role.test',
            'url_foto_profile' => 'https://www.tagar.id/Asset/uploads2019/1575050504675-logo-tokopedia.jpg',
            'password' => bcrypt('desi1234'),
            'telepon' => '082264913602',
        ]);
        $pemberi_kerja7->assignRole('pemberi kerja');
    }
}
