<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalkulasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function hitung()
	{
		$id_lokasi 	= $this->input->post('id_lokasi');
		$id_media	= $this->input->post('id_media');
		$id_wadah	= $this->input->post('id_wadah');
		$id_crop	= $this->input->post('id_crop');
		$suhu		= $this->input->post('suhu');
		$kelembaban		= $this->input->post('kelembaban');

		$sql ="
		SELECT
		crop.id,
		wadah.wadah,
		wadah.luas_permukaan,
		wadah.bbt_tnh_krg_angin_l,
		wadah.bbt_tnh_krg_mutlak_l,
		wadah.bbt_tnh_krg_angin_t,
		wadah.bbt_tnh_krg_mutlak_t,
		karakter_tanah.lokasi_id,
		media.jenis_media,
		media.kering_angin,	
		pupuk.harga_pupuk, 
		crop.j_awal, crop.j_tengah, crop.j_akhir,		
		ROUND(media.kering_angin * wadah.bbt_tnh_krg_mutlak_t / 100,2) AS ka_krg_angin_t,
		ROUND(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100,2) AS ka_krg_angin_l,
		ROUND(media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100,2) AS ka_kps_lpg_l,
		ROUND(media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_t / 100,2) AS ka_kps_lpg_t,		
		ROUND(
			(((lokasi.et_suhu*".$suhu.") + 
			(lokasi.et_lembab * ".$kelembaban."))/10) *
			wadah.luas_permukaan
			,2) AS et0,
		crop.kc_awal,
		crop.kc_tengah,
		crop.kc_akhir,
		ROUND(
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
			crop.kc_awal)/10)*wadah.luas_permukaan
			,2) AS etc_awal,
		ROUND(
			(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*
			crop.kc_tengah)/10)*wadah.luas_permukaan
			,2) AS etc_tengah,
		ROUND(
			(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))
			*crop.kc_akhir)/10)*wadah.luas_permukaan
			,2) AS etc_akhir,
		ROUND(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100,2) AS ttk_layu_permanen,
		ROUND(
			(media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100)
			,2) AS taw,
		
		ROUND(
			(crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))
			, 2) AS raw_awal,
		
		ROUND(
			(crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))
			, 2) AS raw_tengah,
		
		ROUND(
			(crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))
			, 2) AS raw_akhir,
		

		ROUND(
			(1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))
			,2) AS keb_siram_perwadah_h1,
		ROUND(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
			crop.kc_awal))/10)*wadah.luas_permukaan)
			,2) AS keb_siram_perwadah_awal,
		ROUND(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*
			crop.kc_tengah)/10)*wadah.luas_permukaan))
			,2) AS keb_siram_perwadah_tengah,
		ROUND(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))
			*crop.kc_akhir)/10)*wadah.luas_permukaan))
			,2) AS keb_siram_perwadah_akhir,


		ROUND(
			(1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))
			,2) AS pasca_h1,
		ROUND(
			((1 - (media.porositas/100))*
			(
			(1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))
			)+ (media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100)
			)+
			(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
			crop.kc_awal))/10)*wadah.luas_permukaan)
			)
			,2) AS pasca_awal,
		ROUND(
			((1 - (media.porositas/100))*
			(
			((1 - (media.porositas/100))*
			(
			(1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))
			)+ (media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100)
			)+
			(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
			crop.kc_awal))/10)*wadah.luas_permukaan)
			)
			)+
			(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*
			crop.kc_tengah)/10)*wadah.luas_permukaan))
			)
			)
			,2) AS pasca_tengah,
		ROUND(
			((1 - (media.porositas/100))*
			(
			((1 - (media.porositas/100))*
			(
			((1 - (media.porositas/100))*
			(
			(1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))
			)+ (media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100)
			)+
			(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
			crop.kc_awal))/10)*wadah.luas_permukaan)
			)
			)+
			(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*
			crop.kc_tengah)/10)*wadah.luas_permukaan))
			)
			)
			)+
			(
			(media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))
			*crop.kc_akhir)/10)*wadah.luas_permukaan))
			)
			)
			,2) AS pasca_akhir,


		ROUND(
			(crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))
			+(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100)
			, 2) AS pasca_raw_awal,
		
		ROUND(
			(crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))
			+(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100)
			, 2) AS pasca_raw_tengah,
		
		ROUND(
			(crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))
			+(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100)
			, 2) AS pasca_raw_akhir,

			
		nutrisi.komponen, pupuk.nama_pupuk, nutrisi.larutan_stock, crop.nama_crop, pupuk.kode,
		ROUND(nutrisi.larutan_stock / 100000, 2) as larutan_aplikasi,
		crop.hr_awal, crop.hr_tengah, crop.hr_akhir,

		ROUND(
			(((1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal)))/1000)*
			(nutrisi.larutan_stock / 100000)
			,2) as h_1,
		ROUND(
			(((media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
			crop.kc_awal))/10)*wadah.luas_permukaan))/1000)*
			(nutrisi.larutan_stock / 100000)
			,2) as awal,
		ROUND(
			(((media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*
			crop.kc_tengah)/10)*wadah.luas_permukaan)))/1000)*
			(nutrisi.larutan_stock / 100000)
			,2) as tengah,
		ROUND(
			(((media.porositas/100)*
			(((crop.p + 
			((0.04 * (5 - 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
			((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
			((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))
			*crop.kc_akhir)/10)*wadah.luas_permukaan)))/1000)*
			(nutrisi.larutan_stock / 100000)
			,2) as akhir,
		
		ROUND(
		(
		((((1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal)))/1000)*
			(nutrisi.larutan_stock / 100000)/1000)
		)+
		(
		((((media.porositas/100)*
		(((crop.p + 
		((0.04 * (5 - 
		((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
		((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
		(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
		(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
		crop.kc_awal))/10)*wadah.luas_permukaan))/1000)*
		(nutrisi.larutan_stock / 100000)
		)*j_awal/1000) +
		(
		((((media.porositas/100)*
		(((crop.p + 
		((0.04 * (5 - 
		((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
		((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
		(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
		((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*
		crop.kc_tengah)/10)*wadah.luas_permukaan)))/1000)*
		(nutrisi.larutan_stock / 100000)
		)*j_tengah/1000) +
		(
		((((media.porositas/100)*
		(((crop.p + 
		((0.04 * (5 - 
		((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
		((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
		(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
		((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))
		*crop.kc_akhir)/10)*wadah.luas_permukaan)))/1000)*
		(nutrisi.larutan_stock / 100000)
		)*j_akhir/1000),2) as jumlah,

		ROUND(
		(
		((((1 +
			(media.porositas/100)) *
			(((crop.p + ((0.04 * (5 - ((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * ((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) + 
			(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) - 
			(media.kering_angin * wadah.bbt_tnh_krg_mutlak_l / 100) + 
			((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal)))/1000)*
			(nutrisi.larutan_stock / 100000)/1000)
		)+
		((
		((((media.porositas/100)*
		(((crop.p + 
		((0.04 * (5 - 
		((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_awal))))) * 
		((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
		(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
		(((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")) *
		crop.kc_awal))/10)*wadah.luas_permukaan))/1000)*
		(nutrisi.larutan_stock / 100000)
		)*j_awal/1000) +
		(
		((((media.porositas/100)*
		(((crop.p + 
		((0.04 * (5 - 
		((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
		((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
		(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
		((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*
		crop.kc_tengah)/10)*wadah.luas_permukaan)))/1000)*
		(nutrisi.larutan_stock / 100000)
		)*j_tengah/1000) +
		(
		((((media.porositas/100)*
		(((crop.p + 
		((0.04 * (5 - 
		((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))*crop.kc_tengah))))) * 
		((media.kapasitas_lapang * wadah.bbt_tnh_krg_mutlak_l / 100) - (media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100))) +
		(media.titik_layu_permanen * wadah.bbt_tnh_krg_mutlak_l/100) +
		((((((lokasi.et_suhu*".$suhu.") + (lokasi.et_lembab * ".$kelembaban.")))
		*crop.kc_akhir)/10)*wadah.luas_permukaan)))/1000)*
		(nutrisi.larutan_stock / 100000)
		)*j_akhir/1000)
		) * (pupuk.harga_pupuk / pupuk.kemasan)) as total

		
		FROM
		karakter_tanah
		INNER JOIN crop ON crop.id = karakter_tanah.crop_id
		INNER JOIN wadah ON wadah.id = karakter_tanah.wadah_id
		INNER JOIN media ON media.id = karakter_tanah.media_id
		INNER JOIN lokasi ON lokasi.id = karakter_tanah.lokasi_id
		INNER JOIN nutrisi ON nutrisi.crop_id = crop.id
		INNER JOIN pupuk ON pupuk.id = nutrisi.pupuk_id


		WHERE lokasi.id = ? AND media.id = ? AND wadah.id = ? AND crop.id = ?
		
		";
		$query = $this->db->query($sql, array($id_lokasi, $id_media, $id_wadah, $id_crop));


		$data = $query->row();

		$res['data1'] = array();
		$res['data2'] = array();
		if(isset($data)){
			$res['data1']=$query->row();
			$res['data2']=$query->result();
			return $res;
		}
		return $res;
		// return $query->result();

	}

	


	

}

/* End of file Kalkulasi_model.php */
/* Location: ./application/modules/kalkulasi/models/Kalkulasi_model.php */