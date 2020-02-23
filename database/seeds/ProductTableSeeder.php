<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //seedovanje prve kategorije
      $product = new \App\Product([
        'product_name' => 'Alesis DM Lite kit',
        'category_id' => 1,
        'product_description' => 'Elektronski bubnjevi sve u jednom paketu. Idealno za kućno vežbanje i manje svirke.',
        'product_img' => 'Alesis DM Lite kit.jpg',
        'product_quantity' => 20,
        'price' => 43335,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Alesis DM10 MKII PROKIT',
        'category_id' => 1,
        'product_description' => 'Alesis DM10 MKII PROKIT je set koji se sastoji iz deset delova, sa ekskluzivnim Alesis dual-zone mash head koji daju realan osećaj sviranja akustičnog bubnja.',
        'product_img' => 'Alesis DM10 MKII PROKIT premium 10pcs elektronski buban.jpg',
        'product_quantity' => 20,
        'price' => 150000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Alesis STRIKE KIT ',
        'category_id' => 1,
        'product_description' => 'Komplet Strike Kit se sastoji iz 8 delova, čije komponente imaju multi senzor za osetljivost kao i senzore za multi kontakt.',
        'product_img' => 'Alesis STRIKE KIT elektronski bubanj 8pcs k.jpg',
        'product_quantity' => 20,
        'price' => 241450,
      ]);
      $product->save();


      $product = new \App\Product([
        'product_name' => 'Mapex Armory fusion',
        'category_id' => 1,
        'product_description' => 'Mapex AR504SUM Armory Fusion 5-piece Shell Pack',
        'product_img' => 'Mapex AR504SUM Armory Fusion 5-piece Shell Pa.jpg',
        'product_quantity' => 20,
        'price' => 113160,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Mapex Armory',
        'category_id' => 1,
        'product_description' => 'Mapex AR529SBTK Armory 5Pcs Drum shell pack',
        'product_img' => 'Mapex AR529SBTK Armory 5Pcs Drum shell pa.jpg',
        'product_quantity' => 20,
        'price' => 113500,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Mapex Black Panther',
        'category_id' => 1,
        'product_description' => 'Mapex Black Panther Design Lab 14" Cherry Bomb Snare Drum BPCW4600CNW.',
        'product_img' => 'Mapex Black Panther Design Lab.jpg',
        'product_quantity' => 20,
        'price' => 57040,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Mapex Panther ',
        'category_id' => 1,
        'product_description' => 'Ultimativni Black Panther dobos! Napravljen od 3mm dobele celicne cevi koja je tako izlivena, a ne savijana, pa varena. Zbog toga ima topao zvuk i senzitivniji je od ostalih celicnih dobosa.',
        'product_img' => 'Mapex Black Panther dobos.jpg',
        'product_quantity' => 20,
        'price' => 68280,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Mapex Mars 5',
        'category_id' => 1,
        'product_description' => 'Mapex Mars 5pc set Bubanj - Komplet Bubnjeva',
        'product_img' => 'Mapex Mars 5 Piece Fusion Shell Pack RW.jpg',
        'product_quantity' => 20,
        'price' => 80600,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Mapex Mars MAT807RW',
        'category_id' => 1,
        'product_description' => 'Mapex Mars MAT807RW 8x7 Tom',
        'product_img' => 'Mapex Mars MAT807RW 8x7 Tom.jpg',
        'product_quantity' => 20,
        'price' => 11000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Pearl Nightshade',
        'category_id' => 1,
        'product_description' => 'Pearl EXL725SP C255 Nightshade Lacquer petodelni set',
        'product_img' => 'Pearl EXL725SP C255 Nightshade Lacquer Petode.jpg',
        'product_quantity' => 20,
        'price' => 76900,
      ]);
      $product->save();

      //seedovanje druge kategorije

      $product = new \App\Product([
        'product_name' => 'AKG Bežični Mikrofon',
        'category_id' => 2,
        'product_description' => 'AKG Mini Dual vokal bežični mikrofon sa dve ručke super kvaliteta - najbolja cena.',
        'product_img' => 'AKG Bezicni Mikrofon - WMS40 Mini dual vocal set.jpg',
        'product_quantity' => 20,
        'price' => 27650,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'AKG MKII slušalice',
        'category_id' => 2,
        'product_description' => 'Idealno za monitoring i broadcast.',
        'product_img' => 'AKG K171 MKII slusalice.jpg',
        'product_quantity' => 20,
        'price' => 15252,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'AKG WMS 40 Mini Vocal ISM3',
        'category_id' => 2,
        'product_description' => 'AKG WMS 40 Mini Vocal ISM3 wireless vokalni mikrofon.',
        'product_img' => 'AKG WMS 40 Mini Vocal ISM3.jpg',
        'product_quantity' => 20,
        'price' => 17750,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Behringer B5 kondenzatorski mikrofon',
        'category_id' => 2,
        'product_description' => 'B-5 dolazi sa izmjenjivim kardoidnim i omnidirekcionalnim kapsulama koje ga čine fantastičnim mikrofonom. Idealan izbor za snimanje akustičnih instrumenata, vokala i overheadova (kod bubnjeva).',
        'product_img' => 'Behringer B5 kondenzatorski mikrofon.jpg',
        'product_quantity' => 20,
        'price' => 12400,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Numark Mixtrack Pro III',
        'category_id' => 2,
        'product_description' => 'Numark DJ Kontroler Mixtrack Pro III za sve koji vole kvalietan kontroler.',
        'product_img' => 'Numark Mixtrack Pro III.jpg',
        'product_quantity' => 20,
        'price' => 34100,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Pioneer DDJ-RB',
        'category_id' => 2,
        'product_description' => 'Usavršen za korišćenje u pokretu DDJ-RB je kompaktan, lagan kontroler opremljen naprednim funkcijama.',
        'product_img' => 'Pioneer DDJ-RB.jpg',
        'product_quantity' => 20,
        'price' => 32161,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Vintage V300BKOFT',
        'category_id' => 3,
        'product_description' => 'Akustična gitara za početnike Vintage V300BKOFT',
        'product_img' => 'Akustična gitara za pocetnike Vintage V300BKOFT.jpg',
        'product_quantity' => 20,
        'price' => 12368,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Cort Action Bass WS',
        'category_id' => 3,
        'product_description' => 'Cort Action Bass WS bas gitara',
        'product_img' => 'Cort Action Bass WS bas gi.png',
        'product_quantity' => 20,
        'price' => 26300,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Cort Action-A BK',
        'category_id' => 3,
        'product_description' => 'Cort Action-A BK bas gitara',
        'product_img' => 'Cort Action-A BK bas gitara.png',
        'product_quantity' => 20,
        'price' => 50000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Ibanez GAX 30TR',
        'category_id' => 3,
        'product_description' => 'Ibanez GAX 30TR Electro Acostic',
        'product_img' => 'Ibanez GAX 30TR Electro Acoustic.png',
        'product_quantity' => 20,
        'price' => 65000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Duesenberg Starplayer III Black',
        'category_id' => 3,
        'product_description' => 'Duesenberg Starplayer III Black električna gitara',
        'product_img' => 'Duesenberg Starplayer III Black elektricna.jpg',
        'product_quantity' => 20,
        'price' => 95600,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Fender Squire Classic Vibe Telecaster',
        'category_id' => 3,
        'product_description' => 'Fender Squire Classic Vibe Telecaster Električna Gitara',
        'product_img' => 'Fender Squire Classic Vibe Telecaster Električna Gitara.jpg',
        'product_quantity' => 20,
        'price' => 120000,
      ]);
      $product->save();

      ////////////////////////////////////

      $product = new \App\Product([
        'product_name' => 'Gewa Rockabilly BK Double Bass',
        'category_id' => 4,
        'product_description' => 'Gewa Rockabilly BK Double Bass 34 Kontrabas',
        'product_img' => 'Gewa Rockabilly BK Double Bass 34 Kontrabas.jpg',
        'product_quantity' => 20,
        'price' => 85010,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'A Lyra TR 100',
        'category_id' => 4,
        'product_description' => 'A Lyra TR 100 školska truba',
        'product_img' => 'A Lyra TR 100 skolska truba.jpg',
        'product_quantity' => 20,
        'price' => 16500,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Amati ASL344-O BbF',
        'category_id' => 4,
        'product_description' => 'Amati ASL344-O BbF Tenor Trombon',
        'product_img' => 'Amati ASL344-O BbF Tenor Trombone.jpg',
        'product_quantity' => 20,
        'price' => 43000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Buffet Crampon E13',
        'category_id' => 4,
        'product_description' => 'Buffet Crampon E13 Bb 175 Klarinet',
        'product_img' => 'Buffet Crampon E13 Bb 175 Klarinet.jpg',
        'product_quantity' => 20,
        'price' => 65000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Bwing VS1034',
        'category_id' => 4,
        'product_description' => 'Bwing VS1034 violina set',
        'product_img' => 'Bwing VS1034 violina set 3.png',
        'product_quantity' => 20,
        'price' => 150000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Canorus AS501 Alt',
        'category_id' => 4,
        'product_description' => 'Canorus AS501 Alt saksofon',
        'product_img' => 'Canorus AS501 Alt saksofon.png',
        'product_quantity' => 20,
        'price' => 84560,
      ]);
      $product->save();

      ///////////////////////////////////


      $product = new \App\Product([
        'product_name' => 'Casio AP 470BNC7 Celviano',
        'category_id' => 5,
        'product_description' => 'Casio AP 470BNC7 Celviano električni klavir',
        'product_img' => 'Casio AP 470BNC7 Celviano elektricni klavir.jpg',
        'product_quantity' => 20,
        'price' => 120000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Kawai K-300',
        'category_id' => 5,
        'product_description' => 'Kawai K-300 supreme',
        'product_img' => 'Kawai K-300 E.jpg',
        'product_quantity' => 20,
        'price' => 150480,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'KAWAI RX-2C',
        'category_id' => 5,
        'product_description' => 'KAWAI RX-2C',
        'product_img' => 'KAWAI RX-2C.jpg',
        'product_quantity' => 20,
        'price' => 456200,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'KAWAI RX-3',
        'category_id' => 5,
        'product_description' => 'KAWAI RX-3',
        'product_img' => 'KAWAI RX-3.jpg',
        'product_quantity' => 20,
        'price' => 659000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Korg Grandstage 88',
        'category_id' => 5,
        'product_description' => 'Korg Grandstage 88',
        'product_img' => 'Korg Grandstage 88.jpg',
        'product_quantity' => 20,
        'price' => 160000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Yamaha U3 Pianino',
        'category_id' => 5,
        'product_description' => 'Yamaha U3 Pianino B',
        'product_img' => 'Yamaha U3 Pianino B.jpg',
        'product_quantity' => 20,
        'price' => 365200,
      ]);
      $product->save();

      //////////////////////////////////////////

      $product = new \App\Product([
        'product_name' => 'Jamo S810 SUB',
        'category_id' => 6,
        'product_description' => 'Jamo S810 SUB Aktivni subwoofer BK',
        'product_img' => 'Jamo S810 SUB Aktivni subwoofer BK.jpg',
        'product_quantity' => 20,
        'price' => 65000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Behringer PMP4000',
        'category_id' => 6,
        'product_description' => 'Behringer PMP4000 aktivna mikseta',
        'product_img' => 'Behringer PMP4000 aktivna mikseta.jpg',
        'product_quantity' => 20,
        'price' => 200000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'DB Technologies SUB12D',
        'category_id' => 6,
        'product_description' => 'DB Technologies SUB12D aktivni subwoofer',
        'product_img' => 'DB Technologies SUB12D aktivni subwoofer.jpg',
        'product_quantity' => 20,
        'price' => 80000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'JBL Eon 615',
        'category_id' => 6,
        'product_description' => 'JBL Eon 615 aktivni zvučnik',
        'product_img' => 'JBL Eon 615 aktivni zvucnik.png',
        'product_quantity' => 20,
        'price' => 45000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Topp Pro Aktivni Sistem',
        'category_id' => 6,
        'product_description' => 'Topp Pro Aktivni Sistem 5',
        'product_img' => 'Topp Pro Aktivni Sistem 5.jpg',
        'product_quantity' => 20,
        'price' => 250000,
      ]);
      $product->save();

      $product = new \App\Product([
        'product_name' => 'Dynacord POWERMATE',
        'category_id' => 6,
        'product_description' => 'Dynacord POWERMATE 1000-3 - Power Mixer',
        'product_img' => 'Dynacord POWERMATE 1000-3 - Power Mixer.jpg',
        'product_quantity' => 20,
        'price' => 198700,
      ]);
      $product->save();




    }
}
