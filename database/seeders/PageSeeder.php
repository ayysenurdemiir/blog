<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Hakkımızda','Kariyer','Vizyonumuz','Misyonumuz'];
        $count=0;
        foreach ($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>Str::slug($page),
                'image'=>'https://cloudinary.hbs.edu/hbsit/image/upload/s--Fm3oHP0m--/f_auto,c_fill,h_375,w_750,/v20200101/79015AB87FD6D3284472876E1ACC3428.jpg',
                'content'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam odio justo, porttitor in tortor ac, feugiat dapibus elit. Fusce tempus nisi quis enim posuere suscipit.
                             Pellentesque a enim velit. Nullam vitae augue in quam tempor porttitor.
                             Sed consectetur laoreet velit. Vivamus dictum dui viverra risus ultrices tempor. Cras ultrices laoreet sapien vitae accumsan.
                             Etiam porta lorem at tortor sagittis, et sodales est fringilla. Donec sollicitudin arcu ut massa porttitor sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In maximus nibh nisi, ac mattis nunc tempor ut.
                             Praesent imperdiet id nisl eu rutrum. Aliquam accumsan ex non sem tincidunt, vitae sollicitudin massa gravida. Donec viverra eleifend justo vitae finibus. Maecenas ac odio arcu. Sed a nisi quis lacus maximus varius.
                             Aenean scelerisque, massa non tristique feugiat, sapien ex ultricies urna, vitae ultrices nisi purus ut diam. Morbi semper elementum metus. Phasellus id leo massa. Vestibulum sagittis a neque eget blandit.
                             Aenean sed nulla interdum, tincidunt sem nec, rutrum purus.
                             Suspendisse ornare tincidunt egestas. Nullam tortor turpis, rhoncus eu risus id, dictum porttitor dolor. Integer sit amet faucibus tortor. Suspendisse potenti. Nunc interdum luctus leo, vel bibendum sem euismod ut.',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
