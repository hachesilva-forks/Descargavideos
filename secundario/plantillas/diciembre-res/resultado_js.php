<div>
	<span id="id{random_id}" class="Descarga2"></span>
	<a class="TV" id="id{random_id}2" target="_blank" href="/player/?img={url_img_res}"></a>
</div>
<script>
	{dir_resultado}
</script>
<script>
	function finalizar(linkfinal, txtfinal, extension){
		if(!extension)
			extension = "mp4";
		document.getElementById('id{random_id}2').setAttribute('href', document.getElementById('id{random_id}2').getAttribute('href') + '&ext='+extension+'&video='+encodeURIComponent(linkfinal));
		document.getElementById('id{random_id}').innerHTML=ReferrerKiller.linkHtml(
			linkfinal,
			txtfinal,
			{target:'_blank'},
			{verticalAlign:'bottom'},
			'.link{'+
				'background:url("http://www.descargavideos.tv/img/flecha.png") no-repeat scroll 5px 5px #ED8D2D;'+
				'border-radius:10px;'+
				'font-family:Tahoma,Helvetica;'+
				'font-size:16px;'+
				'text-decoration:none;'+
				'line-height:30px;'+
				'word-break:break-all;'+
				'word-wrap:break-word;'+
				'text-align:center;'+
				'display:block;'+
				'transition:all 0.3s ease 0s;'+
				'min-height:30px;'+
				'padding:5px 5px 5px 50px;'+
				'color:#F8F8F8;'+
			'}'+
			'.link:hover{'+
				'background-color:#F8F8F8;'+
				'background-position:5px -55px;'+
				'color:#ED8D2D;'+
			'}'
		);
	}
</script>