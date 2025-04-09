document.querySelectorAll("tr").forEach(row => {
	row.addEventListener("mouseover", () => {
        row.style.backgroundColor = "#f0f8ff"; // Light blue highlight
	});
    row.addEventListener("mouseout", () => {
        row.style.backgroundColor = ""; // Reset background
	});
});