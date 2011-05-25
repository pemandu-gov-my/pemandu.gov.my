
<div id="sidebar-media">
<h2 id="news1">NEWS</h2>
<img id="news-arrow" alt="" src="images/media_arrow.png" />
<ul>
	<li><a href="#">overview</a></li>
	<hr />
	<li><a href="#">reducing crime</a></li>
	<hr />
	<li><a href="#">fighting crime</a></li>
	<hr />
	<li><a href="#">Improving student outcomes</a></li>
	<hr />
	<li><a href="#">raising living standards of low income
	households</a></li>
	<hr />
	<li><a href="#">Improving rural basic infrastructure</a></li>
	<hr />
	<li><a href="#">Improving urban public transport</a></li>
</ul>
<hr class="long" />
<h2 class="unselected" id="videos">VIDEOS</h2>
<hr class="long" />
<h2 class="unselected" id="reports">REPORTS</h2>
</div>
<div class="media_content_section"><p><strong>BERNAMA, 13
Januari, 2011 </strong></p>
<p></p>
<h1>RELA Sasar 2.6 Juta Anggota Menjelang AkhirTahun Ini</h1>

<p>MELAKA, 13 Jan (Bernama) -- Ikatan Relawan Rakyat (RELA)
mensasarkan untuk menambah bilangan anggotanya kepada 2.6 juta orang
menjelang akhir tahun ini. Ketua Pengarahnya Datuk Zaidon Asmuni berkata
setakat ini, RELA mempunyai 2.5 juta anggota di seluruh negara.</p>
<p>Daripada jumlah itu, seramai 3,663 anggota RELA menyertai pasukan
sukarelawan polis bagi membantu polis dalam aktiviti cegah jenayah di
seluruh negara, katanya kepada pemberita selepas mengadakan kunjung
hormat ke atas Yang Dipertua Negeri Melaka Tun Mohd Khalil Yaakob di</p>
<p>Istana Melaka, Bukit Beruang di sini, pada Khamis.</p>
<p>Zaidon berkata peranan RELA kini diperluaskan untuk menjaga pintu
masuk di sempadan, depot tahanan dan kawasan lain yang mempunyai</p>
<p>kepentingan negara.</p>
<p>Beliau berkata pengambilan anggota baru akan dibuat dengan lebih
ketat supaya mereka yang mempunyai rekod jenayah dan pendatang tanpa
izin tidak menjadi anggota agensi itu.</p>
<p>Bagi setiap permohonan, pihaknya akan melakukan semakan dengan
Jabatan Pendaftaran Negara dan polis untuk memastikan pemohon
warganegara Malaysia dan bebas daripada rekod jenayah.</p>
<p>"Mengenai kes empat anggota RELA yang didakwa warganegara asing
yang ditangkap baru-baru ini, saya dimaklumkan oleh pegawai saya semua
mereka ini, sebenarnya warganegara Malaysia," katanya.</p>
<p>Beliau berkata RELA mempunyai prosedur dan peraturan tertentu
bagi mengelakkan penyalahgunaan kuasa di kalangan anggota.</p>
<p>"Saya ingin tegaskan di sini, kuasa anggota RELA hanya pada
sesuatu operasi sahaja, contohnya semasa membantu pihak Imigresen
membanteras pendatang asing, sebaik selesai operasi, mereka hanya rakyat
biasa, tiada kuasa RELA selepas itu," katanya.</p>
<p>RELA yang ditubuhkan pada 1972 menyambut ulang tahun ke-39 Selasa
lepas.</p>
<p>-- BERNAMA</p>
</div>
<script type="text/javascript">
		Cufon.set('fontFamily', 'ITCAvantGardeStd-Bold');
		Cufon.replace('#sidebar-media h2, .media_content_section h1');
	$(function(){
		$("#news1").click(function(){
			$('#news1').removeClass("unselected");
			$('#videos').addClass("unselected");
			$('#news-arrow').show();
			$("#content-container").fadeOut('fast').load('media_news.php').fadeIn("slow");
			return false;
		});
		$("#videos").click(function(){
			$('#news1').addClass("unselected");
			$('#videos').removeClass("unselected");
			$('#reports').addClass("unselected");
			$('#news-arrow').hide();
			$("#content-container").fadeOut('fast').load('media_videos.php').fadeIn("slow");
			return false;
		});
		$("#reports").click(function(){
			$('#news1').addClass("unselected");
			$('#videos').addClass("unselected");
			$('#reports').removeClass("unselected");
			$('#news-arrow').hide();
			$("#content-container").fadeOut('fast').load('media_reports.php').fadeIn("slow");
			return false;
		});
			
		});
</script>
