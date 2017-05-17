function init(){
	var nav = document.getElementById("menubars");
	nav.onclick=menubar;
}

function menubar(){
	var action = document.getElementById("ff");
	console.log("sa passe");	

	action.classList.toggle('menuVisible');
	
}




window.onload =init