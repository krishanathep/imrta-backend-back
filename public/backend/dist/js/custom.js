
function ColorModeInit(){
	if( typeof(Storage) !== "undefined" ){
		if( localStorage.getItem("color-mode") == "dark" ){
			$("body").addClass("dark-mode");
			$(".navbar").removeClass("navbar-light").addClass("navbar-dark");
			$("#darkmode-switch").prop("checked", true)
		}else{
			$("body").removeClass("dark-mode");
			$(".navbar").removeClass("navbar-dark").addClass("navbar-light");
		}
		console.log(localStorage.getItem("color-mode"));
	}
}

function DarkmodeSwitch(){
	if( $("body").hasClass("dark-mode") ){
		$("body").removeClass("dark-mode");
		$(".navbar").removeClass("navbar-dark").addClass("navbar-light");
		if( typeof(Storage) !== "undefined" ){
			localStorage.setItem("color-mode", "light");
		}
	}else{
		$("body").addClass("dark-mode");
		$(".navbar").removeClass("navbar-light").addClass("navbar-dark");
		if( typeof(Storage) !== "undefined" ){
			localStorage.setItem("color-mode", "dark");
		}
	}
}

function handleSingleFileChange(e) {

	var oThis = $(e);

	var files = e.files;
	if (!files.length) return;

	$.each( files, function( i_file, file ){

		let a = {
			file: file,
			name: file.name,
			src: ''
		}

		var fileReader = new FileReader()
		fileReader.readAsDataURL(file)
		fileReader.onloadend = function(event){
			if (event.target != null){
				a.src = event.target.result;
				oThis.next().find("img").attr("src",a.src);
				oThis.parent().next().html(a.name);
			}
		}

	});

}

function current_date(){
	var today = new Date();
	let y = today.getFullYear();
	let m = ( '0' + (today.getMonth()+1).toString() ).slice(-2);
	let d = ( '0' + (today.getDate()).toString() ).slice(-2);
	return( y+'-'+m+'-'+d );
}
function current_time(){
	var today = new Date();
	let h = ( '0' + today.getHours().toString() ).slice(-2);
	let i = ( '0' + today.getMinutes().toString() ).slice(-2);
	let s = ( '0' + today.getSeconds().toString() ).slice(-2);
	return( h+':'+i+':'+s );
}
function current_datetime(){
	let today = new Date();
	let y = today.getFullYear();
	let m = ( '0' + (today.getMonth()+1).toString() ).slice(-2);
	let d = ( '0' + (today.getDate()).toString() ).slice(-2);
	let h = ( '0' + today.getHours().toString() ).slice(-2);
	let i = ( '0' + today.getMinutes().toString() ).slice(-2);
	let s = ( '0' + today.getSeconds().toString() ).slice(-2);
	return( y+'-'+m+'-'+d+' '+h+':'+i+':'+s );
}

function printPDF() {

    var doc = new jsPDF();

    doc.fromHTML($('#report-container').get(0), 10, 10);

	doc.addFont("../Kanit-ExtraLight.ttf", "KanitExtraLight", "normal");

	doc.setFont("KanitExtraLight");
	doc.setFontType("normal");
	doc.setFontSize(28);

	doc.save('two-by-four.pdf');

}