mueveMenu_m = 0;
mueveMenu_f = D.g('menu_scroll');
mueveMenu();
mueveSubir_m = 0;
mueveSubir_f = D.g('subir');
mueveSubir();
/*
D.g('radio1').onclick = function(e) {
	setModoPic(1);
	var a=D.createAttribute("checked");a.value=true;
	this.setAttributeNode(a);
	D.g('radio2').removeAttribute('checked');
};
D.g('radio2').onclick = function(e) {
	setModoPic(2);
	D.g('radio1').removeAttribute('checked');
	var a=D.createAttribute("checked");a.value=true;
	this.setAttributeNode(a);
};
*/
webI = D.g('web');
function webF(e) {
	var i = "invisible";
	var a = D.g('ayuda1');
	var b = D.g('ayuda2');
	if (webI.value.length > 0 || e == 1) {
		qC(b, i);
		aC(a, i);
	} else {
		aC(b, i);
		qC(a, i);
	}
}
webI.onblur = webF;
webF();
webI.onfocus = function() {
	webF(1);
};

D.g("formCalculador").onsubmit = function(e) {
	var a = D.g('resultado');
	aC(a, "displaynone");
	qC(D.g('cargando'), "displaynone");
	xhr("/?ajax=1", "web=" + encodeURIComponent(D.g("web").value), muestraResultadoAjax, alert);
	return false;
};
function muestraResultadoAjax(data) {
	var a = D.g('resultado');
	
	qC(a, "displaynone");
	aC(D.g('cargando'), "displaynone");
	
	a.innerHTML = data;
	
	var arr = a.getElementsByTagName('script');
	for (var n = 0; n < arr.length; n++)
	    eval(arr[n].innerHTML);//run script inside div
}
window.onscroll = function(e) {
	mueveMenu();
	mueveSubir();
};
for(var i = 1; i <= 10; ++i){
	D.g("prevpic"+i).onmouseover = (function(i){return function(){lcs(i);};})(i);
	D.g("prevpic"+i).onmouseout = function(){lcs(css_user);};
}

D.g("subir").onclick = function() {
	scrollTo(0, 300);
};