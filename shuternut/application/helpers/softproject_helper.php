<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	if(!function_exists('tgl_indo'))
	{
		function date_indo($tgl){
			$ubah		= gmdate($tgl, time()+60*60*80);
			$pecah		= explode("-", $ubah);
			$tanggal	= $pecah[2];
			$bulan		= bulan($pecah[1]);
			$tahun		= $pecah[0];
			return $tanggal.' '.$bulan.' '.$tahun;
		}
		
	}

	if(!function_exists('bulan'))
	{
		function bulan($bln){
			switch($bln)
			{
				case 1:
					return "Januari";
					break;
				case 2:
					return "Februari";
					break;
				case 3:
					return "Maret";
					break;
				case 4:
					return "April";
					break;
				case 5:
					return "Mei";
					break;
				case 6:
					return "Juni";
					break;
				case 7:
					return "Juli";
					break;
				case 8:
					return "Agustus";
					break;
				case 9:
					return "September";
					break;
				case 10:
					return "Oktober";
					break;
				case 11:
					return "November";
					break;
				case 12:
					return "Desember";
					break;
			}
		}		
	}

	// Format Short Date
	if(!function_exists('shortdate_indo'))
	{
		function shortdate_indo($tgl){
			$ubah		= gmdate($tgl, time()+60*60*80);
			$pecah		= explode("-", $ubah);
			$tanggal	= $pecah[2];
			$bulan		= bulan($pecah[1]);
			$tahun		= $pecah[0];
			return $tanggal.'/'.$bulan.'/'.$tahun;
		}
		
	}

	if(!function_exists('short_bulan'))
	{
		function short_bulan($bln){
			switch($bulan)
			{
				case 1:
					return "01";
					break;
				case 2:
					return "02";
					break;
				case 3:
					return "03";
					break;
				case 4:
					return "04";
					break;
				case 5:
					return "05";
					break;
				case 6:
					return "06";
					break;
				case 7:
					return "07";
					break;
				case 8:
					return "08";
					break;
				case 9:
					return "09";
					break;
				case 10:
					return "10";
					break;
				case 11:
					return "11";
					break;
				case 12:
					return "12";
					break;
			}
		}		
	}

	// Format Medium Date
	if(!function_exists('mediumdate_indo'))
	{
		function mediumdate_indo($tgl){
			$ubah		= gmdate($tgl, time()+60*60*80);
			$pecah		= explode("-", $ubah);
			$tanggal	= $pecah[2];
			$bulan		= medium_bulan($pecah[1]);
			$tahun		= $pecah[0];
			return $tanggal.'-'.$bulan.'-'.$tahun;
		}
		
	}
	if(!function_exists('medium_bulan'))
	{
		function medium_bulan($bln){
			switch($bln)
			{
				case 1:
					return "Jan";
					break;
				case 2:
					return "Feb";
					break;
				case 3:
					return "Mar";
					break;
				case 4:
					return "Apr";
					break;
				case 5:
					return "Mei";
					break;
				case 6:
					return "Jun";
					break;
				case 7:
					return "Jul";
					break;
				case 8:
					return "Ags";
					break;
				case 9:
					return "Sep";
					break;
				case 10:
					return "Okt";
					break;
				case 11:
					return "Nov";
					break;
				case 12:
					return "Des";
					break;
			}
		}		
	}

	// Format Long Date
	if(!function_exists('longdate_indo'))
	{
		function longdate_indo($tanggal){
			$ubah		= gmdate($tanggal, time()+60*60*80);
			$pecah		= explode("-", $ubah);
			$tgl		= $pecah[2];
			$bln		= $pecah[1];
			$thn		= $pecah[0];
			$bulan		= bulan($pecah[1]);

			$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
			$nama_hari = "";
			if($nama == "Sunday") { $nama_hari="Minggu";}
			else if($nama == "Monday") { $nama_hari ="Senin";}
			else if($nama == "Tuesday") { $nama_hari ="Selasa";}
			else if($nama == "Wednesday") { $nama_hari ="Rabu";}
			else if($nama == "Thursday") { $nama_hari ="Kamis";}
			else if($nama == "Friday") { $nama_hari ="Jumat";}
			else if($nama == "Saturday") { $nama_hari ="Sabtu";}
			
			return $nama_hari.','.$tgl.','.$bulan.','.$thn;
		}
		
	}

	// Input Text
	if(!function_exists('input_text'))
	{
		function input_text($field, $label, $value='', $required = false, $readonly = false)
		{
			$attribut = array(	'name'		=> $field,
								'id'		=> $field,
								'class'		=> 'form-control',
								'placeholder'	=> "Masukkan ".$label);
			!$readonly ?: $attribut['readonly'] = true;
			echo '<div class="form-group">';
			echo '<label>'.$label.'</label>';			
			echo form_input($attribut, set_value($field, $value));
			echo '</div>';
		}
	}

	function input_text1($type, $field_name, $label=null, $value = '',$required = false, $readonly=false)
{	
	$req = ($required) ? '<font color="red"> * </font>' : '';
    $attribut = array(
    				'type' => $type,
                    'name' => $field_name,
                    'id' => $field_name,
                    'class' => 'form-control',
                    'placeholder' => 'Masukkan '.$label,                    
                );
    !$readonly ?: $attribut['readonly'] = true;    
    echo '<div class="form-group ';
	echo form_error($field_name) ? 'has-error' : null;
	echo '">';
        echo'<label>'.$label.$req.'</label>';
        echo form_input( $attribut, set_value($field_name, $value));
        echo form_error($field_name);        
    echo'</div>';
}

	//Input Select
	if(!function_exists('input_select'))
	{
		function input_select($field, $label, $options, $selected = '', $required = '', $disabled = false)
		{
			$classRequired = ($required) ? 'required' : '';
			$attribut = array(	'class'	=> 'form-control select '.$classRequired,
								'placeholder'	=> 'Pilih '.$label);
			!$disabled ?: $attribut['disabled'] = true;

			echo '<div class="form-group">';
			echo '	<label>'.$label.'</label>';
			echo form_dropdown($field, $options, set_value($field, $selected), $attribut);
			echo '</div>';
		}
	}

function button_add($uri)
{
	$CI =& get_instance();
	$html='
		<div>
			<a href="'.base_url($uri).'" class="btn btn-primary btn-flat">
				<i class="fa fa-user-plus"></i> Tambah
			</a>
		</div>
	';
	return $html;
}

function button_update($uri, $id)
{
	$CI =& get_instance();
	$html='		
			<a href="'.base_url($uri.'/'.$id).'" class="btn btn-warning btn-sm">
				<i class="fa fa-pencil"></i> Edit
			</a>		
	';
	return $html;	
}

function button_delete($uri, $id)
{
	$CI =& get_instance();
	$html='		
			<a href="'.base_url($uri.'/'.$id).'" class="btn btn-danger btn-sm">
				<i class="fa fa-trash-o"></i> Hapus
			</a>		
	';
	return $html;
}

function button_back($uri)
{
	$CI =& get_instance();
	$html='
		<div>
			<a href="'.base_url($uri).'" class="btn btn-info btn-flat">
				<i class="fa fa-undo"></i> Back
			</a>
		</div>
	';
	return $html;
}

	