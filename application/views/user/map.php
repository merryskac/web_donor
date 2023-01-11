


<?php $this->load->view('template/header');
$this->load->view('template/topbar_sidebar');
// print_r(
//     $this->session->userdata()
// );
// print_r($donor);
?>

<!DOCTYPE html>
<!-- Begin Page Content -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Quick Start - Leaflet</title>
        
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
    
	<style>
        html, body {
            height: 100%;
			margin: 0;
		}
		.leaflet-container {
            height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}
        </style>


</head>
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Map PMI Kota Palu</h1>
<h5>Serta lokasi donor darah lainnya di Kota Palu</h5>
Klik pada marker untuk menampilkan detail lokasi
<div id="map" style="width: 100%; height: 530px;"></div>
</div>
<script>
    
    var map = L.map('map').setView([-0.90, 119.877976], 12);
    
	var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
    var marker = L.marker([-0.9016810438960698, 119.87797639046451]).addTo(map);
    marker.bindPopup("<b>Markas PMI Provinsi SULAWESI TENGAH</b><br>Jl. R.A. Kartini No.20, Lolu Sel., Kec. Palu Tim., Kota Palu, Sulawesi Tengah 94235");
    var marker2 = L.marker([-0.8575833841322754, 119.88398705885425]).addTo(map);
    marker2.bindPopup("<b>RSUD Undata Palu</b><br>4RFH+G8F, 4VRM+VJ7, Jl. Trans Sulawesi, Talise, Mantikulore, Kota Palu, Sulawesi Tengah 94119");
    var marker3 = L.marker([-0.8998842403539009, 119.84806255290788]).addTo(map);
    marker3.bindPopup("<b>RS. Anutapura Palu</b><br>3RXX+P9V, Donggala Kodi, Kec. Palu Bar., Kota Palu, Sulawesi Tengah 94111");

    
</script>





<!-- End of Main Content -->

<?php $this->load->view('template/footer_side');
?>


</html>