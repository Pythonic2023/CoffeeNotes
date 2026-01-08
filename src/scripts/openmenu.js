export function buttonClicked(){
	const modal = document.getElementById("menu-modal");
	const btn = document.getElementById("menu-button");
	modal.style.display = "block";
	modal.classList.add("show_modal");
	console.log("buttonClicked found");
}

export function closeModal(){
	const modal = document.getElementById("menu-modal");
	const span = document.getElementsByClassName("close")[0];
	modal.style.display = "none";
	console.log("closeModal found");
}

