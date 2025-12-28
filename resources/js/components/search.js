// Copy paste logic search Anda ke sini tanpa tag <script>
document.addEventListener("DOMContentLoaded", function () {
    const input = document.getElementById("searchInput");
    const form = document.getElementById("searchForm");
    let timer = null;

    if (input && form) {
        // Fokus cursor
        var val = input.value;
        input.focus();
        input.value = "";
        input.value = val;

        input.addEventListener("input", function () {
            clearTimeout(timer);
            timer = setTimeout(() => {
                if (input.value.trim() === "") {
                    if (window.location.search.length > 0) {
                        window.location.href = window.location.pathname;
                    }
                } else {
                    form.submit();
                }
            }, 400);
        });
    }
});
