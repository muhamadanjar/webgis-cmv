<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LayerSeeder extends Seeder {

    public function run(){
       
        DB::table('layeresri')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $users = array(
            array(
                'layername'     => 'Administrasi Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_ADMINISTRASI_KABUPATEN_BOGOR/MapServer',
                'na' => 0,
                'layer'    => 'administrasi',
                'orderlayer' => 0,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),
            array(
                'layername'     => 'Analisis Kemampuan Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_ANALISIS_KEMAMPUAN_LAHAN/MapServer',
                'na' => 0,
                'layer'    => 'analisis_kemampuan',
                'orderlayer' => 1,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),
            array(
                'layername'     => 'Kondisi Fisik Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_KONDISI_FISIK_KAB_BOGOR/MapServer',
                'na' => 0,
                'layer'    => 'kondisi_fisik',
                'orderlayer' => 2,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),
            array(
                'layername'     => 'Perijinan Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_PERIJINAN_KAB_BOGOR/MapServer',
                'na' => 0,
                'layer'    => 'perijinan',
                'orderlayer' => 3,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),
            array(
                'layername'     => 'Rencana Tata Ruang Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_RENCANA_TATA_RUANG_KAB_BOGOR/MapServer',
                'na' => 0,
                'layer'    => 'rencana_tataruang_kab_bogor',
                'orderlayer' => 4,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),
            array(
                'layername'     => 'Sebaran Fasilitas',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_SEBARAN_FASILITAS/MapServer',
                'na' => 0,
                'layer'    => 'sebaran_fasilitas',
                'orderlayer' => 4,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),
            array(
                'layername'     => 'Dokumentasi Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_DOKUMENTASI/MapServer',
                'na' => 0,
                'layer'    => 'dokumentasi',
                'orderlayer' => 4,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),

            array(
                'layername'     => 'Potensi Investasi Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMPOSI/PETA_POTENSI_INVESTASI/MapServer',
                'na' => 0,
                'layer'    => 'investasi',
                'orderlayer' => 4,
                'tipelayer' => 'dynamic',
                'option_opacity' => '0.5',
                'option_visible' => 0,
                'option_mode' => 1,
                'jsonfield' => ''
            ),

            
            
            
        );

        foreach ($users as $key) {
            \App\Layer::create($key);
        }
        

    }

}