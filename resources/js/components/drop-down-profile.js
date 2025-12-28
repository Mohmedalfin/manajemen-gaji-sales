document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("profileDropdownBtn");
    const dropdown = document.getElementById("profileDropdownContent");

    if (button && dropdown) {
        function toggleDropdown() {
            dropdown.classList.toggle("hidden");
        }
        button.addEventListener("click", toggleDropdown);
        document.addEventListener("click", function (event) {
            if (
                !button.contains(event.target) &&
                !dropdown.contains(event.target)
            ) {
                if (!dropdown.classList.contains("hidden")) {
                    dropdown.classList.add("hidden");
                }
            }
        });
    }
});
