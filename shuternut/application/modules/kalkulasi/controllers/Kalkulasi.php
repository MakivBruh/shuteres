<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalkulasi extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('kalkulasi_model');
		$this->load->model('lokasi/lokasi_model');
		$this->load->model('media/media_model');
		$this->load->model('wadah/wadah_model');
		$this->load->model('crop/crop_model');
	}

	public function index()
	{
		
		$lokasi = $this->lokasi_model->listing();
		$media = $this->media_model->listing();
		$wadah = $this->wadah_model->listing();
		$crop = $this->crop_model->listing();

		// foreach ($crop as $r) {
		// 			$options_crop[$r->id]=$r->nama_crop;
		// 		}	

		// foreach ($wadah as $r) {
		// 			$options_wadah[$r->id]=$r->wadah;
		// 		}	

		$data = [	'title'		=> 'Kalkulasi',
					'title2'	=> 'Hitung Kebutuhan Penyiraman dan Nutrisi Tanaman',										
					'lokasi'	=> $lokasi,
					'media'		=> $media,
					'wadah'		=> $wadah,
					'crop'		=> $crop,
					// 'crop'		=> $options_crop,						
					'isi'		=> 'kalkulasi/list'
				];

		
		
		
		$this->load->view('layout/wrapper', $data, FALSE);		
	}

	public function hitung()
	{		

		$suhu		= $this->input->post('suhu');
		$kelembaban	= $this->input->post('kelembaban');


		if(!empty($_POST)){
		
			$kalkulasi = $this->kalkulasi_model->hitung();
			$data1 = $kalkulasi['data1'];
			$data2 = $kalkulasi['data2'];
			 // var_dump($kalkulasi);
	 		//  die();

			$siram = array();
			// foreach($kalkulasi as $r){
				array_push($siram, $data1->pasca_h1);
				array_push($siram, $data1->pasca_awal);
				array_push($siram, $data1->pasca_tengah);
				array_push($siram, $data1->pasca_akhir);
			// }

			$ka = array(
					$data1->ka_krg_angin_l,
					$data1->ka_krg_angin_l,
					$data1->ka_krg_angin_l,
					$data1->ka_krg_angin_l,
					);

			$raw = array(
						0,
						$data1->pasca_raw_awal,
						$data1->pasca_raw_tengah,
						$data1->pasca_raw_akhir
					);
		

			$kl = array(
						$data1->ka_kps_lpg_l,
						$data1->ka_kps_lpg_l,
						$data1->ka_kps_lpg_l,
						$data1->ka_kps_lpg_l,
					);
			$tlp = array(
						$data1->ttk_layu_permanen,
						$data1->ttk_layu_permanen,
						$data1->ttk_layu_permanen,
						$data1->ttk_layu_permanen,
					);

			$hr = array(
						'H1',
						$data1->hr_awal,
						$data1->hr_tengah,
						$data1->hr_akhir,
					);

			

			//var_dump($keb_siram_perwadah);
				//var_dump($raw);
				//echo json_encode($raw);
				//die();
			$siram = json_encode($siram);
			$raw = json_encode($raw);			
			$kl = json_encode($kl);
			$tlp = json_encode($tlp);
			$hr = json_encode($hr);
			$ka = json_encode($ka);
						
			$data = array(	'title'		=> 'Hasil',
							'title2'	=> 'Hasil Perhitungan',	
							'data1'		=> $data1,
							'data2'		=> $data2,										
							'isi'		=> 'kalkulasi/hasil',
							'suhu'		=> $suhu,
							'kelembaban'=> $kelembaban,
							'siram'		=> $siram,
							'raw'		=> $raw,							
							'kl'		=> $kl,
							'tlp'		=> $tlp,
							'hr'		=> $hr,
							'ka'		=> $ka
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		}
		else{			
			redirect(base_url('kalkulasi'),'refresh');
			//$this->index();
		}
	}
}

/* End of file Kalkulasi.php */
/* Location: ./application/modules/kalkulasi/controllers/Kalkulasi.php */